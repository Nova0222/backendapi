<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">

<h3 class="title-pages">Users</h3>


<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').dataTable( {
  "pageLength": 50
} );

} );
</script>
<style type="text/css">
	label{font-size: 13px;}
	th{border-bottom-width: 1px !important;}
	.view-button{border: 1px solid; border-radius: 4px; padding: 1px 7px; cursor: pointer; width: 100%; display: inline; text-align: center; border-color: #000000; color: #000000; font-size: 11px;}
	.view-button:hover{color: #000000; border-color: #000000;}

</style>

<div class="panel-body" style="padding: 1px 10px 1px 1px;font-size: 13px;">
<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
    <thead>
            <tr>
            	<th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Goal</th>
                <th>Weight</th>
                <th>Height</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Joined</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Goal</th>
                <th>Weight</th>
                <th>Height</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Joined</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
            	<td><?php echo $user['user_id']; ?></td>
                <td><?php echo $user['user_name']; ?></td>
                <td><div class="ellipsis" style="width: 150px"><?php echo $user['user_email']; ?></div></td>
                <td><?php echo $user['user_goal']; ?></td>
                <td><?php echo $user['user_weight']; ?></td>
                <td><?php echo $user['user_height']; ?></td>
                <td><?php echo $user['user_age']; ?></td>
                <td><?php echo $user['user_gender']; ?></td>
                <td><?php echo fecha($user['user_date']); ?></td>
                <td>
                <?php $status = $user['user_status']; if ($status == '1') {
                  echo "<span class='true'></span>";
                }else{ echo "<span class='false'></span>"; } ?></td>
                <td>                
                <a href="../controller/edit_user.php?id=<?php echo $user['user_id']; ?>" style="font-size: 14px;color: #000000;"><i class="fa fa-cog"></i></a>
    			<a onclick="alertdelete_<?php echo $user['user_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #000000;"><i class="fa fa-trash-o"></i></a>
    			    <script type="text/javascript">
  function alertdelete_<?php echo $user['user_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_user.php?id=<?php echo $user['user_id']; ?>" });}
  </script>
    			</td>
            </tr>
        <?php endforeach; ?>

        </tbody>
</table>

</div>      
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>


</div>