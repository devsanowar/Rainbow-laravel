 <div class="col-md-12">
     <div class="row g-4">
         <!-- Product Card Start -->
         @forelse ($products as $product)
             <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                 <div class="card product-card h-100">
                     <img src="{{ asset($product->thumbnail) }}" class="card-img-top product-img"
                         alt="Moringa Leaf Powder" />
                     <div class="card-body d-flex flex-column">
                         <h5 class="product-name"><a href="singleProduct.html">{{ $product->product_name }}</a></h5>
                         <p class="text-muted">
                             Superfood for Energy & Immunity
                         </p>

                         <p class="product-price mb-2">
                             @if ($product->discount_price && $product->discount_type === 'flat')
                                 @php
                                     $product_discount_price = $product->regular_price - $product->discount_price;
                                 @endphp
                                 <span
                                     class="text-decoration-line-through text-danger me-2">{{ number_format($product->regular_price, 2) }}</span>
                                 <span class="current-price">{{ number_format($product_discount_price, 2) }}TK</span>
                             @elseif ($product->discount_price && $product->discount_type === 'percent')
                                 @php
                                     $discount_amount = ($product->regular_price * $product->discount_price) / 100;
                                     $product_discount_price = $product->regular_price - $discount_amount;
                                 @endphp
                                 <span
                                     class="text-decoration-line-through text-danger me-2">{{ number_format($product->regular_price, 2) }}</span>
                                 <span class="current-price">{{ number_format($product_discount_price, 2) }}TK</span>
                             @else
                                 <span
                                     class="text-decoration-line-through text-danger me-2">{{ number_format($product->regular_price, 2) }}
                                     TK</span>
                             @endif

                             <span class="discount-percent">50% OFF</span>
                         </p>

                         <form class="add-to-cart-form">
                             @csrf
                             <input type="hidden" name="product_id" value="{{ $product->id }}">
                             <input type="hidden" name="order_qty" value="1">
                             <button type="submit" class="rainbow-btn btn-buy mt-auto w-100">
                                 Add to Cart
                                 {{-- <span class="spinner-border spinner-border-sm d-none"></span> --}}
                             </button>
                         </form>

                     </div>
                 </div>
             </div>
         @empty
             <h4 style="color: #ccc">Product not found!!</h4>
         @endforelse


         <!-- Product Card End -->
     </div>

     <!-- Pagination -->
     <div class="d-flex justify-content-center mt-4">
         <ul class="pagination simple-modern-pagination mb-0">
             {{-- Previous --}}
             @if ($products->onFirstPage())
                 <li class="page-item disabled">
                     <span class="page-link">Pervios</span>
                 </li>
             @else
                 <li class="page-item">
                     <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">Pervios</a>
                 </li>
             @endif

             {{-- Page Numbers --}}
             @foreach ($products->links()->elements[0] as $page => $url)
                 @if ($page == $products->currentPage())
                     <li class="page-item active">
                         <span class="page-link">{{ $page }}</span>
                     </li>
                 @else
                     <li class="page-item">
                         <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                     </li>
                 @endif
             @endforeach

             {{-- Next --}}
             @if ($products->hasMorePages())
                 <li class="page-item">
                     <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next</a>
                 </li>
             @else
                 <li class="page-item disabled">
                     <span class="page-link">Next</span>
                 </li>
             @endif
         </ul>
     </div>


 </div>
