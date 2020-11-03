<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Videos</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                        <tr>
                            <th class="wd-15p">No</th>
                            <th class="wd-15p">Video</th>
                            <th class="wd-15p">Title</th>
                            <th class="wd-20p">Description</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($video as $key => $value) { ?>
                        <tr>
                            <td><? echo $value['id'] ?></td>
                            <td><video width="120" src="<?= UPLOAD_DIR ?>/videos/<?= $value['video'] ?>"></video></td>
                            <td><? echo $value['title'] ?></td>
                            <td>
                                <span>
                                    <? if (strlen($value['description']) <= 100) { ?>
                                        <?=$value['description'];?>
                                    <? } else { ?>
                                        <?=substr($value['description'], 0, 100) . "...";?>
                                    <? }  ?>
                                </span>
                            </td>
                            <td>
                                <a href="/video/detail?id=<?=$value['id'] ?>" class="btn btn-outline-info">Detail</a>
                                <a class="btn btn-outline-danger" onclick="clickDelete(<?=$value['id'] ?>);">Delete</a>
                            </td>
                        </tr>
                        <? } ?>
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
                var url = "/video/delete";
                var postdata = {};
                postdata['id'] = id;

                sendAjax(url, postdata, function(data){
                    if(data) {
                        pageMove('/video/list');
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