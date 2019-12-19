<?php $this->layout('layout', ['title' => 'Backster | Login']) ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 my-5">
            <form action="/user/signup" method="post">
                <div class="form-group  ">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" name="username" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Length not more 15  characters</small>
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

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <p>Already have an account? <a href="/user/login" class="blue-text">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</div>