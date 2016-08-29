var app = angular.module("myApp", ['ngRoute']).constant("API_URL",
	"http://localhost/sistemaJornada/public/api/v2/")
app.config(function($routeProvider)
{
   // remove o # da url
   //$locationProvider.html5Mode({enabled: true, requireBase: false});

   $routeProvider

   // para a rota '/', carregaremos o template home.html e o controller 'HomeCtrl'
   // .when('/login', {
   // 	templateUrl : 'resources/views/login/login.html',
   // 	controller     : 'loginController'
   // })

   // // para a rota '/sobre', carregaremos o template sobre.html e o controller 'SobreCtrl'
   // .when('/menu/menuAdministrador', {
   // 	templateUrl : 'app/resouces/menu/menuAdministrador.html',
   // 	controller  : 'menuAdmController'
   // })

   // // para a rota '/contato', carregaremos o template contato.html e o controller 'ContatoCtrl'
   // .when('/menu/menuParticipante', {
   // 	templateUrl : 'app/resouces/menuParticipante.html',
   // 	controller  : 'menuPartCotroller'
   // })
   .when('/gerenciarEventos', {
      templateUrl : 'paginas/eventos/gerenciareventos.html',
      controller  : 'eventosController'
   })

   // caso não seja nenhum desses, redirecione para a rota '/'
   .otherwise ({ redirectTo: '/' });
});