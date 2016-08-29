app.controller('eventosController', function($scope, $http, API_URL) {
    
    $http.get(API_URL + "eventos")
            .success(function(response) {
                $scope.eventos = response;
            });

$scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Novo Evento";
				$scope.evento=null;
                break;
			case 'edit':
                $scope.form_title = "Editar Evento";
                $scope.id = id;
                $http.get(API_URL + 'eventos/editar/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.evento = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }
	
	 $scope.save = function(modalstate, id) {
        var url = API_URL + "eventos";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/salvar/editar/" + id;
        } else {
			 url += "/salvar";
		}
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.evento),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('Não foi possível inserir o evento');
        });
    }

	$scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Você quer remover esse evento?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'eventos/remover/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
    $scope.listar = function(id) {
      
            $http({
                method: 'GET',
                url: API_URL + 'eventos/listarparticipantes/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Não foi possível listar os participantes');
                    });
         
    }
});