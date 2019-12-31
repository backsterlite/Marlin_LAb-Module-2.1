<?php $this->layout('Admin/layout', ['title' => 'Admin']) ?>
<!-- Content Wrapper. Contains page content -->

                <div class="box-body">
                    <h3>Здесь вы можете управлять всем сайтом</h3>
                    <!-- =========================================================== -->

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= dataBaseCounterAll('posts')?></h3>

                                    <p>Created Posts</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-sticky-note"></i>
                                </div>
                                <a href="/admin/post" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= dataBaseCounterAll('category')?></h3>

                                    <p>All Categories</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bookmark"></i>
                                </div>
                                <a href="/admin/category" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= dataBaseCounterAll('tags')?></h3>

                                    <p>All Tags</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-hashtag"></i>
                                </div>
                                <a href="/admin/tags" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= dataBaseCounterAll('comments')?></h3>

                                    <p>All Comments</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <a href="/admin/comments" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?= dataBaseCounterAll('users')?></h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="/admin/users" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->
                </div>
                <!-- /.box-body -->


