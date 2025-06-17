<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS & Custom JS -->
  <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <!-- Mobile Responsive js -->
  <script src="{{ asset('frontend') }}/assets/js/mobileResponsive.js"></script>

  <!-- Font awesome js -->
  <script src="{{ asset('frontend') }}/assets/js/all.min.js"></script>

  <!-- Hero Slider JS -->
  <script src="{{ asset('frontend') }}/assets/js/heroSlider.js"></script>

  <!-- Hero Slider JS -->
  <script src="{{ asset('frontend') }}/assets/js/logoSlider.js"></script>

      <!-- Auth Type Js -->
    <script src="{{ asset('frontend') }}/assets/js/authType.js"></script>

  <!-- Custom JS -->
  <script src="{{ asset('frontend') }}/assets/js/script.js"></script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>

  </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}



@stack('scripts')
