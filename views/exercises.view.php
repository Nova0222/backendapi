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
                            <h5>Exercises</h5>
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
                <th>Bodyparts</th>
                <th>Equi.</th>
                <th>Level</th>
                <th>Reps</th>
                <th>Rest</th>
                <th>Sets</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Bodyparts</th>
                <th>Equi.</th>
                <th>Level</th>
                <th>Reps</th>
                <th>Rest</th>
                <th>Sets</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($exercises as $exercise): ?>
            <tr>
              <td><?php echo $exercise['exercise_id']; ?></td>
                <td width="30px" align="center"><img src="../images/<?php echo $exercise['exercise_image']; ?>" style="width: 40px; height: 40px; padding: 2px;"></td>
                <td><div style="width: 200px"><?php echo $exercise['exercise_title']; ?></div></td>
                <td><div class="ellipsis" style="width: 80px"><?php echo $exercise['bodypart_title']; ?></div></td>
                <td><div class="ellipsis" style="width: 80px"><?php echo $exercise['equipment_title']; ?></div></td>
                <td><div class="ellipsis" style="width: 60px"><?php echo $exercise['level_title']; ?></div></td>
                <td><?php echo $exercise['exercise_reps']; ?></td>
                <td><?php echo $exercise['exercise_rest']; ?></td>
                <td><?php echo $exercise['exercise_sets']; ?></td>
                <td>
                <a href="../controller/edit_exercise.php?id=<?php echo $exercise['exercise_id']; ?>" style="font-size: 14px;color: #000000;"><i class="fa fa-cog"></i></a>
          <a onclick="alertdelete_<?php echo $exercise['exercise_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #000000;"><i class="fa fa-trash-o"></i></a>
              <script type="text/javascript">
  function alertdelete_<?php echo $exercise['exercise_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_exercise.php?id=<?php echo $exercise['exercise_id']; ?>" });}
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
