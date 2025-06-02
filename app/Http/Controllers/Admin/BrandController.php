<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Laravel\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('order')->get();
        return view('admin.layouts.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:200',
        ]);

        $brandImage = $this->brandImage($request);
        Brand::create([
            'brand_name' => $request->brand_name,
            'image' => $brandImage,
            'is_active' => $request->is_active,
        ]);

        Toastr::success('Brand added successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('admin.layouts.pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:200',
        ]);

        $brand = Brand::find($id);
        $newImage = $this->brandImage($request);
        if ($newImage) {
            $oldImagePath = public_path($brand->image);
            if ($brand->image && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $brand->image = $newImage;
        }

        $brand->update([
            'brand_name' => $request->brand_name,
            'image' => $brand->image,
            'is_active' => $request->is_active,
        ]);

        Toastr::success('Brand updated successfully.');
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if ($brand->brand_name == 'Default') {
            Toastr::error('Default brand cannot be deleted.');
            return back();
        }

        $defaultBrand = Brand::where('brand_name', 'Default')->first();
        if (!$defaultBrand) {
            Toastr::error('Brand deleted successfully.');
            return back();
        }
        $brand->products()->update([
            'brand_id' => $defaultBrand->id,
        ]);

        if ($brand) {
            $oldImagePath = public_path($brand->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $brand->delete();
        Toastr::success('Brand deleted successfully.');
        return redirect()->route('brand.index');
    }


     public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No brand selected.']);
        }

        // Get default brand
        $defaultBrand = Brand::where('brand_name', 'Default')->first();

        if (!$defaultBrand) {
            return response()->json(['success' => false, 'message' => 'Default brand not found.']);
        }

        $deletedCount = 0;

        foreach ($ids as $id) {
            $brand = Brand::find($id);

            if (!$brand) {
                continue;
            }

            // Prevent deleting the default brand
            if ($brand->brand_name === 'Default') {
                continue;
            }

            // Transfer products to default brand
            $brand->products()->update([
                'brand_id' => $defaultBrand->id,
            ]);

            // Delete brand image from storage
            if (!empty($brand->image)) {
                $oldImagePath = public_path($brand->image);
                if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $brand->delete();
            $deletedCount++;
        }

        if ($deletedCount > 0) {
            // Optional: if you use Toastr in Blade after Ajax success
            return response()->json(['success' => true, 'message' => "$deletedCount brand(s) deleted successfully."]);
        }

        return response()->json(['success' => false, 'message' => 'No valid brand was deleted.']);
    }



    public function brandChangeStatus(Request $request)
    {
        $brand = Brand::find($request->id);

        if (!$brand) {
            return response()->json(['status' => false, 'message' => 'Brand not found.']);
        }

        $brand->is_active = !$brand->is_active;
        $brand->save();

        return response()->json([
            'status' => true,
            'message' => 'Status changed successfully.',
            'new_status' => $brand->is_active ? 'Active' : 'DeActive',
            'class' => $brand->is_active ? 'btn-success' : 'btn-danger',
        ]);
    }


    // Brand orderBy position
    public function updateOrder(Request $request)
    {
        if (!$request->has('order') || !is_array($request->order)) {
            return response()->json(['success' => false, 'message' => 'Invalid data received.'], 400);
        }

        foreach ($request->order as $index => $id) {
            Brand::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully.',
        ]);
    }


    private function brandImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = Image::read($request->file('image'));
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('uploads/brand_image/');
            $image->save($destinationPath . $imageName);
            return 'uploads/brand_image/' . $imageName;
        }
        return null;
    }


}
