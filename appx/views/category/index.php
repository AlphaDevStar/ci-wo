<main>
    <div class="container-fluid">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title border-bottom-with-margin">Please Input Category Information</h6>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label class="col-form-label">Category Name</label>
                        </div>
                        <div class="col-lg-12">
                            <input class="form-control" id="category-name"  type="text" placeholder="Type name..."/>
                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <div class="col-lg-4">
                            <label class="col-form-label">Category Description</label>
                        </div>
                        <div class="col-lg-12">
                            <textarea class="form-control" id="category-description"  rows="8" placeholder="Type description..."></textarea>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: 20px;">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-12">
                            <input class="theme btn btn-primary"  type="submit" value=" Add " onclick="addCategory();return false;"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function addCategory() {
        var postdata = {};
        postdata['name'] = document.getElementById('category-name').value;
        postdata['description'] = document.getElementById('category-description').value;
        if (postdata['name'] == "" ) {
            showErrorDialog("Please input category name!");
        } else if (postdata['description'] == ""){
            showErrorDialog("Please input category description!");
        } else {
            sendAjax('/category/add', postdata, function (data) {
                if (data != null) {
                    if (data == 0 || data == "0")
                    {
                        showSuccessDialog("Added successfully");
                    }
                    if (data == 1 || data == "1")
                    {
                        showErrorDialog("Already category exist.");
                    }
                }
            }, 'json');
        }
    }
</script>