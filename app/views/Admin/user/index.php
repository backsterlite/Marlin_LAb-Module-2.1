<?php $this->layout('Admin/layout', ['title' => 'Admin']) ?>



<div class="box-body">
    <div class="">
        <div class="box-header">
            <h2 class="box-title">Все посты</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <a href="/admin/user/create" class="btn btn-success btn-lg">Добавить</a> <br> <br>
            <?= flash(); ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Статус</th>
                    <th>Роль</th>
                    <th>Аватар</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr class=" text-center">
                        <td><?= $user['id']?></td>
                        <td><?= $user['username']?></td>
                        <td><?= $user['email']?></td>
                        <td><?= ($user['status'] == '0')? 'NORMAL<br><a class="text-success" href="/admin/user/status/id/'. $user['id'] . '?status=2' .'"><i class="fa fa-thumbs-o-up"></i></a>':'BANNED<br><a class="text-danger" href="/admin/user/status/id/'. $user['id'] . '?status=0' .'"><i class="fa fa-thumbs-o-down"></i></a>'?></td>
                        <td><?= getRole($user['roles_mask'])?></td>
                        <td>
                            <img src="<?= getImage('user', $user['image'])?>" width="200" alt="">
                        </td>

                        <td>
                            <a href="<?= config('link')['autor']. $user['id']?>" class="btn btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="/admin/user/id/<?= $user['id'] ?>/edit" class="btn btn-warning">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Статус</th>
                    <th>Роль</th>
                    <th>Аватар</th>
                    <th>Действия</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<!-- /.box-body -->


