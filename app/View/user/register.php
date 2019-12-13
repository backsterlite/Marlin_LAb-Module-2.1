<?php $this->layout('layout') ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md">
            <h3 class="text-monospace text-muted" >
                Добро пожаловать в наше сообщество!
            </h3>
            <h4 class="text-monospace  text-info">
                Регистрация нового пользователя.
            </h4>
            <div class="col-md-12"></div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="col-md-8 offset-md-2">
                <?php echo flash(); ?>
            </div>
            <form action="/user/signup" method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">User name</label>
                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="User name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password one more time">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
</div>