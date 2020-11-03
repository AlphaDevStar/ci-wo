<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-7 col-md-6">
        <div class="card productdesc">
            <div class="card-body">

                <div class="form-group mt-3">
                    <label class="form-label">Category</label>
                    <select name="beast" id="product-category" class="form-control custom-select">
                        <option value="0">--Select--</option>
                        <? foreach ($category as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>" <? if ($value['id'] == $product['category_id']) { ?> selected <? } ?> ><?= $value['name'] ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-name" placeholder="Product name..." value="<?= $product['name']?>">
                </div>
                <div class="form-group">
                    <label class="form-label">Product Description</label>
                    <textarea type="text" data-checkboxes="mygroup" class="form-control" id="product-desc" rows="10" placeholder="Product description..."><?= $product['description']?></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Old Price</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-old-price" placeholder="Old price..." value="<?= $product['old_price']?>">
                </div>
                <div class="form-group">
                    <label class="form-label">New Price</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-new-price" placeholder="New price..." value="<?= $product['new_price']?>">
                </div>
            </div>
        </div>
    </div><!-- COL-END -->
    <div class="col-lg-5 col-md-6">
        <div class="card">
            <div class="card-body">

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="mb-0 card-title">Product Image</h3>
                    </div>
                    <div class="card-body">
<!--                        <input type="file" id="photoFile" class="dropify" name="file" data-height="300" />-->
                        <input type="file" id="photoFile" class="dropify" data-default-file="<?= UPLOAD_DIR ?>/products/<?= $product['image'] ?>" data-height="300"  />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Amount</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-amount" placeholder="Product amount..."  value="<?= $product['amount']?>">
                </div>
            </div>
            <button class="btn btn-outline-warning" style="margin: 25px;" onclick="trySaveData();return false;">Save</button>
            <input type="hidden" id="product-id" value="<?= $product['id']?>">
            <input type="hidden" id="product-image" value="<?= $product['image']?>">

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