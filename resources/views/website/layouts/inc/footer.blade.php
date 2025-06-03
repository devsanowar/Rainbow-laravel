 @php
     use App\Models\WebsiteSetting;
     use App\Models\WebsiteSocialIcon;
     $website_setting = WebsiteSetting::first();
     $website_social = WebsiteSocialIcon::first();
 @endphp

 <!-- Footer Section -->
 <!-- ======= FOOTER START ======= -->
 <!-- Footer Section -->
 <footer class="footer-section pt-5">
     <div class="footer-logo-area">
         <div class="container">
             <div class="row d-flex align-items-center py-4">
                 <div class="col-md-6">
                     <div class="footer-logo text-start">
                         <a href="#">
                             <img src="{{ asset('frontend') }}/assets/images/logo//logo-main.png" alt="Luminous Logo"
                                 class="img-fluid" style="height: 40px;">
                         </a>
                     </div>
                 </div>
                 <div class="col-md-6 text-end">
                     <div class="social-icons">
                         <a href="#" class=" me-2"><i class="fab fa-facebook-f"></i></a>
                         <a href="#" class=" me-2"><i class="fab fa-twitter"></i></a>
                         <a href="#" class=" me-2"><i class="fab fa-instagram"></i></a>
                         <a href="#" class=" me-2"><i class="fab fa-pinterest-p"></i></a>
                         <a href="#" class=""><i class="fab fa-youtube"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="footer-row-content">
         <div class="container">
             <div class="row">
                 <!-- Company Info -->
                 <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-start border-right-colum">
                     <div class="footer-left-content">
                         <h3 class="footer-contact-heading text-uppercase mb-4">Business Contact</h3>
                         <div class="business-contact">
                             <ul class="list-unstyled">
                                 <li class="mb-2">
                                     <i class="fas fa-map-marker-alt me-2" style="color: #47ffb3;"></i>
                                     123 Yarran St, Punchbowl, NSW 2196, Australia
                                 </li>
                                 <li class="mb-2">
                                     <i class="fas fa-phone-alt me-2" style="color: #4795ff;"></i>
                                     (64) 8342 1245
                                 </li>
                                 <li class="mb-3">
                                     <i class="fas fa-envelope me-2" style="color: #ffb347;"></i>
                                     support@rainbowglobal.com
                                 </li>
                             </ul>
                             <a href="#" class="btn btn-sm btn-outline-light">
                                 <i class="fas fa-directions me-1"></i> Get direction
                             </a>
                         </div>
                     </div>
                 </div>
                 <!-- Newsletter -->
                 <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-start border-right-colum">
                     <div class="footer-middle-content">
                         <h5 class="text-uppercase mb-4">Subscribe Newsletter</h5>
                         <p class="small">We invite you to register to read the latest news, offers and events about
                             our company.
                             We
                             promise not to spam your inbox.</p>
                         <div class="input-group mb-3">
                             <input type="email" class="form-control form-control-sm"
                                 placeholder="Enter your e-mail..." aria-label="Email">
                             <button class="btn btn-sm text-white" type="button"
                                 style="background: linear-gradient(45deg, #ff6b9d, #ffb347);">
                                 <i class="fas fa-paper-plane"></i>
                             </button>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-start">
                     <div class="footer-right-content">
                         <div class="row">
                             <!-- About Us -->
                             <div class="col-md-6">
                                 <h5 class="text-uppercase mb-4">About Us</h5>
                                 <ul class="list-unstyled">
                                     <li class="mb-1"><a href="#" class="text-decoration-none">About Us</a></li>
                                     <li class="mb-1"><a href="#" class="text-decoration-none">Contact Us</a>
                                     </li>
                                     <li class="mb-1"><a href="#" class="text-decoration-none">Our Store</a>
                                     </li>
                                     <li><a href="#" class="text-decoration-none">Our Story</a></li>
                                 </ul>
                             </div>
                             <!-- Resources -->
                             <div class="col-md-6">
                                 <h5 class="text-uppercase mb-4">Resources</h5>
                                 <ul class="list-unstyled">
                                     <li class="mb-1"><a href="#" class="text-decoration-none">Privacy
                                             Policies</a></li>
                                     <li class="mb-1"><a href="#" class="text-decoration-none">Terms &
                                             Conditions</a></li>
                                     <li class="mb-1"><a href="#" class="text-decoration-none">Returns &
                                             Refunds</a></li>
                                     <li class="mb-1"><a href="#" class="text-decoration-none">FAQ's</a></li>
                                     <li><a href="#" class="text-decoration-none">Shipping</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <hr class="my-1" style="border-color: rgba(255,255,255,0.1);">

     <!-- Copyright -->
     <div class="container">
         <div class="row">
             <div class="col-md-6 text-start">
                 <p class="small mb-0">Copyright &copy; 2025 by Rainbow Global. All Rights Reserved.</p>
             </div>
             <div class="col-md-6 text-end">
                 <p class="small mb-0">Developed By <a href="#" class="developed-link"
                         target="_blank">Freelance IT</a></p>
             </div>
         </div>
     </div>
 </footer>

 <script>
     $(document).ready(function() {
         $(document).on('click', '.subscribe-button', function(e) {
             e.preventDefault();

             var formData = $('#newsletterForm').serialize(); // ✅ ফর্মের ডাটা সংগ্রহ করো

             $.ajax({
                 url: '/subscribe-newsletter',
                 method: 'POST',
                 data: formData,
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 success: function(response) {
                     toastr.success('বার্তাটি সফলভাবে পাঠানো হয়েছে');
                     $('#newsletterForm')[0].reset();
                 },
                 error: function(xhr) {
                     if (xhr.status === 422) {
                         $.each(xhr.responseJSON.errors, function(key, value) {
                             toastr.error(value[0]);
                         });
                     } else {
                         toastr.error('ত্রুটি হয়েছে, আবার চেষ্টা করুন');
                     }
                 }
             });
         });
     });
 </script>

 </body>

 </html>
