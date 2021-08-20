<?php require'sidebar.php'; ?>

<script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

<!--Page Container--> 
<section class="page-container">
    <div class="page-content-wrapper">

        

        <!--Main Content-->

 <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h5>Workouts</h5>
                        </div>
                    </div>

<div class="col-12">
                        <div class="block table-block mb-4" style="margin-top: 20px;">

                            <div class="row">
                                <div class="table-responsive">
<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
    <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Goal</th>
                <th>Level</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Goal</th>
                <th>Level</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($workouts as $workout): ?>
            <tr>
              <td><?php echo $workout['workout_id']; ?></td>
                <td width="40px" align="center"><img src="../images/<?php echo $workout['workout_image']; ?>" style="width: 40px; height: 40px; padding: 2px;"></td>
                <td><div class="ellipsis" style="width: 370px"><?php echo $workout['workout_title']; ?></div></td>
                <td><?php echo $workout['goal_title']; ?></td>
                <td><?php echo $workout['level_title']; ?></td>
                <td><?php echo $workout['workout_duration']; ?></td>
                                <td class="status">
                    <?php
                    $status = $workout['workout_status'];
                    if ($status == 1) {
                        echo '<span class="badge badge-pill bg-success">Active</span>';
                    }else{
                        echo '<span class="badge badge-pill bg-warning">Inactive</span>';
                    }
                    ?>
                </td>
                <td>
                <a href="../controller/edit_workout.php?id=<?php echo $workout['workout_id']; ?>" style="font-size: 14px;color: #000000;"><i class="fa fa-cog"></i></a>
          <a onclick="alertdelete_<?php echo $workout['workout_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #000000;"><i class="fa fa-trash-o"></i></a>
              <script type="text/javascript">
  function alertdelete_<?php echo $workout['workout_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_workout.php?id=<?php echo $workout['workout_id']; ?>" });}
  </script>
          </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
</table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
