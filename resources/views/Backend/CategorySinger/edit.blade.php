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

              <h2 class="titleTool">Add new Category singer</h2>

              <div class="formInfoAdmin">
                  @foreach ($dbeditSinger as $itemSinger)
                  
                  <form action="{{ route('post.singer.update') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" value="{{ $itemSinger->id }}" name="id">
                      <div class="form-group">
                        <Strong style="color: crimson">*</Strong> <label class="titleInput" for="nameSong">Name</label>
                        <input type="text" value="{{ $itemSinger->NameSinger }}"  class="form-input" name="NameSinger">
                        @error('NameSinger')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                          <img width="200px" src="images/categorysinger/{{ $itemSinger->ImageSinger }}" alt="">
                      </div>

                      <div class="form-group">
                        <Strong style="color: crimson">*</Strong> <label class="titleInput" for="nameSong">Image</label>
                        <input type="file" class="form-input" name="XImageSinger">
                        <input type="hidden" name="ImageSinger" value="{{ $itemSinger->ImageSinger }}">
                       @error('XImageSinger')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <Strong style="color: crimson">*</Strong> <label class="titleInput" for="nameSong">Image</label>
                        <textarea name="description" class="form-texarea" id="" cols="30" rows="10">{{ $itemSinger->description }}</textarea>
                       @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                     <div class="form-group">
                         <button type="submit" class="submitYes">Submit</button>
                         <button type="reset" class="submitYes">Reset</button>
                     </div>
                      
                  </form>

                      
                  @endforeach
              </div>
              
        </div>
        <div class="ContentView">
            <div class="formInfoAdmin">
                <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"> Singer Name</th>
                        <th scope="col"> Singer Image</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $a=1 ?>
                    @foreach ($dbsinger as $item)
                      <tr>
                        <th scope="row">{{ $a }}</th>
                        <td>{{ $item->NameSinger }}</td>
                        <td><img width="50px" height="30px" src="images/categorysinger/{{ $item->ImageSinger }}" alt=""></td>
                        <td>
                            <a href="{{ route('get.singer.update',['id'=> $item->id]) }}"><button type="button" class="btn btn-danger"><i class="fas fa-edit"></i></button></a>
                            <a href="{{ route('get.singer.delete',['id'=> $item->id]) }}"><button type="button" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button></a>
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