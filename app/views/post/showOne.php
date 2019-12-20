<?php $this->layout('layout', ['title' =>  $post['title']]); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
    <div class="container">
        <div class="hero-banner hero-banner--sm">
            <div class="hero-banner__content">
                <h1><?= acert($post['title'], 15) ?></h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post Details</li>
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
                <div class="main_blog_details">
                    <img class="img-fluid" src="<?= __DIR__ . '/'. $post['image']?>" alt="">
                    <a href="#"><h4><?= acert($post['title'], 35)?></h4></a>
                    <div class="user_details">
                        <div class="float-left">
                            <?php foreach (getTags() as $tag):?>
                            <a href="/post/tag/<?= $tag['slug']?>"><?= $tag['title']?></a>
                            <?php endforeach; ?>
                        </div>
                        <div class="float-right mt-sm-0 mt-3">
                            <div class="media">
                                <div class="media-body">
                                <h5><?= getUser($post['user_id'])['username']?></h5>
                                    <p><?= date('d M, Y H:i', strtotime($post['date']))?></p>
                                </div>
                                <div class="d-flex">
                                    <img width="42" height="42" src="<?= __DIR__ . getUser($post['user_id'])['image']?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><?= nl2br($post['content']);?></p>
                    </div>
                <div class="comments-area">
                    <h4><?= (commentsCount($post['id']) < 10)? '0'.commentsCount($post['id']):commentsCount($post['id']) ?> Comments</h4>
                    <?php foreach($comments as $comment): ?>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img width="60" src="<?= (getUser($comment['user_id'])['image'])?
                                        __DIR__ . '/' . getUser($comment['user_id'])['image']: '/public/assets/img/user/no-user.png'?>" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#"><?= getUser($comment['user_id'])['username']?></a></h5>
                                    <p class="date"><?= date('F d, Y H:i', strtotime($post['date']))?></p>
                                    <p class="comment">
                                        <?= $comment['text']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <?php if(components(\Delight\Auth\Auth::class)->isLoggedIn()) :?>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form>

                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        </div>
                        <a href="#" class="button submit_btn">Post Comment</a>
                    </form>
                </div>
                <?php else: ?>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-6 name">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 email">
                                <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        </div>
                        <a href="#" class="button submit_btn">Post Comment</a>
                    </form>
                </div>
                <?php endif; ?>
            </div>

            <!-- Start Blog Post Siddebar -->

            <?= $this->insert('partials/sidebar')?>
            <!-- End Blog Post Siddebar -->

        </div>
        <?= $this->insert('partials/paginate', ['paginator' => $paginator])?>

    </div>
</section>
<!--================ End Blog Post Area =================-->


