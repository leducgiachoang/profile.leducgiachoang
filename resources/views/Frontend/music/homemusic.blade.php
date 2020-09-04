
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
    
        <link rel="stylesheet" href="css/frontend/homemusic.css">
        
          <div class="row">
            <div class="col-sm-6">
              <div class="row">
                @foreach ($dbcategorysongs as $dbcategorysong)
                <div class="categorySong col-sm-6">
                  <div class="Boxcatesong">
                    <img src="images/categorysong/{{ $dbcategorysong->ImageCategorySong }}" alt="">
                    <p>{{ $dbcategorysong->nameSong }}</p>
                  </div>
                </div>
                @endforeach
              </div>
              
            </div>
            <div class="col-sm-6">
              

              <table class="tableList table table-hover table-dark">
                
                <tbody>
                  <?php $a = 1 ?>
                  @foreach ($dbsongs as $dbsong)
                  <tr>
                    <th scope="row">{{ $a }}</th>
                    
                      <td >
                        <a style="color: white;text-decoration: none" href="{{ route('get.fr.song.show',['id'=>$dbsong->id,'name'=>$dbsong->NameSong]) }}"><strong>{{ $dbsong->NameSong }}</strong>- <i>{{ $dbsong->CategotySinger->NameSinger }}</i></a>
                      </td>
                    
                    
                  </tr>
                  <?php $a++ ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
            
             
        </div>
        </div>
          
      @endsection
      
  </body>
</html>