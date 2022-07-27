@extends('index')
@section('title', 'Roster ')
@section('wrapper')
@parent

@section('content-wrapper')
@parent
@section('content-header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Roster Settings</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"> Remark</a></li>
                    <li class="breadcrumb-item"><a href="#">Attach </a></li>
                    <li class="breadcrumb-item active">Roster Settings</li>
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
    <!-- leave request by year table -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">

                {{-- main form --}}
                <form action="{{ url('set-roster') }}" method="POST" id="searchForm">
                    @csrf
                    <div class="col-12">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="dept_code" id="deptt" style="width: 100%;" onchange="this.form.submit()">
                                        <option selected hidden>--Department--</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->dept_code }}">{{$department->dept_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="r_type">Roster Type</label>
                                    <select class="form-control" name="roster" id="r_type" style="width: 100%;" onchange="this.form.submit()">
                                        <option selected hidden>--Select--</option>
                                        <option value="Y">Roster</option>
                                        <option value="N">Non-roster</option>
                                    </select>
                                </div>
                            </div>

                            @php
                            $sdate = date('Y-m-d');
                            $edate = date('Y-m-t');
                            @endphp

                            {{-- date form started --}}
                            {{-- <form action="" method="GET"> --}}
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from">From</label>
                                        <input class="form-control" type="date" value="{{ $sdate }}" name="from" id="from">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from">To</label>
                                        <input class="form-control" type="date" value="{{ $edate }}" name="to" id="to">
                                    </div>
                                </div>
                                
                                    <div class="col-md-12 d-flex align-items-end ">
                                      
                                        <button type="submit" value="submit" name="submit" class="btn btn-sm btn-info ml-auto">Show</button>
                                        
                                    </div>
                               
                </form> 
    
                        <div class="col-12 ">
                            <label>Select Staff</label><span> *</span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="select2 select2-info" id="staff" multiple="multiple"
                                    data-placeholder="Select Staff" style="width: 100%;">
                                    @foreach ($employees as $employee)
                                        <option value="{{$employee->emp_id}}">{{$employee->emp_id}} - {{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>

                        <div class="col-md-6">

                            {{-- <button class="btn btn-info btn-sm form-control" type="button"
                                onclick="numDays()">show</button> --}}
                            <!-- /.form-group -->
                            {{-- <div class="row d-flex justify-content-end">
                                <div class="col-md-4">
                                    <input class="btn btn-info form-control" type="submit" value="submit"
                                        name="submit">
                                </div>
                            </div> --}}

                        </div>

                            {{-- </form> --}}
                            {{-- date form finish --}}
                        </div>
                    </div>
                {{-- main form finish --}}

            </div>
            <div class="card-body">
                    @php  
                        $from=$startdate; $to=$enddate; $startTime=strtotime( $from ); $endTime=strtotime( $to ); 
                    @endphp
                        @if(($dept=="SY" && $roster=="Y") || ($dept=="CU" && $roster=="Y") || ($dept=="TE" && $roster=="Y") || ($dept=="CA" && $roster=="Y") || ($dept=="TR" && $roster=="Y"))
                            <div class="row">
                                <div class="col-12  overflow-auto ">
                                    <table class="table table-hover table-bordered  selectpicker " data-live-search="true">
                                        <thead>
                                            <tr>
                                                @foreach ($rosterSlot as $slot)
                                                <th>{{ $slot->from. " to " .$slot->to }}</th>
                                                @endforeach
                                                <th>Holiday</th>
                                                <th>Weekend</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ( $i = $from; $i <= $to; $i = $i + 86400 ) { 
                                            // $thisDate = date( 'Y-m-d', $i );
                                            $thisDate = date('d F, Y(l)',$i);
                                            ?>
                                            <tr>
                                                <td colspan="5"> <i>
                                                        <?php echo $thisDate; ?>
                                                    </i></td>
                                            </tr>
                                            <tr>
                                                @foreach ($rosterSlot as $slot)
                                                <td>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card ">
                                                                    <div class="card-header d-flex justify-content-between">
                                                                        <a href="">
                                                                            <p class="mb-0 " data-toggle="tooltip"
                                                                                title="<?php $str = 'Md. Ashrafuzzaman'; echo $str; ?>">
                                                                                <?php  
                                                                                // if (strlen($str) > 10)
                                                                                // $str = substr($str, 0,7) . '...';
                                                                            
                                                                                echo $str;
                                                                            ?>
                                                                            </p>
                                                                        </a>
                                                                        <button type="button" class="btn btn-tool ml-auto"
                                                                            data-card-widget="remove">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                
                                                                    </div>
                                                                    <!-- /.card-header -->
                
                                                                    <!-- /.card-body -->
                                                                </div>
                                                            </div>
                                                        </div>
                
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="" class="form-group"> 

                                                                    <select class="form-control select2" style="width: 100%;">
                                                                            <option selected="selected">Select Employee</option>
                                                                        @foreach ($employees as $emp)
                                                                            <option value="{{ $emp->emp_id }}">{{ $emp->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <button type="submit" class="btn btn-info btn-sm form-control">Add</button>
                
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endforeach
                                                <td>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card ">
                                                                    <div class="card-header d-flex justify-content-between">
                                                                        <a href="">
                                                                            <p class="mb-0 " data-toggle="tooltip"
                                                                                title="<?php $str = 'Md. Ashrafuzzaman'; echo $str; ?>">
                                                                                <?php  
                                                                                echo $str;
                                                                                ?>
                                                                            </p>
                                                                        </a>
                                                                        <button type="button" class="btn btn-tool ml-auto"
                                                                            data-card-widget="remove">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                
                                                                    </div>
                                                                    <!-- /.card-header -->
                
                                                                    <!-- /.card-body -->
                                                                </div>
                                                            </div>
                                                        </div>
                
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="" class="form-group"> 

                                                                    <select class="form-control select2" style="width: 100%;">
                                                                            <option selected="selected">Select Employee</option>
                                                                        @foreach ($employees as $emp)
                                                                            <option value="{{ $emp->emp_id }}">{{ $emp->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <button type="submit" class="btn btn-info btn-sm form-control">Add</button>
                
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <?php 
                                            }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            {{-- breadcumb to set roster slot for all --}}

                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card   ">
                                        <div class="card-header">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#same-time"
                                                        data-toggle="tab">Same Time for All day</a>
                                                </li>

                                                <li class="nav-item"><a class="nav-link" href="#diff-time"
                                                        data-toggle="tab">Custom Time for Different Day</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="active tab-pane" id="same-time">
                                                    <form action="{{ url('roster-set-same-time') }}" method="POST" enctype="multipart/form-data" id="sameT">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <input type="hidden" name="type" value="same">
                                                                    <input type="hidden" name="sdate" value="{{ $startdate }}">
                                                                    <input type="hidden" name="edate" value="{{ $enddate }}">
                                                                    <input type="hidden" name="dept_code" value="{{ $dept }}">
                                                                    <input type="hidden" name="emp_ids" id="staffIds">
                                                                    <div class="col-12">
                                                                        <label for="stime">Office Start Time</label>
                                                                        <input type="time" value="09:00:00" name="stime" id="stime"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="col-12 mt-3">
                                                                        <label for="etime">Office End Time</label>
                                                                        <input type="time" value="18:00:00" name="etime" id="etime"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @php
                                                                $day_array = array("sun"=>"Sunday","mon"=>"Monday","tue"=>"Tuesday","wed"=>"Wednesday","thu"=>"Thursday","fri"=>"Friday", "sat"=>"Saturday");
                                                                $counter = 0;
                                                            @endphp

                                                            <div class="col-md-6 ">
                                                                <h6 class=" text-center"><strong>Select Weekend Day(s)</strong></h6>
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col-md-5">
                                                                        <div class="row" id="listWeekends">
                                                                            @foreach ($day_array as $key=>$value)
                                                                                <div class="col-12">
                                                                                    <input type="checkbox" name="weekend[]" value="{{$value}}"  onclick="moreWeekend(event)" data-id="{{$key}}">
                                                                                    <label for="{{$key}}">{{$value}}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <button class="btn btn-sm btn-info">Set Roster</button>
                                                        </div>
                                                    </form>
                                                </div>

                                                {{-- Weekend limit Modal --}}

                                                <div class="modal fade" id="requestModal" role="dialog"
                                                    aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form id="requestModalForm" class='form-horizontal' action="{{ url('set-roster-more-weekend') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="type" value="same">
                                                                <input type="hidden" name="sdate" value="{{ $startdate }}">
                                                                <input type="hidden" name="edate" value="{{ $enddate }}">
                                                                <input type="hidden" name="dept_code" value="{{ $dept }}">
                                                                <input type="hidden" name="emp_ids" id="staffIdsWeekend">
                                                                <input type="hidden" id="from_time" name="stime" value="09:00:00">
                                                                <input type="hidden" id="to_time" name="etime" value="18:00:00">

                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-hidden="true">&times;</button>
                                                                    <h5 class="modal-title">Send Request</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>To select more than two weekends in a week slot, send a request
                                                                        to admin selecting those weekends. Otherwise Cancel it.</p>
                                                                    <div class='col-xs-12'>
                                                                        <div class="form-group" id="modalSelect">
                                                                            <div class="row">
                                                                                @foreach ($day_array as $key=>$value)
                                                                                    <div class="col-12">
                                                                                        <input type="checkbox" name="weekend[]" value="{{$value}}" >
                                                                                        <label for="{{$key}}">{{$value}}</label>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class='col-xs-12'>
                                                                        <div class="form-group">
                                                                            <label>Reason</label>
                                                                            <textarea id ="reason" name="reason" placeholder="Enter ..." rows="2" class="form-control"></textarea>
                                                                        </div>
                                                                    </div>


                                                                    <div class='clearfix'></div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-warning" id="sendRequest">Send	Request</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Weekend limit modal --}}

                                                <div class="tab-pane overflow-auto" id="diff-time">
                                                    <form action="{{ url('roster-set-custom-time') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf

                                                        <input type="hidden" name="emp_ids" id="staffIdCustom">
                                                        <table class="table table-hover table-bordered  selectpicker"
                                                            data-live-search="true">
                                                            <thead>
                                                                <th>Weekend</th>
                                                                <th>Date</th>
                                                                <th>Day</th>
                                                                <th>From</th>
                                                                <th>To</th>
                                                            </thead>
                                                            <tbody>
                                                                <input type="hidden" name="type" value="custom">
                                                                <input type="hidden" name="sdate" value="{{ $startdate }}">
                                                                <input type="hidden" name="edate" value="{{ $enddate }}">
                                                                <input type="hidden" name="dept_code" value="{{ $dept }}">
                                                                @for ( $i = $from; $i <= $to; $i = $i + 86400 )
                                                                    @php
                                                                        $thisDate = date( 'Y-m-d', $i );
                                                                        $day = date('l', $i);
                                                                    @endphp
                                                                    <tr>                                                                         
                                                                        <td style="vertical-align : middle;text-align:center;"> 
                                                                            <input type="checkbox"  id="checkBtn"> 
                                                                        </td>
                                                                        <td> {{ $thisDate }}</td>
                                                                        <td> {{ $day }}</td>
                                                                        <div id="customTime" class="d-none">
                                                                            <td> <input type="time" name="stime[]" value="09:00:00" class="form-control"> </td>
                                                                            <td> <input type="time" name="etime[]" value="18:00:00"  class="form-control"> </td>
                                                                        </div>

                                                                        {{-- <div id="weekendData" class="d-none">
                                                                            <td colspan="2" style="vertical-align:middle;text-align:center; color:rgb(14, 116, 14)">Weekend</td>
                                                                        </div> --}}
                                                                    </tr>
                                                                @endfor
                                                            </tbody>
                                                        </table>
                                                        <div class="ml-auto">
                                                            <button type="submit" class="btn btn-sm btn-info">Set Roster</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.tab-pane -->
                                            </div>
                                        </div>
                                        {{-- //card-body --}}
                                        
                                    </div>
                                </div>
                            </div>
                        @endif
                    <!-- /.card-header -->


                    <!-- /.tab-content -->

            </div>
            <!-- /.card -->
            {{-- breadcumb finish --}}


            {{-- <div class="card-footer ml-auto">
                <button class="btn btn-sm btn-info">Set Roster</button>
            </div> --}}

        </div>
    </div>
    <!--leave request part  -->

</div>


@endsection
<!-- end editing-->
@endsection
@endsection
@endsection


@section('script')
@parent
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src=" {{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- Page specific script -->

<script>
    $(function () {

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        $('#staff').change(function(e) {
           $('#staffIds').val($(e.target).val());
        }); 


        $('#staff').change(function(e) {
        $('#staffIdCustom').val($(e.target).val());
        }); 


        $('#staff').change(function(e) {
        $('#staffIdsWeekend').val($(e.target).val());
        }); 

    })


    function moreWeekend(e){
        
        var form = $("#sameT");
        // alert($(this).attr("selectWeekend"));
        var checkboxes = $("input:checkbox", form);
        var x = checkboxes.filter(':checked').length;
        let currentCheckValue = e.target.value;
        $('#requestModalForm input[type=checkbox]').each(function(){
            if ( this.value == currentCheckValue){
                this.setAttribute("checked", "checked");
            }
        });
        if (x > 2){
            console.log(document.querySelector('#listWeekends'));
            $(e.target).prop("checked", false);
            $('#requestModal').modal('show');
        }
    }

    const editContact = document.querySelector('#checkBtn');
    const intialDivContact = document.querySelector('#customTime');
    const editableDivContact = document.querySelector('#weekendData');

    editableDivContact.style.display = 'none';
    editContact.addEventListener('click', () => {
        
        if(intialDivContact.style.display === 'none'){
            intialDivContact.style.display = 'block';
            editableDivContact.style.display = 'none';
        }else {
            intialDivContact.style.display = 'none';
            editableDivContact.style.display = 'block';
        }
    });
</script>



{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    var $selectDepartment = $('#dept'),
		$selectEmployee = $('#all_staff'),
        $options = $selectEmployee.find('option');
    
$selectDepartment.on('change', function() {
	$selectEmployee.html($options.filter('[data-state="'+this.value+'"]'));
}).trigger('change');
</script> --}}
@endsection

@endsection