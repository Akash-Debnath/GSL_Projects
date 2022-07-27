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
                <h1>Leave List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Leave</a></li>
                    <li class="breadcrumb-item"><a href="#">Leave-list</a></li>
                    <li class="breadcrumb-item active">Leave </li>
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
<div class="container-fluid">
    <div class="row">
        <!-- leave request by year table -->
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header ">
                    <form action="{{route('emp.leave')}}" class="" method="post">
                        @csrf
                        
                            <div class="row ">
                                <div class="col-md-3 ">

                                    <select id="year" class="form-control" name="year">
                                        <option value="" selected hidden> Leave In </option>
                                        <?php $from=date('2009-01-01'); $to=date('Y-m-d'); $startTime=strtotime( $from );
                                        $endTime=strtotime( $to ); 
                                        
                                        
                                        for($i = $startTime; $i <= $endTime; $i = $i + (86400*366)){
                                            $thisDate = date('Y',$i);?>
                                          <option> <?php echo $thisDate; ?> </option>
                                           <?php 
                                            }
                                            ?>
                                         



                                    </select>

                                </div>

                                <div class="col-md-4 mt-md-0 mt-2">
                                    
                                 <form action="{{route('emp.list')}}" method="get">
                                    @csrf
                                    <select  class="form-control select2" name="dept" style="width: 100%;" onchange="this.form.submit()" >
                                        <option value="" selected hidden> --Department-- </option>
                                        @foreach($dept as $d)
                                        
                                        <option  value="{{$d->dept_code}}">{{ $d->dept_name}}  </option>
                                           
                                        @endforeach

                                    </select>
                                  
                                </form>
                                 
                                 
                                
                                
                                </div>

                                <div class="col-md-3 mt-md-0 mt-2">
                                 
                                    <select name="emp"  class="form-control select2" style="width: 100%;" id="emp" >
                                        <option value="" selected hidden> --Staff-- </option>
                                        {{-- @foreach($dept as $d)

                                          @foreach($d->employee as $e)
                                           
                                          <option value="{{$e->emp_id}}">{{$e->emp_id}}&nbsp; - &nbsp; {{$e->name}}</option>
                                        
                                          @endforeach
                                         
                                       @endforeach --}}

                                       @foreach($employee as $e)
                                       <option value="{{$e->emp_id}}">{{$e->emp_id}}&nbsp; - &nbsp; {{$e->name}}</option>
                                       @endforeach

                                    </select>
                               
                                </div>
                                <div class="col-md-2 mt-md-0 mt-2">

                                    <button class="btn btn-info form-control"> <span class="fas fa-search"></span> Search</button>
                                </div>
                            </div>
                        
                    </form>
                </div>
                <div class="card-body">
                    <table class="table  table-bordered table-responsive-sm selectpicker" data-live-search="true">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">SL</th>
                                <th rowspan="2"class="text-center" style="vertical-align: middle;">Leave Type</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Day(s)</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Leave Date</th>
                                <th colspan="2" class="text-center">Approval</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Action</th>
                            </tr>
                            <tr>
                              <th class="text-center">Manager</th>
                              <th class="text-center" >Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @foreach($leave as $l)
                            @foreach($option as $o)
                            @if($o->option_code==$l->leave_type)
                            <tr>
                                <td>1</td>
                                
                                <td> {{$o->option_value}}</td>
                                 
                                <td class="text-center">{{$l->period}}</td>
                                <td class="text-center"><i>{{$l->leave_start}}</i> to <i>{{$l->leave_end}}</i> </td>
                                <td class="text-center">@if($l->m_approved_date==NULL)<a class="text-danger" href=""> Approval Pending</a>@else <a href="" class="text-info"> Approved</a> @endif</td>
                                <td class="text-center">@if($l->admin_approve_date==NULL)<a href="" class="text-danger"> Verification Pending</a>@else <a  href="" class="text-info"> Verified for record</a> @endif</td>
                                <td class="d-flex justify-content-center"> 
                                     @if($l->emp_id!=Auth::user()->employeeInfo->emp_id) 
                                     <a class="btn btn-info btn-sm" href={{ "view-leave/". $l->emp_id."/".$l->id."/".$l->leave_start}}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                      </svg></a> 
                                      @elseif(($l->m_approved_date)==NULL && ($l->admin_approve_date==NULL)) 
                                      {{-- edit --}}
                                     <a href={{ "edit-leave/". $l->emp_id."/".$l->id."/".$l->leave_start}} class="btn btn-info btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg></a> 
                                      {{-- delete --}}
                                      {{-- {{ "delete-leave/". $l->id."/".$l->leave_start}}deleteLeave --}}
                                    <a href={{ "delete-leave/". $l->id}} class="btn btn-danger btn-sm ml-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                      </svg></a> 
                                    @else
                                    {{-- cancel --}}
                                    <a class="btn btn-danger btn-sm" href={{ "view-leave/". $l->emp_id."/".$l->id."/".$l->leave_start}}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                      </svg></a> 
                                    @endif
                                </td>

                            </tr>
                            @endif
                            @endforeach
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--leave request part  -->
        <div class="col-xl-4  ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header gap-card-header">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 bg-info">
                                            <p class="mb-0">


                                                Leave Request
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <p class="mb-0 text-justify">


                                                I hereby declare that I'm aware and agree to the terms and conditions of related leave policies.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- button -->
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <a class="btn btn-info btn-sm" href='/leave-req'>Send Leave Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body gap-card-header">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 bg-info">
                                            <p class="mb-0 ">
                                                Leave Taken in {{$year}}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Table -->
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Leave</th>
                                                        <th>total</th>
                                                        <th>taken</th>
                                                        <th style="width: 40px">Available</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                
                                                    @foreach($option as $o)
                                                   
                                                   @if($o->option_code!='PL'&& $o->option_code!='ML' && $o->option_code!='WL')


                                                    
                                                    <tr>
                                                        <td>{{$o->option_value}}</td>

                                                       
                                                        
                                                       
                                                        <td>{{$o->leave_m}}</td>
                                                       
                                                       
                                                       
                                                        @if($o->option_code=='HL')
                                                      
                                                        <td rowspan="2" style="vertical-align : middle;text-align:center;">
                                                            @php $total = array(); @endphp
                                                          @foreach($leave as $l)
                                                           
                                                            @if(($l->leave_type==$o->option_code) || $l->leave_type=="AL")
                                                            {{-- <p class="mb-0">{{$l->period}}</p> --}}
                                                            @php array_push($total,$l->period);@endphp
                                                            @endif
                                                           
                                                          @endforeach
                                                         <p class="mb-0"> @php print_r(array_sum($total)); @endphp</p>
                                                        
                                                        
                                                        </td>
                                                        <td rowspan="2" style="vertical-align : middle;text-align:center;">@php print_r(abs($o->leave_m)-array_sum($total)); @endphp</td>
                                                        
                                                        @elseif($o->option_code=='AL')
                                                        
                                                        
                                                        @else
                                                        <td class="text-center">@php $total = array(); @endphp
                                                            @foreach($leave as $l)
                                                             
                                                              @if(($l->leave_type==$o->option_code) )
                                                              {{-- <p class="mb-0">{{$l->period}}</p> --}}
                                                              @php array_push($total,$l->period);@endphp
                                                              @endif
                                                             
                                                            @endforeach @php print_r(array_sum($total)); @endphp</td>
                                                        <td class="text-center">@php print_r(($o->leave_m)-array_sum($total)); @endphp</td>
                                                        @endif
                                                      
                                                    </tr>





                                                   @endif
                                                    @endforeach
                                                   

                                                    <tr>
                                                        <td colspan="4">Leave in Genuity Life</td>
                                                    </tr>
                                                   
                                                   
                                                    @foreach($genuity_leaves as $gl)
                                                   
                                                    <tr>
                                                        <td>{{$gl->option_value}}</td>
                                                        <td>{{$gl->leave_m}}</td>
                                                        <td class="text-center">@php $total = array(); @endphp
                                                            @foreach($leave as $l)
                                                             
                                                              @if(($l->leave_type==$gl->option_code) )
                                                              {{-- <p class="mb-0">{{$l->period}}</p> --}}
                                                              @php array_push($total,$gl->period);@endphp
                                                              @endif
                                                             
                                                            @endforeach @php print_r(array_sum($total)); @endphp</td>
                                                        <td class="text-center">@php print_r(abs($gl->leave_m)-array_sum($total)); @endphp</td>
                                                    </tr>
                                                    
                                                    @endforeach
                                                   

                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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