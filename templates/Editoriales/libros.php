<?php
/**
 * @var \App\View\AppView $this
 */

$this->assign('title',"Editorial's Books");
?>

<div class="container-fluid">
    <div class="row">
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