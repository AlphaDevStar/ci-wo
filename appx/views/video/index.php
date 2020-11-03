<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-5 col-md-6">
        <div class="card">
            <div class="card-body">

                <div class="card shadow" style="margin-top: 20px;">
                    <div class="card-header">
                        <h3 class="mb-0 card-title">Video</h3>
                    </div>
                    <div class="card-body">
                        <input type="file" id="photoFile" class="dropify" name="file" data-height="300" />
                    </div>
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
    <div class="col-lg-7 col-md-6">
        <div class="card productdesc">
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Video Title</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="product-name" placeholder="Video title...">
                </div>
                <div class="form-group">
                    <label class="form-label">Video Description</label>
                    <textarea type="text" data-checkboxes="mygroup" class="form-control" id="product-desc" rows="10" placeholder="Video description..."></textarea>
                </div>

                <div class="form-group mt-3">
                    <label class="form-label">Product</label>
                    <select name="beast" id="product-category" class="form-control custom-select">
                        <option value="0">--Select--</option>
                        <? foreach ($products as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <? } ?>
                    </select>
                </div>
            </div>
            <button class="btn btn-outline-warning" style="margin: 25px;" onclick="trySaveData();return false;">Save</button>
        </div>
    </div><!-- COL-END -->
</div>
<!-- ROW-1 CLOSED -->
<script>
    function trySaveData() {
        var data = {};
        var postdata = new FormData();
        data['product_id'] = document.getElementById('product-category').value;
        data['name'] = document.getElementById('product-name').value;
        data['description'] = document.getElementById('product-desc').value;

        if($('#photoFile')[0].files[0] == null) {
            showWarningDialog("Please select video");
            return;
        } else if (data['name'] == "") {
            showWarningDialog("Please input video name");
            return;
        } else if (data['description'] == "") {
            showWarningDialog("Please input  video description");
            return;
        } else if(data['product_id'] == 0 || data['product_id'] == "0") {
            showWarningDialog("Please select product");
            return;
        } else {
            var url = "<?php echo base_url(); ?>video/add";
            postdata.append('photoFile', $('#photoFile')[0].files[0]);
            postdata.append('product_id', data['product_id']);
            postdata.append('name', data['name'])
            postdata.append('description', data['description'])
            sendAjaxWithFile(url, postdata, function(data){
                if(data) {
                    if(data == 0 || data == '0')
                        showWarningDialog("Add Failed!");
                    else {
                        document.getElementById('product-name').value = "";
                        document.getElementById('product-desc').value = "";
                        document.getElementById('product-category').value = 0;
                        $('photoFile').val("");
                        showSuccessDialog("Added successfully!");
                    }
                }
            });
        }
    }
</script>