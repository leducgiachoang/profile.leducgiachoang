
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/home.css">
    
 </head>
  <body>
    @extends('LayoutFontEnd')
      @section('title','Home')
      @section('content')
    <div class="containerx">
        <link rel="stylesheet" href="css/style.css">
        <div class="ContentView">
          @if (session('notify'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('notify') }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          @endif
            <div class="form sign-in">
              <h2>Sign In</h2>
              <form action="{{ route('post.login') }}" method="POST">
                  @csrf
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email">
                    @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </label>
                  <label>
                    <span>Password</span>
                    <input type="password" name="password">
                    @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </label>
                  <button class="button submit" type="submit">Sign In</button>
              </form>
              
              <a href="{{ route('get.registered') }}"><button class="button sinup" type="button">Sign Up</button></a>
              <p class="forgot-pass">Forgot Password ?</p>
        
              <div class="social-media">
                <ul>
                  <li><img src="images/facebook.png"></li>
                  <li><img src="images/twitter.png"></li>
                  <li><img src="images/linkedin.png"></li>
                  <li><img src="images/instagram.png"></li>
                </ul>
              </div>
            </div>
        
          
          </div>
        <script type="text/javascript" src="js/script.js"></script>
    </div>
      </div>
      @endsection
      
  </body>
</html>