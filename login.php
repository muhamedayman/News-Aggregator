<?php include'includeelogged.html';?>

    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Your Profile Information</h4>
                            <div class="line"></div>
                        </div>

                        <form action="UserController.php" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" name="Email" id="Email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn vizew-btn w-100 mt-30" name="Login">Login</button>
							<br>
							<div class="form-group">
							<p>Don't have an account? <a href="signupForm.php">Sign Up Here</a></p>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

   <?php include'footer.html'; ?>