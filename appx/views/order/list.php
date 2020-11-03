<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Orders</h3>

            </div>
            <div class="card-body">
                <a class="btn btn-rss" onclick="pageMove('/order/index');" style="margin-bottom: 10px"><i class="fe fe-plus"></i>Add</a>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                        <tr>
                            <th class="wd-15p">No</th>
                            <th class="wd-15p">Order ID</th>
                            <th class="wd-20p">Product Name</th>
                            <th class="wd-20p">Amount</th>
                            <th class="wd-20p">Order Date</th>
                            <th class="wd-20p">Delivery Date</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($order as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['order_id'] ?></td>
                                <td><?php echo  $value['product_name'] ?></td>
                                <td><?php echo  $value['amount'] ?></td>
                                <td><?php echo  $value['order_date'] ?></td>
                                <td><?php echo  $value['delivered_date'] ?></td>
                                <td>
                                    <a class="btn btn-pinterest" style="margin-left: 5px;" onclick="clickDelete(<?php $value['id'] ?>);" ><i class="fe fe-trash"></i>Delete</a>
                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- TABLE WRAPPER -->
        </div>
        <!-- SECTION WRAPPER -->
    </div>
</div>
<!-- ROW-1 CLOSED -->

<script>


    function  clickDelete(id) {
        swal({
            title: "Warning",
            text: "Are you sure to delete?",
            type: "error",
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel'
        }, function (result) {
            if(result)
            {
                var url = "/category/delete";
                var postdata = {};
                postdata['id'] = id;

                sendAjax(url, postdata, function(data){
                    if(data) {
                        pageMove('/category/list');
                    }
                }, 'json');
            }
        })
    }

    function pageMove(url)
    {
        var formObj = document.getElementById("form");
        formObj.action = url;
        formObj.submit();
    }
</script>