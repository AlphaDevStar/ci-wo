<main>
    <div class="container-fluid">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title border-bottom-with-margin">Please Input Order Information</h6>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label class="col-form-label">Product Name</label>
                        </div>
                        <div class="col-lg-12">
                            <input class="form-control" id="order-product-name"  type="text" placeholder="Type Product name..."/>
                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <div class="col-lg-4">
                            <label class="col-form-label">Amount</label>
                        </div>
                        <div class="col-lg-12">
                            <input class="form-control" id="order-amount"  type="text" placeholder="Type Amount..."/>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: 20px;">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-12">
                            <input class="theme btn btn-primary"  type="submit" value=" Add " onclick="addOrder();return false;"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function addOrder() {
        var postdata = {};
        postdata['name'] = document.getElementById('order-product-name').value;
        postdata['amount'] = document.getElementById('order-amount').value;
        if (postdata['name'] == "" ) {
            showErrorDialog("Please input product name!");
        } else if (postdata['amount'] == ""){
            showErrorDialog("Please input amount!");
        } else {
            sendAjax('/order/add', postdata, function (data) {
                if (data != null) {
                    if (data == 0 || data == "0")
                    {
                        showSuccessDialog("Added successfully");
                    }
                    if (data == 1 || data == "1")
                    {
                        showErrorDialog("Already Order exist.");
                    }
                }
            }, 'json');
        }
    }
</script>