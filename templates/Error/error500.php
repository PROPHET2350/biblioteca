<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Database\StatementInterface $error
 * @var string $message
 * @var string $url
 */
$this->assign('title','500 Server error');
$this->layout = 'error';
$this->Html->css('admin/css/500.css',['block'=>true]); 
?>
<div id="error">
  <div id="box"></div>
  <h3>ERROR 500</h3>
  <p>Things are a little <span>unstable</span> here</p>
  <p>I suggest come back later</p>
</div>