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
                <h4>Leave Application</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                            </svg>Settings</a></li>
                    <li class="breadcrumb-item"><a href="#">Request</a></li>
                    <li class="breadcrumb-item active">Leave Application </li>
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


<div class="row ">
<div class="col-xl-11 mx-auto">
    <div class="card card-info card-outline">
        <div class="card-header d-flex justify-content-center">

            <div class="image d-flex flex-column gap-4">
                <img src="{{asset('images/genuity.gif')}}" alt="" style="height:50px; width:250px;" >
               
                <h4 class="mb-0 text-center">Leave Request Form</h4>
            </div>
        </div>

        <div class="card-body gap-card-header">
            @php $i=0; @endphp
            @foreach($employee as $e)
            
            @if($e->emp_id==$eid )
            <div class="row">
                <div class="col-md-8">
                 <p class="mb-0"> <strong>Employee Name:</strong> {{$e->name}}</p>
                 <p > <strong>Department:</strong> {{$e->Department->dept_name}}</p>
                </div>
                <div class="col-md-4">
                 <p class="mb-0"> <strong>Employee ID:</strong> {{$e->emp_id}}</p>
                 <p > <strong>Designation:</strong> {{$e->userDesignation->designation}}</p>
                </div>
            </div> 
            @php $i++; break;  @endphp
            @endif
            
            @endforeach
        </div>
    </div>
</div>

    <div class="col-xl-11 mx-auto">
        <div class="card card-info card-outline">
            
            <div class="card-body ">


                


