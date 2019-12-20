<?php $this->layout('layout', ['title' =>  "All Categories"]) ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
    <div class="container">
        <div class="hero-banner hero-banner--sm">
            <div class="hero-banner__content">
                <h1>All Categories </h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Categories </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--================ Hero sm Banner end =================-->

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php d($posts) ?>
                    <?php foreach($posts as $post): ?>
                    <div class="col-md-6">
                        <div class="single-recent-blog-post card-view">
                            <div class="thumb">
                                <img class="card-img rounded-0" src="/public/assets/img/blog/thumb/thumb-card1.png" alt="">
                                <ul class="thumb-info">
                                    <li><a href="#"><i class="ti-user"></i><?= acert(getUser($post['user_id'])['username'], 10)?></a></li>
                                    <li><a href="#"><i class="ti-themify-favicon"></i><?= commentsCount($post['id']);?> Comments</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20 text-md-center">
                                <a class="button" href="/category/<?= getCategory($post['category_id'])['id'];?>"><?= getCategory($post['category_id'])['title'];?> </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <!-- Start Blog Post Siddebar -->
            <?= $this->insert('partials/sidebar', ['categories' => $categories, 'popularPosts' => $popularPosts, 'tags' => $tags])?>
            <!-- End Blog Post Siddebar -->
        </div>
</section>