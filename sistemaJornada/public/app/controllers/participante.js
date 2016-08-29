app.controller('participanteController', function($scope, $http, API_URL) {

    $http.get(API_URL + "participante")
    .success(function(response) {
        $scope.participante = response;
    });

    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
            $scope.form_title = "Novo Participante";
            $scope.participante=null;
            break;
            case 'edit':
            $scope.form_title = "Editar Participante";
            $scope.id = id;
            $http.get(API_URL + 'participantes/editar' + id)
            .success(function(response) {
                console.log(response);
                $scope.participante = response;
            });
            break;
            default:
            break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    $scope.save = function(modalstate, id) {
        var url = API_URL + "participantes";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/salvar/editar/" + id;
        } else {
            url += "/salvar";
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.participante),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('Não foi possível inserir o participante');
        });
    }
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Você quer remover esse participante?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'participantes/remover/' + id
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
    $scope.find = function(id){
        $http({
            method: 'GET';
            url: API_URL + 'participante/findparticipante/'+ id;
        }).
        success(function(data) {
            console.log(data);
            location.reload();
        }).
        error(function(data) {
            console.log(data);
            alert('Não foi possível achar o participante');
        });
    }
    $scope.listar = function(id) {

        $http({
            method: 'GET',
            url: API_URL + 'participantes/listartrabalhos/' + id
        }).
        success(function(data) {
            console.log(data);
            location.reload();
        }).
        error(function(data) {
            console.log(data);
            alert('Não foi possível listar os trabalhos');
        });

    }
});