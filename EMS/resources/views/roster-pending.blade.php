@extends('index')
@section('title', 'Roster Pending')
@section('wrapper')
@parent


@section('content-wrapper')
@parent
@section('content-header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Roster Pending Request</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Attendance </a></li>
                    <li class="breadcrumb-item"><a href="#">Roster pending</a></li>
                    <li class="breadcrumb-item active">Roster Request</li>
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
                       <h6 class="mb-0 text-center">
                        Approval Request: {{$total}}
                       </h6>
                   </div>
               </div>
           </div>
        </div>
    </div>
    {{-- to print emp card --}}
    <div class="col-12 mb-5">
        <div class="row d-flex justify-content-center">
            

            @foreach($employees as $emp) 
                @foreach($pendings as $pending)
                    @if($emp->emp_id == $pending->sender_id)
                    {{-- start from here --}}
                    <div class="col-md-3">
                        <div class="card">
                        
                            <div class="card-body gap-card-header">

                                <div class="row">
                                    <div class="col-12">
                                            <p><a href="{{ route('employees.show', $emp->emp_id) }}"> {{$emp->name}}</a> has requested for adding weekends more than as usual.</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 bg-info">
                                        <p class="mb-0  text-center">Request Info</p>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="col-12 ">
                                        <p class="mb-0"><b>From: </b>{{ $pending->sdate }}</p>
                                        <p class="mb-0"><b>To: </b>{{ $pending->edate }}</p>
                                        @foreach ($departments as $dept)
                                            @if ($dept->dept_code == $pending->dept_code)
                                                <p class="mb-0"><b>Department: </b>{{ $dept->dept_name }}</p>
                                            @endif
                                        @endforeach
                                        <p class="mb-0"><b>Staff(s) Id: </b>{{ $pending->emp_id }}</p>
                                        <p class="mb-0"><b>Reason: </b>{{ $pending->reason }}</p> 
                                    </div> 
                                </div>

                                <div class="row ">
                                    <div class="col-12 d-flex">
                                        <form action="{{ route('holiday-request.update', $pending->id) }}" method="post" >
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="admin_id" value="{{ Auth::user()->username }}" hidden>
                                            <button type="submit" class="btn  btn-sm btn-primary">Approve</button>
                                        </form>
                                        <form action="{{ route('holiday-request.destroy', $pending->id) }}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ml-auto"  onclick="return confirm('Are you sure want to delete this request?')">Refuse</button>
                                        </form>
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
@endsection


<!-- jquery for search bar purposes -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


@endsection