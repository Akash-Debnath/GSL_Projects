@extends('index')
@section('title', 'Employee-list')
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
                <h4>Upload Attendance Information</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Attendance </a></li>
                    <li class="breadcrumb-item"><a href="#">Upload</a></li>
                    <li class="breadcrumb-item active">Upload Attendance Information</li>
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
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-center">Add Attendance Manually</h4>
            </div>
            <div class="card-body">
                <form action="{{route('upload.store')}}" class="" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-12">
                            <label for="cause">Cause</label>
                            <div class=" form-group" id="cause" name="reason">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio1" name="reason" value="Forgot to punch">
                                    <label for="customRadio1" class="custom-control-label mb-0" >Forgot to punch</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio2" name="reason" checked="" value="Loss of finger's outer skin by peeling">
                                    <label for="customRadio2" class="custom-control-label mb-0 ">Loss of finger's outer skin by peeling</label>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">

                    

                            
                                <label>Department</label>
                                 {{-- <p id="get_session"></p> --}}
                               
                                <select class="form-control select2" name="dept" style="width: 100%;" id='dept' >
                                  <option selected="selected">Select Department</option>
                                  @foreach($dept as $d)
                                  <option data-state="{{$d->dept_code}}" value="{{$d->dept_code}}">{{$d->dept_name}}</option>
                                  @endforeach
                                </select>
                                {{-- <p id="get_session"></p> --}}
                                
                                {{-- here : {{ Session::get('dept_code')}} --}}
                                
                                {{-- @if($dept2 == 'SO')
                                <input type="text" name="" id="">
                                @endif --}}
                            

                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <label for="staff">Staff</label>
                           
                            <select class="form-control select2" style="width: 100%;" id='staff' name="staff">
                                <option selected="selected" >Select Staff</option>
                               
                                @foreach($employee as $e)
                              

                               
                                <option data-state="{{$e->dept_code}}" value="{{$e->emp_id}}">{{$e->name}}</option>
                              
                                @endforeach
                              </select>
                            
                        </div>

                      
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="date">Date</label>
                            <input class="form-control" type="date" id="date" name="date">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="login">Login Time</label>
                            <input class="form-control" type="time" id="date" name="in">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="logout">Logout Time</label>
                            <input class="form-control" type="time" id="logout" name="out">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                           
                            <input class="btn-block btn btn-info btn-sm" type="submit" id="logout">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-center">Upload Attendance File</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('attendance_file.report') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">

                            <label for="att">Select Text File</label>
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->

                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="customFile1">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm btn-block btn-info">Upload Attendance File</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-center">Upload Training Attendance File</h4>
            </div>
            <div class="card-body">
                <form action="{{route('training_attendance')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">

                            <label for="att">Select Text File</label>
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->

                                <div class="custom-file">
                                    <input type="file" name="training_file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-sm btn-block btn-info">Upload Training Attendance File</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
<!-- end editing-->
@endsection
@endsection
@endsection

@section('script')
@parent
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
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
{{-- to store value via session --}}

{{-- <script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("setSession").value;
      sessionStorage.setItem("dept_code", x);
   
    var emp = @php echo json_encode($employee);  @endphp;
   
   @php  $sc = "SO";  @endphp
        document.getElementById("get_session").innerHTML = "<select class='select2 form-control' style='width:100%;' > @foreach($employee as $e) @if($e->dept_code == $sc) <option value='{{$e->emp_id}}'>{{$e->name}}</option> @endif @endforeach   </select>" ;
      
       
      
    }

    
  </script>  --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    var $selectState = $('#dept'),
		$selectDistrict = $('#staff'),
    $options = $selectDistrict.find('option');
    
$selectState.on('change', function() {
	$selectDistrict.html($options.filter('[data-state="'+this.value+'"]'));
}).trigger('change');
</script>
@endsection

{{-- @section('main-footer')
@parent
@endsection

@section('control-sidebar')
@parent
@endsection --}}
<!-- jquery for search bar purposes -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
<!-- <script>
    $(document).ready(function() {
        var employee = ["alex", "Daniel", "Tom", "Zerry"];
        $("#dept").select2({
            data: employee
        });
    });
</script>-->

<!-- staff search -->
<!-- <script>
    $(document).ready(function() {
        var employee = ["alex", "Daniel", "Tom", "Zerry"];
        $("#staff").select2({
            data: employee
        });
    });
</script>  -->

@endsection