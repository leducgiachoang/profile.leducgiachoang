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
          @if (session('notify'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('notify') }}
                <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </a>
            </div>
            @endif
              <h2 class="titleTool">Add new music</h2>

              <div class="formInfoAdmin">
                  <form action="{{ route('post.music.new') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                      <div class="form-group">
                        <Strong style="color: crimson">*</Strong> <label class="titleInput" for="nameSong">Name</label>
                        <input type="text" class="form-input" name="NameSong">
                        @error('NameSong')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-6">
                          <Strong style="color: crimson">*</Strong> <label class="titleInput" for="">Image</label>
                          <input type="file" name="ImageSong" class="form-input">
                          @error('ImageSong')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-sm-6">
                          <Strong style="color: crimson">*</Strong> <label class="titleInput" for="">File Song</label>
                          <input type="file" name="fileSong" class="form-input">
                          @error('fileSong')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-6">
                          <Strong style="color: crimson">*</Strong> <label class="titleInput" for="">Category Songs</label>
                          <select name="idCategorySong" class="form-input" id="">
                            @foreach ($dbcategorysongs as $dbcategorysong)
                            <option value="{{ $dbcategorysong->id }}">{{ $dbcategorysong->nameSong }}</option>
                            @endforeach
                            
                          </select>
                          @error('idCategorySong')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-sm-6">
                          <Strong style="color: crimson">*</Strong> <label class="titleInput" for="">Singer</label>
                          <select name="idSinger" class="form-input" id="">
                            @foreach ($dbsingers as $dbsinger)
                            <option value="{{ $dbsinger->id }}">{{ $dbsinger->NameSinger }}</option>
                            @endforeach
                          </select>
                          @error('idSinger')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>

                        
                        
                      </div>

                      <div class="form-group">
                        <Strong style="color: crimson">*</Strong> <label class="titleInput" for="nameSong">Lyrics</label>
                        <textarea name="Lyrics" class="form-texarea" id="" cols="30" rows="10"></textarea>
                       @error('Lyrics')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <button type="submit" class="submitYes">Submit</button>
                        <button type="reset" class="submitYes">Reset</button>
                      </div>
                      
                  </form>
              </div>
        </div>
        <div class="ContentView">
          <div class="formInfoAdmin">
              <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col"> Songs Name</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $a=1 ?>
                  @foreach ($dbsongs as $dbsong)
                    <tr>
                      <th scope="row">{{ $a }}</th>
                      <td>{{ $dbsong->NameSong }}</td>
                      <td>
                        <audio style=" width: 107px;height: 30px;outline: none" controls>
                          <source src="images/filesong/{{ $dbsong->fileSong }}" type="audio/mpeg">
                        </audio>
                      </td>
                      <td>
                          <a href="{{ route('get.music.update',['id'=> $dbsong->id]) }}"><button type="button" class="btn btn-danger"><i class="fas fa-edit"></i></button></a>
                          <a href="{{ route('get.music.delete',['id'=> $dbsong->id]) }}"><button type="button" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button></a>
                      </td>
                  </tr>
                  <?php $a++ ?>
                  @endforeach
                  </tbody>
                </table>
          </div>
      </div>
        </div>
          
      @endsection
</body>
</html>