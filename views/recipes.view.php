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
                            <h5>Recipes</h5>
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
                <th>Category</th>
                <th>Protein</th>
                <th>Fat</th>
                <th>Time</th>
                <th>Featured</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Protein</th>
                <th>Fat</th>
                <th>Time</th>
                <th>Featured</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($diets as $diet): ?>
            <tr>
              <td><?php echo $diet['diet_id']; ?></td>
                <td width="40px" align="center"><img src="../images/<?php echo $diet['diet_image']; ?>" style="width: 40px; height: 40px; padding: 2px;"></td>
                <td><div class="ellipsis" style="width: 250px"><?php echo $diet['diet_title']; ?></div></td>
                <td><?php echo $diet['category_title']; ?></td>
                <td><?php echo $diet['diet_protein']; ?></td>
                <td><?php echo $diet['diet_fat']; ?></td>
                <td><?php echo $diet['diet_time']; ?></td>
                
                                <td class="status">
                    <?php
                    $status = $diet['diet_featured'];
                    if ($status == 1) {
                        echo '<span class="badge badge-pill bg-success">Yes</span>';
                    }else{
                        echo '<span class="badge badge-pill bg-warning">No</span>';
                    }
                    ?>
                </td>
                                <td class="status">
                    <?php
                    $status = $diet['diet_status'];
                    if ($status == 1) {
                        echo '<span class="badge badge-pill bg-success">Yes</span>';
                    }else{
                        echo '<span class="badge badge-pill bg-warning">No</span>';
                    }
                    ?>
                </td>
                <td>
                <a href="../controller/edit_recipe.php?id=<?php echo $diet['diet_id']; ?>" style="font-size: 14px;color: #000000;"><i class="fa fa-cog"></i></a>
          <a onclick="alertdelete_<?php echo $diet['diet_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #000000;"><i class="fa fa-trash-o"></i></a>
              <script type="text/javascript">
  function alertdelete_<?php echo $diet['diet_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_diet.php?id=<?php echo $diet['diet_id']; ?>" });}
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
