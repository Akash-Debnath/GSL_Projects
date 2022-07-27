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
                <h4>All Leave Taken by Employee</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Leave</a></li>
                    <li class="breadcrumb-item"><a href="#">All_leave</a></li>
                    <li class="breadcrumb-item active">All Leave Taken by Employee </li>
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
                    <form action="{{route('search_report')}}" class="" method="POST">
                        @csrf
                     
                            <div class="row gap-5">


                                <div class="col-md-3 mt-md-0 mt-2 ">
                                <label for="dept">Department</label>
                                    <select id="dept" name="dept" class="form-control select2" style="width: 100%;" data-placeholder='select Department'>
                                        <option value="" selected hidden> --Department-- </option>
                                        @foreach($dept as $d)
                                        <option data-state="{{$d->dept_code}}" value="{{$d->dept_code}}">{{$d->dept_name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-3 mt-md-0 mt-2 ml-auto">
                                <label for="staff">Staff</label>
                                    <select id="staff" name="staff" class="form-control select2" style="width: 100%;" data-placeholder='select Staff'>
                                       
                                        @foreach($employee as $e)
                              
                                
                               
                                <option data-state="{{$e->dept_code}}"  value="{{$e->emp_id}}">{{$e->emp_id}} - {{$e->name}}</option>
                              
                                @endforeach

                                    </select>

                                </div>
                                <div class="col-md-2 mt-md-0 mt-2 ml-auto">
                                    <label for="from">From</label>
                                    @php $f = date('Y-m-01'); $t = $t = date('Y-m-d');  @endphp 
                                    <input type="date" name="from" value="{{$from}}"  id="from" class="form-control">

                                </div>
                                <div class="col-md-2 mt-md-0 mt-2 ml-auto">

                                    <label for="to">To</label>
                                    <input type="date" name="to" id="to" value="{{$to}}" class="form-control">
                                </div>
                                <div class="col-md-1 mt-md-0 mt-2 ml-auto " >
                                <label for="to" style="visibility: hidden">Search</label> 
                                    <button class="btn btn-info form-control">  Show</button>
                                </div>
                            </div>
                        
                    </form>
                </div>

                
                <div class="card-body  overflow-auto">
                    <table class="table table-bordered table-hover report">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Date</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;"> day</th>
                                <th colspan="3" class="text-center">Official Time Table</th>
                                <th colspan="3" class="text-center">Log</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Incident</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Attendance</th>
                            </tr>
                            <tr>
                                <th class="text-center">Start</th>
                                <th class="text-center">End</th>
                                <th class="text-center">Duration</th>
                                <th class="text-center">In</th>
                                <th class="text-center">Out</th>
                                <th class="text-center">Duration</th>

                            </tr>
                        </thead>
                        <tbody>
                  

                        @php  $wr =0; $hd1=0; $extw=0; $rmdn=false; $emp_rost_s=false; $ltype=false; $w1=0;$w2=0;$a1=0;$a2=0;$a3=0; $hd2=0; $l1=0; $l2=0; $late1=0; $late2=0; $eout=0; $incd=0; $whd=0; $slot=false;
                        $tw=array(); @endphp  
                    @for($i = $start; $i <= $end; $i=$i + 86400 )  
                     @php $thisDate=date( 'Y-m-d' , $i );  @endphp  
                     
                     <tr>
                        <td>

                             {{-- if holiday --}}
                        
                             @foreach($holiday as $h)@if($thisDate==$h->date ) <span class="text-info ">@if($h->description == 'Eid-ul-Fitr')
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#cc2b5e " class="bi bi-moon-stars" viewBox="0 0 16 16">
                                    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                    <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                                  </svg>
                                 
                                @endif
                                </span> @endif  @endforeach
                                {{-- //holiday --}}


                           
                            {{-- defining roster --}}
                        @php $roster = false; $md=false; @endphp
                        @foreach($roster_dept as $rd)
                         @if($rd->option_code==$edept)@php $roster = true; @endphp @endif
                        @endforeach

                        @foreach($rostering as $rs) @if($rs->emp_id==$staff && date('Y-m-d',strtotime($rs->stime))==$thisDate) @php $roster = true; @endphp @endif @endforeach
                        {{-- //----------------defining roster --}}
                            
                            @if($roster==true)
                            
                            {{-- {{$thisDate}} --}}
                            {{-- echo roster dates --}}
                             @foreach($rostering as $rs) @php $stime = date('Y-m-d',strtotime($rs->stime)); $etime = date('Y-m-d',strtotime($rs->etime)); @endphp 
                               @if(($thisDate == $stime))
                                 @if($stime!=$etime) @php $md=true;  @endphp {{$thisDate}}-{{$etime}}
                                 @elseif($stime==$etime) @php $md=false; @endphp @endif
                               
                               @endif
                              
                             @endforeach

                            @if($md==false) {{$thisDate}}  @endif
                              
                             {{-- md --}}
                             {{-- @if($md==true){{$thisDate}} @endif --}}

                            @elseif($roster==false)
                           
                                {{$thisDate}}
                            @endif

                            {{-- if  no roster and no stime and etime matching --}}
                            
                        </td>




                        <td>@php $day = date('l',strtotime($thisDate)); @endphp 
                        
                         {{-- defining roster --}}
                         @php $roster = false; $md=false; @endphp
                         @foreach($roster_dept as $rd)
                          @if($rd->option_code==$edept)@php $roster = true; @endphp @endif
                         @endforeach
                         {{-- //----------------defining roster --}}
                             
                             @if($roster==true)
                             
                             {{-- {{$thisDate}} --}}
                             {{-- echo roster dates --}}
                             @foreach($rostering as $rs) @php $stime = date('Y-m-d',strtotime($rs->stime)); $etime = date('Y-m-d',strtotime($rs->etime)); @endphp 
                                
                                @if(($thisDate == $stime))
                                  
                                  @if($stime!=$etime) @php $md=true;  @endphp {{$day}}-{{(date('l',strtotime($etime)))}}
                                  @elseif($stime==$etime) @php $md=false; @endphp @endif
                                
                                @endif
                               
                              @endforeach
 
                             @if($md==false) {{$day}}  @endif
                               
                              {{-- md --}}
                              {{-- @if($md==true){{$thisDate}} @endif --}}
 
                             @elseif($roster==false)
                            
                                 {{$day}}
                             @endif
                        
                        
                        
                        </td>


                        <td>
                            @if($roster==true)
                            
                            {{-- {{$thisDate}} --}}
                            {{-- echo roster dates --}}
                             @foreach($rostering as $rs) @php $stime = date('Y-m-d',strtotime($rs->stime)); $etime = date('Y-m-d',strtotime($rs->etime)); @endphp 
                               
                               @if(($thisDate == $stime))
                                 @php $slot = true; @endphp
                                 @php $md=true;  @endphp {{date('h:i:s a',strtotime($rs->stime))}}

                                 @php break; @endphp
                                
                               @endif
                              
                             @endforeach


                             {{-- non-sloted roster --}}
                             @if($slot==false)
                             @foreach($emp_roster_schedule as $emp_rost) @if($thisDate==$emp_rost->ddate && $emp_rost->emp_id==$staff) {{date('h:i:s a',strtotime($emp_rost->start_time))}} @php break; @endphp @endif @endforeach
                             @endif
                             {{-- // --}}
                            @elseif($roster==false)
                               {{-- ramadan schedule --}}
                               @foreach($ramadan as $rd) 
                            
                                @if($thisDate>= $rd->date_from && $thisDate<= $rd->date_to)
                                @php $rmdn=true;@endphp
                                   {{$rd->stime}}
                                @endif
                               @endforeach

                               @if($rmdn==false && $emp_rost_s == false)
                                 @foreach($default_time as $dtime) {{date('h:i:s a',strtotime($dtime->stime))}} @endforeach
                               @endif
                                 {{-- //ramadan schedule --}}


                                 {{-- $emp_roster_schedule --}}

                                 @foreach($emp_roster_schedule as $emp_rost) @if($thisDate==$emp_rost->ddate && $emp_rost->emp_id==$staff) @php $emp_rost_s=true; @endphp {{date('h:i:s a',strtotime($emp_rost->start_time))}} @php break; @endphp @endif @endforeach
                                 {{-- //emp-roster --}}
                            @endif
                        </td>

                        <td>
                            @if($roster==true)
                            
                            {{-- {{$thisDate}} --}}
                            {{-- echo roster dates --}}
                             @foreach($rostering as $rs) @php $stime = date('Y-m-d',strtotime($rs->stime)); $etime = date('Y-m-d',strtotime($rs->etime)); @endphp 
                               
                               @if(($thisDate == $stime))
                                 @php $md=true;  @endphp {{date('h:i:s a',strtotime($rs->etime))}}

                                 @php break; @endphp
                                
                               @endif
                              
                             @endforeach

                             {{-- non-sloted roster --}}
                             @if($slot==false)
                             @foreach($emp_roster_schedule as $emp_rost) @if($thisDate==$emp_rost->ddate && $emp_rost->emp_id==$staff) {{date('h:i:s a',strtotime($emp_rost->end_time))}} @php break; @endphp @endif @endforeach
                             @endif
                             {{-- // --}}

                            @elseif($roster==false)
                             {{-- 06:00:00 --}}
                             {{-- ramadan --}}
                             @foreach($ramadan as $rd) 
                             @php $rmdn == true; @endphp
                             @if($thisDate>= $rd->date_from && $thisDate<= $rd->date_to)
                                {{date('h:i:s a',strtotime($rd->etime))}}
                             @endif
                            @endforeach
                            
                            

                            @if($rmdn==false && $emp_rost_s == false)
                            @foreach($default_time as $dtime) {{date('h:i:s a',strtotime($dtime->etime))}} @endforeach
                            @endif
                            {{-- ramadan --}}

                               {{-- $emp_roster_schedule --}}

                               @foreach($emp_roster_schedule as $emp_rost) @if($thisDate==$emp_rost->ddate && $emp_rost->emp_id==$staff) @php $emp_rost_s=true; @endphp {{date('h:i:s a',strtotime($emp_rost->end_time))}} @php break; @endphp @endif @endforeach
                               {{-- //emp-roster --}}

                            @endif
                          {{-- e- {{$emp_rost_s}} r-{{$rmdn}} --}}
                        </td>

                        <td> 
                            @if($roster==true)
                             
                             {{-- {{$thisDate}} --}}
                             {{-- echo roster dates --}}
                             @foreach($rostering as $rs) @php $stime = date('Y-m-d',strtotime($rs->stime)); $nstime=date('H:i:s',strtotime($rs->stime)); $etime = date('H:i:s',strtotime($rs->etime)); @endphp 
                                
                                @if(($thisDate == $stime))
                                  
                                   @php $dure = ((strtotime($nstime) - strtotime($etime))/3600); $min =((strtotime($nstime) - strtotime($etime))%3600)/60   @endphp 
                                   @if(abs(intval($dure))<10) 0{{abs(intval($dure))}} @else {{abs(intval($dure))}} @endif: {{intval(abs($min))}}  
                                   {{-- {{date('H:i:s',(strtotime($nstime) - strtotime($etime)))}} --}}
                                   @php break; @endphp
                                @endif
                               
                              @endforeach
                             {{-- for non-sloted roster --}}
                              @if($slot==false) 

                              @foreach($emp_roster_schedule as $emp_rost) 
                              @if($emp_rost->ddate == $thisDate)
                              @php $diff = strtotime($emp_rost->end_time)-strtotime($emp_rost->start_time); @endphp
                                  {{date('H:i:s',$diff)}}
                              @endif
                              @endforeach
                              
                              @endif
                             {{-- // --}}
                             @if($md==false) ---  @endif
                               
                              {{-- md --}}
                              {{-- @if($md==true){{$thisDate}} @endif --}}
 
                             @elseif($roster==false)
                             {{-- accrording to non-roster emp-rost schedule --}}
                                @if($emp_rost_s==true) 
                                @foreach($emp_roster_schedule as $emp_rost) 
                                @if($thisDate==$emp_rost->ddate)
                                
                                @php $diff = strtotime($emp_rost->end_time)-strtotime($emp_rost->start_time); @endphp
                                  {{date('H:i:s',$diff)}}
                                @endif
                                @endforeach
                                @endif
                                
                                 {{-- default duration --}}


                                 @if($rmdn==false && $emp_rost_s==false)
                                 @foreach( $default_time as $dft) 
                                 @php $diff = strtotime($dft->etime)-strtotime($dft->stime); @endphp
                                 @endforeach
                                 {{date('H:i:s',$diff)}}
                                 @endif

                             @endif
                        </td>
                       
                       
                        {{-- @foreach($holiday as $h)@if($thisDate==$h->date ) @php $hol = $thisDate; $hd1=$hd1+1; @endphp  @endif  @endforeach --}}
                      
                        <td @if($roster==false) @foreach($holiday as $h)@if($thisDate==$h->date ) @if(empty($s)&& empty($e)) colspan="3"   @endif @endif  @endforeach @endif @if($roster==true ) @foreach($roster_holiday as $rh)@if($thisDate==$rh->date && $rh->emp_id == $staff ) @if(empty($s)&& empty($e)) colspan="3"   @endif @endif  @endforeach @endif> 
                            
                            @php $s = array(); @endphp @foreach($report as $r)  @if($thisDate == $r->date)  @php array_push($s,$r->stime) @endphp @endif @endforeach 
                            {{-- @php  if(!empty($s)){ if(strtotime(min($s))>strtotime("09:15:00"))  echo '<span class="text-danger" >'.((date('h:i:s a',strtotime(min($s))))). min($s) .'</span>';  elseif(strtotime(min($s))<strtotime("09:15:00"))echo '<span class="text-info" >'.((date('h:i:s a',strtotime(min($s))))). min($s).'</span>';}@endphp  --}}
                        
                        {{-- if roster--}} 
                        @if($roster==true)
                            
                        {{-- {{$thisDate}} --}}
                        {{-- echo roster dates --}}
                         @foreach($rostering as $rs) 
                         @php $stime = date('Y-m-d',strtotime($rs->stime)); $shour = date('H:i:s',strtotime($rs->stime.'15 minutes')); @endphp 
                           @if(($thisDate == $stime))
                         
                             @php $md=true;  @endphp 
                            
                             @if(!empty($s)) 
                              @if((strtotime($shour))<(strtotime(min($s)))) @php $late1=$late1+1; @endphp <p class='mb-0 text-danger'>{{Date('h:i:s a',strtotime(min($s)))}}  </p> 
                              @else <p class='mb-0 text-info'>{{Date('h:i:s a',strtotime(min($s)))}}</p> 
                              @endif 
                              @endif

                             @php break; @endphp
                            
                           @endif
                          
                         @endforeach




                        {{-- if slot false --}}
                         @if($slot==false) 
                         @foreach($emp_roster_schedule as $emp_rost)
                         @if($thisDate==$emp_rost->ddate) 
                          @php $shour = date('H:i:s',strtotime($emp_rost->start_time.'15 minutes'));$md=true; @endphp 
                          

                          @if(!empty($s)) 
                          @if((strtotime($shour))<(strtotime(min($s)))) @php $late1=$late1+1; @endphp <p class='mb-0 text-danger'>{{Date('h:i:s a',strtotime(min($s)))}}  </p> 
                          @else <p class='mb-0 text-info'>{{Date('h:i:s a',strtotime(min($s)))}}</p> 
                          @endif 
                          @endif




                          {{-- {{$shour}} --}}
                         @endif
                         @endforeach
                         @endif
                        {{-- // --}}

                        {{-- work without roster --}}
                         @if($md==false)    @if(!empty($s)) <p class='mb-0 text-gray'>{{Date('h:i:s a',strtotime(min($s)))}}</p>  @endif @endif
                        {{-- // --}}
                        @elseif($roster==false)
                        @php 
                        // ramadan
                        if($rmdn==true){
                           foreach($ramadan as $rmd){
                            if($thisDate >= $rmd->date_from && $thisDate <= $rmd->date_to){
                                 $time1 = strtotime($rmd->stime.'15 minutes');
                                
                            }
                           }
                         }elseif($rmdn==false){

                            // rost emp

                            if($emp_rost_s==true){
                                foreach($emp_roster_schedule as $emp_rost){
                                    if($emp_rost->emp_id==$staff && $thisDate==$emp_rost->ddate){
                                        $rst =  date('H:i:s',strtotime($emp_rost->start_time));
                                        $time1 = strtotime($rst.'15 minutes');
                                    
                                    }
                                    
                                }
                                
                            }else{
                                foreach($default_time as $dft){
                                $time1 = strtotime($dft->stime.'15 minutes');
                                }
                                
                            }
                            
                           
                           
                         }
                        // ramadan
                        
                        // roster emp

                        // $time1 = strtotime('09:00:00'.'15 minutes');  
                        @endphp

                        @if(!empty($s)) 
                        @if((strtotime(min($s)))>$time1) <p class='mb-0 text-danger'> @php $late2=$late2+1; @endphp {{Date('h:i:s a',strtotime(min($s)))}}</p> 
                        @else <p class='mb-0 text-info'>{{Date('h:i:s a',strtotime(min($s)))}}  </p> 
                        @endif 
                        @endif

                        @endif
                        {{-- // --}}
                        {{-- holiday --}}
                        @if($roster==false)
                        @foreach($holiday as $h)@if($thisDate==$h->date )@if(empty($s)&& empty($e)) <span class="text-info ">   @if($h->description == 'Eid-ul-Fitr')
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#cc2b5e " class="bi bi-moon-stars" viewBox="0 0 16 16">
                                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                            </svg>
                            
                            @endif
                            {{ $h->description }} </span> @endif @endif @endforeach 
                            @endif

                            @if($roster==true) 
                            @foreach($roster_holiday as $rh)@if($thisDate==$rh->date && $rh->emp_id == $staff ) <span class="text-info">Roster Holiday</span> @endif @endforeach
                            @endif
                          
                        </td>


                       
                        <td @if($roster==false) @foreach($holiday as $h)@if($thisDate==$h->date ) @if(empty($s)&& empty($e)) style="display:none;" @endif  @endif  @endforeach @endif  @if($roster==true ) @foreach($roster_holiday as $rh)@if($thisDate==$rh->date && $rh->emp_id == $staff ) @if(empty($s)&& empty($e)) style="display:none;"   @endif @endif  @endforeach @endif>
                            @php $e = array(); @endphp @foreach($report as $r)  @if($thisDate == $r->date)  @php array_push($e,$r->etime) @endphp @endif @endforeach 
                            
                             {{-- if roster--}} 
                        
                        @if($roster==true)
                            
                        {{-- {{$thisDate}} --}}
                        {{-- echo roster dates --}}
                         @foreach($rostering as $rs) @php $stime = date('Y-m-d',strtotime($rs->etime)); $ehour = date('H-i-s ',strtotime($rs->etime)); @endphp 
                           
                           @if(($thisDate == $stime))
                             @php $md=true;  @endphp 

                             @if(!empty($e)) @if((strtotime(max($e)))>=(strtotime($ehour))) <p class='mb-0 text-info'>{{Date('h:i:s a',strtotime(max($e)))}}</p> 
                             @else @php $eout=$eout+1; @endphp <p class='mb-0 text-danger'>{{Date('h:i:s a',strtotime(max($e)))}}</p> 
                             @endif @endif

                             @php break; @endphp
                           
                             
                           
                           @endif
                          {{--  --}}
                          
                         @endforeach


                        {{-- non-sloted roster --}}
                          {{-- if slot false --}}
                          @if($slot==false) 
                          @foreach($emp_roster_schedule as $emp_rost)
                          @if($thisDate==$emp_rost->ddate) 
                           @php $ehour = date('H:i:s',strtotime($emp_rost->end_time)); $md=true; @endphp 
                           
 
                           @if(!empty($s)) 
                           @if((strtotime($ehour))>(strtotime(max($e)))) @php $eout=$eout+1; @endphp <p class='mb-0 text-danger'>{{Date('h:i:s a',strtotime(max($e)))}}  </p> 
                           @else <p class='mb-0 text-info'>{{Date('h:i:s a',strtotime(max($e)))}}</p> 
                           @endif 
                           @endif
 
 
 
 
                           {{-- {{$ehour}} --}}
                          @endif
                          @endforeach
                          @endif
                         {{-- // --}}

                        {{-- // --}}
                        {{-- work without roster --}}
                        @if($md==false)    @if(!empty($e)) <p class='mb-0 text-gray'>{{Date('h:i:s a',strtotime(max($e)))}}</p>  @endif @endif
                        {{-- // --}}
                        @elseif($roster==false)
                        @php 
                         if($rmdn==true){
                           foreach($ramadan as $rmd){
                            if($thisDate >= $rmd->date_from && $thisDate <= $rmd->date_to){
                                 $time = strtotime($rmd->etime);
                                
                            }
                           }
                         }elseif($rmdn==false){

                            

                            if($emp_rost_s==true){
                                foreach($emp_roster_schedule as $emp_rost){
                                    if($emp_rost->emp_id==$staff && $thisDate==$emp_rost->ddate){
                                        $rst =  date('H:i:s',strtotime($emp_rost->end_time));
                                        $time = strtotime($rst);
                                    
                                    }
                                    
                                }
                                
                            }else{
                                foreach($default_time as $dft){
                                $time = strtotime($dft->etime);
                                }
                                
                            }
                            
                            // foreach($default_time as $dft){
                            //     $time = strtotime($dft->etime);
                            // }
                            // $time = strtotime('18:00:00'); 
                         }
                       
                        //  $time = strtotime('18:00:00');
                        @endphp
                            {{-- {{Date('h:i:s',$time)}} --}} 
                            @if(!empty($e)) @if((strtotime(max($e)))>=$time) <p class='mb-0 text-info'>{{Date('h:i:s a',strtotime(max($e)))}}</p> 
                             @else @php $eout=$eout+1; @endphp <p class='mb-0 text-danger'>{{Date('h:i:s a',strtotime(max($e)))}} </p> 
                             @endif @endif 
                            
                        @endif 

                         {{-- not set via roster --}}
                         {{-- <p class='mb-0 text-gray'>{{Date('h:i:s a',strtotime(max($e)))}}</p> --}}
                         {{-- @php $found=true; @endphp
                         @foreach($rostering as $rost)  @if(($thisDate!=date('Y-m-d',strtotime($rost->stime))))  @php $found=false; @endphp @endif @endforeach
                         @if($found==true) <p class='mb-0 text-gray'>{{Date('h:i:s a',strtotime(max($e)))}}</p> @endif --}}
                  
                       

                        {{-- // --}} 
                        </td>
                        
                        <td @if($roster==false) @foreach($holiday as $h)@if($thisDate==$h->date ) @if(empty($s)&& empty($e)) style="display:none;"  @endif  @endif  @endforeach @endif  @if($roster==true ) @foreach($roster_holiday as $rh)@if($thisDate==$rh->date && $rh->emp_id == $staff ) @if(empty($s)&& empty($e)) style="display:none;"   @endif @endif  @endforeach @endif>
                            {{-- @php  if(!empty($e)&&!empty($s)){if(max($e) > min($s)){$du= intval((strtotime(min($s))-strtotime(max($e))/60)); $dff = date('h ',$du); echo $dff;  }elseif(max($e) < min($s)){$du= intval((strtotime(max($e))-strtotime(min($s)))/60); $dff = date('h : i : s',$du); echo $dff;  }} @endphp --}}
                            @php 
                            if(!empty($e)&&!empty($s)){
                            $dateDiff = intval((strtotime($thisDate.max($e))-strtotime($thisDate.min($s)))/60);
                            // $min = intval((strtotime($thisDate.max($e))-strtotime($thisDate.min($s)))%60);
$hours = intval($dateDiff/60);
$minutes = ($dateDiff%60);

if($roster == true){
 
    if($slot == true){
foreach($rostering as $r){
    $stime =date('H:i:s',strtotime($r->stime)) ; $etime = date('H:i:s',strtotime($r->etime)); $sdate = date('Y-m-d',strtotime($r->stime));
    if($sdate==$thisDate){
        $md = true;
        $diff = abs(strtotime($etime)-strtotime($stime))/3600;
        array_push($tw,abs(strtotime(max($e))-strtotime(min($s))));
        if($hours <$diff){
    // echo '<span class="text-danger">'.abs($hours).':'.$minutes.'</span>';echo date('H:i:s',(strtotime(max($e))-strtotime(min($s))));
    echo '<span class="text-danger">'.date('H:i:s',(strtotime(max($e))-strtotime(min($s)))).'</span>';
     $incd=$incd+1;
     array_push($tw,abs(strtotime(max($e))-strtotime(min($s))));
    }elseif($hours>=$diff){
    echo '<span class="text-info">'.date('H:i:s',(strtotime(max($e))-strtotime(min($s)))).'</span>';
    }else{echo '<span class="text-gray">'.abs($hours).':'.$minutes.'</span>';}
        break;
        
    }

    
}

} // non-sloted roster
else{
foreach($emp_roster_schedule as $emp_rost){
    $stime =date('H:i:s',strtotime($emp_rost->start_time)) ; $etime = date('H:i:s',strtotime($emp_rost->end_time)); 
    if($emp_rost->ddate==$thisDate){
        $md = true;
        $diff = abs(strtotime($etime)-strtotime($stime))/3600;
        array_push($tw,abs(strtotime(max($e))-strtotime(min($s))));
        
        if($hours <$diff){
    // echo '<span class="text-danger">'.abs($hours).':'.$minutes.'</span>';echo date('H:i:s',(strtotime(max($e))-strtotime(min($s))));
    echo '<span class="text-danger">'.date('H:i:s',(strtotime(max($e))-strtotime(min($s)))).'</span>';
     $incd=$incd+1;
     array_push($tw,abs(strtotime(max($e))-strtotime(min($s))));
    }elseif($hours>=$diff){
    echo '<span class="text-info">'.date('H:i:s',(strtotime(max($e))-strtotime(min($s)))).'</span>';
    }else{echo '<span class="text-gray">'.abs($hours).':'.$minutes.'</span>';}

    }
}
}
if($md==false){
    $extw=$extw+1;
    echo '<span class="text-gray">'.date('H:i:s',(strtotime(max($e))-strtotime(min($s)))).'</span>';
}
    
  
}elseif($roster==false){

    // if ramadan set

    if($rmdn==true){
    foreach($ramadan as $rd){
        if($thisDate>=$rd->date_from && $thisDate<= $rd->date_to){
            $diff = abs(strtotime($rd->stime)-strtotime($rd->etime))/3600;;
        }
    }
    }


    if($emp_rost_s==true){
        foreach($emp_roster_schedule as $emp_rost){
            $diff=(strtotime($emp_rost->end_time)-strtotime($emp_rost->start_time))/3600;
        }
    }


    if($emp_rost_s==false && $rmdn==false){
        foreach($default_time as $dt){
            $diff = abs(strtotime($dt->stime)-strtotime($dt->etime))/3600;;
        }
       }
    //  ----ramadan
    if($hours <$diff){
        $incd=$incd+1;
        array_push($tw,abs(strtotime(max($e))-strtotime(min($s))));
    echo '<span class="text-danger">'.date('H:i:s',(strtotime(max($e))-strtotime(min($s)))).'</span>'; 
    }elseif($hours>=$diff ){
     if($minutes>0){
        array_push($tw,abs(strtotime(max($e))-strtotime(min($s))));
    echo '<span class="text-info">'.date('H:i:s',(strtotime(max($e))-strtotime(min($s)))).'</span>'; }

    }else{echo '<span class="text-gray">'.date('H:i:s',(strtotime(max($e))-strtotime(min($s)))).'</span>';}
}
     


}
                            @endphp

                            
                        </td>
                       {{-- @foreach($holiday as $h)@if($thisDate==$h->date ) @if(empty($s)&& empty($e)) style="display:none;" @endif @endif  @endforeach --}}
                        <td >
                           @if($roster==false)
                            @if(!empty($s)||!empty($e)) 
                            @foreach($holiday as $h)@if($thisDate==$h->date ) @php $whd=$whd+1; @endphp <p class="mb-0 text-info">{{$h->description}}</p>  @endif  @endforeach  
                            @endif
                           @endif


                           @if($roster==true)
                            @if(!empty($s)||!empty($e)) 
                            @foreach($roster_holiday as $rh)@if($thisDate==$rh->date ) @php $whd=$whd+1; @endphp <p class="mb-0 text-info">{{$rh->description}}</p>  @endif  @endforeach  
                            @endif
                           @endif
                            {{-- incident --}}

                            @foreach($incident as $inc)
                            @if($inc->date == $thisDate) <span class="text-pink">{{$inc->description}}</span> @endif
                            @endforeach
                          
                        </td>
                       

                       
                        {{-- // --}}
                       
                        <td> 
                          
{{-- defining roster --}}
                        @php $roster = false; @endphp
                        @foreach($roster_dept as $rd)
                         @if($rd->option_code==$edept)@php $roster = true; @endphp @endif
                        @endforeach
{{-- //----------------defining roster --}}






                {{-- roster true --}}
                       @if($roster==true) 

                        {{-- defining weekend --}}
                        @php $week = false; @endphp
                        @foreach($weekend as $w) @if($w->date==$thisDate) @php $week = true; @endphp @endif @endforeach
                        {{-- // defining weekend--}}

                        {{-- if weekend true --}}
                        @if($week==true)

                        
                        @php $hd=false; @endphp
                        @foreach($roster_holiday as $h)@if($h->date == $thisDate)@php $hd=true; @endphp @endif @endforeach

                        @if($hd==true)<p class="mb-0 text-info">Weekend & Holiday</p> @elseif($hd==false) <p class="mb-0 text-info">Weekend</p> @endif

                        {{-- if weekend false --}}
                        @elseif($week == false)
                        {{-- holiday --}}
                          @php $hd=false; @endphp
                          {{-- roster holiday --}}
                          @if($roster==true ) @foreach($roster_holiday as $rh)@if($thisDate==$rh->date && $rh->emp_id == $staff ) @php $hd=true; @endphp  @endif  @endforeach @endif
                          {{-- // --}}
                          {{-- @foreach($holiday as $h)@if($h->date == $thisDate)@php $hd=true; @endphp @endif @endforeach --}}
                          {{-- if hd t --}}
                          @if($hd==true) <p class="mb-0 text-info">Holiday</p>
                          {{-- if hd f --}}
                          @elseif($hd==false) 
                          {{-- absent or wday --}}
                            @if(!empty($s)||!empty($e)) 
                            @php $w2=$w2+1; @endphp
                            <p class="mb-0 text-indigo">Working Day</p>
                            @elseif(empty($s)||empty($e)) 
                            {{-- <p class="mb-0 text-danger">Absent</p>  --}}
                            {{-- leave --}}
                            @php $lv=false; @endphp
                            @foreach($leave as $l) @if(($l->leave_start <=$thisDate)&&($l->leave_end>=$thisDate)) @php $lv=true; @endphp @if($l->leave_type=='HL') @php $ltype=true; @endphp @endif @endif @endforeach
                            @if($lv==true) @php $l1=$l1+1; @endphp @if($ltype==true) <p class="mb-0 text-orange">Half Leave</p> @else <p class="mb-0 text-orange">Leave</p> @endif   @elseif($lv==false) @php $a1=$a1+1; @endphp <p class="mb-0 text-danger">Absent</p>  @endif
                            {{-- //leave --}}
                            @endif
                             {{-- //absent or wday --}}
                          @endif
                        {{-- // --}}

                        @endif

                         {{-- rostering --}}


                {{-- roster false --}}                       
                       @elseif($roster==false)

                       {{--def weekend --}}
                        @foreach($default_weekend as $rd) @if($rd->option_code==$day) 
                        
                       {{-- wday --}}
                        @if($rd->option_value=='N') 
                          
                          @php $hd=false; @endphp
                          @foreach($holiday as $h)@if($h->date == $thisDate)@php $hd=true; @endphp @endif @endforeach
                          
                          {{-- if hd false--}}
                          @if($hd==false)
                          
                          {{-- working day --}}
                           @if(!empty($s)||!empty($e)) @php $w1=$w1+1; @endphp <p class="mb-0 text-indigo">Working Day</p> 
                           {{-- //working day --}}
                           {{-- absent or leave --}}
                           @elseif(empty($s) && empty($e)) 
                            
                            @php $lv=false; @endphp
                            @foreach($leave as $l) @if(($l->leave_start <=$thisDate)&&($l->leave_end>=$thisDate)) @php $lv=true; @endphp @endif @endforeach
                            @if($lv==true) @php $l2=$l2+1; @endphp <p class="mb-0 text-orange">Leave</p>  @elseif($lv==false) @php $a2=$a2+1; @endphp <p class="mb-0 text-danger">Absent</p>  @endif
                           @endif
                           {{-- // absent or leave--}}

                           {{-- if hd true--}}
                          @elseif($hd==true) 
                          <p class="mb-0 text-info">Holiday</p> 
                          @endif
                          {{-- //hd --}}
                        
                        
                          {{-- weekday --}}
                        @elseif($rd->option_value=='Y') 
                        
                          @php $hd=false; @endphp
                          @foreach($holiday as $h) @if($h->date == $thisDate) @php $hd=true; @endphp @endif  @endforeach
                          @if($hd==false)<p class="mb-0 text-info">Weekend</p>@elseif($hd==true) <p class="mb-0 text-info">Weekend & Holiday</p> @endif
                        @endif
                        
                        
                        
                        @endif @endforeach
                        {{-- // --}}



                        
                       @endif
                          
                        </td>
                       
                     </tr>
                     @php $wr=$wr+1; @endphp
                    @endfor    
                        </tbody>
                    </table>
                     <div class="col-md-12">
                        
                     </div>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            {{-- {{$w1+$w2+$hd1}} {{$wr}} --}}
                            <label for="" >Total working day: </label>{{$w1+$w2+$a1+$a2+$l1+$l2-$extw}} <br>
                            {{-- {{$wr-($w1+$w2+$hd1)}} --}}
                            <label for="" >Total Late Login: </label>  {{$late1+$late2}}
                            {{-- {{$late}} --}}
                        </div>
                        <div class="col-md-3">
                            <label for="">Total present day:</label> {{$w1+$w2}}  <br>
                            {{-- {{$p1+$p2}} --}}
                            <label for="">Total Early Logout:</label> {{$eout}}
                            {{-- {{$eout}} --}}
                        </div>
                        <div class="col-md-3">
                            <label for="">Total absent day:</label>{{$a1+$a2}} <br>
                            {{-- {{($wr-($w1+$w2+$hd1))-($p1+$p2)}} --}}
                            <label for="">Incomplete office duration:</label>{{$incd}}
                        </div>
                        <div class="col-md-3">
                            <label for="">Present During Holiday:</label> {{$whd}} <br>
                            @php $total_duration = array_sum($tw); $tday= $w1+$w2+$a1+$a2+$l1+$l2;
                            $avg_du = intval($total_duration/($tday *3600));
                            $mn = intval($total_duration/($tday ));
                             @endphp
                            <label for="">Average Working Time:</label>  {{date('H:i:s',$mn)}} 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           
                            <label for="">Extra Working Hour during Working Day:</label> 
                        </div>
                        <div class="col-md-6"> <label for="">Extra Working Hour without Working Day:</label> 6</div>
                    </div>
                </div>

            </div>
            <!-- /.card -->
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

{{-- subs --}}

    
@endsection

{{-- @section('main-footer')
@parent
@endsection

@section('control-sidebar')
@parent
@endsection --}}
@endsection