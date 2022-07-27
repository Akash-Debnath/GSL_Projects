@extends('index')
@section('title', 'Profile Update Request')
@section('wrapper')
@parent
{{-- @section('preloader')
@parent
@endsection

@section('main-header')
@parent
@endsection

@section('main-sidebar')
@parent
@endsection --}}

@section('content-wrapper')
@parent
@section('content-header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile Update Request</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Employee</a></li>
                    <li class="breadcrumb-item"><a href="#">All</a></li>
                    <li class="breadcrumb-item active">Profile Update Request </li>
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

<div class="col-12">
    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            <table class=" table-bordered table-responsive-md table-responsive-xl">
                <thead>
                    <tr>
                        <th>Sl No:</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Phone</th>
                        <th>Present Address</th>
                        <th>Permanent Address</th>
                        <th>Achievement</th>
                        <th>Experience</th>
                        <th>Date of Birth</th>
                        <th>Blood Group</th>
                        <th>Gender</th>
                        <th>Approve</th>
                        <th>Reject</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </div>
</div>


@endsection
<!-- end editing-->
@endsection
@endsection
@endsection



{{-- @section('main-footer')
@parent
@endsection

@section('control-sidebar')
@parent
@endsection --}}

@endsection