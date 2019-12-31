<?php $this->layout('Admin/layout', ['title' => 'Admin']) ?>



<div class="box-body">
    <div class="">
        <div class="box-header">
            <h2 class="box-title">Все посты</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <a href="/admin/post/create" class="btn btn-success btn-lg">Добавить</a> <br> <br>
            <?= flash(); ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Теги</th>
                    <th>Автор</th>
                    <th>Статус</th>
                    <th>Рек...</th>
                    <th>Постер</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post): ?>
                <tr class=" text-center">
                    <td><?= $post['id']?></td>
                    <td width="250"><?= $post['title']?></td>
                    <td><a class="text-info" href="<?= config('link')['category'] . '/' . getCategory($post['category_id'])['id']?>"> <?= getCategory($post['category_id'])['title']?></a></td>
                    <td>
                        <?php foreach(getPostTags($post['id']) as $tag): ?>
                        <a class="text-info" href="<?=config('link')['tag'] . $tag['id']?>"><?=$tag['title'] . '<br>'?></a>
                        <?php endforeach; ?>
                    </td>
                    <td><a class="text-info" href="<?= config('link')['autor'] . $post['user_id'] ?>"><?= getUser($post['user_id'])['username']?></a></td>
                    <td><?= ($post['status'] == '0')? '<a class="text-danger" href="/admin/status/id/'. $post['id'] . '?status=1' .'"><i class="fa fa-thumbs-o-down"></i></a>':'<a class="text-success" href="/admin/status/id/'. $post['id'] . '?status=0' .'"><i class="fa fa-thumbs-o-up"></i></a>'?></td>
                    <td><?= ($post['is_featured'] == '0')? '<a class="text-danger" href="/admin/featured/id/'. $post['id'] . '?featured=1' .'"><i class="fa fa-eye-slash"></i></a>':'<a class="text-success" href="/admin/featured/id/' . $post['id'] . '?featured=0' .  '"><i class="fa fa-eye"></i></a>'?></td>
                    <td>
                        <img src="<?= getImage('post', $post['image'])?>" width="200" alt="">
                    </td>

                    <td>
                        <a href="<?= config('link')['post'].'slug/'. $post['slug']?>" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="/admin<?=config('link')['post'] . 'id/' . $post['id'] . '/edit' ?>" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="/admin<?=config('link')['post'] . 'id/' . $post['id'] . '/delete' ?>" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
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
                    <th>Категория</th>
                    <th>Теги</th>
                    <th>Автор</th>
                    <th>Статус</th>
                    <th>Рек...</th>
                    <th>Постер</th>
                    <th>Действия</th>
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

