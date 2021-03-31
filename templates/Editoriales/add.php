<?php

/**
 * @var \App\View\AppView $this
 */
$this->assign('title', 'Add editorial');
?>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Add</strong> Editorial
        </div>
        <?= $this->Form->create(null, ['url' => ['controller' => 'TblEditorial', 'action' => 'add']]) ?>
        <div class="form-horizontal">
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input-nI" required name="nombre" onkeypress="return Letras(event)" placeholder="Author's name" class="form-control">
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