<?php $this->layout('layout'); ?>
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Профиль пользователя</h3></div>

                    <div class="card-body">
                        <?= flash()?>
                        <form action="/user/profile/id/<?= components(\Delight\Auth\Auth::class)->getUserId();?>/edit/info" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput5">Name</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control " name="username" id="exampleFormControlInput5" value="<?= $user['username']?>">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput6">Email</label>

                                        <div class="col-md-6">
                                            <input type="email" class="form-control " name="email" id="exampleFormControlInput6" value="<?= $user['email']?>">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput7">Аватар</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control " name="image" id="exampleFormControlInput7">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="<?= getImage('user', $user['image'])?>" alt="" class="img-fluid">
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-warning" type="submit">Edit profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-header"><h3>Безопасность</h3></div>

                    <div class="card-body">
                        <form action="/?page=update" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Current password</label>
                                        <div class="col-md-6">
                                            <input type="password" name="current" class="form-control " id="exampleFormControlInput1">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">New password</label>
                                        <div class="col-md-6">
                                            <input type="password" name="password" class="form-control   id="exampleFormControlInput2">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">Password confirmation</label>
                                        <div class="col-md-6">
                                            <input type="password" name="password_confirmation" class="form-control " id="exampleFormControlInput3">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="security" class="form-control "  value="1">
                                    </div>

                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>