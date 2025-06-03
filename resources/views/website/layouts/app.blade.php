<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rainbow Global</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/icons/favicon.ico" type="image/x-icon" />

    @include('website.layouts.inc.style')

</head>

<body>
    <!-- ======= HEADER START ======= -->
@include('website.layouts.inc.header')

    @yield('website_content')
 


        @include('website.layouts.inc.footer')



    
</body>

</html>
