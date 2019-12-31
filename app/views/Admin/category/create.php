<?php $this->layout('Admin/layout', ['title' => 'Admin']) ?>
<div class="box-body">
    <div class="">
        <div class="box-header">
            <h2 class="box-title">Добавить категорию</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-6">
                <form action="/admin/category/store" action="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" >
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<!-- /.box-body -->
