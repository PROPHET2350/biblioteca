<?php
/**
* @var \App\View\AppView $this 
*/

use Cake\Routing\Router;

$this->assign('title',"Book's Authors");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Book's Authors</h3>
            <div class="table-responsive">
                <table id="example" class="table table-borderless table-striped table-earning" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tblAutor as $key) { ?>
                            <tr class="tr-shadow">
                                <td><?= ucfirst($key->tbl_autor->nombre) ?></td>
                                <td><?= ucfirst($key->tbl_autor->apellido) ?></td>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>