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
                            <h2 class="content-header-title float-left mb-0">Manage Memebers</h2>
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
                                    <form class="needs-validation" novalidate method="POST" action="{{ route('member.store') }}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Name</label>

                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="username" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Date Of Birth</label>

                                            <input type="date" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="dob" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="email" :value="old('email')" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Gender</label>
                                    <select name="gender" class="form-control">
                                           <option value="">Select Gender</option>
                                           <option value="M">Male</option>
                                           <option value="F">Female</option>
                                     </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Address</label>
                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="address" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">Phone</label>
                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="contact_no" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <label for="customFile1">Cover Photo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile1" name="profile_photo_path" required />
                                                <label class="custom-file-label" for="customFile1">Choose profile pic</label>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="select-country1" >Status</label>
                                            <select class="form-control" name="approved" required>
                                                <option value="" disabled>Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                               
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-addon-name">UserName</label>
                                            <input type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" name="name" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>

                                         <div class="form-group">
                                        <label class="form-label" for="register-password">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" required autocomplete="new-password" tabindex="3" />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    
                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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