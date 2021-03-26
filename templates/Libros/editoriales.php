<?php
 /**
  * @var \App\View\AppView @this
  */

use Cake\Routing\Router;

$this->assign('title',"Book's Editorials");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="title-5 m-b-35">Book's Editoriales</h3>
            <div class="table-responsive">
                <table id="exampleNotButtons" class="table table-borderless table-striped table-earning" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tblEditorial as $key) { ?>
                            <tr class="tr-shadow">
                                <td><?= ucfirst($key->tbl_editorial->nombre) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>