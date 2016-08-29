<!DOCTYPE html>
<html lang="pt-br" ng-app="myApp">

<head>

  <meta charset="utf-8">
  <title>Sistema Jornada - Com Bootstrap Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/simple-sidebar.css') ?>" rel="stylesheet">

  <script src="<?= asset('app/lib/angular/angular.js') ?>"></script>
  <script src="<?= asset('app/lib/angular/angular-route.js') ?>"></script>
  <script src="<?= asset('js/jquery.min.js') ?>"></script>
  <script src="<?= asset('js/bootstrap.min.js') ?>"></script>

  <!-- AngularJS Application Scripts -->
  <script src="<?= asset('app/app.js') ?>"></script>
  <script src="<?= asset('app/controllers/menuAdm.js') ?>"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


      </head>

      <body ng-controller='menuAdmController'>

        <nav>

          <div id="wrapper" >

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
              <ul class="sidebar-nav">
                <li class="sidebar-brand">
                  <a class="titulo" id="titulo">
                    Sistema Jornada
                    <img src="imagens/logoifpr.svg.png" class="img-rounded">
                  </a>
                </li>
                <li>
                  <h4 href="#/gerenciareventos" class="pull-left titulo">
                   Coordenador de Pesquisa<br>
                 </h4>
                 ________________________
                 <br>
               </li>
               <li>
                 <div class="dropdown">
                   <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">Eventos</a><br>
                   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                     <a class="dropdown-item" href="#"">&rsaquo;Criar</a>
                     <a class="dropdown-item" href="#" >&rsaquo;Listar</a>

                   </div>
                 </div>
               </li>

               <li>
                <div class="dropdown">
                 <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" >Relatórios</a><br>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                  <a class="dropdown-item" href="#" >&rsaquo; Relatórios de eventos anteriores</a>
                  <a class="dropdown-item" href="#" >&rsaquo; Publicar Relatórios de um evento</a>

                </div>
              </div>
            </li>
            <li>
              <div>
               <div class="dropdown">
                 <a class="btn dropdown-toggle pull-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" >Avaliadores</a><br>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                   <a class="dropdown-item" href="#" >&rsaquo;Atribuir Avaliadores</a>

                 </div>
               </div>
             </div>

           </li>
         </ul>
       </div>
       <!-- /#sidebar-wrapper -->

       <!-- Page Content -->
       <div id="page-content-wrapper">
        <div class="container-fluid">
          <div> 
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><img src="imagens/threelinesmenu.png"></a></div>
            <div class="row">
              <div class="col-lg-12">

              </div>
            </div>
          </div>
        </div>
        <!-- /#page-content-wrapper -->

      </div>
    </nav>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
  </script>

</body>

</html>