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
                    <h5 class="text-truncate">Edit Post</h5>
                </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<div class="form-row">
  <div class="form-group col-md-12">
    <div class="block col-md-12" style="padding-bottom: 35px">

<input type="hidden" value="<?php echo $post['post_id']; ?>" name="post_id">

   <label class="control-label">Title</label>
   <input type="text" value="<?php echo $post['post_title']; ?>" placeholder="Title" name="post_title" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea value="" name="post_description" class="form-control" id="description" required=""><?php echo $post['post_description']; ?></textarea>

   <label class="control-label">Tag</label>
   <select class="form-control" name="post_tag" required>
   <option value="<?php echo $post['post_tag']; ?>" selected><?php echo $post['tag_title']; ?></option>
    <?php foreach($tags_lists as $tags_list): ?>
   <option value="<?php echo $tags_list['tag_id']; ?>"><?php echo $tags_list['tag_title']; ?></option>
    <?php endforeach; ?>
   </select>

   <label class="control-label">Featured</label>
   
   <div class="row">
                        <div class="col-sm-1">

                        <?php 


$in = '1';

if (strpos($in, $post['post_featured']) !== false) {
    echo '<div class="radio radio-success"> <input type="radio" name="post_featured" id="radio3" value="'. $post['post_featured'] .'" checked=""> <label for="radio3"> Yes </label> </div>';
}else{
  echo '<div class="radio radio-success"> <input type="radio" name="post_featured" id="radio3" value="' . $in .'"> <label for="radio3"> Yes </label> </div>';
}
                         ?>
                        </div>

                        <div class="col-sm-1">

                        <?php 


$out = '0';

if (strpos($out, $post['post_featured']) !== false) {
    echo '<div class="radio radio-danger"> <input type="radio" name="post_featured" id="radio4" value="0" checked=""> <label for="radio4"> No </label> </div>';
}else{
  echo '<div class="radio radio-danger"> <input type="radio" name="post_featured" id="radio4" value="'. $out .'"> <label for="radio4"> No </label> </div>';
}
                         ?>
                        </div>

                    </div>

   <label class="control-label">Status</label>
   
   <div class="row">
                        <div class="col-sm-1">

                        <?php 


$in = '1';

if (strpos($in, $post['post_status']) !== false) {
    echo '<div class="radio radio-success"> <input type="radio" name="post_status" id="radio5" value="'. $post['post_status'] .'" checked=""> <label for="radio5"> Yes </label> </div>';
}else{
  echo '<div class="radio radio-success"> <input type="radio" name="post_status" id="radio5" value="' . $in .'"> <label for="radio5"> Yes </label> </div>';
}
                         ?>
                        </div>

                        <div class="col-sm-1">

                        <?php 


$out = '0';

if (strpos($out, $post['post_status']) !== false) {
    echo '<div class="radio radio-danger"> <input type="radio" name="post_status" id="radio6" value="0" checked=""> <label for="radio6"> No </label> </div>';
}else{
  echo '<div class="radio radio-danger"> <input type="radio" name="post_status" id="radio6" value="'. $out .'"> <label for="radio6"> No </label> </div>';
}
                         ?>
                        </div>

                    </div>

        <label >Image</label>

<div class="new-image" id="image-preview" style="background: url(../images/<?php echo $post['post_image'] ?>);background-size: cover; background-position: center;">
  <label for="image-upload" id="image-label">Choose File</label>
  <input type="hidden" value="<?php echo $post['post_image']; ?>" name="post_image_save">
  <input type="file" name="post_image" id="image-upload" />
</div>

<span class="text-danger recomendedsize">Recommended size: <b>650 x 350</b> </span>
<br/>
<br/>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_post.php?id=<?php echo $post['post_id']; ?>" });}
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
