<?php $this->layout('layout', ['title' => 'HomePage']) ?>


<div class="conteiner">
    <div class="row">
        <div class="col-md-8 offset-2">
            <?php echo flash();?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($posts as $post):  ?>
                    <tr>
                        <th scope="row"><?php echo $post['id']; ?></th>

                        <td width="700"><a href="post/show/<?php echo $post['id']; ?>"><?php echo $post['title']; ?> </a></td>

                        <td>
                            <a href="/post/edit/<?php echo $post['id']; ?>" class="btn btn-warning">EDIT</a>
                            <a href="/post/delete/<?php echo $post['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">DELETE</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" >
                <?= paginator($paginator);?>
            </nav>

        </div>
    </div>
</div>