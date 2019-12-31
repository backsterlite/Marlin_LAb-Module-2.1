<?php $this->layout('Admin/layout', ['title' => 'Admin']) ?>

<div class="box-body">
    <div class="">
        <div class="box-header">
            <h2 class="box-title">Изменить категорию</h2>
        </div>
        <?= flash(); ?>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-6">
                <form action="/admin/<?= config('link')['category'] . $category['id']?>/update" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="<?= $category['title']?>">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-warning">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<!-- /.box-body -->
