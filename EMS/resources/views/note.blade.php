@extends('index')
@section('title', ' ~ Note')
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
                <h1>Note List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Settings</a></li>
                    <li class="breadcrumb-item"><a href="#">Note</a></li>
                    <li class="breadcrumb-item active">Note List</li>
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
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <button type="button" class="btn btn-info ml-auto  " data-toggle="modal" data-target="#modal-default">
                    <span class=" fas fa-plus "> </span> Add Note
                </button>
        
        
        
                <!-- modal -->
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title ">Add a New Note</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                        <div class="gap">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="date">Date</label>
                                                    <input type="date" placeholder="Enter.." id="date" name="date"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="subject">Subject</label>
                                                    <input type="text" placeholder="Enter.." id="subject" name="subject"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="d-block" for="desc">Note</label>
                                                    <textarea class="form-control" name="note" id="note" cols="30"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        
                                        <div class="row  ">
                                            <div class="col-12 d-flex justify-content-between">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Save Changes</button>
                                            </div>
                                        </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--////modal--finish  -->
        
        
        
        
        
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered  selectpicker" data-live-search="true">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Subject</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $j = $notes->currentPage() == 1 ? 0 : ($notes->currentPage() - 1) * 20 ?>
                        @foreach ($notes as $note)
                        <td>{{ ++$j }}</td>
                        <td>{{ $note->date }}</td>
                        <td>{{ $note->subject }}</td>
                        <td>
                           <div class="row d-flex justify-content-center">
                                <!-- to view -->
                            <a class="btn btn-sm btn-primary" onclick="show()" data-toggle="modal" data-target="#view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </a>
                            <!-- to edit -->
                            <a type="button" class="btn btn-sm btn-info ml-1  " data-toggle="modal" onclick="getData({{ $note->id }})" data-target="#edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                            <!-- to delete -->
                            <form action="{{ route('note.destroy', $note->id ) }}" method="post" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Are you sure want to delete this note?')"> <svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                    </svg> </button>
                            </form>
                           </div>
                        </td>
                        </tr>
                        @endforeach
                        <tr>
                    </tbody>
                </table>


                  <!-- modal -->
                  <div class="modal fade" id="edit">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title ">Edit Note</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('update-note') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="noteId" value="" id="noteId" />
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="date">Date</label>
                                                <input type="datetime" placeholder="Enter.." id="from" name="date"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="subject">Subject</label>
                                                <input type="text" placeholder="Enter.." id="sub" name="subject"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="d-block" for="desc">Note</label>
                                                <textarea class="form-control" name="note" id="details" cols="30"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                    
                                    <div class="row  ">
                                        <div class="col-12 d-flex justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--////modal--finish  -->

                <!-- modal -->
                <div class="modal fade" id="view">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title ">Edit Note</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <div class="gap">
                                <div class="row">
                                    <div class="col-12">
                                      
                                    
                                    <p class="mb-0"><b>Date:</b> 2010-01-13 10:34:45</p>
                                    </div>
                                </div>
 
                                <div class="row">
                                 <div class="col-12">
                                   
                                
                                 <p class="mb-0"> <b>Subject:</b> Attendance of Towheed Mahmood</p>
                                 </div>
                             </div>
 
                             <div class="row">
                                 <div class="col-12">
                                   
                                 
                                 <p class="mb-0 text-justify"><b>Note :</b> Mr. Towheed Mahmood was present in the office in his duty for two shifts from 07:00 am to 11:00 pm consecutively but he hasnt punched his card because of leaving that in house forgottenly.</p>
                                 </div>
                             </div>

                             <div class="row">
                                <div class="col-md-2 ml-auto">
                                    <button type="button" class="btn btn-danger btn-sm form-control" data-dismiss="modal">Close</button>
                           
                                </div>
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
            <div class="card-footer overflow-auto ">
                {!! $notes->Links('pagination::bootstrap-4') !!}
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
@section('add-script')

{{-- <script src="{{ asset('scripts/jquery.js') }}"></script> --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

function getData(id) {
    $('#noteId').val(id);
    $.ajax({
            type: "GET",
            url: "edit-note/"+id,
            success: function(response){
                $('#from').val(response.notes.date);
                $('#sub').val(response.notes.subject);
                $('#details').val(response.notes.note);
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                console.log(errorMessage) ;
            }
        });
}

</script>

@endsection
@endsection