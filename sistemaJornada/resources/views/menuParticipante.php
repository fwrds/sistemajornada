<!DOCTYPE html>
<html lang="pt-br" ng-app="myApp">

<head>

  <meta charset="utf-8">
  <title>Sistema Jornada - Com Bootstrap Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/simple-sidebar.css') ?>" rel="stylesheet">
  <!-- J query -->
  <script src="<?= asset('app/lib/angular/angular.js') ?>"></script>
  <script src="<?= asset('app/lib/angular/angular-route.js') ?>"></script>
  <script src="<?= asset('js/jquery.min.js') ?>"></script>
  <script src="<?= asset('js/bootstrap.min.js') ?>"></script>

  <!-- AngularJS Application Scripts -->
  <script src="<?= asset('app/app.js') ?>"></script>
  <script src="<?= asset('app/controllers/menuAdm.js') ?>"></script>
  <script src="<?= asset('app/controllers/menuParticipante.js') ?>"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

      <body ng-controller='menuParticipanteController'>
        <nav>
          <div id="wrapper" >

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
              <ul class="sidebar-nav">
                <li class="sidebar-brand">
                  <a >
                    Sistema Jornada
                    <img src="imagens/logoifpr.svg.png" class="img-rounded">
                  </a>
                </li>
                <li>
                  <div class="dropdown">
                    <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" ng-click='find'><h4><strong>Participante</strong></h4></a><br>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#" >&rsaquo; Editar Cadastro</a>
                    </div>
                  </div>
                  ________________________
                  <br>
                </li>
                <li>
                  <div class="dropdown">
                   <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" style="color:#323d43">Inscrições</a><br>
                   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                    <a class="dropdown-item" href="#">&rsaquo; Cadastrar-se numa nova feira</a>
                    <a class="dropdown-item" href="#" >&rsaquo; Ver feiras participadas</a>

                  </div>
                </div>
              </li>
              <li>
               <div class="dropdown">
                 <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" >Trabalhos</a><br>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                   <a class="dropdown-item" href="#"  >&rsaquo;Criar</a>
                   <a class="dropdown-item" href="#"  >&rsaquo;Listar</a>

                 </div>
               </div>
             </li>

             <li>
              <div>
               <div class="dropdown">
                 <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" >Resumos</a><br>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                  <a class="dropdown-item" href="#" >&rsaquo;Criar</a>
                  <a class="dropdown-item" href="#" >&rsaquo;Listar</a>

                </div>
              </div>
            </div>

          </li>
          _________________________________
          <li>
            <br>

            <h4 href="#" class="pull-left" ">
              Avaliador<br>
            </h4>

            ________________________
            <br>

            <li>
              <div class="dropdown">
                <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" >Resumos</a><br>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                  <a class="dropdown-item" href="#"  >&rsaquo; Ver lista de resumos</a>

                </div>
              </div>
            </li>
            <li>
             <div class="dropdown">
               <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" >Avaliações</a><br>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                 <a class="dropdown-item" href="#" >&rsaquo;Criar</a>
                 <a class="dropdown-item" href="#" >&rsaquo;Listar</a>

               </div>
             </div>
           </li>
           <li>
             <div class="dropdown">
               <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" >Telas de teste</a><br>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                 <a class="dropdown-item" href="#/gerenciarEventos" >&rsaquo;abrir tela</a>

                 <!-- <audio controls>
                  <source src="soquinho.mp3" type="audio/mp3">aperta
                    </audio> -->

                  </div>
                </div>
              </li>

              <br>
            </li>
          </ul>
        </div>

        <div id="page-content-wrapper">
          <div class="container-fluid">
            <div>
              <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><img src="imagens/threelinesmenu.png"></a></div>
            </div>
          </div>


        </div>
      </nav>

      <div id="main">
        <aside>
          <div class="col-sm-9 push-right" ng-view></div>
        </aside>
      </div>
      <!-- /#wrapper -->

      <!-- Menu Toggle Script -->
      <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
          $("#main").toggleClass("toggled");
        });
      </script>

    </body>

    </html>
