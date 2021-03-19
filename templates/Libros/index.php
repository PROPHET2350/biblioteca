<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblLibro[]|\Cake\Collection\CollectionInterface $tblLibros
 */
$this->assign('title', 'Libros');
$this->Html->scriptBlock(
    "
        $('#bookslink').addClass('active');
        
    ",
    ['block' => true]
);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Libros</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add item</button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-borderless table-striped table-earning" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Fecha</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tblLibros as $key) { ?>
                            <tr class="tr-shadow">
                                <td><?= $key->titulo ?></td>
                                <td><?= $key->fecha_creacion ?></td>
                                <td>$<?= $key->precio ?></td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Author">
                                            <i class="zmdi zmdi-plus-circle"></i>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>