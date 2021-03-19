<?php

/**
 * @var \App\View\AppView $this
 *
 */
$this->assign('title', 'Home');
$this->Html->scriptBlock("
$('#homelink').addClass('active');
"
,['block'=>true]);

?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="statistic__item statistic__item--green">
                <h2 class="number"><?=$countAutores;?></h2>
                <span class="desc"><strong>Autores</strong></span>
                <div class="icon">
                    <i class="zmdi zmdi-account-o"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="statistic__item statistic__item--orange">
                <h2 class="number"><?=$countLibros;?></h2>
                <span class="desc"><Strong>Libros</Strong></span>
                <div class="icon">
                    <i class="zmdi zmdi-storage"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="statistic__item statistic__item--blue">
                <h2 class="number"><?=$countEditorial;?></h2>
                <span class="desc"><strong>editoriales</strong></span>
                <div class="icon">
                    <i class="zmdi zmdi-calendar-note"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="top-campaign">
        <h3 class="title-3 m-b-30">top 10 Autores con mas libros</h3>
        <div class="table-responsive">
            <table class="table table-top-campaign">
                <tbody>
                   <?php for ($i=0; $i < count($topAutores) ; $i++) {?>
                        <tr>
                            <td><?php echo $topAutores[$i]['autor'] ?></td>
                            <td><?php echo $topAutores[$i]['cantidad'] ?></td>
                        </tr>
                   <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>