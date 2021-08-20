<section style="background: url(http://via.placeholder.com/1920x1080));background-size: cover">
    <div class="height-100-vh bg-primary-trans">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <img src="../assets/images/wbdashboard.png" style="margin-top: 70px; max-width: 200px; display: block; text-align: center; margin-left: auto; margin-right: auto;">
                    <div class="login-div" style="padding-top: 20px;margin: 30px auto 30px; margin-bottom: 15px">
                       <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login" id="needs-validation" novalidate>  
                            <div class="form-group">
                                <label>Login</label>
                                <input class="form-control input-lg" placeholder="Username" name="username" type="text" required>
                                <div class="invalid-feedback">This field is required.</div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control input-lg" placeholder="Password" name="password" type="password" required>
                                <div class="invalid-feedback">This field is required.</div>
                            </div>

                            <button class="btn btn-primary mt-2" type="submit" style="width: 100%">Sign In</button>

                            <?php if( !empty($errors)): ?>

							<div class="alert alert-danger animated fadeIn" role="alert" style="margin-top: 20px; margin-bottom: 0; text-transform: uppercase; font-size: 11px; text-align: center;">
    
    						<?php echo $errors; ?>
    
							</div>
							
							<?php endif; ?>

                        </form>
                    </div>
                    <div style="text-align: center; color: #fff; text-transform: uppercase; font-size: 10px;">
                    Copyrights <a href="https://codecanyon.net/user/wicombit/portfolio" target="_blank" style="color: #fff; font-weight: bold;">Wicombit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>