<?php

/**
 * @var \App\View\AppView @this
 */
$this->assign('title','Price');
$this->Html->scriptBlock(
    "
        $('#priceslink').addClass('active');
    ",
    ['block' => true]
);
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <strong>Percent</strong> Increment
                </div>
                <div class="card-body card-block">
                    <?= $this->Form->create(null) ?>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-dollar"></i>
                                </div>
                                <input type="number" id="input3-group1" name="porcentaje" placeholder="..." class="form-control">
                                <div class="input-group-addon">%</div>
                            </div>
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
    </div>
</div>