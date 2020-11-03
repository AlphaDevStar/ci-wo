
<table class="table table-striped table-bordered table-hover" id="sample_2">
	<thead>
	<tr>
		<th>
			No
		</th>
		<th>
			Username
		</th>
		<th>
			Email
		</th>
		<th>
			Role
		</th>
		<th>
			Status
		</th>
	</tr>
	</thead>
	<tbody>

	<? $index = 1; ?>
	<? foreach ($users as $key => $value) { ?>
		<tr class="odd gradeX">

			<td><?=$index ?></td>
			<td><?=$value['name'] ?></td>
			<td><?=$value['email'] ?></td>
			<td class="center">
				<? if ($value['role'] == 1) { ?>
					Staff
				<? } else { ?>
					User
				<? }  ?>
			</td>
			<td>
				<button class="btn btn-outline btn-circle btn-sm purple" onclick="pageMove('/dashboard/edit?id=<?=$value['id'] ?>');"><i class="fa fa-edit"></i> Edit</button>
				<button class="btn btn-outline btn-circle dark btn-sm black" onclick="bootbox.confirm(g_confirmDeleteMsg, function(result) {
					if (result)
					deleteUser('<?=$value['id'] ?>');
					}); return false;"><i class="fa fa-trash-o"></i> Delete</button>
			</td>
		</tr>
		<? $index += 1; ?>
	<? } ?>
	</tbody>
</table>
