<?php $this->layout('layout') ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="col-md">
                <?php echo flash(); ?>
            </div>
            <form action="/user/signin" method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
</div>