<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $members = User::with(['division','district','upazila','union'])->where('system_admin', 'Member')->select(['id','name', 'member_username', 'phone', 'position', 'division_id', 'district_id', 'upazila_id', 'union_id'])->get();

        return view('admin.layouts.pages.members.index', compact('members'));
    }

    public function destroy($id){
        $user = User::where('system_admin', 'Member')->findOrFail($id);
        $user->delete();

        Toastr::success('Member Successfully deleted');
        return back();
    }
}
