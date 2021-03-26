<?php

/**
 * @var \App\View\AppView $this
 */

$this->assign('title', "Author's Books");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 md-auto">
            <div class="card">
                <div class="card-header">
                    <strong>Increment</strong> price
                </div>
                <div class="card-body card-block">
                    <?= $this->Form->create(null,['url'=>['controller'=>'TblLibros','action'=>'incrementPriceByAuthor']]) ?>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-dollar"></i>
                                </div>
                                <input type="number" id="input3-group1" name="porcentaje" placeholder="..." class="form-control">
                                <div class="input-group-addon">%</div>
                            </div>
                            <?php echo $this->Form->hidden('id_autor',['value'=>$tblLibros->first()->id_autor]);  ?>
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
        <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Libros</h3>
            <div class="table-data__tool">
            </div>
            <div class="table-responsive">
                <table id="exampleNotButtons" class="table table-borderless table-striped table-earning" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Fecha</th>
                            <th>Precio</th>
                            <th>ISBN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tblLibros as $key) { ?>
                            <tr class="tr-shadow">
                                <td><?= $key->tbl_libro->titulo ?></td>
                                <td><?= $key->tbl_libro->fecha_creacion ?></td>
                                <td>$<?= $key->tbl_libro->precio ?></td>
                                <td><?= $key->tbl_libro->isbn ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>