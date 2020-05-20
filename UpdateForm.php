
<?php
include 'includeelogged.html';
require_once ('User.php');
?>


    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile Information</li>
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
                            <h4>Edit Your Profile</h4>
                            <div class="line"></div>
                        </div>



	


<div id="EditP">
<?php


$users = new user();
$id=$_SESSION["id"];




			if(isset($_POST['submit'])){
			
                $Hashedpw= sha1($_POST["password"]);
              
				$data=array( $_POST["firstname"],$_POST["lastname"],  $_POST["email"] , $Hashedpw,$_POST["gender"]);
			
			
		
			$col=("Fname, Lname, email, password, Gender, UserType");
            $colval =explode(",",$col);
            $result=  $users->update($colval, $data ,$id);
          
	            	if($result){
                   
							    	$_SESSION["Fname"] = $_POST["firstname"];
										$_SESSION["Lname"] = $_POST["lastname"];
										$_SESSION["email"] = $_POST["email"];
										$_SESSION["password"]= $_POST["password"];
										$_SESSION["Gender"] = $_POST["gender"];
										$_SESSION["UserType"] = $_POST["usertype"];
                                        
                                       ?> <script type="text/javascript">location.href = 'index.php';</script>
                                       <?php
									        }
                                           
								}
			
		
?>
<head>
<title> Edit </title>
</head>

<form method="post">

	<label>First name</label>
	<div class="form-group">
	      <input type="text" name="firstname"   value="<?php echo $_SESSION['Fname'] ?>" placeholder="First Name" />
		  </div>
<label>Last name</label>
<div class="form-group">
	      <input type="text" name="lastname" value="<?php echo $_SESSION['Lname'] ?>" placeholder="Last Name" />
		  </div>
<label>Email</label>
<div class="form-group">
	      <input type="email" name="email" value="<?php echo $_SESSION['Email'] ?>" placeholder="E-Mail" />
		  </div>
	    <label>Password</label>
		<div class="form-group">
	      <input type="text" name="password" value="<?php echo $_SESSION['Password'] ?>" placeholder="password" />
		  </div>
		<label >Gender</label>
		<div class="form-group" data-validate="Gender is required">
	                <select name="gender" class="form-control" required>
                  
                  <option value="1">Male</option>
                  <option value="2">Female</option>
				      </select>
					  </div>  
	    
	<input type="submit" class="btn vizew-btn w-100 mt-30" value="Update" name="submit"/>
</form>

</div>
                </div>
            </div>
        </div>
    </div>
   <?php include'footer.html'; ?>