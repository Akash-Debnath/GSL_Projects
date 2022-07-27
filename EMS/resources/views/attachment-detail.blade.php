@extends('index')
@section('title', 'Attachment Details')
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
                <h4>Attach Detail</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"> Remark</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('attachment') }}">Attachment</a></li>
                    <li class="breadcrumb-item active">Attach Detail</li>
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
                <div class="card-header bg-info ">
                   <div class="row">
                    
                       <div class="col-md-8">
                        <p class="mb-0"><strong>Subject:</strong>{{ $attachmentDetails->subject }}</p>
                       </div>

                        <p class="mb-0 ml-md-auto "><strong>Date:</strong> {{ $attachmentDetails->message_date }} | &nbsp;<a href="{{ route('attachment.edit', $attachmentDetails->id) }}" class="btn btn-sm btn-warning  ">edit</a>&nbsp; 
                            <form action="{{ route('attachment.destroy', $attachmentDetails->id ) }}" method="post" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                            </form>
                        </p>                      
                   </div>
                   
                </div>
                <div class="card-body overflow-auto ">
                   {!! $attachmentDetails->message !!}
                </div>
                
                <hr style="border-top: dotted 2px;" />
                <h6 style="margin-left:20px">Attached Files(0) : </h6>
                <p style="margin-left:20px">Attach file : <a href="#" class="btn  btn-primary btn-xs">    Download</a></p>

                <div class="card-footer ">
                   {{-- pagination --}}
                </div>

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