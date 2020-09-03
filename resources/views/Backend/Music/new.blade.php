<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
</head>
<body>
    @extends('LayoutFontEnd')
      @section('title','Add new Music')
      @section('content')
      <link rel="stylesheet" href="css/BackendCss.css">
      <div class="containerx">

        <div class="ContentView">
              <h2 class="titleTool">Add new music</h2>

              <div class="formInfoAdmin">
                  <form action="">
                      <div class="form-group">
                        <Strong style="color: crimson">*</Strong> <label class="titleInput" for="nameSong">Name</label>
                        <input type="text" class="form-input">
                      </div>

                      <div class="form-group">
                        <Strong style="color: crimson">*</Strong> <label class="titleInput" for="nameSong">Name</label>
                        <input type="text" class="form-input">
                      </div>

                      <div class="form-group">
                        <Strong style="color: crimson">*</Strong> <label class="titleInput" for="nameSong">Name</label>
                        <input type="text" class="form-input">
                      </div>

                      <div class="form-group">
                        <Strong style="color: crimson">*</Strong> <label class="titleInput" for="nameSong">Name</label>
                        <input type="text" class="form-input">
                      </div>
                      
                  </form>
              </div>
        </div>
        </div>
          
      @endsection
</body>
</html>