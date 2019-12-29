<?php $this->layout('layout'); ?>
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3> Редактирование записи</h3></div>

                    <div class="card-body">
                        <?= flash()?>
                        <form action="<?= config('link')['post'] . 'id/' . $post['id']?>/update" method="post" id="form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput5">Описание</label>

                                        <div class="col-md-8">
                                            <textarea type="text" class="form-control " name="title" id="exampleFormControlInput5" rows="1"><?= $post['title']?></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput6">Статья</label>

                                        <div class="col-md-8">
                                            <textarea type="email" class="form-control " name="content" id="exampleFormControlInput6" rows="4"><?= $post['content']?></textarea>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Категория</label>
                                        <div class="col-md-4">
                                            <select class="form-control " name="category" id="exampleFormControlSelect1">
                                                <?php foreach(getAllCategories() as $category): ?>
                                                <option <?= ($category['id'] == $post['category_id'])? 'selected': ''?> value="<?= $category['id']?>"><?= $category['title']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput6"> Перечислите теги через запятую</label>

                                        <div class="col-md-8 ">
                                            <select id="banks_select" class="input-group-addon" style="width: 50%;" onchange="sel_bnk($('option:selected',this))">
                                                <option>Выберите</option>
                                                <?php foreach(getTags() as $tag): ?>
                                                    <option value="<?= $tag['title']?>"><?= $tag['title']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div  id="_tags"></div>

                                            <input type="text" id="_id" name="tag" class="form-control" value="<?= $tags;?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput7">Постер</label>
                                        <div class="col-md-8">
                                            <input type="file" class="form-control " name="image" id="exampleFormControlInput7">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img src="<?= getImage('post', $post['image'])?>" alt="" class="img-fluid">
                                    <div class="form-check-inline ">
                                        <input type="checkbox" name="deletePoster" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Удалить постер</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-warning" type="submit">Edit profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
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