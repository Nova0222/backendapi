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
                    <h5 class="text-truncate">Strings</h5>
                </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<div class="form-row">
  <div class="form-group col-md-12">
    <div class="block col-md-12" style="padding-bottom: 35px">

   <label class="control-label">Privacy Policy</label>
   <textarea type="text" class="form-control" name="st_privacypolicy" id="textarea1"><?php echo $strings['st_privacypolicy']; ?></textarea>
<br>
   <label class="control-label">Terms of Service</label>
   <textarea type="text" class="form-control" name="st_termsofservice" id="textarea2"><?php echo $strings['st_termsofservice']; ?></textarea>
<br>
      <label class="control-label">About Us</label>
   <textarea type="text" class="form-control" name="st_aboutus" id="textarea3"><?php echo $strings['st_aboutus']; ?></textarea>

</div>

<div class="action-button">
   <input type="submit" name="save" value="Save Changes" class="btn btn-embossed btn-primary">
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