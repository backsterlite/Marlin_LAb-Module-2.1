<?php $this->layout('Admin/layout', ['title' => 'Admin']) ?>




<div class="box-body">
    <div class="box-title"><h3> Редактирование записи</h3></div>
</div>
<div class="box-body">
    <?= flash()?>
    <form action="/admin<?= config('link')['post']?>/store" method="post" id="form" enctype="multipart/form-data">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlInput5">Описание</label>
                <textarea type="text" class="form-control " name="title" id="exampleFormControlInput5" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput6">Статья</label>

                <textarea type="email" class="form-control " name="content" id="exampleFormControlInput6" rows="4"></textarea>

            </div>
            <div class="form-group ">
                <label  for="exampleFormControlSelect1">Категория</label>
                <select class="form-control " name="category" id="exampleFormControlSelect1">
                    <?php foreach(getAllCategories() as $category): ?>
                        <option value="<?= $category['id']?>"><?= $category['title']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput6"> Перечислите теги через запятую</label><br><br>
                <select id="banks_select" class="input-group-addon" style="width: 50%;" onchange="sel_bnk($('option:selected',this))">
                    <option>Выберите</option>
                    <?php foreach(getTags() as $tag): ?>
                        <option value="<?= $tag['title']?>"><?= $tag['title']?></option>
                    <?php endforeach; ?>
                </select>
                <div  id="_tags"></div>
                <input  type="text" id="_id" name="tag" class="form-control" value="">
            </div>
            <!-- checkbox -->
            <div class="form-group">

                <label>
                    <input type="checkbox" name="featured" class="flat-red">
                    Рекомендованое
                </label>

            </div>
            <div class="form-group">
                <label for="exampleFormControlInput7">Постер</label>
                <input type="file" class="form-control " name="image" id="exampleFormControlInput7">
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-warning" type="submit">Add Post</button>
        </div>

    </form>
</div>

<script>

    function sel_bnk(bnk) {
        var id = bnk.val();
        var name = bnk.text();
        if($("#_tags span#tag_" + id).length == 0 && id == 'Выберите')
        {
            return false;
        }else if ($("#_tags span#tag_" + id).length == 0 && id != '') {
            $('form#form input#_id').val($('form#form input#_id').val() + id + ',');
        }
    }
</script>