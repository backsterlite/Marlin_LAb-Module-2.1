<?php $this->layout('layout', ['title' => 'Forgot Password']) ?>

<div class="container">
    <div class="row">

        <div class="col-md-8 offset-2 my-5">
                <h3>Enter new password here:</h3>
            <?=  flash(); ?>
            <form action="/user/change_password" method="post" >
                <div class="form-group mb-0">
                    <input type="hidden" name="selector" value="<?= $selector?>" class="form-control ">
                </div>
                <div class="form-group mb-0">
                    <input type="hidden" name="token" value="<?= $token?>" class="form-control ">
                </div>
                <div class="form-group mb-0">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control " id="exampleInputPassword1">
                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <p>Did not get the email? <a href="#" class="blue-text">Resend request</a></p>

                </div>
            </form>
        </div
    </div>
</div>
</div>