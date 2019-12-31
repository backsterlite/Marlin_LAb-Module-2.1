<?php $this->layout('Admin/layout', ['title' => 'Admin']) ?>
<div class="box-body">
    <div class="">
        <div class="box-header">
            <h2 class="box-title">Все категории</h2>
        </div>
        <!-- /.box-header -->
        <?= flash(); ?>
        <div class="box-body">
            <a href="/admin/category/create" class="btn btn-success btn-lg">Добавить</a> <br> <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach(getAllCategories() as $category): ?>
                <tr>
                    <td><?= $category['id']?></td>
                    <td><?= $category['title']?></td>
                    <td>
                        <a href="<?= config('link')['category'] . $category['id']?>" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="/admin/<?= config('link')['category'] . $category['id']?>/edit" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="/admin/<?= config('link')['category'] . $category['id']?>/delete" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
                            <i class="fa fa-remove"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<!-- /.box-body -->
