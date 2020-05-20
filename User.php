<?php 

include_once 'ConnectionClass.php';
$DB = new Database();



class user {
public $id;
public $Fname;
public $Lname;
public $password;
public $email;
public $HashedPassword;
public $UserType;
public $Gender;
public $Connection;
public $p;
public $Type;
public $DropDown;
    

    
 function Construct($ID){ 
$DB = Database::GetInstance();

    if($ID != NULL){
        $Query = "SELECT * FROM user WHERE Id = '$ID'";
        $Result = mysqli_query($DB->GetConnection(),$Query);
        while($row=mysqli_fetch_array($Result )){
            $user = new user;
            $user = $row;
        }
    }
}


static function SignOut(){
  if(isset($_SESSION)){
 // session_start();
  session_destroy();    
  }
  //header("Location:index.html");
  echo"signed out successfully";
}


static function Login($email,$p){
//session_start();
$DB = Database::GetInstance();
$HashedPassword = "";
$HashedPassword = sha1($p);
$Email=$_POST["Email"];
$Password=$_POST["Password"];
    
    $Query = "SELECT * FROM user WHERE email ='$email' AND password ='$HashedPassword' AND Is_Deleted = 0";
    echo $Query;
    $Result = mysqli_query($DB->GetConnection(),$Query);

  if($row = mysqli_fetch_array($Result)){
	
    echo"login successfully";
    $_SESSION["Fname"]=$row["Fname"];
    $_SESSION["Lname"]=$row["Lname"];
    $_SESSION["id"]=$row["id"];
	$_SESSION["Email"]=$Email;
	$_SESSION["Password"]=$Password;
	$_SESSION["UserType"]=$row["UserType"];
	
}
    else {echo "Invalid login";}
	
	
}


static function SignUp($Object){
$DB = Database::GetInstance();
$Fname=$_POST["Fname"];
$Lname=$_POST["Lname"];
$Gender=$_POST["gender"];

    $UserType=2;
    $Object->password = sha1($Object->password);
    $Query = "INSERT INTO user(Fname,Lname,email,password,Gender,UserType)
    VALUES('".$Object->Fname."','".$Object->Lname."','".$Object->email."','".$Object->password."','".$Object->Gender."','$UserType')";
    $Result = mysqli_query($DB->GetConnection(),$Query);
      if($Result){
		  echo "Data Added to database successfully";
		  $_SESSION["Fname"]=$Fname;
		  $_SESSION["Lname"]=$Lname;
		  $_SESSION["Gender"]=$Gender;
      $Query2 = "SELECT * FROM user WHERE password = '$Object->password'";
      $Result2 = mysqli_query($DB->GetConnection(),$Query2);
         while($row=mysqli_fetch_array($Result2)){
         $Id = $row['id'];
         $HashedId= sha1($Id);
         $Query3 = "UPDATE user SET hashed_id = '$HashedId' WHERE id = '$Id' ";
         $Result3 = mysqli_query($DB->GetConnection(),$Query3);
		 if($Result3){
			 echo"id hashed successfully";
		 }
  } 
 }
}
    
    


    
static function DeleteUser($ID){
    $DB = Database::GetInstance();
          
        $IsDeleted = 1;
            
        $Query2 = "Update user set Is_Deleted ='$IsDeleted' WHERE id = '$ID'";
        echo $Query2;
        $Result2 = mysqli_query($DB->GetConnection(),$Query2);
        
        if($Result2){
           echo "Deleted";
           $x = new user();
           $x::SignOut();
           return true;
        }
    
    mysqli_close($Connection);
    }


    public function update($col, $data,$id){
	
		$cols = array();
        $DB = Database::GetInstance();
		foreach($data as $key=>$val) {
			$cols[] = "$col[$key] = '$val'";
		}
		$sql = "UPDATE user SET " . implode(', ', $cols) . " WHERE id=$id";
	 
		
		 echo $sql;

	
	$res = mysqli_query($DB->GetConnection(), $sql);
	if($res){
        $this::SignOut();
		return true;
	}else{
		return false;
	}
    }
	
	
	
	public static function curl_get_file_contents($URL)
    {
//file_get_contents() reads remote webpage content
$lines_string=file_get_contents($URL);
//output, you can also save it locally on the server
echo $lines_string;
    }




}

