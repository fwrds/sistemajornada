 app.controller('loginController', function($scope, $http, API_URL) {


    $scope.toggle = function(modalstate) {
        $scope.modalstate = modalstate;
        $scope.form_title = "Novo Participante";
        console.log();
        $('#myModal').modal('show');
    }
    $scope.escolherInstituicao = function(modalstate,id) {

        $scope.modalstate=modalstate;
        $scope.id = id;
        $http.get(API_URL + 'instituicoes/procurar/' + id)
        .success(function(response) {
            console.log(response);
            $scope.participante = response;
        });
        
    }
    $scope.modalCadastrarInst = function(modalstate) {
        $scope.modalstate = modalstate;
        $scope.form_title = "Nova Instituição";
        console.log();
        $('#modalInst').modal('show');
    }
    $scope.listarInstituicoes = function(modalstate){
        $http.get(API_URL + "listarInstituicoes")
        .success(function(response) {
            $scope.instituicoes = response;
        });

    }

    $scope.save = function(modalstate, id) {
        var url = API_URL + "participante";
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
            alert("Seu cadastro foi efetuado com sucesso");
        }).error(function(response) {
            console.log(response);
            alert('Não foi possível inserir o participante');
        });
    }

    $('#listaInst tbody ul li a').on('click', function(){
    $('#instituicao_nome').val($(this).text());
});; 

});

