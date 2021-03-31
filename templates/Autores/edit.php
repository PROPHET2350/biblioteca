<?php
/**
 * @var \App\View\AppView $this
 */
$this->assign('title','Edit Author');
?>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Edit</strong> Author
        </div>
        <?= $this->Form->create(null, ['url' => ['controller' => 'TblAutor', 'action' => 'edit',$tblAutor->id]]) ?>
        <div class="form-horizontal">
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input-nI" name="nombre" value="<?=ucfirst(strtolower($tblAutor->nombre))?>" onkeypress="return LetrasS(event)" placeholder="Author's name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input-A" name="apellido" value="<?=ucfirst(strtolower($tblAutor->apellido))?>" onkeypress="return LetrasS(event)" placeholder="Author's last name" class="form-control">
                            </div>
                        </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>