<?php $this->layout('Admin/layout', ['title' => 'Admin']) ?>



<div class="box-body">
    <div class="">
        <div class="box-header">
            <h2 class="box-title">Все коментарии</h2>
        </div>
        <!-- /.box-header -->
            <?= flash(); ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Message</th>
                    <th>Пост</th>
                    <th>Статус</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr class=" text-center">
                        <td><?= $comment['id']?></td>
                        <td width="250"><?= $comment['text']?></td>
                        <td><a class="text-info" href="<?=config('link')['post'] .'slug/'. getPost($comment['post_id'])['slug'] ?>">Перейти</a></td>
                        <td><?= ($comment['status'] == '0')? '<a class="text-danger" href="/admin/comments/status/id/'. $comment['id'] . '?status=1' .'"><i class="fa fa-thumbs-o-down"></i></a>':'<a class="text-success" href="/admin/comments/status/id/'. $comment['id'] . '?status=0' .'"><i class="fa fa-thumbs-o-up"></i></a>'?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Message</th>
                    <th>Пост</th>
                    <th>Статус</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    По вопросам к главному администратору.
</div>
<!-- /.box-footer-->

