@extends('index')
@section('title', ' ~ Employee Create')
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
                <h4>Employee Detail</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Employee  </a></li>
                    <li class="breadcrumb-item"><a href="#">All</a></li>
                    <li class="breadcrumb-item active">Employee Detail</li>
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

<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div class="card">
            <form class="border p-4 " action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf



                <div class="row">
                    <div class="col-12">
                        <label for="name">Name</label>
                        <input type="text" placeholder="Name" class="form-control" name="name" id="name">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="emp_id">Employee ID</label>
                        <input type="text" placeholder="Employee ID" class="form-control" name="emp_id" id="emp_id">
                    </div>

                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="grade">Grade</label>
                        <select id="grade" name="grade" class="form-control">
                            <option selected hidden>--Select--</option>
                            @foreach ($employeeGrade as $empGrade)
                            <option value="{{ $empGrade->id }}">{{ $empGrade->grade }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-6">
                        <label for="dept">Department</label>
                        <select id="dept" name="dept_code" class="form-control">
                            <option selected hidden>--Select--</option>
                            @foreach ($employeeDept as $empDept)
                            <option value="{{ $empDept->dept_code }}">{{ $empDept->dept_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="opt_des">Operational Designation</label>
                        <select id="opt_des" name="designation" class="form-control">
                            <option selected hidden>--Select--</option>
                            @foreach ($employeeDesignation as $empDesignation)
                            <option value="{{$empDesignation->id}}">{{ $empDesignation->designation }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>





                <div class="row">
                    <div class="col-md-6">
                        <label for="date">Date</label>
                        <input class="form-control" type="date" id="date" name="jdate">
                    </div>

                    @php
                        $status = array("P"=>"Permanent", "c"=>"Contractual", "T"=>"Probationary", "R"=>"Regular");
                    @endphp

                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="c_stat">Current Status</label>
                        <select id="c_stat" class="form-control" name="status">
                            <option selected hidden>--Select--</option>
                            @foreach ($status as $key => $value)
                                <option vcalue="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-6">
                        <label for="login">Office Login Time</label>
                        <input class="form-control" type="time" id="login" name="office_stime">
                    </div>

                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="logout">Office Logout Time</label>
                        <input class="form-control" type="time" id="logout" name="office_etime">
                    </div>
                </div>



                <div class="container-fluid  rounded  bg-info  ">
                    <div class="row">
                        <div class="col-12">
                            <h5 class=" text-center text-color-info mb-0 py-2">Contact Information</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 ">
                        <label for="mobile">Mobile</label>
                        <input class="form-control" placeholder="Mobile" type="text" id="mobile" name="mobile">
                    </div>

                    <div class="col-md-6 mt-md-0 mt-3">
                        <label for="h_phone">Home Phone</label>
                        <input class="form-control" placeholder="Home Phone" type="text" id="h_phone" name="phone">
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="text" placeholder="Email" class="form-control" id="email" name="email">
                    </div>
                </div>



                <div class="row">
                    <div class="col-12 ">
                        <label for="p_address">Present Address</label>
                        <textarea class="form-control" placeholder="Present Address" id="p_address" name="present_address" cols="30" rows="2"></textarea>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12 ">
                        <label for="perma_address">Permanent Address</label>
                        <textarea class="form-control" placeholder="Present Address" name="permanent_address" id="perma_address" cols="30" rows="2"></textarea>
                    </div>
                </div>





                <div class="container-fluid  rounded  bg-info  ">
                    <div class="row">
                        <div class="col-12">
                            <h5 class=" text-center text-color-info mb-0 py-2 ">Educational Information</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="l_achive">Last Achievement</label>
                        <input type="text" placeholder="Last Achievement" name="last_edu_achieve" class="form-control" id="l_achive">
                    </div>
                </div>


                <div class="container-fluid  rounded  bg-info  ">
                    <div class="row">
                        <div class="col-12">
                            <h5 class=" text-center text-color-info mb-0 py-2">Personal Information</h5>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <label for="dob">Date of Birth</label>
                        <input class="form-control" type="date" id="date" name="dob">
                    </div>

                    @php
                        $blood_group = array("A+"=>"A (+ve)", "A-"=>"A (-ve)", "B+"=>"B (+ve)", "B-"=>"B (-ve)", "O+"=>"O (+ve)", "O-"=>"O (-ve)", "AB+"=>"AB (+ve)", "AB-"=>"AB (-ve)" );
                    @endphp

                    <div class="col-md-4 mt-md-0 mt-3">
                        <label for="b_grp">Current Status</label>
                        <select id="b_grp" name="blood_group" class="form-control">
                            <option value="" selected hidden> --Blood Group-- </option>
                            @foreach ($blood_group as $key=>$value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    @php $gender = array("M" => "Male", "F"=>"Female"); @endphp

                    <div class="col-md-4 mt-md-0 mt-3">
                        <label for="grnder">Gender</label>
                        <select id="gender" name="gender" class="form-control">
                            <option value="" selected hidden> --Gender-- </option>
                            @foreach ($gender as $key=>$value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12 ">

                        <label for="u_image" class="d-block">Upload Image</label>
                        <input type="file" placeholder="Upload Image" class=" border-none" id="u_image" name="image">
                        <img src="" alt="your image">
                        
                    </div>
                </div>



                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <button class="btn btn-md btn-info btn-block">Done </button>
                    </div>
                </div>



            </form>
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



<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

@endsection