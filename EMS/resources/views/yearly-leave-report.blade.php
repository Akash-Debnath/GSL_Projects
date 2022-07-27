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
                    <form action="" class="" id="form" method="GET">
                        @csrf
                       
                            <div class="row gap-5">
                                
 {{-- {{route('emp.show')}} --}}
                                <div class="col-md-3 mt-md-0 mt-2 ">
                                  <form action="{{route('emp.show')}}" method="get" >
                                      @csrf
                                    <select  name="dept[]"  id="dept" class="select2" multiple="multiple" data-placeholder="Select Department"
                                    style="width: 100%;"  onchange="this.form.submit()">
                                    {{-- onchange="this.form.submit()" --}}
                                        {{-- <option value="" selected hidden> --Department-- </option> --}}

                                          @foreach($dept as $d)
                                          <option data-state="{{$d->dept_code}}" value="{{$d->dept_code}}">{{$d->dept_name}}</option>
                                          @endforeach

                                    </select>
                                    
                                </form>
                                

                                </div>

                                <div class="col-md-3 mt-md-0 mt-2 ml-auto">
                                   
                                    
                                    <select   name="emp[]" id="staff"  class="select2" multiple="multiple" 
                                    style="width: 100%;" >
                                        <option value="" selected disabled hidden> --Select Staff-- </option> 
                                                                          
                                         @foreach($employee as $e)
                                          
                                         <option data-state="{{$e->dept_code}}" value="{{$e->emp_id}}"value="{{$e->emp_id}}">{{$e->name}}</option>
                                         @endforeach
                                      
                                    </select>

                                </div>
                                <div class="col-md-2 mt-md-0 mt-2 ml-auto">

                                    <button class="btn btn-info form-control" type="submit" name="search"> <span class="fas fa-search"></span> Search</button>
                                </div>
                            </div>
                        
                    </form>

                   <?php
                    $emp = array();
                    $de = array();
                    if (isset($_GET["search"])) {
                        $emp = $_GET["emp"];  
                      
                       
                        
                    }
                   ?>
                </div>
                <div class="card-body overflow-auto ">
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Leave Type</th>
                                <th colspan="15" class="text-center"> year</th>
                            </tr>
                            <tr>														
                               
                                    <?php $from=date('2008-01-01'); $to=date('Y-m-d'); $startTime=strtotime( $from );
                                        $endTime=strtotime( $to ); 
                                        
                                        $year = array();
                                        for($i = $endTime; $i >= $startTime; $i = $i - (86400*366)){
                                            $thisDate = date('Y',$i);
                                           $a = array_push($year,date('Y',$i));
                                            ?>
                                    <th>
                                        <?php echo $thisDate; 
                                       ?>
                                    </th>
                                    <?php 
                                            }
                                            ?>

                                
                            </tr>
                        </thead>


                        @php
                        $leaves_array = array(
                        'HL'=>'Half Day Annual',
                        'AL'=>'Annual',
                        'SL'=>'Sick(Ordinary)',
                        'SLM'=>'Sick(Severe)',
                        'PL'=>'Paternity',
                        'ML'=>'Maternity',
                        'WL'=>'Wedding',
                        'LWP'=>'Without Pay',
                        'TL'=>'Training',
                        'SP'=>'Special',
                        'CA' => 'Carry Forwarded Annual'
                        );
                        @endphp



                        <tbody>
                            @foreach($dept as $d) 
                             @foreach($d->employee as $e) 
                              @foreach($emp as $em)
                            
                              @if(($e->emp_id == $em) ) 
                            <tr class="bg-primary" role="alert">
                                
                                <td colspan="16">
                                    <h5 class="ml-1 mb-0">
                                      {{$e->name}}
                                    </h5>
                                </td>

                               
                            </tr>
                            
                             @foreach($leaves_array as $t=>$t_value)
                            

                            <tr>
                             <td>{{$t_value}}</td>
                              @foreach($year as $y)
                              @php $i=0; $la=array(); @endphp
                               @foreach($e->leave as $l)
                                @if($l->leave_type == $t && date('Y', strtotime($l->leave_start)) == $y && ($l->m_approved_date!=NULL)&&($l->admin_approve_date!=NULL))
                                 @php $i++; array_push($la,$l->period); @endphp
                                  
                                @endif
                               @endforeach
                               <td class="text-center"> @if($t == 'HL')
                                {{$i*0.5}} 
                               @else 
                               {{-- {{$i}}  --}}
                               @php print_r(array_sum($la)); @endphp
                               @endif</td>
                              @endforeach

                            </tr>
                            
                             @endforeach

                            
                             @endif
                             
                             @endforeach
                             @endforeach
                            @endforeach
                            

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
<script>
    function submitMe() {
    $("#form").submit();
    }
    </script>
@endsection
@endsection