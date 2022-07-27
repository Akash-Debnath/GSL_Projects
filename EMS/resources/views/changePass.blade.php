@extends('index')
@section('title', 'Employee Details')
@section('wrapper')
@parent
{{-- @section('preloader')
@parent
@endsection --}}

{{-- @section('main-header')
@parent
@endsection --}}

{{-- @section('main-sidebar')
@parent
@endsection --}}

@section('content-wrapper')
@parent
@section('content-header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">User Profile </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('main-content')
@parent
@section('container-fluid')
@parent
<!--edit here-->
@section('row')
<div class="row d-flex justify-content-center ">

    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header ">
               <h4 class="mb-0 text-center">Change Password</h4>
            </div>
            <div class="card-body">
               <form action="">
                   <div class="col-12">
                       <label for="current">Current</label>
                       <input type="password" name="" id="" class="form-control">
                   </div>

                   <div class="col-12">
                    <label for="current">New</label>
                    <input type="password" name="" id="" class="form-control">
                </div>
                <div class="col-12">
                    <label for="current">Retype New</label>
                    <input type="password" name="" id="" class="form-control">
                </div>
                <div class="col-12 d-flex">
                    <button class="btn btn-sm btn-info ml-auto">Save the Changes</button>
                </div>
               </form>
            </div>
        </div>
    </div>
  
</div>
@endsection
@endsection
@endsection
@endsection



@section('script')
@parent
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


    })

</script>
@endsection


@endsection