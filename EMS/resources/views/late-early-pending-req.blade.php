@extends('index')
@section('title', 'Late Early pending requests')
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
                <h4>Pending Request</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Attendance </a></li>
                    <li class="breadcrumb-item"><a href="#">Req_pending</a></li>
                    <li class="breadcrumb-item active">Pending Request</li>
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
    
{{-- Approval Request --}}
    <div class="col-12  ">
        <div class="card card-info">
           <div class="card-header">
               <div class="row">
                   <div class="col-12">
                       <h5 class="mb-0 text-center ">
                        Approval Request: {{$ac}}
                       </h5>
                   </div>
               </div>
           </div>
        </div>
    </div>
{{-- to print emp card --}}
    <div class="col-12 mb-5">
        <div class="row d-flex justify-content-center">
            

            {{-- start from here --}}
            @foreach($employee as $e) 
       @foreach($approve as $a)
        @if($e->emp_id == $a->emp_id)
        {{-- start from here --}}
        <div class="col-md-3">
            <div class="card">
              
                <div class="card-body gap-card-header">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-0">
                                {{$a->employee->emp_id}} 
                               </p >
                                <a href="#"> {{$e->name}}  </a>
                                <p class="mb-0"> {{$e->userDesignation->designation}} </p>
                                <p class="mb-0">{{$e->department->dept_name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 bg-info">
                            <p class="mb-0  text-center">Leave Brief Info</p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <p class="mb-0"><b>Leave Type:</b>@if($a->late_req=="R") {{"Will be late to come in office"}}@elseif($a->absent_req == 'R'){{"Absent for official work outside"}}@elseif($a->early_req == 'R'){{"Have to go early from office"}}@elseif($a->special_req == 'R'){{"Special absent"}}@endif</b></p>
                               <p class="mb-0"><b>Date:</b>{{$a->date}}</p>
                               <p class="mb-0"><b>Reason:</b> {{$a->reason}}</p>
                               
                        </div>
                        
                    </div>
                    <div class="row ">
                    
                     <div class="col-12 d-flex">
                        <button type="button" class="btn  btn-sm btn-primary">Approve</button>
                        <button type="button" class="btn  btn-sm btn-warning ml-auto">Refuse</button>
                     </div>
                    
                    </div>
                </div>
               
            </div>
        </div>
        {{-- ///end one card --}}
        @endif
        @endforeach
        @endforeach
            {{-- ///end one card --}}
            
        </div>
    </div>
{{-- //Approval Request --}}



{{-- Verification Request --}}
<div class="col-12 ">
    <div class="card card-info">
       <div class="card-header">
           <div class="row">
               <div class="col-12">
                   <h5 class="mb-0 text-center ">
                    Verification Request: {{$ve}}
                   </h5>
               </div>
           </div>
       </div>
    </div>
</div>
{{-- to print emp card --}}
<div class="col-12 mb-5">
    <div class="row d-flex justify-content-center">
       @foreach($employee as $e) 
       @foreach($verify as $v)
        @if($e->emp_id == $v->emp_id)
        {{-- start from here --}}
        <div class="col-md-3">
            <div class="card">
              
                <div class="card-body gap-card-header">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-0">
                                {{$v->employee->emp_id}} 
                               </p >
                                <a href="#"> {{$e->name}}  </a>
                                <p class="mb-0"> {{$e->userDesignation->designation}} </p>
                                <p class="mb-0">{{$e->department->dept_name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 bg-info">
                            <p class="mb-0  text-center">Leave Brief Info</p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <p class="mb-0"><b>Leave Type:</b>@if($v->late_req=="R") {{"Will be late to come in office"}}@elseif($v->absent_req == 'R'){{"Absent for official work outside"}}@elseif($v->early_req == 'R'){{"Have to go early from office"}}@elseif($v->special_req == 'R'){{"Special absent"}}@endif</b></p>
                               <p class="mb-0"><b>Date:</b>{{$v->date}}</p>
                               <p class="mb-0"><b>Reason:</b> {{$v->reason}}</p>
                               
                        </div>
                        
                    </div>
                    <div class="row ">
                    
                     <div class="col-12 d-flex">
                        <button type="button" class="btn  btn-sm btn-primary">Verify</button>
                        <button type="button" class="btn  btn-sm btn-warning ml-auto">Refuse</button>
                     </div>
                    
                    </div>
                </div>
               
            </div>
        </div>
        {{-- ///end one card --}}
        @endif
        @endforeach
        @endforeach
    </div>
</div>
{{-- //Verification Request --}}


</div>



@endsection
<!-- end editing-->
@endsection
@endsection
@endsection

@section('script')
@parent
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection


<!-- jquery for search bar purposes -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


@endsection