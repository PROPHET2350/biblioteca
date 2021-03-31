<?php

/**
 * @var \App\View\AppView $this
 */


$this->assign('title', 'Edit Book');
?>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Add</strong> book
        </div>
        <?= $this->Form->create(null, ['url' => ['controller' => 'TblLibros', 'action' => 'edit',$tblLibro->id]]) ?>
        <div class="form-horizontal">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="date" id="input2-group2" required name="fecha" max="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d',strtotime($tblLibro->fecha_creacion)); ?>" placeholder="Date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="text" id="input2-group22" required name="title" onkeypress="return Letras(event)" value="<?= $tblLibro->titulo?>" placeholder="Title" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="text" id="input3-group1" required name="isbn" value="<?= $tblLibro->isbn?>" onkeypress="return Numeros(event)" placeholder="ISBN" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="text" id="input3-group4" required name="precio" min="0" value="<?= $tblLibro->precio?>" onkeypress="return decimales(event,this)" placeholder="price" class="form-control">
                        </div>
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