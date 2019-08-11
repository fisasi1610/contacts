<div class="authentication">
    <div class="sign-up">
        <div class="row no-mrg-horizon">
            <div class="col-md-4 no-pdd-horizon d-none d-md-block">
                <div class="full-height bg" style="background-image: url('<?= Utils::host(Yii::app()->params["app-img"] . "/others/img-30.jpg", true); ?>')">
                    <div class="vertical-align full-height pdd-horizon-70">
                        <div class="table-cell">
                            <div class="row">
                                <div class="mr-auto ml-auto col-md-10">
                                    <div class="text-right">
                                        <img class="img-responsive mrg-left-auto mrg-btm-15" src="<?= Utils::host(Yii::app()->params["app-img-logo-white"], true); ?>" alt="" width="170">
                                        <p class="text-white lead text-opacity lh-1-7">Una cuenta para unir todo!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 bg-white no-pdd-horizon">
                <div class="row">
                    <div class="col-md-6">
                        <div class="full-height height-100">
                            <div class="vertical-align full-height pdd-horizon-70">
                                <div class="table-cell">
                                    <div class="pdd-horizon-15">
                                        <h1 class="mrg-btm-30">Crea Tu Cuenta</h1>
                                        <?php
                                            $form = $this->beginWidget('CActiveForm', [
                                                'id'          => 'form-signup',
                                                'htmlOptions' => [
                                                    'role' => 'form',
                                                ]
                                            ]);
                                            ?>
                                            <div class="form-group">
                                                <label class="text-normal text-dark">Tipo Documento</label>
                                                <?=
                                                CHtml::dropDownList(
                                                    "Persona[tipo_documento]", "", Globals::getTypeListData(Globals::TIPO_DOCUMENTO), [
                                                    'class' => "form-control",
                                                    'empty' => "Seleccione..."
                                                ])
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-normal text-dark">Nro. Documento</label>
                                                <?= CHtml::textField("Persona[documento]", "", [
                                                    'class' => "form-control",
                                                ]) ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-normal text-dark">Nombres</label>
                                                <?= CHtml::textField("Persona[nombre]", "", [
                                                    'class' => "form-control",
                                                ]) ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-normal text-dark">Apellidos</label>
                                                <?= CHtml::textField("Persona[apellido]", "", [
                                                    'class' => "form-control",
                                                ]) ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-normal text-dark">Correo</label>
                                                <?= CHtml::textField("Persona[correo]", "", [
                                                    'class' => "form-control",
                                                ]) ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-normal text-dark">Contraseña</label>
                                                <?= CHtml::passwordField("Usuario[password]", "", [
                                                    'class' => "form-control",
                                                ]) ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-normal text-dark">Confirmar Contraseña</label>
                                                <?= CHtml::passwordField("Usuario[confirm_password]", "", [
                                                    'class' => "form-control",
                                                ]) ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block border-radius-6">Crear Nueva Cuenta</button>
                                            </div>
                                        <?php $this->endWidget(); ?>
                                        <p>Ya tienes cuenta? <a href="<?= $this->createUrl("/login") ?>">Accede</a></p>
                                        <hr>
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