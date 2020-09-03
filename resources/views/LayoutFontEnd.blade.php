<!doctype html>
<html lang="en">
  <head>
    <base href="{{ asset('') }}">
    <title>@yield('title') - Lê Đức Giác Hoàng</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/layout.css">
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/layout.js"></script>
</head>
  <body style="background: #e6e6e6">
    

      <div>
       
        <div class="container">
          <div class="containerx">
            <div class="ContentView">
              <div class="formSearch">
                <form  action="">
                  <input type="search" class="inputSearch" placeholder="Search">
                </form>
              </div>
            </div>
          </div>
            @yield('content')
        </div>

        <div>
          <div class="slidebar">
              
              <h2><i class="fab fa-android"></i>
                  <br>Lê Đức Giác Hoàng</h2>
                  <div class="icon_categoy">
                      <i class="fas fa-align-justify"></i>
                  </div>
                  <div class="icon_categoyExit">
                      <i class="fas fa-times"></i>
                  </div>
                  <hr class="hro">
              <ul class="categorymenu">
                  
                  <li><a href="#"><i class="fas fa-home"></i> Home</a></li>

                <!-- Phần menu giao diện người dùng chưa đăng nhập -->
                  @if (!(Auth::check()))
                
                  <li><a href=""><i class="fas fa-snowboarding"></i> Know me</a></li>
                  <li><a href=""><i class="fas fa-skull-crossbones"></i> My skills</a></li>
                  <li><a href=""><i class="fas fa-tasks"></i> My projects</a></li>
                  <li><a href=""><i class="fas fa-rss-square"></i> Blog</a></li>
                  <li><a href=""><i class="fas fa-id-card-alt"></i> Contact</a></li>

                  
                  @endif
            <!-- Phần menu giao diện người dùng đã đăng nhập -->
                  @if ((Auth::check()))
                  @if ((Auth::user()->role) != 1)
                  <li><a href=""><i class="fas fa-snowboarding"></i> Know me</a></li>
                  <li><a href=""><i class="fas fa-skull-crossbones"></i> My skills</a></li>
                  <li><a href=""><i class="fas fa-tasks"></i> My projects</a></li>
                  <li><a href=""><i class="fas fa-rss-square"></i> Blog</a></li>
                  <li><a href=""><i class="fas fa-id-card-alt"></i> Contact</a></li>

                  @endif
                  @endif

                  <!-- Phần quản lý của admin -->
                  @if (Auth::check())
                  @if ((Auth::user()->role) == 1)

                  <!-- Default dropright button -->
                      <div style=" display: block;" class="btn-group dropright">
                        <li data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href=""><i class="fas fa-drum-steelpan"></i> Musics Category</a></li>
                        
                        <div class="dropdown-admin dropdown-menu">
                          <li><a href="{{ route('get.categorySong.new') }}"><i class="fas fa-plus-circle"></i> Add new</a></li>
                          <li><a href=""><i class="fas fa-list-ul"></i> List Music</a></li>
                        </div>
                      </div>

                      <!-- Default dropright button -->
                      <div style=" display: block;" class="btn-group dropright">
                        <li data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href=""><i class="fas fa-drum-steelpan"></i> Singer Category</a></li>
                        
                        <div class="dropdown-admin dropdown-menu">
                          <li><a href="{{ route('get.singer.new') }}"><i class="fas fa-plus-circle"></i> Add new</a></li>
                          <li><a href=""><i class="fas fa-list-ul"></i> List Music</a></li>
                        </div>
                      </div>
                  
                  <!-- Default dropright button -->
                      <div style=" display: block;" class="btn-group dropright">
                        <li data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href=""><i class="fas fa-record-vinyl"></i> Music management</a></li>
                        
                        <div class="dropdown-admin dropdown-menu">
                          <li><a href="{{ route('get.music.new') }}"><i class="fas fa-plus-circle"></i> Add new</a></li>
                          <li><a href=""><i class="fas fa-list-ul"></i> List Music</a></li>
                        </div>
                      </div>

                      <!-- Default dropright button -->
                      <div style=" display: block;" class="btn-group dropright">
                        <li data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href=""><i class="fas fa-user-cog"></i> Admin</a></li>
                        
                        <div class="dropdown-admin dropdown-menu">
                          <li><a href=""><i class="fas fa-tasks"></i> My projects</a></li>
                          <li><a href=""><i class="fas fa-rss-square"></i> Blog</a></li>
                          <li><a href=""><i class="fas fa-id-card-alt"></i> Contact</a></li>
                        </div>
                      </div>
                  @endif 
                @endif 
              </ul>
              <hr class="hro">
              <div class="iconContact">
             
                  <a href=""><i class="fab fa-facebook-square"></i></a>
                  <a href=""><i class="fab fa-youtube"></i></a>
                  <a href=""><i class="fab fa-linkedin"></i></a>
                  
                  <div class="textheader">
                    &copy; 2020, Hoang. All rights reserved
                  </div>
                </div>

              
          </div>
      </div>


      <div class="showAccout">
        <div>
          @if (Auth::check())
          {{ Auth::user()->fullname }}
          <a href="{{ route('get.logout') }}"><i class="fas fa-sign-out-alt"></i></a>
          @else
          <a href="{{ route('get.login') }}"><Button>Login</Button></a>  
          @endif
        </dìiv>
      </div>
      </div>

      <div class="showAccout2">
        <div>
          @if (Auth::check())
          <div class="NameAccount" >
            {{ Auth::user()->fullname }}
            <a href="{{ route('get.logout') }}"><i style="font-size: 10px" class="fas fa-sign-out-alt"></i></a>
          </div>
          
          @else
          <div class="NameAccount">
            <a href="{{ route('get.login') }}"><Button>Login</Button></a>  
            <a href="{{ route('get.registered') }}"><Button>Registered</Button></a>
          </div>
          
          @endif
        </dìiv>
       </div>
      </div>


     
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>