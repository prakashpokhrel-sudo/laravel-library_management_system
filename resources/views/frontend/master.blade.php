<!DOCTYPE html>
<html lang="en">
   @include('frontend.body.top')
   <!-- body -->
   <body class="main-layout home_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="/frontend/images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
     @include('frontend.body.header')
      <!-- end header -->
      @yield('content')
      <!-- end Contact -->
      <!-- footer -->
      @include('frontend.body.footer')
      <!-- end footer -->
      @include('frontend.body.bottom')
   </body>
</html>