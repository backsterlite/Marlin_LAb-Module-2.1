<?php $this->layout('layout'); ?>
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-md-center"><h3>Добавте новый ПОСТ</h3></div>
                    <?= flash()?>
                    <div class="card-body">
                        <form action="/post/store" method="post" id="form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Описание</label>

                                        <div class="col-md-8 offset-2">
                                            <textarea class="form-control" name="title" id="exampleFormControlTextarea1" rows="1"></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput6">Статья</label>

                                        <div class="col-md-8 offset-2">
                                            <textarea class="form-control" name="content" id="exampleFormControlInput6" rows="3"></textarea>

                                        </div>
                                    </div>
                                    <?php d(getAllCategories()) ?>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Выберите категорию</label>
                                        <div class="col-md-4 offset-4">
                                            <select class="form-control" name="category" id="exampleFormControlSelect1">

                                                <?php foreach (getAllCategories() as $category): ?>
                                                <option <?= ($category['id'] == '9')? 'selected': '';?> value="<?= $category['id']?>"><?= $category['title']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput6"> Перечислите теги через запятую</label>

                                        <div class="col-md-8 offset-2">
                                            <select id="banks_select" class="input-group-addon" style="width: 50%;" onchange="sel_bnk($('option:selected',this))">
                                                <option>Выберите</option>
                                                <?php foreach(getTags() as $tag): ?>
                                                <option value="<?= $tag['title']?>"><?= $tag['title']?></option>
                                               <?php endforeach; ?>
                                            </select>
                                            <div  id="_tags"></div>

                                            <input type="text" id="_id" name="tag" class="form-control" value="">
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="exampleFormControlInput7">Выберите картинку</label>
                                        <div class="col-md-8 offset-2">
                                            <input type="file" class="form-control " name="image" id="exampleFormControlInput7">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 offset-5">
                                    <button class="btn btn-warning" type="submit">Add Post</button>
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
          if($("#_tags span#tag_" + id).length == 0 && id != '') {
              $('form#form input#_id').val($('form#form input#_id').val() + id + ',');
          }
      }



</script>
