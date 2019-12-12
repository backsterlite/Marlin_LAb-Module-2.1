<?php $this->layout('layout', ['title' => 'EditPost']) ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <h1>Create Task</h1>

            <form action="/post/update/<?php echo $post['id'] ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="<?php echo $post['title'] ?>" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Text</label>
                    <textarea  class="form-control" name="content" id="exampleInputPassword1" ><?php echo $post['content']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
