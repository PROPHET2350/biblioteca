<?php

/**
 * @var \App\View\AppView $this
 */


$this->assign('title', 'Add Book');
$this->Html->script('admin/js/addbook.js', ['block' => true]);
?>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Add</strong> book
        </div>
        <?= $this->Form->create(null, ['url' => ['controller' => 'TblLibros', 'action' => 'add']]) ?>
        <div class="form-horizontal">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="text" id="input1-group3" required name="author" placeholder="Author" value="" onkeypress="return Letras(event)" class="form-control">
                            <div tabindex="-1" aria-hidden="true" role="menu" id="dropmenu" class="dropdown-menu">
                                <button type="button" tabindex="0" class="dropdown-item">Action</button>
                                <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                <button type="button" tabindex="0" class="dropdown-item">Something else here</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="date" id="input2-group2" required name="fecha" placeholder="Date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="text" id="input2-group22" required name="title" placeholder="Title" onkeypress="return Letras(event)" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="text" id="input3-group1" required name="isbn" placeholder="ISBN" onkeypress="return Numeros(event)" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="text" id="input3-group4" required name="precio" placeholder="price" class="form-control" onkeypress="return decimales(event, this)">
                        </div>
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="check" id="addcheck">
                    <label class="form-check-label" for="exampleCheck1">add author</label>
                </div>
                <div id="author-hide" hidden>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input-nI" name="nombre" placeholder="Author's name" onkeypress="return LetrasS(event)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input-A" name="apellido" placeholder="Author's last name" onkeypress="return LetrasS(event)" class="form-control">
                            </div>
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