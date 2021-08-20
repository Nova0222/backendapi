<?php require'sidebar.view.php'; ?>  

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        <?php require'navbar.view.php'; ?>

        <!--Main Content-->
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">

                    <div class="col-12">
                        <div class="section-title">
                            <h4>Sections</h4>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $exercises_total; ?></div>
                            <i class="dripicons-stopwatch i-icon"></i>
                            <p class="label">Exercises</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $workouts_total; ?></div>
                            <i class="dripicons-to-do i-icon"></i>
                            <p class="label">Workouts</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $bodyparts_total; ?></div>
                            <i class="dripicons-user i-icon"></i>
                            <p class="label">Bodyparts</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $equipments_total; ?></div>
                            <i class="dripicons-lifting i-icon"></i>
                            <p class="label">Equipments</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $levels_total; ?></div>
                            <i class="dripicons-pulse i-icon"></i>
                            <p class="label">Levels</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $goals_total; ?></div>
                            <i class="dripicons-trophy i-icon"></i>
                            <p class="label">Goals</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $diets_total; ?></div>
                            <i class="dripicons-cutlery i-icon"></i>
                            <p class="label">Recipes</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $posts_total; ?></div>
                            <i class="dripicons-article i-icon"></i>
                            <p class="label">Posts</p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="section-title">
                            <h4>Summary</h4>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Exercises</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/exercises.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach(array_slice($exercises, 0, 5) as $exercise): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $exercise['exercise_image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $exercise['exercise_title']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_exercise.php?id=<?php echo $exercise['exercise_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a style="cursor: pointer;" onclick="alertdelete_e<?php echo $exercise['exercise_id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_e<?php echo $exercise['exercise_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_exercise.php?id=<?php echo $exercise['exercise_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div>  

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Workouts</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/workouts.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach(array_slice($workouts, 0, 5) as $workout): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $workout['workout_image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $workout['workout_title']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_workout.php?id=<?php echo $workout['workout_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a style="cursor: pointer;" onclick="alertdelete_w<?php echo $workout['workout_id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_w<?php echo $workout['workout_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_workout.php?id=<?php echo $workout['workout_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div> 


                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Posts</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/posts.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach(array_slice($posts, 0, 5) as $post): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $post['post_image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $post['post_title']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_post.php?id=<?php echo $post['post_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a style="cursor: pointer;" onclick="alertdelete_p<?php echo $post['post_id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_p<?php echo $post['post_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_post.php?id=<?php echo $post['post_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div> 

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Recipes</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/recipes.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach(array_slice($diets, 0, 5) as $diet): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $diet['diet_image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $diet['diet_title']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_recipe.php?id=<?php echo $diet['diet_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a style="cursor: pointer;" onclick="alertdelete_r<?php echo $diet['diet_id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_r<?php echo $diet['diet_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_diet.php?id=<?php echo $diet['diet_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div> 

        </div>
    </div>

</section>