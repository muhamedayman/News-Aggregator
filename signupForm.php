<?php include'includee.html'; ?>
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Great to have you back!</h4>
                            <div class="line"></div>
                        </div>

                        <form action="UserController.php" method="post">
						<div class="form-group">
						<input class="form-control" type="text" name="Fname" placeholder="  Type your First name">
						</div>
						
							<div class="form-group">
						<input class="form-control" type="text" name="Lname" placeholder="  Type your Last name" data-validate = "Last Name is required">
						</div>
						
						<div class="form-group">
								<input class="form-control" type="email" name="Email" placeholder="  Type your Email address" data-validate = "Email Address is required">
					</div>
					
						<div class="form-group">
						<input class="form-control" type="password" name="Password" placeholder="  Type your Password">
					</div>
					
					
						<div class="form-group" data-validate="Gender is required">
						<input type="radio" name="gender" style="margin-left: 5px;" value="1"> Male
                        <input type="radio" name="gender" style="margin-left: 30px;" class="female" value="2">Female<br>
						</div>

                            <button type="submit" name="signUp" class="btn vizew-btn w-100 mt-30">Sign Up</button>

						</div>
					</div>					
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php include'footer.html';?>