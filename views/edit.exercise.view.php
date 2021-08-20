<?php require'sidebar.php'; ?>

<!--Page Container--> 
<section class="page-container">
    <div class="page-content-wrapper">

        

        <!--Main Content-->

 <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                                        <div class="block-heading d-flex align-items-center title-pages">
                    <h5 class="text-truncate">Edit Exercise</h5>
                </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<div class="form-row">
  <div class="form-group col-md-12">
    <div class="block col-md-12" style="padding-bottom: 35px">

<input type="hidden" value="<?php echo $exercise['exercise_id']; ?>" name="exercise_id">

   <input type="hidden" value="<?php echo $exercise['exercise_id']; ?>" name="exercise_id">
   <label class="control-label">Title</label>
   <input type="text" maxlength="80" value="<?php echo $exercise['exercise_title']; ?>" name="exercise_title" class="form-control" required>
  
   
   <label class="control-label">Bodypart</label>
   <select multiple="multiple" class="my-select form-control" name="bodypart_id[]" required>

 <?php foreach($bodyparts_selected as $bodypart_selected): ?>

  <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $bodypart_selected['bodypart_image']; ?>" value="<?php echo $bodypart_selected['bodypart_id']; ?>" selected><?php echo $bodypart_selected['bodypart_title']; ?></option>

<?php endforeach; ?>

<?php foreach($bodyparts_not_selected as $bodypart_not_selected): ?>
<option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $bodypart_not_selected['bodypart_image']; ?>" value="<?php echo $bodypart_not_selected['bodypart_id']; ?>"><?php echo $bodypart_not_selected['bodypart_title']; ?></option>
<?php endforeach; ?>


</select>


   <label class="control-label">Equipment</label>
   <select class="form-control" name="exercise_equipment" required>
   <option value="<?php echo $exercise['exercise_equipment']; ?>" selected><?php echo $exercise['equipment_title']; ?></option>
    <?php foreach($equipments_lists as $equipment_list): ?>
   <option value="<?php echo $equipment_list['equipment_id']; ?>"><?php echo $equipment_list['equipment_title']; ?></option>
    <?php endforeach; ?>
   </select>

      <label class="control-label">Level</label>
   <select class="form-control" name="exercise_level" required>
   <option value="<?php echo $exercise['exercise_level']; ?>" selected><?php echo $exercise['level_title']; ?></option>
    <?php foreach($levels_lists as $level_list): ?>
   <option value="<?php echo $level_list['level_id']; ?>"><?php echo $level_list['level_title']; ?></option>
    <?php endforeach; ?>
   </select>


   <label class="control-label">Rest</label>
   <input value="<?php echo $exercise['exercise_rest']; ?>" placeholder="Rest" name="exercise_rest" class="form-control" required="">

   <label class="control-label">Sets</label>
   <input value="<?php echo $exercise['exercise_sets']; ?>" placeholder="Sets" name="exercise_sets" class="form-control" required="">

   <label class="control-label">Reps</label>
   <input value="<?php echo $exercise['exercise_reps']; ?>" placeholder="Reps" name="exercise_reps" class="form-control" required="">

   <label class="control-label">Video Url (MP4)</label>
   <input type="text" value="<?php echo $exercise['exercise_video']; ?>" placeholder="Video Url (MP4)" name="exercise_video" class="form-control" required="">

   <label class="control-label">Instructions</label>
   <textarea value="" name="exercise_instructions" class="form-control" id="instructions" required=""><?php echo $exercise['exercise_instructions']; ?></textarea>

   <label class="control-label">Tips</label>
   <textarea value="" name="exercise_tips" class="form-control" id="tips" required=""><?php echo $exercise['exercise_tips']; ?></textarea>



        <label >Image</label>

<div class="new-image" id="image-preview" style="background: url(../images/<?php echo $exercise['exercise_image'] ?>);background-size: cover; background-position: center;">
  <label for="image-upload" id="image-label">Choose File</label>
  <input type="hidden" value="<?php echo $exercise['exercise_image']; ?>" name="exercise_image_save">
  <input type="file" name="exercise_image" id="image-upload" />
</div>

<span class="text-danger recomendedsize">Recommended size: <b>550 x 350</b> </span>
<br/>
<br/>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_exercise.php?id=<?php echo $exercise['exercise_id']; ?>" });}
   </script>
   </div>


</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
