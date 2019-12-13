<?php $this->layout('layout', ['title' => 'ShowPost']) ?>

<div class="conteiner">
    <div class="row">
        <div class="col-md-8 offset-2">
            <h1><?php echo $post['title'] ?></h1>
            <h3><?php echo $post['content'] ?></h3>
        </div>
    </div>
</div>

