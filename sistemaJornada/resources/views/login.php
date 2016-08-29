<!DOCTYPE html>
<html lang="pt-br" ng-app="myApp">
<head>
  <title>Sistema Jornada</title>

  <!-- Load Bootstrap CSS -->
  <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= asset('css/login.css') ?>" rel="stylesheet">
</head>
<body>
  <div  ng-controller="loginController">

    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          <div class="account-wall">
           <center><img src="imagens/IFPR.png"
            alt=""></center>
            <form class="form-signin">
              <input type="text" class="form-control" placeholder="login" required autofocus>
              <input type="password" class="form-control" placeholder="senha" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit">
                Entrar</button> <br>
              </form>
              <a><center><button id="btn-add" class="btn btn-primary btn-xs new"
                ng-click="toggle(modalstate)">Cadastre-se</button></center></a>
                <br>
                <a><center><button id="btn-add" class="btn btn-primary btn-xs new"
                  ng-click="">Entre como administrador</button></center></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Table-to-load-the-data Part -->

          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="modal-title" id="myModalLabel">Cadastre-se</h4>
                </div>
                <div class="modal-body">
                  <form name="frmParticipantes" class="form-horizontal" novalidate="">

                    <div class="form-group error">
                      <label for="nome" class="col-sm-3 control-label">Nome</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control has-error" id="nome" name="nome" placeholder="Seu nome" value="{{nome}}"
                        ng-model="participante.nome" ng-required="true">
                        <span class="help-inline"
                        ng-show="frmParticipantes.nome.$invalid && frmParticipantes.nome.$touched">Nome é obrigatório</span>
                      </div>
                    </div>
                    <div class="form-group error">
                      <label for="cpf" class="col-sm-3 control-label">CPF</label>
                      <div class="col-sm-9">
                        <input type="number" ui-mask="999.999.999-99" ng-maxlength="11" class="form-control has-error" id="cpf" name="cpf" placeholder="Seu cpf" value="{{cpf}}"
                        ng-model="participante.cpf" ng-required="true">
                        <span class="help-inline"
                        ng-show="frmParticipantes.cpf.$invalid && frmParticipantes.cpf.$touched">CPF é obrigatório</span>
                      </div>
                    </div>
                    <div class="form-group error">
                      <label for="login" class="col-sm-3 control-label">Login</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control has-error" id="login" name="login" placeholder="Seu login" value="{{login}}"
                        ng-model="participante.login" ng-required="true">
                        <span class="help-inline"
                        ng-show="frmParticipantes.login.$invalid && frmParticipantes.login.$touched">Login é obrigatório</span>
                      </div>
                    </div>
                    <div class="form-group error">
                      <label for="senha" class="col-sm-3 control-label">Senha</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control has-error" id="senha" name="senha" placeholder="Sua senha" value="{{senha}}"
                        ng-model="participante.senha" ng-required="true">
                        <span class="help-inline"
                        ng-show="frmParticipantes.senha.$invalid && frmParticipantes.senha.$touched">Senha é obrigatória</span>
                      </div>
                    </div>
                    <div class="form-group error">

                      <label  for="interno" class="col-sm-3 control-label">Estudo no IFPR</label>
                      <div class="col-sm-9">
                        <input type="radio" class="form-control has-error" id="interno" name="content" ng-model="content" value="interno">
                      </div>

                      <label  for="externo" class="col-sm-3 control-label">Não estudo no IFPR</label>
                      <div class="col-sm-9">
                        <input type="radio" class="form-control has-error" ng-click="listarInstituicoes(modalstate)" id="externo" name="content" ng-model="content" value="externo">
                      </div>

                    </div>

                    <div class="form-group error" ng-show="content=='externo'">

                      <label for="instituicao" class="col-sm-3 control-label">Instituição</label>
                      <div class="col-sm-6">
                        <select  class="form-control" ng-model="instituicao_escolhida" ng-options="instituicao.nome for instituicao in instituicoes">
                        </select>
                      </div>
                      <div class="col"></div>

                    </div>

                    <!--   <div class="col-sm-9">
                        <input type="text" class="form-control has-error" id="nome_instituicao" name="nome_instituicao" placeholder="Sua instituição" value="{{nome_instituicao}}"
                        ng-model="participante.nome_instituicao" ng-required="true">
                        <span class="help-inline"
                        ng-show="frmParticipantes.nome_instituicao.$invalid && frmParticipantes.nome_instituicao.$touched">Instituição é obrigatória</span>
                      </div> -->

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
          <script src="<?= asset('app/lib/angular/angular-route.js') ?>"></script>
          <script src="<?= asset('js/jquery.min.js') ?>"></script>
          <script src="<?= asset('js/bootstrap.min.js') ?>"></script>

          <!-- AngularJS Application Scripts -->
          <script src="<?= asset('app/app.js') ?>"></script>
          <script src="<?= asset('app/controllers/login.js') ?>"></script>
        </body>
        </html>
