@extends('admin.admin_master')
@section('content')



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>



  
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">DataTables</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Datatable</a>
                                    </li>
                                    <li class="breadcrumb-item active">Basic
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
            
                <!-- Multilingual -->
                <section id="multilingual-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                             @if(Auth::guard('admin')->id(1))
                                <div class="card-header border-bottom">
                                  <a href="{{route('book.create')}}"> <button class="btn btn-success"> Add Books</button></a> 
                                </div>
                                @endif
                                <div class="card-datatable">
                                    <table class="dt-multilingual table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Cover Photo</th>
                                                <th>Name</th>
                                                <th>Author</th>
                                                <th>Quantity</th>
                                                <th>Available</th>
                                               <th>Code No</th>
                                                 @if(Auth::guard('admin')->id())
                                                <th>Action</th>
                                                  @endif
                                            </tr>
                                            <tbody>
                                            @foreach($book as $key=>$row)
                                            @if($row->book_status==1)
                                            <tr>
                                            <td>1</td>
                                            <td>
                                            <img src="{{Storage::url($row->coverphoto)}}" alt="" width="100px" height="100px;">
                                            </td>
                                             <td>{{$row->name}}</td>
                                             <td>{{$row->author}}</td>
                                             <td>{{$row->quantity}}</td>
                                             <td>
                                           {{$row->available}}
                                             </td>
                                            
                                            <td>{{$row->code_no}}</td>
                                          
                                            
                                  @if(Auth::guard('admin')->id())          
                                             <td>
                 <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$row->id}}"><span>Delete</span></button>

                          <!-- Modal -->
   <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form action="{{route('book.destroy',$row->id)}}" method="post">@csrf
    @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         Once deleted can never can be recovered            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
    </form>
  </div>
</div>







<a href="{{route('book.edit',[$row->id])}}">
                     <button class="btn btn-info btn-sm"><span>Edit</span> </button>
                    
                    </a> 
                           

                                            </td>
                                            @endif
                                              </tr>
                                           @endif
                                            @endforeach
                                            </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Multilingual -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <script>

    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

@endsection