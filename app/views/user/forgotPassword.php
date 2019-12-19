<?php $this->layout('layout', ['title' => 'Forgot Password']) ?>

<div class="container">
    <div class="row">

        <div class="col-md-8 offset-2 my-5">
            <?=  flash(); ?>
            <form action="/user/forgot_password" method="post" >
                <div class="form-group  ">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <p>Did not get the email? <a href="/user/resend_email" class="blue-text">Resend request</a></p>

                </div>
            </form>
        </div>
    </div>
</div>