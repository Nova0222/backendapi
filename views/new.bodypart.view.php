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
                    <h5 class="text-truncate">New Bodypart</h5>
                </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<div class="form-row">
  <div class="form-group col-md-12">
    <div class="block col-md-12" style="padding-bottom: 35px">

   <label class="control-label">Title</label>
   <input type="text" value="" placeholder="Title" name="bodypart_title" class="form-control" required="">

   <label class="control-label">Image</label>

<div class="new-image" id="image-preview">
  <label for="image-upload" id="image-label">Choose File</label>
  <input type="file" name="bodypart_image" id="image-upload" required="" />
</div>

<span class="text-danger recomendedsize">Recommended size: <b>250 x 250</b> </span>
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
