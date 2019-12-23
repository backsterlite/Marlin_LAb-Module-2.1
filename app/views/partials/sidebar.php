
    <div class="col-lg-4 sidebar-widgets">
        <div class="widget-wrap">
            <div class="single-sidebar-widget newsletter-widget">
                <h4 class="single-sidebar-widget__title">Newsletter</h4>
                <form action="" method="post">
                <div class="form-group mt-30">
                    <div class="col-autos">

                        <input type="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Enter email'">
                    </div>
                </div>
                <button class="bbtns d-block mt-20 w-100" type="submit">Subcribe</button>
                </form>
            </div>


            <div class="single-sidebar-widget post-category-widget">
                <h4 class="single-sidebar-widget__title">Category</h4>
                <ul class="cat-list mt-20">
                    <?php foreach(getAllCategories() as $category): ?>
                    <li>
                        <a href="/category/<?= $category['id']?>" class="d-flex justify-content-between">
                            <p><?= $category['title']?></p>
                            <p>(<?= $category['post_counter']?>)</p>
                        </a>
                    </li>

                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="single-sidebar-widget popular-post-widget">
                <h4 class="single-sidebar-widget__title">Popular Post</h4>
                <div class="popular-post-list">
                    <?php foreach(getPopularPosts() as $popularPost): ?>
                    <div class="single-post-list">
                        <div class="thumb">
                            <img class="card-img rounded-0" src="<?= getImage('post', $popularPost['image'])?>" alt="">
                            <ul class="thumb-info">
                                <li><a href="<?= config('link')['autor'] . $popularPost['user_id']?>"><?= acert(getUser($popularPost['user_id'])['username'], 10)?></a></li>
                                <li><a href="<?= config('link')['date'] . $popularPost['created_at']?>"><?= date('M d', strtotime($popularPost['date']))?></a></li>
                            </ul>
                        </div>
                        <div class="details mt-20">
                            <a href="<?=config('link')['post'] . $popularPost['slug']?>">
                                <h6><?= $popularPost['title']?></h6>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <div class="single-sidebar-widget tag_cloud_widget">
                <h4 class="single-sidebar-widget__title">Popular Tags</h4>
                <ul class="list">
                    <?php foreach(getTags() as $tag): ?>
                    <li>
                        <a href="<?= config('link')['tag'] . $tag['id']?>">#<?= $tag['title']?></a>
                    </li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
