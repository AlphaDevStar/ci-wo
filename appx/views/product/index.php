<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-8 col-md-6">
        <div class="card productdesc">
            <div class="card-body">

<!--                <div class="form-group mt-3">-->
<!--                    <label class="form-label">Category</label>-->
<!--                    <select name="beast" id="product-category" class="form-control custom-select">-->
<!--                        <option value="0">--Select--</option>-->
<!--                        --><?// foreach ($category as $key => $value) { ?>
<!--                            <option value="--><?//= $value['id'] ?><!--">--><?//= $value['name'] ?><!--</option>-->
<!--                        --><?// } ?>
<!--                    </select>-->
<!--                </div>-->
                <div class="form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" data-checkboxes="mygroup" class="form-control" id="name" placeholder="Product name...">
                </div>
                <div class="form-group">
                    <label class="form-label">Product Description</label>
                    <textarea type="text" data-checkboxes="mygroup" class="form-control" id="description" rows="10" placeholder="Product description..."></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Short Description</label>
                    <textarea type="text" data-checkboxes="mygroup" class="form-control" id="short_description" rows="10" placeholder="Product short description..."></textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product data</h3>
            </div>
            <div class="card-body p-6">
                <div class="tab_wrapper first_tab">
                    <ul class="tab_list">
                        <li class="active">General</li>
                        <li>Inventory</li>
                        <li>Shipping</li>
                        <li>Linked Products</li>
                        <li>Advanced</li>
                    </ul>

                    <div class="content_wrapper">
                        <div class="tab_content active">
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Regular price</label>
                                <input type="text" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="regular_price" placeholder="Regular price...">
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Sale price</label>
                                <input type="text" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="sale_price" placeholder="Regular price...">
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Sale price date</label>
                                <input type="date" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="sale_date_from" placeholder="Regular price...">
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;"></label>
                                <input type="date" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="sale_date_to" placeholder="Regular price...">
                            </div>
                        </div>

                        <div class="tab_content">
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">SKU</label>
                                <input type="text" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="sku" placeholder="Regular price...">
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Stock status</label>
                                <select name="beast" id="stock_status" class="form-control custom-select" style="float: left; width: 75%;">
                                    <option value="0">In stock</option>
                                    <option value="1">Out of stock</option>
                                    <option value="2">On backorder</option>
                                </select>
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Sold individually</label>
                                <label class="custom-control custom-checkbox" style="float: left; width: 75%;">
                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" id="sold_individually">
                                    <span class="custom-control-label">Enable this to only allow one of this item to be bought in a single order</span>
                                </label>
                            </div>
                        </div>


                        <div class="tab_content">
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Weight(kg)</label>
                                <input type="text" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="weight" placeholder="0">
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Dimensions(cm)</label>
                                <div style="float: left; width: 25%;padding-right: 10px;" >
                                    <input type="text" data-checkboxes="mygroup" class="form-control" id="length" placeholder="Length">
                                </div>
                                <div style="float: left; width: 25%; padding-right: 5px; padding-left: 5px;" >
                                    <input type="text" data-checkboxes="mygroup" class="form-control" id="width" placeholder="Width">
                                </div>
                                <div style="float: left; width: 25%;padding-left: 10px;">
                                    <input type="text" data-checkboxes="mygroup" class="form-control" id="height" placeholder="Height">
                                </div>
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Shipping class</label>
                                <select name="beast" id="shipping_class" class="form-control custom-select" style="float: left; width: 75%;">
                                    <option value="0">No shipping class</option>
                                </select>
                            </div>
                        </div>

                        <div class="tab_content">
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Upsells</label>
                                <input type="text" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="upsells" placeholder="Search for a product...">
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Cross-sells</label>
                                <input type="text" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="cross_sells" placeholder="Search for a product...">
                            </div>
                        </div>

                        <div class="tab_content">
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Purchase note</label>
                                <textarea type="text" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="purchase_note" rows="3" placeholder="Add purchase note..."></textarea>
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Menu order</label>
                                <input type="number" style="float: left; width: 75%;" data-checkboxes="mygroup" class="form-control" id="menu_order" placeholder="0">
                            </div>
                            <div class="form-group" style="display: inline-block;width: 100%;">
                                <label class="form-label" style="float: left; width: 25%;">Enable reviews</label>
                                <label class="custom-control custom-checkbox" style="float: left; width: 75%;">
                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" id="enable_reviews">
                                    <span class="custom-control-label"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reviews</h3>
            </div>

            <div class="card-body">
                <textarea type="text" data-checkboxes="mygroup" class="form-control" id="comment" rows="5" placeholder="Add new comment..."></textarea>
