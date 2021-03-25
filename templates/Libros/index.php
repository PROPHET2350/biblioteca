<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TblLibro[]|\Cake\Collection\CollectionInterface $tblLibros
 */

use Cake\Routing\Router;

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
                    <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="<?= Router::url(['controller' => 'TblLibros', 'action' => 'add']) ?>">
                        <i class="zmdi zmdi-plus"></i>add book
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-borderless table-striped table-earning" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Fecha</th>
                            <th>Precio</th>
                            <th>ISBN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tblLibros as $key) { ?>
                            <tr class="tr-shadow">
                                <td><?= $key->titulo ?></td>
                                <td><?= $key->fecha_creacion ?></td>
                                <td>$<?= $key->precio ?></td>
                                <td><?= $key->isbn ?></td>
                                <td>
                                    <div class="table-data-feature">
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Editorial" href="/biblioteca/Libros/editoriales/<?= $key->id?>">
                                            <i class="zmdi zmdi zmdi zmdi-library"></i>
                                        </a>
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Author" href="/biblioteca/Libros/autores/<?= $key->id?>">
                                            <i class="zmdi zmdi zmdi-account-o"></i>
                                        </a>
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Add Editorial" href="/biblioteca/Libros/add-editorial/<?= $key->id?>">
                                            <i class="zmdi zmdi-file-plus"></i>
                                        </a>
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Add Author" href="/biblioteca/Libros/add-autor/<?= $key->id?>">
                                            <i class="zmdi zmdi-plus-circle"></i>
                                        </a>
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="/biblioteca/Libros/edit/<?= $key->id?>">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="<?= Router::url(['controller' => 'TblLibros', 'action' => 'delete',$key->id])?>">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
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