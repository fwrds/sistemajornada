<!DOCTYPE html>
<html lang="pt-br" ng-app="appRegs">
    <head>
        <title>Sistema Jornada</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    </head>
    <body>
        <h2>Gerenciamento de Participantes</h2>
        <div  ng-controller="participantesController">

            <button id="btn-add" class="btn btn-primary btn-xs"
                ng-click="toggle('add', 0)">Novo Participante</button>
            
            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Senha</th>
                        <th>Externo</th>
                        <th>Instituição</th>
                        <th>Data de Nascimento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="participante in participantes">
                        <td>{{ participante.id }}</td>
                        <td>{{ participante.nome }}</td>
                        <td>{{ participante.cpf }}</td>
                        <td>{{ participante.senha }}</td>
                        <td>{{ participante.externo }}</td>
                        <td>{{ participante.instituicao }}</td>
                        <td>{{ participante.dataNasc }}</td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail"
                                ng-click="toggle('edit', participante.id)">Editar</button>
                            <button class="btn btn-danger btn-xs btn-delete"
                                ng-click="confirmDelete(participante.id)">Remover</button>
                            <button class="btn btn-default btn-xs btn-detail"
                                ng-click="listar(participante.id)">Listar Trabalhos</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmParticipantes" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="nome" class="col-sm-3 control-label">Nome</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="nome" name="nome" placeholder="Nome do Participante" value="{{nome}}" 
                                        ng-model="participante.nome" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmParticipantes.nome.$invalid && frmParticipantes.nome.$touched">Nome é obrigatório</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="cpf" class="col-sm-3 control-label">CPF</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="cpf" name="cpf" placeholder="CPF do Participante" value="{{cpf}}" 
                                        ng-model="participante.cpf" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmParticipantes.cpf.$invalid && frmParticipantes.cpf.$touched">CPF é obrigatório</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="senha" class="col-sm-3 control-label">Senha</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control has-error" id="senha" name="senha" placeholder="Senha do Participante" value="{{senha}}" 
                                        ng-model="participante.senha" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmParticipantes.senha.$invalid && frmParticipantes.senha.$touched">Senha é obrigatória</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="externo" class="col-sm-3 control-label">Pessoa Externa?</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="form-control has-error" id="externo" name="externo" placeholder="externo" value="{{externo}}" 
                                        ng-model="participante.externo" ng-required="false">
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="instituicao" class="col-sm-3 control-label">Instituição</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="instituicao" name="instituicao" placeholder="Instituição do Participante" value="{{instituicao}}" 
                                        ng-model="participante.instituicao" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmParticipantes.instituicao.$invalid && frmParticipantes.instituicao.$touched">Instituição é obrigatória</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="data" class="col-sm-3 control-label">Data de Nascimento</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control has-error" id="dataNasc"
                                            name="dataNasc" placeholder="Data de Nascimento" value="{{dataNasc}}" 
                                        ng-model="participante.dataNasc" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmParticipantes.dataNasc.$invalid && frmParticipantes.dataNasc.$touched">Data é obrigatória</span>
                                    </div>
                                </div>
                                 <div class="form-group error">
                                    <label for="evento" class="col-sm-3 control-label">ID do evento</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="id_evento"
                                            name="id_evento" placeholder="id Evento" value="{{id_evento}}" 
                                        ng-model="participante.id_evento" ng-required="false">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"
                                id="btn-save" ng-click="save(modalstate, id)"
                                ng-disabled="frmParticipantes.$invalid">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/participantes.js') ?>"></script>
    </body>
</html>