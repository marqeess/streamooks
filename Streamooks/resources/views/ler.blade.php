<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" type="image/png" href="{!! asset('images/logo.png') !!}"/>
        <link rel="stylesheet" href="../reader/css/normalize.css">
        <link rel="stylesheet" href="../reader/css/main.css">
        <link rel="stylesheet" href="../reader/css/popup.css">
<link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
        <script src="../reader/js/libs/jquery.min.js"></script>

        <script src="../reader/js/libs/zip.min.js"></script>
        <script src="{!! asset('js/jquery.min.js') !!}"></script>

        <script>

        $(function(){

            $('.form').submit(function(){
              $.ajax({
                url: 'salvar',
                type: 'POST',
                data: $('.form').serialize(),
              });
              return false;
            });
        });


        </script>

        <script>
            "use strict";

            document.onreadystatechange = function () {
              if (document.readyState == "complete") {
                EPUBJS.filePath = "js/libs/";
                EPUBJS.cssPath = window.location.href.replace(window.location.hash, '').replace('index.html', '') + "css/";
                // fileStorage.filePath = EPUBJS.filePath;

                window.reader = ePubReader("../arquivos/{{$livro->local}}/");
              }
            };

        </script>

        <!-- File Storage -->
        <!-- <script src="js/libs/localforage.min.js"></script> -->

        <!-- Full Screen -->
        <script src="../reader/js/libs/screenfull.min.js"></script>

        <!-- Render -->
        <script src="../reader/js/epub.min.js"></script>

        <!-- Hooks -->
        <script src="../reader/js/hooks.min.js"></script>

        <!-- Reader -->
        <script src="../reader/js/reader.min.js"></script>

        <!-- Plugins -->
        <!-- <script src="js/plugins/search.js"></script> -->

        <!-- Highlights -->
        <!-- <script src="js/libs/jquery.highlight.js"></script> -->
        <!-- <script src="js/hooks/extensions/highlight.js"></script> -->

    </head>
    <body>
      <div id="sidebar">
        <div id="panels">
          <input id="searchBox" placeholder="Pesquisar" type="search">

          <a id="show-Search" class="show_view icon-search" data-view="Search">Search</a>
        

        </div>
        <div id="tocView" class="view">
        </div>
        <div id="searchView" class="view">
          <ul id="searchResults"></ul>
        </div>
        <div id="bookmarksView" class="view">
          <ul id="bookmarks"></ul>
        </div>
        <div id="notesView" class="view">
        <br />
          <div id="new-note">
            <textarea id="note-text" rows="10" cols="50">adsadasd</textarea>
            <button id="note-anchor">Anchor</button>
          </div>
          <ol id="notes"></ol>
        </div>
      </div>
      <div id="main">

        <div id="titlebar">
          <div id="opener">
            <a id="slider" class="icon-menu">Menu</a>
          </div>
          <div id="metainfo">
            <span id="book-title"></span>
            <span id="title-seperator">&nbsp;&nbsp;–&nbsp;&nbsp;</span>
            <span id="chapter-title"></span>
          </div>
          <div id="title-controls">
         <a> <form class="form" method="post" action="salvar">
{{csrf_field()}}
<input type="hidden" name="user_id" value="{{ Auth::id()}}">
<input type="hidden" name="livro_id" value="{{$livro->id}}">
<input type="hidden" name="pagina" id="pagina" value="testeee">
<input type="submit" >
</form>
</a>

            <a id="setting" class="icon-cog">Settings</a> 
            
          
            
            <a id="fullscreen" class="icon-resize-full">Fullscreen</a>
          </div>
        </div>

        <div id="divider"></div>
        <div id="prev" class="arrow">‹</div>
        <div id="viewer"></div>
        <div id="next" class="arrow">›</div>

        <div id="loader"><img src="img/loader.gif"></div>
      </div>
      <div class="modal md-effect-1" id="settings-modal">
          <div class="md-content">
              <h3>Configurações</h3>
              <div>
                  <p>Teste de configurações</p>
              </div>
              <div class="closer icon-cancel-circled"></div>
          </div>
      </div>

     
      <div class="overlay"></div>

      <script>
      
     // var botao = document.getElementById('next');

     // botao.addEventListener('click', function(e){
       
      ///  var hash = window.location.hash.substr(1);

      //  alert(hash);
        //encontra o input hash

        //adiciona a variavel hash dentro dov value do input

        //submete o form
     //   document.getElementById("formulario").submit();
      });
      
      </script>

    </body>
</html>
