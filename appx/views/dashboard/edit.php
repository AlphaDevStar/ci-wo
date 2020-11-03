<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<a href="">Dashboard</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<span>Edit User</span>
				</li>
			</ul>

		</div>
		<!-- END PAGE BAR -->
		<!-- BEGIN PAGE TITLE-->
		<div style="display: inline-block;margin-top: 30px;">
			<label style="float: left;margin-top: 10px;margin-right: 20px;">User Name</label>
			<input  style="float: left;width: 300px;" type="text" name="search_name" id="name" class="form-control"  placeholder="Name" value="<?= $user['name']?>"/>
		</div>
		<div style="margin-top: 20px;"  class="role-div">
			<label style="float: left;margin-top: 10px;margin-right: 20px;">User Email</label>
			<input  style="float: left;width: 300px; margin-left: 4px;" type="text" name="search_name" id="email" class="form-control" placeholder="Email" value="<?= $user['email']?>" />
		</div>

		<div style="margin-top: 20px;"  class="role-div">
			<label style="float: left;margin-top: 10px;margin-right: 20px;">User Role</label>
			<select style="float: left;width: 300px; margin-left: 11px;" class="form-control" id="role">
				<option value="0" <? if ($user['role'] == 0) { ?> selected <? } ?>>User</option>
				<option value="1" <? if ($user['role'] == 1) { ?> selected <? } ?>>Staff</option>
			</select>
		</div>
		<div style="margin-top: 40px;margin-left: 200px;">
			<input type="button" value="Update" class="btn green btn-submit"  style="border-radius: 5px !important;" onclick="updateData();return false;"/>
		</div>
		</div>
	</div>
	<input type="hidden" id="user-id" class="form-control" value="<?= $user['id']?>"/>
</div>
<script>
	function  updateData() {
		var postdata = {};
		postdata['id'] = document.getElementById('user-id').value;
		postdata['name'] = document.getElementById('name').value;
		postdata['email'] = document.getElementById('email').value;
		postdata['role'] = document.getElementById('role').value;
		if (postdata['name'] == "") {
			bootbox.alert("Please input name");
			return;
		} else {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>dashboard/update",
				data: postdata,
				success: function (data) {
					bootbox.alert("Updated successfully!");
				}
			});
		}
	}
</script>
