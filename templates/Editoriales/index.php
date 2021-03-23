<?php
 /**
  * @var \App\View\AppView @this
  */

use Cake\Routing\Router;

$this->assign('title','Editorials');
  $this->Html->scriptBlock(
    "
        $('#editoriallink').addClass('active');
    ",
    ['block' => true]
);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Editoriales</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="<?= Router::url(['controller' => 'TblEditorial', 'action' => 'add']) ?>">
                        <i class="zmdi zmdi-plus"></i>add editorial
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-borderless table-striped table-earning" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tblEditorial as $key) { ?>
                            <tr class="tr-shadow">
                                <td><?= ucfirst($key->nombre) ?></td>
                                <td>
                                    <div class="table-data-feature">
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Books" href="/biblioteca/Editoriales/books/<?= $key->id?>">
                                            <i class="zmdi zmdi-storage"></i>
                                        </a>
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="/biblioteca/Editoriales/edit/<?= $key->id?>">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="<?=Router::url(['controller'=>'TblEditorial','action'=>'delete',$key->id])?>" onclick="return confirm('Are you sure about that?');">
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