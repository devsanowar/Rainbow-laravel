 <div class="col-md-12">
     <div id="product-list-container">

     </div>
 </div>


 @push('scripts')
     <script>
         // ট্যাবে ঢোকার সময় বা প্রথমবার লোড করার সময়
         document.addEventListener("DOMContentLoaded", function() {
             loadProducts();

             // পেজিনেশন লিঙ্কে ক্লিক করলে AJAX দিয়ে লোড হবে
             document.addEventListener('click', function(e) {
                 if (e.target.closest('.pagination a')) {
                     e.preventDefault();
                     let url = e.target.closest('a').getAttribute('href');
                     loadProducts(url);
                 }
             });
         });

         function loadProducts(url = "{{ route('member.products') }}") {
             fetch(url, {
                     headers: {
                         'X-Requested-With': 'XMLHttpRequest'
                     }
                 })
                 .then(response => response.text())
                 .then(html => {
                     document.querySelector('#product-list-container').innerHTML = html;
                 })
                 .catch(err => console.error('Error loading products:', err));
         }
     </script>



     {{-- product added to cart --}}
     <script>
         $(document).ready(function() {
             $(document).on('submit', '.add-to-cart-form', function(e) {
                 e.preventDefault();

                 let form = $(this);
                 let formData = form.serialize();

                 let button = form.find('.btn-buy');
                 let spinner = button.find('.spinner-border'); // ✅ safer: search button

                 button.prop('disabled', true);
                 spinner.removeClass('d-none');

                 $.ajax({
                     url: "{{ route('addToCart') }}",
                     method: "POST",
                     data: formData,

                     success: function(response) {
                         toastr.success(response.message, '', {
                             timeOut: 1500
                         });

                         $('#cart-count').text(response.itemCount);
                         $('.cart-subtotal').text('৳' + response.subtotal);
                         $('.cart-total').text('৳' + response.total);

                         let existingRow = $('#cart-item-' + response.productId);

                         if (existingRow.length) {
                             // ✅ Row exists: replace it
                             existingRow.replaceWith(response.cart_row);
                         } else {
                             // ✅ Row does not exist: append new row
                             $('#cartBody').append(response.cart_row);
                         }

                         spinner.addClass('d-none');
                         button.prop('disabled', false);
                     },

                     error: function() {
                         toastr.error('Failed to add product.', '', {
                             timeOut: 1500
                         });
                         spinner.addClass('d-none');
                         button.prop('disabled', false);
                     }
                 });
             });
         });
     </script>
 @endpush
