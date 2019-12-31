<?php $this->layout('Admin/layout', ['title' => 'Admin']) ?>




<div class="box-body">
    <div class="box-title"><h3> Create User</h3></div>
</div>
<div class="box-body">
    <?= flash()?>
    <form action="/admin/user/store" method="post" id="form" enctype="multipart/form-data">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlInput5">User name</label>
                <input type="text" class="form-control " name="username" id="exampleFormControlInput5" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput6">Email</label>

                <input type="email" class="form-control " name="email" id="exampleFormControlInput6" >

            </div>
            <div class="form-group">
                <label for="exampleFormControlInput6">Password</label>

                <input type="password" class="form-control " name="password" id="exampleFormControlInput6" >

            </div>
            <div class="form-group ">
                <label  for="exampleFormControlSelect1">Role</label>
                <select class="form-control " name="role" id="exampleFormControlSelect1">
                    <option value="">Выберите</option>
                    <?php foreach(getRoles() as $role): ?>
                        <option value="<?= $role['id']?>"><?= $role['title']?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput7">Аватар</label>
                <input type="file" class="form-control " name="image" id="exampleFormControlInput7">
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-warning" type="submit">Add User</button>
        </div>

    </form>
</div>
