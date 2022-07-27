<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EMS @yield('title')</title>

  @include('partials.style')
  @yield('styles')
  @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  @section('wrapper')
  <div class="wrapper">

    @include('partials.preloader')

    @include('partials.navbar')

    @include('partials.sidebar')

    @section('content-wrapper')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @section('content-header')
      @yield('header')
      @yield('content-wrapper')
      @show

      @section('main-content')
      <!-- Main content -->
      <section class="content">

        @section('container-fluid')

        <div class="container-fluid">

          @section('row')
          @yield('content')
          @show
          <!-- /.row -->
        </div><!-- /.container-fluid -->
        @show
      </section>
      @show
      <!-- /.content -->

    </div>
    @show


    @include('partials.footer')

    @include('partials.controlsidebar')

  </div>
  
  

  @section('script')
  @yield('add-script')
  @include('partials.script')
  
  <script>
    $(document).ready(function() {
      var employee = [];
      $("#employee").select2({
        data: employee
      });
    });
  </script>
   @livewireScripts
 @show
</body>
</html>