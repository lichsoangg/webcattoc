<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.share.head-css')
  </head>
  <body>
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
        @include('admin.share.header')
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('admin.share.menu')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            @yield('page-title')
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            @yield('content')
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->

        @include('admin.share.footer')
      </div>
    </div>
    <!-- latest jquery-->
    @include('admin.share.foot-css')
    @yield('js')
</body>
    </html>
