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
                <h4>Employee List</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Employee</a></li>
                    <li class="breadcrumb-item"><a href="#">All</a></li>
                    <li class="breadcrumb-item active">Employee List </li>
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
    <div class="col-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <!-- searchbox via select -->
                    <div class="col-md-3">

                        <form action="">
                            <select id="dept" class="select2 form-control " style="width: 100%;" data-placeholder="Select Department">
                                <option value="" selected > Search by department </option>
                                @foreach($dept as $d)
                              
                                <option data-state="{{$d->dept_code}}" value="{{$d->dept_code}}">{{$d->dept_name}}</option>
                               
                                @endforeach
                            </select>
                        </form>

                    </div>

                    <div class="col-md-3">
                        <select id="emp" class="select2 form-control " style="width: 100%;" data-placeholder="Select Department">
                            <option value="" selected > Search by Staff or Id </option>
                            @foreach($employee as $e)
                          
                            <option  value="{{$e->emp_id}}">{{$e->name}}</option>
                           
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <table class="table table-hover table-bordered table-responsive-sm selectpicker" data-live-search="true"  >

                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Office Time</th>
                            <th>In Time</th>
                        </tr>
                    </thead>
                   <tbody id="staff">
                    @php $found=false; $i=1;@endphp
                    @foreach($employee as $e)
                    @php $stime=array(); @endphp
                    @foreach($e->iorecord as $r)
                    @if($e->emp_id == $r->emp_id && $r->date==date('Y-m-d',strtotime("2014-12-19")))
                    <tr  data-state="{{$e->Department->dept_code}}" >
                        <td >{{$i}}</td>
                        <td >{{$e->emp_id}}</td>
                        <td >{{$e->name}}</td>
                        <td >{{$e->Department->dept_name}}</td>
                        <td>{{$e->userDesignation->designation}}</td>
                        <td > @php $rstr = false; @endphp @foreach($roster as $rst) @if(($rst->emp_id == $e->emp_id )&& (date('Y-m-d',strtotime($rst->stime))==date('Y-m-d',strtotime("2014-12-19")))) @php $rstr = true; @endphp {{date('h:i:s',strtotime($rst->stime))}}  @php break; @endphp @endif  @endforeach @if($rstr==false) 09:00:00 @endif</td>

                        @php array_push($stime,strtotime($r->stime)) @endphp
                        
                        <td> @php $rstr = false; @endphp @foreach($roster as $rst) @if(($rst->emp_id == $e->emp_id )&& (date('Y-m-d',strtotime($rst->stime))==date('Y-m-d',strtotime("2014-12-19")))) @php $rstr = true; @endphp  @if(strtotime(date('H:i:s',strtotime($rst->stime))) < min($stime) ) <span class='text-danger'> {{date('h:i:s',min($stime))}} </span> @else <span class='text-info'> {{date('h:i:s',min($stime))}} </span> @endif @php break; @endphp @endif  @endforeach @if($rstr == false) @if(min($stime)>strtotime("09:15:00")) <span class='text-danger'> {{date('h:i:s',min($stime))}} </span> @else <span class='text-info'> {{date('h:i:s',min($stime))}} </span> @endif @endif</td>
                    </tr>
                    

                    @php $i=$i+1; break;  @endphp
                    @endif
                    @endforeach
                    @endforeach
                   </tbody>
                </table>
            </div>
            <div class="card-footer overflow-auto ">
               
            </div>
        </div>
        
    </div>

</div>
</div>

@endsection
@endsection
@endsection
@endsection



{{-- @section('main-footer')
@parent
@endsection

@section('control-sidebar')
@parent
@endsection --}}

@section('script')
@parent
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    var $selectState = $('#dept'),
		$selectDistrict = $('#staff'),
    $options = $selectDistrict.find('tr');
    
$selectState.on('change', function() {
	$selectDistrict.html($options.filter('[data-state="'+this.value+'"]'));
}).trigger('change');
</script>

{{-- subs --}}

    
@endsection
@endsection