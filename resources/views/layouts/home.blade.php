<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('includes.head')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    @include('includes.humberger')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('includes.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @include('includes.hero')
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    @yield('content')
    <!-- Featured Section End -->

    <!-- Banner Begin -->

    <!-- Banner End -->

    <!-- Latest Product Section Begin -->

    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
 
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    @include('includes.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('includes.script_js')
</body>

</html>