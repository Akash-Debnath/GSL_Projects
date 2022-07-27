@extends('index')
@section('title', ' Office Schedule')
@section('wrapper')
@parent


@section('content-wrapper')
@parent
@section('content-header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Office Schedule</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Attendance </a></li>
                    <li class="breadcrumb-item"><a href="#">Office_schedule</a></li>
                    <li class="breadcrumb-item active">Office Schedule</li>
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
            <div class="card-header ">
                <form action="{{ url('office-schedule') }}" method="POST">
                    @csrf
                    <div class="container-fluid">
                        <div class="row gap-5">


                            <div class="col-md-3 mt-md-0 mt-2 ">
                                <label for="dept">Department</label>
                                <select id='dept' class="form-control">
                                    <option value="" selected hidden> --Department-- </option>
                                    @foreach ($employeeDept as $dept)
                                        <option data-state="{{ $dept->dept_code }}" value="{{ $dept->dept_code }}">{{ $dept->dept_name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-3 mt-md-0 mt-2 ml-auto">
                                <label for="staff">Staff</label>
                                <select id="staff" name="emp_id" class="form-control">
                                    <option value="{{ Auth::user()->username }}" selected>{{ Auth::user()->username }} - {{ Auth::user()->employeeInfo->name }} </option>
                                    @foreach ($staffs as $staff)
                                        <option data-state="{{ $staff->dept_code }}" value="{{ $staff->emp_id }}">{{ $staff->emp_id }} - {{ $staff->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @php
                                $sdate = date('Y-m-01');
                                $edate = date('Y-m-t');
                            @endphp

                            <div class="col-md-2 mt-md-0 mt-2 ml-auto">
                                <label for="from">From (mm/dd/yyyy)</label>
                                <input type="date" name="sdate" id="from" value="{{ $sdate }}" class="form-control">
                            </div>

                            <div class="col-md-2 mt-md-0 mt-2 ml-auto">
                                <label for="to">To (mm/dd/yyyy)</label>
                                <input type="date" name="edate" value="{{ $edate }}" id="to" class="form-control">
                            </div>

                            <div class="col-md-1 mt-md-0 mt-2 ml-auto ">
                                <label for="search"></label>
                                <button type="submit" class="btn btn-info form-control"> <span class="fas fa-search"></span> Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body  overflow-auto">
                <table class="table table-bordered table-hover ">
                    <thead>

                        <tr>
                            <th>Date</th>
                            <th>Day</th>
                            <th>From</th>
                            <th>To</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // $id = $emp->emp_id;
                            $weekends = array("sat"=>"Saturday", "sun"=>"Sunday", "mon"=>"Monday", "tue"=>"Tuesday", "wed"=>"Wednesday", "thu"=>"Thursday", "fri"=>"Friday");
                        @endphp
                        @php
                            if( $startdate > $enddate ) {
                            $temp  = $startdate;
                            $startdate = $enddate;
                            $enddate = $temp;
                        }
                        @endphp

                        
                        
                        @for ($cdate = $startdate; $cdate <= $enddate; $cdate += (86400))
                            @foreach ($staffs as $staff)
                                @if(($staff->emp_id==$employee) && ($staff->roster == "N"))
                                    {{-- @foreach ($weekleaves as $wl)
                                    @foreach ($weekends as $key=>$value) --}}

                                    <tr>
                                        @php
                                            $sdate = date('Y-m-d', $cdate);
                                        @endphp
                                        <td> {{ $sdate }}</td>
                                        <td>{{ $d = date('l', $cdate); }}</td>
                                        {{-- <td colspan="2" style="vertical-align:middle;text-align:center; color:rgb(14, 116, 14)"> --}}
                                    
                                            {{-- @if(!empty($employee))
                                                <td colspan="2" style="vertical-align:middle;text-align:center; color:rgb(14, 116, 14)">
                                                    @foreach ($holidays as $hd)
                                                        @if($hd->date==$sdate)
                                                            {{ $hd->description }}
                                                        @endif 
                                                    @endforeach
                                                </td> --}}

                                            @if ($d == "Friday" || $d == "Saturday") 
                                                <td colspan="2" style="vertical-align:middle;text-align:center; color:rgb(14, 116, 14)">
                                                    Weekend
                                                    @foreach ($holidays as $hd)
                                                        @if($hd->date==$sdate)
                                                            & {{ $hd->description }}
                                                        @endif 
                                                    @endforeach
                                                </td>
                                            {{-- @if($d == "Friday" || $d == "Saturday")
                                                <td colspan="2" style="vertical-align:middle;text-align:center; color:rgb(14, 116, 14)">
                                                    @foreach ($holidays as $hd)
                                                        @if($hd->date==$sdate)
                                                            {{ $hd->description }}
                                                        @endif 
                                                    @endforeach
                                                </td> --}}

                                            @else
                                                <td>
                                                    @foreach ($nonRosters as $nr)
                                                        @php
                                                        $date1 = $nr->stime;
                                                        $time = date("H:i:s",strtotime($date1));
                                                        $datetime = date("Y-m-d",strtotime($date1));
                                                        @endphp 
                                                    @endforeach
                                                    {{ $time }}
                                                </td>
                                                <td>                                                            
                                                    @foreach ($nonRosters as $nr)
                                                        @php
                                                        $date1 = $nr->etime;
                                                        $time = date("g:i:s",strtotime($date1));
                                                        $datetime = date("Y-m-d",strtotime($date1));
                                                        @endphp 
                                                    @endforeach
                                                    {{ $time }}
                                                </td>
                                            @endif

                                        {{-- @if($d == "Friday" || $d == "Saturday")
                                        <td colspan="2" style="vertical-align : middle;text-align:center; color:rgb(14, 116, 14)">Weekend</td>
                                        @else 
                                        <td>09:00:00 am</td>
                                        <td>06:00:00 pm</td>
                                        @endif --}}
                                    </tr>
                                    {{-- @endforeach
                                    @endforeach --}}


                                @elseif (($staff->emp_id==$employee) && ($staff->roster == "Y"))
                                    <tr>
                                        @php
                                            $sdate = date('Y-m-d', $cdate);
                                        @endphp
                                        <td> {{ $sdate }}</td>
                                        <td>{{ $d = date('l', $cdate); }}</td>
                                        {{-- <td colspan="2" style="vertical-align:middle;text-align:center; color:rgb(14, 116, 14)"> --}}
                                            @foreach ($weekends as $wd)
                                             @php 
                                             $dnn=$wd->date;
                                             print_r($dnn);exit; @endphp
                                                @if ($wd->date==$sdate)
                                                    <td colspan="2" style="vertical-align:middle;text-align:center; color:rgb(14, 116, 14)">
                                                        Weekend
                                                    </td>    
                                                @else
                                                    <td>
                                                        @foreach ($nonRosters as $nr)
                                                            @php
                                                                $date1 = $nr->stime;
                                                                $time = date("H:i:s",strtotime($date1));
                                                                $datetime = date("Y-m-d",strtotime($date1));
                                                            @endphp 
                                                        @endforeach
                                                        {{ $time }}
                                                    </td>
                                                    <td>                                                            
                                                        @foreach ($nonRosters as $nr)
                                                            @php
                                                                $date1 = $nr->etime;
                                                                $time = date("g:i:s",strtotime($date1));
                                                                $datetime = date("Y-m-d",strtotime($date1));
                                                            @endphp 
                                                        @endforeach
                                                        {{ $time }}
                                                    </td>
                                                @endif
                                            @endforeach

                                        {{-- @if($d == "Friday" || $d == "Saturday")
                                        <td colspan="2" style="vertical-align : middle;text-align:center; color:rgb(14, 116, 14)">Weekend</td>
                                        @else 
                                        <td>09:00:00 am</td>
                                        <td>06:00:00 pm</td>
                                        @endif --}}
                                    </tr>
                                @endif
                            @endforeach
                        @endfor
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <!-- /.card -->

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    var $selectDepartment = $('#dept'),
		$selectEmployee = $('#all_staff'),
        $options = $selectEmployee.find('option');
    
$selectDepartment.on('change', function() {
	$selectEmployee.html($options.filter('[data-state="'+this.value+'"]'));
}).trigger('change');
</script>

@endsection

@endsection