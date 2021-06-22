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
                                <div class="card-datatable">
                                    <table class="dt-multilingual table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Book Issue ID</th>
                                                <th>Book Name</th>
                                                <th>Member ID</th>
                                                <th>Member Name</th>
                                                <th>Issue Date</th>
                                               
                                                <th>Due date</th>
        
                                                <th>Return Status</th>
                                            </tr>
                                            <tbody>
                                            @foreach($logs as $key=>$row)
                                            <tr>
                                            <td>#</td>
                                             <td>{{$row->book_issue_id}}</td>
                                             <td>{{$row->name}}</td>
                                             <td>{{$row->user_id}}</td>
                                             <td>{{$row->name}}</td>
                                            <td>{{$row->issued_at}}</td>
                                            <td>{{$row->return_time}}</td>
	
                                            
                                             <td>

              

             @if($row->return_time !== 10) 
              <span class="badge badge-success"> Pending </span>
              @else 
              <span class="badge badge-danger">Return Successfully</span> 
              @endif   
            
                         </td>


                                              </tr>
                                           
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