<!--                <button class="btn btn-outline-warning" style="margin-top: 20px;" onclick="trySaveData();return false;">Add Comment</button>-->
            </div>

            <button class="btn btn-outline-warning" style="margin: 25px;" onclick="trySaveData();return false;">Save</button>
        </div>
    </div><!-- COL-END -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">

                <div class="card shadow" style="margin-top: 20px;">
                    <div class="card-header">
                        <h3 class="mb-0 card-title">Product Image</h3>
                    </div>
                    <div class="card-body">
                        <input type="file" id="photoFile" class="dropify" name="file" data-height="300" />
                    </div>
                </div>
            </div>

        </div>


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Categories</h3>
            </div>

            <div class="card-body">
                <div class="custom-controls-stacked">

                    <?php for($i = 0; $i < sizeof($category); $i ++) { ?>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" id="category_<?php echo $i?>" value="option1" <?php if($i ==0) { ?>checked <?php } ?>>
                            <span class="custom-control-label"><?php echo $category[$i]->name?></span>
                        </label>
                    <?php } ?>
                    <input type="hidden" id="category_count" value="<?php echo sizeof($category)?>"/>
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
</div>
<!-- ROW-1 CLOSED -->
<script>
    function trySaveData() {
        var data = {};
        var postdata = new FormData();
        data['name'] = document.getElementById('name').value;
        data['description'] = document.getElementById('description').value;
        var categoryCount = document.getElementById('category_count').value;
        var category = "";
        if(categoryCount > 0) {
            var isFirst = true;
            for(var i = 0; i < categoryCount; i ++) {
                var id = 'category_' + i;
                var categoryValue = document.getElementById(id).value;
                if(document.getElementById(id).checked) {
                    if(isFirst)
                    {
                        category = categoryValue;
                        isFirst = false;
                    } else {
                        category +=  ", " categoryValue;
                    }
                }
            }
            if(category == "") {
                category = document.getElementById('category_0').value;
            }
        }

        if (data['name'] == "") {
            showWarningDialog("Please input product name");
            return;
        } else if (data['description'] == "") {
            showWarningDialog("Please input  product description");
            return;
        } else {
            var url = "<?php echo base_url(); ?>product/add";
            postdata.append('photoFile', $('#photoFile')[0].files[0]);
            postdata.append('name', data['name'])
            postdata.append('description', data['description'])
            postdata.append('short_description', data['short_description'])
            postdata.append('regular_price', data['regular_price'])
            postdata.append('sale_price', data['sale_price'])
            postdata.append('sale_date_from', data['sale_date_from'])
            postdata.append('sale_date_to', data['sale_date_to'])
            postdata.append('sku', data['sku'])
            postdata.append('stock_status', data['stock_status'])
            postdata.append('sold_individually', data['sold_individually'])
            postdata.append('weight', data['weight'])
            postdata.append('length', data['length'])
            postdata.append('width', data['width'])
            postdata.append('height', data['height'])
            postdata.append('upsells', data['upsells'])
            postdata.append('cross_sells', data['cross_sells'])
            postdata.append('purchase_note', data['purchase_note'])
            postdata.append('menu_order', data['menu_order'])
            postdata.append('enable_reviews', data['enable_reviews'])
            postdata.append('comment', data['comment'])
            postdata.append('category', data['category'])

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