public static function displayHistory(){
    $DB = new Database();

   $Query = "SELECT * FROM `userlog` WHERE `user_id`= '".$_SESSION["id"]."'";
 
    $Result = mysqli_query($DB->GetConnection(),$Query);

  while($row = mysqli_fetch_array($Result)){
      $detailid= $row["details_id"];
    $Query2 = "SELECT * FROM activity_details WHERE log_id =$detailid";

    $Result2 = mysqli_query($DB->GetConnection(),$Query2);

  while($row2 = mysqli_fetch_array($Result2)){
      $topic=$row2["topic"];
      $summaryhist=$row2["summary"];
      $reclink=$row2["rec_links"];
      $time =$row2["time"];
      $logid=$row2["log_id"];
      ?>

<div class ="content">
    <form action="" method="POST">
    <?php

 echo"Searched by: ".$topic;
 ?>
  <p><?php $time ?></p>
  <a href="historypage.php?varname=<?php echo $logid ?>">READ IT</a>
  


</div>

<?php
 
  }
}

}


public static function savehistory($keyword,$summary,$links){
    $DB = new Database();
    $query ="INSERT INTO `activity_details`( `topic`, `summary`, `rec_links`, `time`) VALUES ('".$keyword."','".$summary."','".$links."',now())";
    $Result= mysqli_query($DB->GetConnection(),$query);
    $con=$DB->GetConnection();
    $last_id = mysqli_insert_id($con);
        $query2 ="INSERT INTO `userlog`(`user_id`, `details_id`, `activityType`) VALUES ('".$_SESSION["id"]."','".$last_id."','Searched')";
        $Result2= mysqli_query($DB->GetConnection(),$query2);
  }

public static function addRate($rate){
	
$DB = Database::GetInstance();
$Email=$_SESSION["Email"];
$Password=$_SESSION["Password"];
$HashedPassword = sha1($Password);


$Query="SELECT * FROM user where email='$Email' and password='$HashedPassword'";
$Result=mysqli_query($DB->GetConnection(),$Query);
					    while ($row=mysqli_fetch_array($Result)) {
						$userId=$row["id"];
						$rate = $_POST["rating"];
						$sql = "INSERT INTO rating(articleID,userID, Rate) VALUES ('1',$userId,$rate)";
						
						if($sql){
							echo"Rate Added Successfully";
							
						}
						else echo "Something is not right in the rate";

						
						}


	
	
}


public static function archiveSummary($Summary){
$DB = Database::GetInstance();

$Email=$_SESSION["Email"];
$Password=$_SESSION["Password"];
$HashedPassword = sha1($Password);


$Query="SELECT * FROM user where email='$Email' and password='$HashedPassword'";
//echo $Query;
 $str = addslashes($Summary);
$Result=mysqli_query($DB->GetConnection(),$Query);
					    while ($row=mysqli_fetch_array($Result)) {
						$userId=$row["id"];
						
						
					$Query2 = "INSERT INTO archivedSummaries(Summary,UserID) VALUES ('".$str."',$userId)";
					//echo $Query2; 
					$Result2=mysqli_query($DB->GetConnection(),$Query2);
					if($Result2){
						echo "Summary Archived Successfully";
					}
					else{
						"Summary was not archived successfully";
					}

						
						}
	
	
}



public static function viewSummaries(){
	$DB = Database::GetInstance();
$Email=$_SESSION["Email"];
$Password=$_SESSION["Password"];
$HashedPassword = sha1($Password);


$Query="SELECT * FROM user where email='$Email' and password='$HashedPassword'";
$Result=mysqli_query($DB->GetConnection(),$Query);
					    while ($row=mysqli_fetch_array($Result)) {
						$userId=$row["id"];
						
						$Query2="SELECT * from archivedsummaries where UserId='$userId'";
						$Result2=mysqli_query($DB->GetConnection(),$Query2);
	
	
}
	return $Result2;

}


public static function getSummary($keyword){
	
    $result = shell_exec("python webscraping.py \"$keyword\"");	
    $tokenizedSummary = explode('.', $result);
    $summaryfinal=implode(". ",$tokenizedSummary);
	if(empty($summaryfinal)){
		echo"We are sorry, no sources are supported for this search keyword. ";
		echo"<br>";
		echo "<a href='../vizew/searchKeywordFormSummary.php'>Back to search, click here.</a>";
	}
    else
	{
		echo $summaryfinal;
		$x = new user();
		$x::savehistory($keyword,$summaryfinal,"ay hagaa");
		

								?>			
								<br>								
								<form action="../vizew/UserController.php" method="post">
								<input type="hidden" name="SummaryFinal" value="<?php echo htmlspecialchars($summaryfinal, ENT_QUOTES, 'UTF-8'); ?>" />
								<input type="hidden" name="Keyword" value="<?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?>" />

							<input type="submit" value="Archive" name="ArchiveSummary" class="btn vizew-btn ">
							</form>
 	<?php
	
	}	
	
	
	
	
	
}
}
?>