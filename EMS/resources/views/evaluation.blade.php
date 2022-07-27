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

<div class="row">
  <div class="col-12 d-flex mb-3">
    <a href="/evaluation-form" class="btn btn-sm btn-info ml-auto">New Evaluation</a>
  </div>
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="dist/img/user2-160x160.jpg"
                alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">Junnatu Adan Rothi</h3>

            <p class="text-muted text-center">Assistant Manager</p>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

       
      </div>


      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          
          <div class="card-body">
           
              
                <table class="table table-borderless table-info">
                  <tr class="bg-gradient-gray">
                    <td colspan="2">
                      <h5><i class="fas fa-user"></i> Information</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>Employee ID</td>
                    <td>0146</td>
                  </tr>
                  <tr>
                    <td>Grade</td>
                    <td>null </td>
                  </tr>
                  <tr>
                    <td>Operational Designation</td>
                    <td>Assistant Manager</td>
                  </tr>
                  <tr>
                    <td> Department</td>
                    <td>HR & Admin</td>
                  </tr>
                  
                  <tr>
                    <td>Current Status</td>
                    <td>Permanent (on 2012-08-01) </td>
                  </tr>
                </table>

                
              
                

                

                <table class="table table-bordered ">
                  <tr class="bg-gradient-gray">
                    <td colspan="3">
                      <h5></span> Evaluation Details</h5>
                    </td>
                  </tr>
                  <tr>
                      <th>Evaluation Term</th>
                      <th>Evaluation Form</th>
                      <th>Evaluation Status</th>
                  </tr>
                  <tr>
                    <td> 2009-07-01 to 2010-06-30</td>
                    <td> <a href="#" class="btn btn-info btn-sm">show</a> </td>
                    <td>Finished</td>
                  </tr>
                  <tr>
                    <td>2009-07-01 to 2010-06-30</td>
                    <td><a href="#" class="btn btn-info btn-sm">show</a></td>
                    <td>Finished</td>
                  </tr>
                  <tr>
                    <td>2009-07-01 to 2010-06-30</td>
                    <td><a href="#" class="btn btn-info btn-sm">show</a></td>
                    <td>Finished</td>
                  </tr>

                  <tr>
                    <td>2009-07-01 to 2010-06-30</td>
                    <td><a href="#" class="btn btn-info btn-sm">show</a></td>
                    <td>Finished</td>
                  </tr>

                  <tr>
                    <td>2009-07-01 to 2010-06-30</td>
                    <td><a href="#" class="btn btn-info btn-sm">show</a></td>
                    <td>  Manager in Progress</td>
                  </tr>
                </table>


                
              


              
              <!-- /.tab-pane -->
           
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->



</div>

@endsection
@endsection
@endsection
@endsection



{{-- @section('main-footer')
@parent
@endsection --}}

{{-- @section('control-sidebar')
@parent
@endsection --}}


@endsection