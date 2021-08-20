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
                    <h5 class="text-truncate">New Workout</h5>
                </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate>


<div class="form-row">
  <div class="form-group col-md-12">
    <div class="block col-md-12" style="padding-bottom: 35px">

  <label class="control-label">Title</label>
   <input type="text" value="" placeholder="Title" name="workout_title" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea type="text" value="" placeholder="Description" maxlength="350" rows="4" id="description" class="form-control" name="workout_description" required=""></textarea>

   <label class="control-label">Goal</label>
   <select class="form-control" name="workout_goal" required="">
    <?php foreach($goals_lists as $goals_list): ?>
   <option value="<?php echo $goals_list['goal_id']; ?>"><?php echo $goals_list['goal_title']; ?></option>
    <?php endforeach; ?>
   </select> 

   <label class="control-label">Level</label>
   <select class="form-control" name="workout_level" required="">
    <?php foreach($levels_lists as $levels_list): ?>
   <option value="<?php echo $levels_list['level_id']; ?>"><?php echo $levels_list['level_title']; ?></option>
    <?php endforeach; ?>
   </select>
   
   <label class="control-label">Duration</label>
   <input type="text" value="" name="workout_duration" class="form-control" required>

   <label class="control-label">Day 1</label>
   <input type="hidden" value="1" name="day_1">
   <select multiple="multiple" class="my-select form-control" name="exercise_id1[]">
    <?php foreach($exercises_lists1 as $exercises_list1): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercises_list1['exercise_image']; ?>" value="<?php echo $exercises_list1['exercise_id']; ?>"><?php echo $exercises_list1['exercise_title']; ?></option>
    <?php endforeach; ?>
   </select>

      <label class="control-label">Day 2</label>
      <input type="hidden" value="2" name="day_2">
   <select multiple="multiple" class="my-select form-control" name="exercise_id2[]">
    <?php foreach($exercises_lists2 as $exercises_list2): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercises_list2['exercise_image']; ?>" value="<?php echo $exercises_list2['exercise_id']; ?>"><?php echo $exercises_list2['exercise_title']; ?></option>
    <?php endforeach; ?>
   </select>

     <label class="control-label">Day 3</label>
     <input type="hidden" value="3" name="day_3">
   <select multiple="multiple" class="my-select form-control" name="exercise_id3[]">
    <?php foreach($exercises_lists3 as $exercises_list3): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercises_list3['exercise_image']; ?>" value="<?php echo $exercises_list3['exercise_id']; ?>"><?php echo $exercises_list3['exercise_title']; ?></option>
    <?php endforeach; ?>
   </select>

     <label class="control-label">Day 4</label>
     <input type="hidden" value="4" name="day_4">
   <select multiple="multiple" class="my-select form-control" name="exercise_id4[]">
    <?php foreach($exercises_lists4 as $exercises_list4): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercises_list4['exercise_image']; ?>" value="<?php echo $exercises_list4['exercise_id']; ?>"><?php echo $exercises_list4['exercise_title']; ?></option>
    <?php endforeach; ?>
   </select>

     <label class="control-label">Day 5</label>
     <input type="hidden" value="5" name="day_5">
   <select multiple="multiple" class="my-select form-control" name="exercise_id5[]">
    <?php foreach($exercises_lists5 as $exercises_list5): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercises_list5['exercise_image']; ?>" value="<?php echo $exercises_list5['exercise_id']; ?>"><?php echo $exercises_list5['exercise_title']; ?></option>
    <?php endforeach; ?>
   </select>

     <label class="control-label">Day 6</label>
     <input type="hidden" value="6" name="day_6">
   <select multiple="multiple" class="my-select form-control" name="exercise_id6[]">
    <?php foreach($exercises_lists6 as $exercises_list6): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercises_list6['exercise_image']; ?>" value="<?php echo $exercises_list6['exercise_id']; ?>"><?php echo $exercises_list6['exercise_title']; ?></option>
    <?php endforeach; ?>
   </select>

     <label class="control-label">Day 7</label>
     <input type="hidden" value="7" name="day_7">
   <select multiple="multiple" class="my-select form-control" name="exercise_id7[]">
    <?php foreach($exercises_lists7 as $exercises_list7): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercises_list7['exercise_image']; ?>" value="<?php echo $exercises_list7['exercise_id']; ?>"><?php echo $exercises_list7['exercise_title']; ?></option>
    <?php endforeach; ?>
   </select>

   <label class="control-label">Status</label>


<table>
  <tr>
    <td>                             <div class="radio radio-success">
                                <input type="radio" name="workout_status" id="radio5" value="1">
                                <label for="radio5">
                                    Publish
                                </label>
                            </div></td>
                            <td>
                                                          <div class="radio radio-danger">
                                <input type="radio" name="workout_status" id="radio6" value="0">
                                <label for="radio6">
                                    Draft
                                </label>
                            </div>
                            </td>
  </tr>

</table>

   <label class="control-label">Image</label>

<div class="new-image" id="image-preview">
  <label for="image-upload" id="image-label">Choose File</label>
  <input type="file" name="workout_image" id="image-upload" required="" />
</div>

<span class="text-danger recomendedsize">Recommended size: <b>650 x 350</b> </span>
<br/>
<br/>

   <div class="action-button">
   <input type="submit" name="save" value="Upload" class="btn btn-embossed btn-primary">
   <input type="reset" name="reset" value="Reset" class="btn btn-embossed btn-danger">
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
