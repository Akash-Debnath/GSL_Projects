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
                <h1>Leave at a Glance</h1>
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

<div class="row">
    <!-- leave request by year table -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header ">
                @php
                // $leaves_array = array(
                // 'HL'=>'Half Day Annual',
                // 'AL'=>'Annual',
                // 'SL'=>'Sick(Ordinary)',
                // 'SLM'=>'Sick(Severe)',
                // 'PL'=>'Paternity',
                // 'ML'=>'Maternity',
                // 'WL'=>'Wedding',
                // 'LWP'=>'Without Pay',
                // 'TL'=>'Training',
                // 'SP'=>'Special',
                // 'CA' => 'Carry Forwarded Annual'
                // );
                @endphp
                <form action="" class="" method="GET">
                    @csrf
                    <div class="container-fluid">
                        <div class="row gap-5">
                            <div class="col-md-3">

                                <select id="year" class="form-control" name="year">
                                    <option value="" selected hidden> Leave In </option>
                                    <?php $from=date('2009-01-01'); $to=date('Y-m-d'); $startTime=strtotime( $from );
                                        $endTime=strtotime( $to ); 
                                        
                                        
                                        for($i = $startTime; $i <= $endTime; $i = $i + (86400*366)){
                                            $thisDate = date('Y',$i);?>
                                    <option>
                                        <?php echo $thisDate; ?>
                                    </option>
                                    <?php 
                                            }
                                            ?>

                                </select>

                            </div>

                            <div class="col-md-3 mt-md-0 mt-2 ml-auto">

                                <select class="form-control select2" name="depart" style="width: 100%;">
                                    <option value="" selected hidden> --Department-- </option>
                                    @foreach($dept as $d)
                                    <option value="{{$d->dept_code}}">{{$d->dept_name}}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-3 mt-md-0 mt-2 ml-auto">


                                <select class="form-control select2" name="type" style="width: 100%;">
                                    <option value="" selected hidden> --Leave Type-- </option>
                                    @foreach( $leaves_array as $ltype)
                                    <option value="{{$ltype->option_code}}">{{$ltype->option_value}}</option>
                                    @endforeach

                                </select>


                            </div>
                            <div class="col-md-2 mt-md-0 mt-2 ml-auto">

                                {{-- <button class="btn btn-info form-control"> <span class="fas fa-search"></span>
                                    Search</button> --}}
                                <input class="btn btn-info form-control" type="submit" value="search" name="search">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body   d-flex justify-content-center">

                <div class="col-12 overflow-auto">
                    <table class="table table-bordered table-hover leave-glance">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle" >ID</th>
                                <th style="vertical-align: middle" >Name</th>

                                <?php $tp="";
                                         $dp="";
                                         $year="";
                                    if (isset($_GET['search'])) {
                                        $tp  = $_GET['type'];
                                        $dp  = $_GET['depart'];
                                        $year = $_GET['year']; ?>

                                @foreach($leaves_array as $type)
                                @if($tp == $type->option_code )
                                <th style="vertical-align: middle" class="text-center">{{$type->option_value}} </th>
                                @elseif(empty($tp))
                                <th style="vertical-align: middle" class="text-center">{{$type->option_value}} </th>

                                @endif
                                @endforeach

                                <?php  } else { ?>
                                @foreach($leaves_array as $type)

                                <th style="vertical-align: middle" class="text-center">{{$type->option_value}} </th>




                                @endforeach
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                             
                            @foreach($dept as $d)
                          
                            {{-- dept code --}}
                            @if($dp == $d->dept_code )
                           
                            <tr class="bg-primary" >
                                <td  colspan="<?php echo count($leaves_array) + 2; ?>" >
                                    <h5 class="ml-1 mb-0">
                                        {{$d->dept_name}} 
                                    </h5>
                                </td>
                            </tr>
                          
                            @foreach ($d->employee as $e)

                            @if($e->archive!='Y')
                              
                            <tr data-widget="expandable-table" aria-expanded="true">
                                <td  >{{$e->emp_id}}</td>
                                <td>{{$e->name}} </td>
                                @foreach($leaves_array as $type)
                                @if($tp==$type->option_code)
                                <td  class="text-center">
                                    <?php $i=0; $la=array();?>
                                    @foreach($e->leave as $l)
                                    @if(($l->leave_type == $type->option_code) && date('Y', strtotime($l->leave_start)) == $year && ($l->m_approved_date!=NULL)&&($l->admin_approve_date!=NULL) )
                                    {{-- {{$l->period}} --}}
                                    @php array_push($la,$l->period); @endphp
                                    <?php $i++; ?>
                                    @endif

                                    @endforeach
                                    {{-- {{$i}} --}} @php print_r(array_sum($la)); @endphp

                                </td>
                                @elseif(empty($tp))
                                <td class="text-center">
                                    <?php $i=0; $la=array(); ?>
                                    @foreach($e->leave as $l)
                                    @if(($l->leave_type == $type->option_code) && date('Y', strtotime($l->leave_start)) == $year && ($l->m_approved_date!=NULL)&&($l->admin_approve_date!=NULL) )
                                    {{-- {{$l->period}} --}}
                                    @php array_push($la,$l->period); @endphp
                                    <?php $i++; ?>
                                    @endif

                                    @endforeach
                                    {{-- {{$i}} --}}
                                    @php print_r(array_sum($la)); @endphp
                                </td>

                                @endif
                                @endforeach


                            </tr>
                            @endif

                            @endforeach
                            {{--finish with dept code --}} @elseif (empty($dp))






                            <tr class="bg-primary" role="alert">
                                <td colspan="<?php echo count($leaves_array) + 2; ?>" >
                                    <h5 class="ml-1 mb-0">
                                        {{$d->dept_name}}
                                    </h5>
                                </td>
                            </tr>

                            @foreach ($d->employee as $e)

                            @if($e->archive!='Y')
                            <tr data-widget="expandable-table" aria-expanded="true">
                                <td >{{$e->emp_id}}</td>
                                <td >{{$e->name}} </td>
                                @foreach($leaves_array as $type)
                                @if($tp==$type->option_code)
                                <td class="text-center">
                                    <?php $i=0; $la = array(); ?>
                                    @foreach($e->leave as $l)
                                    @if(($l->leave_type == $type->option_code) && date('Y', strtotime($l->leave_start)) == $year && ($l->m_approved_date!=NULL)&&($l->admin_approve_date!=NULL) )
                                    {{-- {{$l->period}} --}}
                                    @php array_push($la,$l->period); @endphp
                                    <?php $i++; ?>
                                    @endif

                                    @endforeach
                                    {{-- {{$i}} --}}
                                    @php print_r(array_sum($la)); @endphp
                                </td>
                                @elseif(empty($tp))
                                <td class="text-center">
                                    <?php $i=0; $la = array();?>
                                    @foreach($e->leave as $l)
                                    @if(($l->leave_type == $type->option_code) && date('Y', strtotime($l->leave_start)) == $year && ($l->m_approved_date!=NULL)&&($l->admin_approve_date!=NULL))
                                    {{-- {{$l->period}} --}}
                                   @php array_push($la,$l->period); @endphp
                                    <?php $i++; ?>
                                    @endif

                                    @endforeach
                                    {{-- {{$i}} --}}
                                    @php print_r(array_sum($la)); @endphp
                                </td>

                                @endif

                                {{-- searching without dept code finish --}}
                                @endforeach


                            </tr>
                            @endif
                            @endforeach

                            @endif











                            @endforeach



                        </tbody>
                    </table>
                </div>
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



{{-- @section('main-footer')
@parent
@endsection

@section('control-sidebar')
@parent
@endsection --}}
@endsection