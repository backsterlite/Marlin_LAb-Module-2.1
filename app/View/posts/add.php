<?php $this->layout('layout', ['title' => 'CreatePost']) ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <?php echo flash()->display(); ?>
            <h1>Create Task</h1>

            <form action="/post/store" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Text</label>
                    <textarea  class="form-control" name="content" id="exampleInputPassword1"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

