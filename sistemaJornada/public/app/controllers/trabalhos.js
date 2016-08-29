app.controller('trabalhosController', function($scope, $http, API_URL) {
    
    $http.get(API_URL + "trabalhos")
            .success(function(response) {
                $scope.trabalhos = response;
            });

$scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Novo Trabalho";
				$scope.trabalho=null;
                break;
			case 'edit':
                $scope.form_title = "Editar Trabalho";
                $scope.id = id;
                $http.get(API_URL + 'trabalhos/editar/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.trabalho = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }
	
	 $scope.save = function(modalstate, id) {
        var url = API_URL + "trabalhos";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/salvar/editar/" + id;
        } else {
			 url += "/salvar";
		}
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.trabalho),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('Não foi possível inserir o trabalho');
        });
    }
	$scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Você quer remover esse trabalho?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'trabalhos/remover/' + id
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
});