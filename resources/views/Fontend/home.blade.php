
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
    

        <div class="ContentView">
              <div class="homeHeader">
                <h1 >Mr. Hoàng</h1>
                <hr class="hr1">
                <h5>Web developer & PHP</h5>
              </div>
              <article class="article">
                <div class="textarticle1 col-sm-12">
                  Hello ! My name is Le Duc Giac Hoang. I am a website developer. I study at FPT Danang College of Practice. My specialty is website design. You can download my CV information. Thanks.
                </div>

                <div class="textarticle2 col-sm-4">
                  <a href="file/LE_DUC_GIAC_HOANG_CV.pdf" download>Le-Duc-Giac-Hoang-CV.pdf</a>
                </div>

                <div class="col-sm-3 col-xs-3">
                  <img src="https://i.pinimg.com/originals/6a/8a/93/6a8a93567a289f00b8ed65fd1cfe3bff.gif" alt="">
                </div>
              </article>
          </div>
        </div>
          
      @endsection
      
  </body>
</html>