{{-- form started --}}
                <div class="row  ">
                    {{-- leave request form --}}
                    <div class="col-md-7 card-body ">
                        <div class="row">
                            
                            <div class="col-12  bg-info text-center">
                               <h5 class="text-center text-color-info mb-0 py-2">Apply Here </h5>
                            </div>
                        </div>
                        <?php $url = Request::segment(1);  if(URL::current()!='*/leave-req'){}?>
                        @if(   Request::segment(1) === 'leave-req' )
                        {{--test  --}}
                      {{-- @foreach($status as $s)
                         @if($s->leave_start != Date('Y-m-d') ) --}}
                         
                       
                      
                       {{-- {{$s->leave_start}} --}}
                       
                       
                    <form action="{{url('send-leave-req')}}" class="form-group border-bottom py-3 " method="POST" >
                        @csrf
                        <div class="row">
                               
                            <div class="col-12">
                             
                                <label for="ltype">Leave Type:<?php echo Request::segment(1);  if(URL::current()!='*/leave-req'){}?></label>
                                
                                    {{-- <form method="get" class="code" action="{{route('type')}}">
                                        @csrf --}}
                                    <select name="leave_type" id="setSession" class="form-control select2" style="width: 100%;" onchange="myFunction()" >
                                        <option value="" selected hidden disabled>Select</option>
                                        @foreach($option as $o)
                                       
                                        <option value="{{$o->option_code}}" >{{$o->option_value}}</option>
                                        @endforeach
                                    </select>
                                  {{-- </form> --}}
                                  
                            </div>

                        </div>
                       {{-- start form based on leave type --}}
                       <div class="row" >
                        
                           
                           <div class="col-12">
                            <p id="get_session" class="mb-0 "></p>
                           </div>
                         
                        
                       </div>
                        {{-- end --}}
                        <div class="row ">
                            <div class="col-12">
                             <label for="address_leave">Address During Leave:</label>
                             <textarea name="address_d_l" id="" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-12">
                             <label for="leave_reason">Special Reason for Leave::</label>
                             <textarea name="special_leave" id="leave_reason" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-12">
                                <p class="mb-0">
                                    I declare that I shall rejoin for duty on expiry of the granted leave and will not apply for any extension except under unavoidable circumstances.
                                </p>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-around">
                            <div class="col-md-4 col-6">
                                <p class="mb-0 "><i>{{Auth::user()->employeeInfo->name}}</i></p>
                                
                                <p class="mb-0 "><b>Signature </b></p>
                                
                            </div>
                            <div class="col-4">
                                <p class="mb-0 "><i>{{date('y-m-d')}}</i></p>
                                <p class="mb-0 "><b>Date </b></p>
                            </div>
                        </div>

                        <div class="row my-5">
                            <div class="col-md-12  ">
                                <button class="btn btn-sm btn-info btn-block">Send Leave Request</button>
                            </div>
                        </div>
                    </form>
                        {{-- @php break; @endphp
                        @else --}}
                        
                    {{-- @endif
                    @endforeach  --}}
{{-- test --}}


                       {{-- @elseif($id!=Auth::user()->username ) --}}
                       @elseif(Request::segment(1) === 'view-leave'   )
                       @foreach($leave as $l)
                       {{-- ($l->admin_approve_date == NULL && $l->m_approved_date!=NULL)||(($l->admin_approve_date == NULL) && ($l->m_approved_date==NULL))||($l->admin_approve_date == NULL && $l->m_approved_date!=NULL) || --}}
                       @if(!empty($l->leave_start))
                       <div class="row mt-4">
                         <div class="col-4">
                            <label for="ltype">Leave Type  </label>
                         </div>
                         <div class="col-8">
                            <p class="mb-0">:&nbsp;&nbsp;@foreach($option as $o)@if($l->leave_type==$o->option_code) {{$o->option_value}} @endif @endforeach</p>
                         </div>
                       </div>


                       <div class="row mt-2">
                        <div class="col-4">
                           <label for="ltype">from</label>
                        </div>
                        <div class="col-8">
                           <p class="mb-0">:&nbsp;&nbsp;{{$l->leave_start}} @php $ls =$l->leave_start;   @endphp</p>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-4">
                           <label for="ltype">To</label>
                        </div>
                        <div class="col-8">
                           <p class="mb-0">:&nbsp;&nbsp;{{$l->leave_end}}</p>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-4">
                           <label for="ltype">Period</label>
                        </div>
                        <div class="col-8">
                           <p class="mb-0">:&nbsp;&nbsp;{{$l->period}}&nbsp;Day('s)</p>
                        </div>
                      </div>

                      <div class="row mt-2 border-top border-bottom py-3">
                        <div class="col-4">
                           <label for="ltype">Attaced Files</label>
                        </div>
                        <div class="col-8">
                           <p class="mb-0">:&nbsp;&nbsp;abc</p>
                        </div>
                      </div>

                     

                      <div class="row mt-3">
                        <div class="col-12">
                         <label for="address_leave">Address During Leave:</label>
                         <textarea name="address_d_l" id="" cols="30" rows="2" class="form-control" readonly>{{$l->address_d_l}}</textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                         <label for="leave_reason">Special Reason for Leave::</label>
                         <textarea name="special_leave" id="leave_reason" cols="30" rows="2" class="form-control" readonly>{{$l->special_reason}}</textarea>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-12">
                            <p class="mb-0">
                                I declare that I shall rejoin for duty on expiry of the granted leave and will not apply for any extension except under unavoidable circumstances.
                            </p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around">
                        @foreach($l->employee as $e )
                        <div class="col-md-4 col-6">
                            <p class="mb-0 "><i>{{$e->name}}</i></p>
                            
                            <p class="mb-0 "><b>Signature </b></p>
                            
                        </div>
                        <div class="col-4">
                            {{-- date may be changed later as dataset date values are absent somewhere --}}
                            <p class="mb-0 "><i>{{$l->leave_start}}</i></p> 
                            <p class="mb-0 "><b>Date </b></p>
                        </div>
                        @endforeach
                    </div>
                    {{-- @elseif(($l->admin_approve_date == NULL) && ($l->m_approved_date==NULL))
                     --}}
                      @endif
                      {{-- end  --}}
                      @endforeach

{{-- edit  --}}
                      @elseif(Request::segment(1) === 'edit-leave')

                      @foreach($leave as $l)
                      {{-- ($l->admin_approve_date == NULL && $l->m_approved_date!=NULL)||(($l->admin_approve_date == NULL) && ($l->m_approved_date==NULL))||($l->admin_approve_date == NULL && $l->m_approved_date!=NULL) || --}}
                      @if(!empty($l->leave_start))
                      <form action="{{route('update_req',$id )}}" class="form-group border-bottom py-3 " method="POST" >
                        @csrf
                        <div class="row">
                               
                            <div class="col-12">
                               
                                <label for="u_leave_type">Leave Type: {{$eid}}</label>
                                
                                    {{-- <form method="get" class="code" action="{{route('type')}}">
                                        @csrf --}}
                                    <select name="u_leave_type" id="setSession" class="form-control select2" style="width: 100%;" onchange="myFunction()" >
                                        {{-- <option value="{{$l->leave_type}}" selected >{{$l->leave_type}}</option> --}}
                                        @foreach($option as $o)
                                       
                                        <option value="{{$o->option_code}}" @if($l->leave_type==$o->option_code) selected @php $l_store = $l->leave_type; $l_start =$l->leave_start; $l_end =$l->leave_end; $slot = $l->time_slot; @endphp @endif >{{$o->option_value}} </option>
                                        @endforeach
                                    </select>
                                  {{-- </form> --}}
                                  
                                  
                            </div>

                        </div>

                        

                        {{-- @if($l_store =='AL')
                         <div class="row">
                            <div class="col-12">
                                <label for="ufrom" >From</label>
                                <input type="text" id="u_from" class="form-control" value="{{$l->leave_start}}">
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-12">
                                <label for="uto" >To</label>
                                <input type="text" id="u_to" class="form-control" value="{{$l->leave_end}}">
                            </div>
                         </div>
                         @endif --}}
                       
                       {{-- start form based on leave type --}}
                       <div class="row" >
                        
                           
                           <div class="col-12">
                            <p id="get_session" class="mb-0   ">
                              
                              @if($l_store != 'HL')
                                <label for="from" class="">From</label>
                                <input type="date" name="from" value="{{$l_start}}" id="from" class="form-control">
                                <label for="to" class="mt-3">To</label>
                                <input type="date" name="to" id="from" value="{{$l_end}}" class="form-control">
                               @endif 
                               @if($l_store == 'SL'|| $l_store=='SLM')
                               <input type="file" name="file" id="" class="form_control">
                               @endif

                               @if($l_store == 'HL')
                               <label for="date" class="">Date</label>
                               <input type="date" name="date" id="date" value="{{$l->leave_date}}" class="form-control">
                               <label for="slot" class="mt-3">Time Slot</label>
                               <select name="time_slot" id="slot" class="form-control">
                                <option value="FH" @if($l->time_slot=='FH') selected @endif>First Half</option>
                                <option value="SH" @if($l->time_slot=='SH') selected @endif>Second Half</option>
                               </select>
                               @endif
                            </p>
                        </div>
                         
                        
                       </div>
                      
                        {{-- end --}}
                        <div class="row ">
                            <div class="col-12">
                             <label for="address_leave">Address During Leave:</label>
                             <textarea name="address_d_l" id="address_leave" cols="30" rows="2" class="form-control">{{$l->address_d_l}}</textarea>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-12">
                             <label for="leave_reason">Special Reason for Leave::</label>
                             <textarea name="special_leave" id="leave_reason" cols="30" rows="2" class="form-control">{{$l->special_reason}}</textarea>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-12">
                                <p class="mb-0">
                                    I declare that I shall rejoin for duty on expiry of the granted leave and will not apply for any extension except under unavoidable circumstances.
                                </p>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-around">
                            <div class="col-md-4 col-6">
                                <p class="mb-0 "><i>{{Auth::user()->employeeInfo->name}}</i></p>
                                
                                <p class="mb-0 "><b>Signature </b></p>
                                
                            </div>
                            <div class="col-4">
                                <p class="mb-0 "><i>{{date('y-m-d')}}</i></p>
                                <p class="mb-0 "><b>Date </b></p>
                            </div>
                        </div>

                        <div class="row my-5">
                            <div class="col-md-12  ">
                                <button class="btn btn-sm btn-info btn-block">Send Leave Request</button>
                            </div>
                        </div>
                    </form>
                      @endif
                     {{-- end  --}}
                     @endforeach



                    @endif
                       
                       
                    </div>
                    {{-- //leave request form --}}
                    {{-- leave approval form --}}
                    <div class="col-md-5 card-body ml-auto">
                       <div class="row">
                           <div class="col-12 bg-info ">
                               <h5 class="text-center text-color-info mb-0 py-2">Leave Approval</h5>
                           </div>
                           

                           <div class="col-12 my-2">
                            <form action="{{route('approve.update',$id )}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 my-1">
                                        <h5 class="mb-0">Comments of The Leave Approver </h5>
                                        <input type="hidden" name="ls" value="{{$ls}}">
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group" id="request">
                                          
                                            <div class="form-check">
                                               
                                                <input class="form-check-input" type="checkbox" name="comment1" value="Y" @foreach($leave as $l) @if($l->comment1 == 'Y') checked disabled @endif @endforeach>
                                                <label class="form-check-label">I am satisfied that grant of leave  </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="comment2" value="Y" @foreach($leave as $l) @if($l->comment2 =='Y') checked disabled @endif @endforeach>
                                                <label class="form-check-label">Will not prejudice the normal works</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="comment3" value="Y" @foreach($leave as $l) @if($l->comment3 =='Y') checked disabled @endif @endforeach>
                                                <label class="form-check-label">His/Her duties will be carried out by</label>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group clearfix d-flex flex-md-row flex-column justify-content-between">
                                            <div class="icheck-primary d-inline">
                                              <input type="radio" id="radioPrimary1" name="a1" value="A"  data-toggle="modal" data-target="#m_approve" @foreach($leave as $l) @if($l->m_approved_date != NULL) checked disabled  @endif @endforeach>
                                              <label for="radioPrimary1">
                                                  Approve
                                              </label>

                                               <!-- manager approve modal -->
                <div class="modal fade" id="m_approve">
                    <div class="modal-dialog modal-dialog-centered " style="max-width: 500px;">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title ">Manager Remark</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-0">Are you sure you want to approve this leave request?</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <textarea name="m_remark" id="" cols="30" rows="2" class="form-control"> </textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info btn-sm ">add a remark</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--////modal--finish  -->
                                            </div>
                                            <div class="icheck-primary d-inline">
                                              <input type="radio" id="radioPrimary2" name="a1" value="R" data-toggle="modal" data-target="#m_refuse" @foreach($leave as $l) @if($l->cancel_req_date !=NULL && $l->m_approved_date==NULL) checked disabled @endif @endforeach>
                                              <label for="radioPrimary2">
                                                  Refuse
                                              </label>

                                               <!-- manager refuse modal -->
                <div class="modal fade" id="m_refuse">
                    <div class="modal-dialog modal-dialog-centered " style="max-width: 500px;">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title ">Manager Remark</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-0">Are you sure you want to refuse approving this leave request?</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <textarea name="m1_remark" id="" cols="30" rows="2" class="form-control"> </textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info btn-sm ">add a remark</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--////modal--finish  -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                   

                                    <div class="col-12">
                                        <p class="mb-0 "><i>{{Auth::user()->employeeInfo->name}}</i></p>
                                        <hr class="mt-0 mb-0">
                                        <p class="mb-0 "><b>Signature </b></p>
                                        <p class="mb-0 ">{{Auth::user()->employeeInfo->userDesignation->designation}}</p>
                                        <p class="mb-0 " name="m_approve_date" value="{{date('Y-m-d')}}">Date: {{date('Y-m-d')}} </p>
                                    </div>

                                </div>

                                

                                
                            </form>
                           </div>
                           
                        </div> 
                        <div class="row">
                            <div class="col-12 border bordered">
                               
                                   
        
                                   
                                        
                                            <div class="row">
                                                <div class="col-12  my-3">
                                                    <h4 class="mb-0 text-info ">
                                                        Leave status: {{$year}} {{$eid}}
                                                    </h4>
                                                </div>
                                            </div>
                                        
        
                                        <!-- Table -->
                                        
                                            <div class="row">
                                                <div class="col-12 overflow-auto">
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
                                                                  @foreach($status as $l)
                                                                   
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
                                                                    @foreach($status as $l)
                                                                     
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
                                                                    @foreach($status as $l)
                                                                     
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
                                        {{-- finish table --}}
                                    
                                
                            </div>
                        </div>

                    </div>
                    {{-- //leave approval form --}}
                </div>



{{-- leave verification --}}
              <div class="row ">
                <div class="col-12 bg-info  ">
                    <h5 class="text-center text-color-info mb-0 py-2">Leave Verification</h5>
                </div>
              </div>
            <form class="mb-5" action="{{route('Leave_Verify.update',$id)}}" method="POST">
                @csrf
               <div class="row mt-3">
                
                <div class="col-12">
                    <input type="hidden" name="ls" value="{{$ls}}">

                 
                     
                    
                    {{-- @if($l->admin_approve_date == NULL && $l->m_approved_date!=NULL) --}}
                    <p class="mb-0 ">
                       The leave application for <i><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($leave as $l){{$l->period}}&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @endforeach</i></u> days <i><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  @foreach($leave as $l)  @foreach($option as $o) @if($o->option_code==$l->leave_type)  {{$o->option_value}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @endif @endforeach @endforeach </i></u>  for   <i><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @foreach($leave as $l)&nbsp;{{$l->leave_start}} &nbsp;@endforeach &nbsp;&nbsp;&nbsp; </i></u> to <i><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($leave as $l)&nbsp;{{$l->leave_end}} &nbsp; @endforeach &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></u> . 
                    </p>
                    {{-- @endif --}}
                 
                   
                   
                </div>
                <div class="col-12">
                    <ul>
                        <li>has duly approved by competent authority and that the leave has duly been recorded</li>
                        <li>has not been approved by the competent authority</li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="row form-group clearfix ">
                        <div class="col-md-3 icheck-primary d-inline">
                          <input type="radio" id="radioPrimary3" name="v1" value="V"  data-toggle="modal" data-target="#a_verify" @foreach($leave as $l) @if( $l->admin_approve_date!=NULL) checked disabled @endif @endforeach>
                          <label for="radioPrimary3">
                            Verified for Record
                          </label>

               
                        </div>
                        <div class="col-md-2 icheck-primary d-inline">
                          <input type="radio" id="radioPrimary4" name="v1" value="R" data-toggle="modal" data-target="#a_refuse" @foreach($leave as $l) @if($l->cancel_approve_date !=NULL && $l->admin_approve_date==NULL) checked disabled @endif @endforeach>
                          <label for="radioPrimary4">
                              Refuse
                          </label>
                        </div>
                                    <!-- admin approve modal -->
                <div class="modal fade" id="a_verify">
                    <div class="modal-dialog modal-dialog-centered " style="max-width: 500px;">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title ">Admin Remark</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-0">Are you sure you want to verify this leave request?</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <textarea name="a_remark" id="" cols="30" rows="2" class="form-control"> </textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info btn-sm ">add a remark</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--////modal--finish  -->
                <!-- admin refuse modal -->
                <div class="modal fade" id="a_refuse">
                    <div class="modal-dialog modal-dialog-centered " style="max-width: 500px;">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title ">Admin Remark</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-0">Are you sure you want to refuse this leave request?</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <textarea name="a1_remark" id="" cols="30" rows="2" class="form-control"> </textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info btn-sm ">add a remark</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--////modal--finish  -->
                    </div>

                    <div class="row ">
                        <div class="col-3">
                            {{-- <p class="mb-0 "><i>Md. Habibur Rahman</i></p> --}}
                            <hr class="mt-0 mb-0">
                            <p class="mb-0 "><b>Verified by </b></p>
                            
                        </div>
                        <div class="col-3">
                            <hr class="mt-0 mb-0">
                            <p class="mb-0 ">Date: </p>
                            {{-- <p class="mb-0 "><b>Verified by </b></p> --}}
                            {{-- <p class="mb-0 ">Date:------ </p> --}}
                        </div>
                    </div>
                </div>
               </div>
            </form>

{{-- Leave Cancelation --}}

                <div class="row">
                    <div class="col-12 bg-info ">
                        <h5 class="text-center text-color-info mb-0 py-2">Leave Cancelation</h5>
                    </div>
                   
                </div>
                <div class="row mt-2">
                    <div class="col-md-4  card-success card-outline ">
                        <div class="row mt-3">
                            <div class="col-12 form-group">
                                <p class="mb-0">
                                    Here by I request to cancel my leave from <i><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @foreach($leave as $l)@if($l->m_approved_date!=NULL && $l->admin_approve_date!=NULL)&nbsp;{{$l->leave_start}} &nbsp;@endif @endforeach &nbsp;&nbsp;&nbsp; </i></u> to <i><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($leave as $l)@if($l->m_approved_date!=NULL && $l->admin_approve_date!=NULL)&nbsp;{{$l->leave_end}} &nbsp;@endif @endforeach &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></u> . no. of day(s)<i><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($leave as $l)@if($l->m_approved_date!=NULL && $l->admin_approve_date!=NULL){{$l->period}}&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@endif @endforeach</i></u>
                                   </p>
                            </div>
                        </div>
                        <form action="{{route('cancel_req',$id)}}" method="POST">
                            @csrf
                           <div class="row">
                               <div class="col-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  data-toggle="modal" data-target="#cancel_req" @foreach($leave as $l) @if($l->cancel_req_date != NULL) checked disabled @endif @endforeach>
                                    <label class="form-check-label">Send Request to Cancel Leave </label>
                                </div>
                                <!-- send cancel req -->
                <div class="modal fade" id="cancel_req">
                    <div class="modal-dialog modal-dialog-centered " style="max-width: 500px;">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title ">Manager Remark</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-0">Are you sure you want to approve this leave request?</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <textarea name="m_remark" id="" cols="30" rows="2" class="form-control"> </textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info btn-sm ">add a remark</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--////modal--finish  -->
                               </div>

                               
                           </div>
                            <div class="row mt-3">
                                <div class="col-md-8">
                                    <p class="mb-0 "><i>{{Auth::user()->employeeInfo->name}}</i></p>
                                    <hr class="mt-0 mb-0">
                                    <p class="mb-0 "><b>Applicant's Signature </b></p>
                                    <p class="mb-0 ">{{Date('y-m-d')}}</p>
                                    <p class="mb-0 ">Date: </p>
                                </div>
                            </div>
                        </form>    
                    </div>
{{-- approve 1 --}}
                     <div class="col-md-4  card-success card-outline  ">
                         <div class="row mt-3">
                             <div class="col-12">
                                <div class=" form-group " id="cause">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio3" name="customRadio">
                                        <label for="customRadio3" class="custom-control-label mb-0">Approve</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio4" name="customRadio" checked="">
                                        <label for="customRadio4" class="custom-control-label mb-0 ">Cancel</label>
                                    </div>
    
                                </div>
                             </div>

                             <div class="col-md-8">
                                 <p class="mb-0 "><i>Md. Habibur Rahman</i></p>
                                 <hr class="mt-0 mb-0">
                                 <p class="mb-0 "><b>Signature </b></p>
                                 <p class="mb-0 ">Head of the Department</p>
                                 <p class="mb-0 ">Date: </p>
                             </div>
                         </div>

                     </div>
{{-- approve 2 --}}

                     <div class="col-md-4  card-success card-outline  ">
                         <div class="row mt-3">
                             <div class="col-12">
                                

                                 <div class=" form-group " >
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio1">
                                        <label for="customRadio1" class="custom-control-label mb-0">Approve</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio1" checked="">
                                        <label for="customRadio2" class="custom-control-label mb-0 ">Cancel</label>
                                    </div>
    
                                </div>
                             </div>
                             
                             <div class="col-md-8">
                                 <p class="mb-0 "><i>Md. Habibur Rahman</i></p>
                                 <hr class="mt-0 mb-0">
                                 <p class="mb-0 "><b>Signature </b></p>
                                 <p class="mb-0 ">Date: </p>
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



@section('main-footer')
@parent
@endsection

@section('control-sidebar')
@parent
@endsection



@section('script')
<!-- custom file -->
@parent
<script>
    $(function() {
        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();

            var controlForm = $('.controls:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-trash"></span>');
        }).on('click', '.btn-remove', function(e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });


    // 

  
</script>
{{-- to store value via session --}}
<script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("setSession").value;
  
      sessionStorage.setItem("$o->option_code", x);
     
    var app = @json($option);

    var y = document.getElementById("setSession").value;
    
      sessionStorage.setItem("$o->leave_m", y);
       
      if(x=='HL'){
        
        document.getElementById("get_session").innerHTML = "<div class=' '><label class=''>Balance:</label></div> <div class=' mt-2'><label class='mt-2'>Date</label><input type='date' name='date' id='date'  class='form-control' value='@if(Request::segment(1) === 'edit-leave' && ($l_store =='HL' )){{$l_start}}@endif'></div> <div class='mt-2'><label class='mt-2'>Time Slot</label><select class='select2 form-control' name='time_slot' style='width:100%;'> <option value='FH' >first half</option> <option value='SH'>second half</option> </select></div>";
      }
   
      else{
        document.getElementById("get_session").innerHTML = "<div class=' '><label class=''>Balance:</label></div> <div class=' mt-2'><label class='mt-2'>From</label><input type='date' name='from' id='from' value='@if(Request::segment(1) === 'edit-leave' ){{$l_start}}@endif' class='form-control'></div> <div class=' mt-2'><label class='mt-2'>To</label><input type='date' name='to' id='to' class='form-control' value='@if(Request::segment(1) === 'edit-leave'){{$l_end}}@endif'></div><div class='mt-3'><label>Day(s)</label></div>";
        
      }

      if(x=='SL'||x=='SLM'){
        document.getElementById("get_session").innerHTML = "<div class=' '><label class=''>Balance:</label></div> <div class=' mt-2'><label class='mt-2'>From</label><input type='date' name='from' id='from' class='form-control' value='@if(Request::segment(1) === 'edit-leave' && ($l_store =='SL' || $l_store=='SLM')){{$l_start}} @endif'></div> <div class=' mt-2'><label class='mt-2'>To</label><input type='date' name='to' id='to' class='form-control' value=' @if(Request::segment(1) === 'edit-leave' && ($l_store =='SL' || $l_store=='SLM')){{$l_end}} @endif'></div><div class='mt-2'><label class='mt-2'>Day(s)</label></div><div class=' form-group mt-2'><div class='control-group' id='fields'><label class='control-label' for='field1'>Medical Prescription</label></div><div class='controls'><div class='entry input-group upload-input-group'><input class='form-control' name='filename[]'' type='file'> <button class='btn btn-upload btn-info btn-add' type='button'><i class='fa fa-plus'></i></button>  </div> </div></div>";
      }
      
      
    //   var from = new Date(document.getElementById("from").value);
    //   var to = new Date(document.getElementById("to").value);
    //   var diff = to.getDate()-from.getDate();
      
    }
  </script>

  <!-- custom file -->

<script>
    $(function() {
        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();

            var controlForm = $('.controls:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-trash"></span>');
        }).on('click', '.btn-remove', function(e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });
</script>
@endsection


@endsection