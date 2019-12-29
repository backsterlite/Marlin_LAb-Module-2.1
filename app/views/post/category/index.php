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
                    <?php foreach($posts as $post): ?>
                    <div class="col-md-6">
                        <div class="single-recent-blog-post card-view">
                            <div class="thumb">
                                <img class="card-img rounded-0" src="<?= getImage('post', $post['image'])?>" alt="">
                                <ul class="thumb-info">
                                    <li><a href="<?= config('link')['autor'] . $post['user_id']?>"><i class="ti-user"></i><?= acert(getUser($post['user_id'])['username'], 10)?></a></li>
                                    <li><i class="ti-themify-favicon"></i><?= commentsCount($post['id']);?> Comments</li>
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
            <?= $this->insert('partials/sidebar')?>
            <!-- End Blog Post Siddebar -->
        </div>
</section>