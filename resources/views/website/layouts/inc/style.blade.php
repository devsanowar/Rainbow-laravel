<!-- Bootstrap CSS -->
  <link href="{{ asset('frontend') }}/assets/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/all.min.css" />

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css" />

  <!-- responsiveness -->
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

@php
    use App\Models\WebsiteColor;
    $websiteColor = WebsiteColor::first();
@endphp

<style>
    :root {
  --priamary: {{ $websiteColor->primary_color }};
  --secondary: {{ $websiteColor->secondary_color }};
  --base: {{ $websiteColor->base_color }};
  --black: rgb(51, 51, 51);
  --white: rgb(255, 255, 255);
  --basebg: {{ $websiteColor->base_bg_color }};
  --heading-font: "Nunito", sans-serif;
  --title-font: "Pacifico", cursive;
  --body-font: "Roboto", sans-serif;
  --heading-three: 27px;
}
</style>

