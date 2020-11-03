<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-7 col-md-6">
        <div class="card">
            <div class="card-body">

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="mb-0 card-title">Product Image</h3>
                    </div>
                    <div class="card-body">
                            <input type="file" id="photoFile" class="dropify" name="file" data-height="300"  data-default-file="<?= UPLOAD_DIR ?>/products/<?= $product['image'] ?>" disabled />
<!--                        <video ><source src="--><?//= UPLOAD_DIR ?><!--/products/--><?//= $video['video'] ?><!--" id="myVideo"></video>-->
                    </div>

                </div>


                <div class="mt-4 mb-4">
                    <h3><?= $product['name']?></h3>
                    <h5 class="mb-3 mt-2">Description</h5>
                    <p><?= $product['description']?></p>
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
                <div class="form-group mt-3">
                    <label class="form-label">Products</label>
                    <select name="beast" id="product-category" class="form-control custom-select" disabled>
                        <option value="0">--Select--</option>
                        <? foreach ($category as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>" <? if ($value['id'] == $product['id']) { ?> selected <? } ?> ><?= $value['name'] ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Old Price</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-old-price" placeholder="Old price..." value="<?= $product['old_price']?>" disabled/>
                </div>
                <div class="form-group">
                    <label class="form-label">New Price</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-new-price" placeholder="New price..." value="<?= $product['new_price']?>" disabled/>
                </div><div class="form-group">
                    <label class="form-label">Amount</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-old-price" placeholder="Amount..." value="<?= $product['amount']?>" disabled/>
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
    function trySaveData() {
        var data = {};
        var postdata = new FormData();
        data['category_id'] = document.getElementById('product-category').value;
        data['name'] = document.getElementById('product-name').value;
        data['description'] = document.getElementById('product-desc').value;
        data['old_price'] = document.getElementById('product-old-price').value;
        data['new_price'] = document.getElementById('product-new-price').value;
        data['amount'] = document.getElementById('product-amount').value;

        if(data['category_id'] == 0 || data['category_id'] == "0") {
            showWarningDialog("Please select product category");
            return;
        }
        else if (data['name'] == "") {
            showWarningDialog("Please input product name");
            return;
        } else if (data['description'] == "") {
            showWarningDialog("Please input  product description");
            return;
        } else if (data['old_price'] == "") {
            showWarningDialog("Please input product old price");
            return;
        } else if (data['new_price'] == "") {
            showWarningDialog("Please input product new price");
            return;
        } else if (data['amount'] == "") {
            showWarningDialog("Please input product amount");
            return;
        } else {
            var url = "<?php echo base_url(); ?>product/update";
            if($('#photoFile')[0].files[0] == null) {
                postdata.append('image',document.getElementById('product-image').value);
            } else {
                postdata.append('image','');
                postdata.append('photoFile', $('#photoFile')[0].files[0]);
            }
            postdata.append('id',document.getElementById('product-id').value);
            postdata.append('category_id', data['category_id']);
            postdata.append('name', data['name'])
            postdata.append('description', data['description'])
            postdata.append('old_price', data['old_price'])
            postdata.append('new_price', data['new_price'])
            postdata.append('amount', data['amount'])
            sendAjaxWithFile(url, postdata, function(data){
                if(data) {
                    if(data == 0 || data == '0')
                        showWarningDialog("Add Failed!");
                    else {
                        showSuccessDialog("Added successfully!");
                    }
                }
            });
        }
    }
</script>