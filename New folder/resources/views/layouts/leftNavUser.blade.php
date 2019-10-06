 

<body style=""> 
            @guest 
                @if (Route::has('register')) 
                
                @endif
            @else 
            
    <div class="wrapper"  >
            <!-- Sidebar Holder -->


            
            <nav id="sidebar" style=" height: 2000px; background-color:white">
                
            <div class="sidebar-header row justify-content-center"> 
                    <img src="{{Auth::user()->userImage()}}" alt="" class="w-50 rounded-circle"> 
                </div> 
                <div class="sidebar-header row justify-content-center">
                    <h3>{{Auth::user()->name}}</h3>  
                    <strong>{{Auth::user()->name[0]}}</strong> 
                </div> 
                {{--S left navbar option  --}}
                    @include('layouts.leftNavOption')
                {{-- E left navbar option --}}
                                
         
                </nav>

                <!-- Page Content Holder -->
                <div class="pt-3 w-100 pr-5 pl-2">
        
        
        
                   {{-- s navpage --}}

<nav class="navbar navbar-expand-lg navbar-light bg-light mr-3 ml-3"  >
        <div class="pl-3">

            <button type="button" id="sidebarCollapse" class=" btn btn-info navbar-btn">
                <i class="glyphicon glyphicon-align-left"></i>
                <span>Hide</span>
            </button>
            
        </div>
        <div class="collapse navbar-collapse pr-3 " id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                <li class="nav-item active">
                    {{-- put a stuff here --}}
                </li>

            </ul>
            {{-- <a href="/users/create">New User</a> --}}
        </div>
    </nav> 
 
{{-- s navpage --}}
            @endguest
 
            <main class="">
                @yield('content')
            </main>
            
        </div>
    </div>





 
