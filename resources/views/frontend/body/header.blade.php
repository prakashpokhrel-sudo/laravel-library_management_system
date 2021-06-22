 <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <h1 style="color: #fff;">Oreland College </h1></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li class="active"> <a href="index.html">Home</a> </li>
                                 <li> <a href="about.html">About us</a> </li>
                                 <li><a href="books.html">Our Books</a></li>
                                 <li><a href="library.html">library</a></li>
                                 <li><a href="contact.html">Contact us</a></li>
                                 <li class="mean-last"><div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
   @if(empty(Auth::user()))
  <a href="#"><img src="/frontend/images/top-icon.png" alt="#" /></a>
  @else
  
                                @endif
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  @guest
   @if (Route::has('login'))
    <a class="dropdown-item" href="{{route('login')}}">login</a>
    @endif
     @if (Route::has('register'))
    <a class="dropdown-item" href="{{route('register')}}">Register</a>
   @endif
    @else

    <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           
               
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
  </div>


  </div>
 </li>
                                 <li class="mean-last"> <a href="#"><img src="/frontend/images/search_icon.png" alt="#" /></a> </li>

   
 

                                 
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <!-- end header inner -->
      </header>

      <style>
   button a{
      border-radius: 25px;;
   }
      
      .dropdown:hover>.dropdown-menu {
  display: block;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}

      
      </style>