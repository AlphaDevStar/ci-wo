<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-7 col-md-6">
        <div class="card">
            <div class="card-body">

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="mb-0 card-title">Video</h3>
                    </div>
                    <div class="card-body" style="text-align: center;">
<!--                        <input type="file" id="photoFile" class="dropify" name="file" data-height="300" />-->
                            <video id="myVideo" width="500"><source src="<?= UPLOAD_DIR ?>/videos/<?= $video['video'] ?>" type="video/mp4"></video>
                    </div>

                </div>
                <div style="text-align: center;">
                    <a class="btn btn-primary" onclick="playVideo();">Play</a>
                    <a class="btn btn-secondary" onclick="pauseVideo();">Pause</a>
                </div>


                <div class="mt-4 mb-4">
                    <h3><?= $video['title']?></h3>
                    <h5 class="mb-3 mt-2">Description</h5>
                    <p><?= $video['v_description']?></p>
                </div>
            </div>

        </div>
        <div  style="visibility: hidden;height: 0;">
            <div class="chart-wrapper">
                <canvas id="doughutChart" class="donutShadow"></canvas>
            </div>
            <div class="chart-wrapper ">
                <canvas id="revenue" class="areaChart chart-dropshadow"></canvas>
            </div>
        </div>
    </div><!-- COL-END -->
    <div class="col-lg-5 col-md-6">
        <div class="card productdesc">
            <div class="card-body">
                <div class="mt-4 mb-4">
                    <h3><?= $video['name']?></h3>
                    <h5 class="mb-3 mt-2">Description</h5>
                    <p><?= $video['description']?></p>
                </div>
                <div class="form-group">
                    <label class="form-label">Old Price</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-old-price" placeholder="Old price..." value="<?= $video['old_price']?>" disabled/>
                </div>
                <div class="form-group">
                    <label class="form-label">New Price</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-new-price" placeholder="New price..." value="<?= $video['new_price']?>" disabled/>
                </div><div class="form-group">
                    <label class="form-label">Amount</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-old-price" placeholder="Amount..." value="<?= $video['amount']?>" disabled/>
                </div>

                <div class="panel panel-primary">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li><a href="#tab1" class="active" data-toggle="tab">Recent Reviews(2)</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="media mb-5">
                                <div class=" mr-3">
                                    <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= INCLUDE_DIR ?>/images/users/5.jpg"> </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">Gavin Murray</h5>
                                    <div class="text-warning mb-0">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <p class="font-13 text-muted mb-0">Good Looking.........</p>
                                    <!--                                    <a href=""><span class="badge btn-custom badge-pill">Reply</span></a>-->
                                </div>
                            </div>
                            <div class="media mb-5">
                                <div class=" mr-3">
                                    <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= INCLUDE_DIR ?>/images/users/15.jpg"> </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">Paul Smith</h5>
                                    <div class="text-warning mb-0">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <p class="font-13 text-muted mb-0">Very nice ! On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the </p>
                                    <!--                                    <a href=""><span class="badge btn-custom badge-pill">Reply</span></a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- COL-END -->
</div>
<!-- ROW-1 CLOSED -->
<script>
    var vid = document.getElementById("myVideo");
    function playVideo() {
        vid.play();
    }

    function pauseVideo() {
        vid.pause();
    }
</script>