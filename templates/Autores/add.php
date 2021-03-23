<?php

/**
 * @var \App\View\AppView $this
 */
$this->assign('title', 'Add author');
?>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Add</strong> Author
        </div>
        <?= $this->Form->create(null, ['url' => ['controller' => 'TblAutor', 'action' => 'add']]) ?>
        <div class="form-horizontal">
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input-nI" name="nombre" placeholder="Author's name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input-A" name="apellido" placeholder="Author's last name" class="form-control">
                            </div>
                        </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>