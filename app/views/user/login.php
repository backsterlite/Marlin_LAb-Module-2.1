<?php $this->layout('layout', ['title' => 'Login']) ?>

<div class="container">
    <div class="row">

        <div class="col-md-4 offset-4 my-5">
            <?=  flash(); ?>
            <form action="/user/signin" method="post" >
                <div class="form-group  ">
                    <input type="hidden" name="request" class="form-control " value="<?= $_SERVER['HTTP_REFERER']?>" id="exampleInputEmail1" >
                </div>
                <div class="form-group  ">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control " id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" name="remember" type="checkbox" id="disabledFieldsetCheck" >
                        <label class="form-check-label" for="disabledFieldsetCheck">
                             Remember me
                        </label>
                    </div>
                </div
                <div class="form-group">

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <p>Not a member? <a href="/user/register" class="blue-text">Sign Up</a></p>
                    <p>Forgot <a href="/user/forgot_password" class="blue-text">Password?</a></p>

                </div>
            </form>
        </div>
    </div>
</div>
