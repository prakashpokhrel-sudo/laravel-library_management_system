@extends('admin.admin_master')
@section('content')


    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Book Category</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a>
                                    </li>
                                    <li class="breadcrumb-item active">Form Validation
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
                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        <!-- Bootstrap Validation -->
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Bootstrap Validation</h4>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate method="POST" action="{{route('bookrequest.store')}}" enctype="multipart/form-data">
                                     
                                    @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Book Name</label>

                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="name" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                          <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Author</label>

                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="author" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                                
                                       
                                        <div class="form-group">
                                            <label for="customFile1">Cover Photo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile1" name="coverphoto" required />
                                                <label class="custom-file-label" for="customFile1">Choose profile pic</label>
                                            </div>
                                        </div>
                                        
                                            <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Book Category</label>
                                            <select name="bookcategory_id" class="form-control @error('bookcategory_id') is-invalid @enderror" >
                                   <option value="">Select Category</option>
                                   @foreach(App\Models\Book_Category::all() as $category)
                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                                   </select>
                                        </div>
                                        
                                            <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Isbn No</label>

                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="isbn_no" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Edition Number</label>

                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="edition_no" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                          <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Edition Date</label>

                                            <input type="date" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="edition_date" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                          <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Publisher</label>

                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="publisher" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                          <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Published Date</label>

                                            <input type="date" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="published_date" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="d-block" for="validationBioBootstrap">Notes</label>
                                            <textarea class="form-control" id="validationBioBootstrap" rows="3" name="notes" ></textarea>
                                        </div>
                                        
                                         <input type="hidden" name="book_status" value="0" class="form-control" id="book_status" required>
                                          <input type="hidden" name="quantity" value="0" class="form-control" id="quantity" required>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" value="">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Bootstrap Validation -->

                        
                    </div>
                </section>
                <!-- /Validation -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


   




</html>




@endsection