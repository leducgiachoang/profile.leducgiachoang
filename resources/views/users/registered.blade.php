
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
                <h2>Sign Up</h2>
                <form action="{{ route('post.registered') }}" method="POST">
                    @csrf
                    <label>
                        <span>Name</span>
                        <input type="text" name="fullname">
                        @error('fullname')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </label>
                      <label>
                        <span>Email</span>
                        <input type="email" name="email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </label>

                      <label>
                        <span>Phone</span>
                        <input type="tel" name="phone">
                        @error('phone')
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
                      <label>
                        <span>Confirm Password</span>
                        <input type="password" name="confirm_password">
                        @error('confirm_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </label>
                      <button type="submit" class="button submit">Sign Up Now</button>
                </form>
                
              <p class="forgot-pass">Forgot Password ?</p>

            </div>
        
          
          </div>
        <script type="text/javascript" src="js/script.js"></script>
    </div>
      </div>
      @endsection
      
  </body>
</html>