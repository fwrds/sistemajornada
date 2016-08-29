<!DOCTYPE html>
<html lang="pt-br" ng-app="appRegs">
    <head>
        <title>Sistema Jornada</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    </head>
    <body>
        <h2>Gerenciamento de Trabalhos</h2>
        <div  ng-controller="trabalhos/trabalhosController">

            <button id="btn-add" class="btn btn-primary btn-xs"
                ng-click="toggle('add', 0)">Novo trabalho</button>
            
            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Orientador</th>
                        <th>Resumo</th>
                        <th>Tipo do Trabalho</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($participante->trabalhos as $trabalho)
                        <td>{{ trabalho.id }}</td>
                        <td>{{ trabalho.titulo }}</td>
                        <td>{{ trabalho.id_autor }}</td>
                        <td>{{ trabalho.orientador }}</td>
                        <td>{{ trabalho.resumo }}</td>
                        <td>{{ trabalho.tipoTrabalho }}</td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail"
                                ng-click="toggle('edit', trabalho.id)">Editar</button>
                            <button class="btn btn-danger btn-xs btn-delete"
                                ng-click="confirmDelete(trabalho.id)">Remover</button>
                       @endofreach
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
                            <form name="frmtrabalhos" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="titulo" class="col-sm-3 control-label">Titulo</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="titulo" name="titulo" placeholder="Titulo do trabalho" value="{{titulo}}" 
                                        ng-model="trabalho.titulo" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmtrabalhos.titulo.$invalid && frmtrabalhos.titulo.$touched">Título é obrigatório</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="orientador" class="col-sm-3 control-label">Orientador</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="orientador" name="orientador" placeholder="Orientador do trabalho" value="{{orientador}}" 
                                        ng-model="trabalho.orientador" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmtrabalhos.orientador.$invalid && frmtrabalhos.orientador.$touched">Orientador é obrigatório</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="resumo" class="col-sm-3 control-label">Resumo</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="resumo" name="resumo" placeholder="Resumo do trabalho" value="{{resumo}}" 
                                        ng-model="trabalho.resumo" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmtrabalhos.resumo.$invalid && frmtrabalhos.resumo.$touched">Resumo é obrigatório</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="tipo_trabalho" class="col-sm-3 control-label">Tipo do Trabalho</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="tipo_trabalho" name="tipo_trabalho" placeholder="Tipo do trabalho" value="{{tipo_trabalho}}" 
                                        ng-model="trabalho.tipo_trabalho" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmtrabalhos.tipo_trabalho.$invalid && frmtrabalhos.tipo_trabalho.$touched">Tipo do Trabalho é obrigatório</span>
                                    </div>
                                     </div>
                                    <div class="form-group error">
                                    <label for="id_autor" class="col-sm-3 control-label">ID do autor</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="id_autor"
                                            name="id_autor" placeholder="id autor" value="{{id_autor}}" 
                                        ng-model="trabalho.id_autor" ng-required="false">
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"
                                id="btn-save" ng-click="save(modalstate, id)"
                                ng-disabled="frmtrabalhos.$invalid">Salvar</button>
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
        <script src="<?= asset('app/controllers/trabalhos.js') ?>"></script>
    </body>
</html>