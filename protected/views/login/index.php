<?php
$errors = yii::app()->user->getFlash("errorLogin");
$success = yii::app()->user->getFlash("success");
?>
<div class="authentication">
  <div class="sign-in-2">
    <div class="container-fluid no-pdd-horizon bg" style="background-image: url('<?= Utils::host(Yii::app()->params["app-img"] . "/others/img-30.jpg", true); ?>')">
      <div class="row">
        <div class="col-md-10 mr-auto ml-auto">
          <div class="row">
            <div class="mr-auto ml-auto full-height height-100">
              <div class="vertical-align full-height">
                <div class="table-cell">
                  <div class="card">
                    <div class="card-body">
                      <div class="pdd-horizon-30 pdd-vertical-30">
                        <div class="mrg-btm-30">
                          <img class="img-responsive inline-block" src="<?= Utils::host(Yii::app()->params["app-img-logo"], true); ?>" alt="">
                          <h2 class="inline-block pull-right no-mrg-vertical pdd-top-15">Login</h2>
                        </div>
                        <p class="mrg-btm-15 font-size-13">Please enter your user name and password to login</p>
                        <?php
                        $form   = $this->beginWidget('CActiveForm', [
                            'action'      => (!$continue) ? Yii::app()->createUrl("signin") : Yii::app()->createUrl("signin", ["continue" => $continue]),
                            'id'          => 'form-login',
                            'htmlOptions' => [
                                'role' => 'form'
                            ]
                        ]);
                        ?>
                        <?php if (!empty($success)) : ?>
                          <div class="alert alert-success alert-white-alt rounded">
                            <i class="fa fa-times-circle"></i>&nbsp;
                            <strong><?= $success ?></strong>
                          </div>
                        <?php endif; ?>
                        <?php if (!empty($errors)) : ?>
                          <div class="alert alert-danger alert-white-alt rounded">
                            <i class="fa fa-times-circle"></i>&nbsp;
                            <strong>Algo pasó!</strong> <br>
                            <?= $errors["password"][0] ?>
                          </div>
                        <?php endif; ?>
                        <div class="form-group">
                          <?=
                          $form->textField($model, 'username', [
                              "id"          => "txtusername",
                              "class"       => "form-control",
                              "placeholder" => "Ingresa tu nombre de usuario",
                              "autofocus"   => true
                          ]);
                          ?>
                        </div>
                        <div class="form-group">
                          <?=
                          $form->passwordField($model, 'password', [
                              "id"          => "txtpaswoord",
                              "class"       => "form-control",
                              "placeholder" => "Ingresa tu contraseña"
                          ]);
                          ?>
                        </div>
                        <div class="mrg-top-20 text-right">
                          <button class="btn btn-info">Login</button>
                        </div>
                        <?php $this->endWidget(); ?>
                        <span>No tiene cuenta? Regístrate <a href="<?= $this->createUrl("/signup") ?>">aquí</a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>