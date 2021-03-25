<?php
 /**
  * @var \App\View\AppView @this
  */


$this->assign('title',"Book add Editorials");
$this->Html->script('admin/js/addeditorial.js',['block'=>true]);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <div id="load" hidden class="loader">Loading...</div>
            <div class="table-responsive">
            <h3 class="title-5 m-b-35">Editoriales</h3>
                <table id="exampleNotButtons" data-url="<?php echo $this->Url->build(['controller'=>'TblLibros', 'action'=>'adde']);?>" class="table table-borderless table-striped table-earning" cellspacing="0" width="100%">
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
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Add Author" data-lid="<?=$id?>" data-aid="<?=$key->id?>">
                                            <i class="zmdi zmdi-plus-circle"></i>
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