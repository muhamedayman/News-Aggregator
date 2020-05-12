<?php 

include_once 'ConnectionClass.php';
$DB = new Database();
require __DIR__ . '/vendor/autoload.php';
ini_set('memory_limit', '256M');
use Phpml\ModelManager;


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
    
static function countNotifications()
{
 // session_start();
  $DB = Database::GetInstance();
  $Query1="select count(*) from notifications where user_id='". $_SESSION['ID']."'";
$Result= mysqli_query($DB->GetConnection(),$Query1);
while ($row=mysqli_fetch_array($Result)) {
      $x= $row['count(*)'];
}
return $x;
}

static function GetUserInfo($Drop) {
$DB = Database::GetInstance();
    
$Data = array();
    
$Query = "SELECT * FROM user WHERE id = '$Drop'";
$Result = mysqli_query($DB->GetConnection(),$Query);
    
while($row = mysqli_fetch_array($Result)) {
    $Data [] = $row;
}
return $Data; 
}
    
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
    
public static function DisplayAll() {
$DB = Database::GetInstance();
    
    $Query = "SELECT * FROM user WHERE IS_Deleted = 0";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    if(mysqli_num_rows($Result) > 0) {
        $Data = array();
        $i = 0;
        
        while($row=mysqli_fetch_array($Result)) {
        $Data [$i] = new user(0); 
        
        $Data[$i]->id = $row['id'];
        $Data[$i]->Fname = $row['Fname'];
        $Data[$i]->Lname = $row['Lname'];
        
        $i = $i + 1;
    }
    return $Data;
    }
    else {
        return NULL;
    }
}
    
public static function DisplayGender() {
$DB = Database::GetInstance();
    
    $Query = "SELECT * FROM gender";
    $Result = mysqli_query($DB->GetConnection(),$Query);
    
    if(mysqli_num_rows($Result) > 0) {
        $Data = array();
        $i = 0;
        
        while($row=mysqli_fetch_array($Result)) {
        $Data [$i] = new user(0); 
        
        $Data[$i]->id = $row['id'];
        $Data[$i]->GenderID = $row['Gender'];
        
        $i = $i + 1;
    }
    return $Data;
    }
    else {
        return NULL;
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
	
	public static function predict($text){
    $modelManager = new ModelManager();
    $model = $modelManager->restoreFromFile('bbc.phpml');
    $predicted_category=$model->predict([$text])[0];
    $x = new user();
    $x::Aggregate($predicted_category,$text);
}


public static function Aggregate($category,$textt){
    $DB = Database::GetInstance();
    $query ="SELECT * FROM `sub-category` WHERE sname = '$category'";
    $Result= mysqli_query($DB->GetConnection(),$query);
	?>
    <h1>Recommendations</h1>
    <?php
    while ($row=mysqli_fetch_array($Result)) {
      $SubCategory_id= $row['sub_id'];
      $query2 = "SELECT * from articles where Subcategory_id ='$SubCategory_id'";
      $Result2= mysqli_query($DB->GetConnection(),$query2);
      while ($row2=mysqli_fetch_array($Result2)) {
      $RelatedArticles= $row2['link'];
      $title =$row2['title'];
}
       ?>

	<a href="https://www.theguardian.com/world/2020/mar/04/what-is-coronavirus-symptoms-infection-wuhan-china-covid-19">
What is coronavirus and what should I do if I have symptoms?</a>
<br>
	 <a href="https://www.bbc.com/news/health-51674743">Coronavirus: What are the chances of dying?</a>
	 <br>
	 <a href="https://www.worldometers.info/coronavirus/">Coronavirus Update(Live)</a><br>
	 <a href="https://www.health.gov.au/news/health-alerts/novel-coronavirus-2019-ncov-health-alert">Coronavirus (COVID-19) health alert
</a><br>
	 <a href="https://www.pe.com/location/california/riverside-county/corona/">Corona News: The Press-Enterprise</a><br>
	 <a href="https://edition.cnn.com/asia/live-news/coronavirus-outbreak-03-04-20-intl-hnk/index.html">Coronavirus outbreak spreads across the world</a><br>
<?php
       echo "<br>";
      
    }
    $x = new user();
    $x::ReadFile("hh",$textt);
}

public static function AddInterest(){
	$DB = Database::GetInstance();
	 // session_start();

$selectedCategory=$_POST["Categories"];
$Email=$_SESSION["Email"];
$Password=$_SESSION["Password"];
$HashedPassword = sha1($Password);


$Query="SELECT * FROM user where email='$Email' and password='$HashedPassword'";
$Result=mysqli_query($DB->GetConnection(),$Query);
    while ($row=mysqli_fetch_array($Result)) {
	$userId=$row["id"];
	$query2 = "INSERT INTO userinterests(UserId,CategoryId) VALUES ($userId,$selectedCategory)";
      $Result2= mysqli_query($DB->GetConnection(),$query2);
	  if($Result2){  
		  echo"Interest inserted successfully";
	  }
	  else{
		  
		  echo"Error inserting interest";
	  }
	}
	}
	
	
	
	public static function GetArticlesByInterests(){
			$DB = Database::GetInstance();
$Email=$_SESSION["Email"];
$Password=$_SESSION["Password"];
$HashedPassword = sha1($Password);


$Query="SELECT * FROM user where email='$Email' and password='$HashedPassword'";
$Result=mysqli_query($DB->GetConnection(),$Query);
    while ($row=mysqli_fetch_array($Result)) {
	$userId=$row["id"];
	$query2="SELECT * from userinterests where UserId='$userId'";
	$Result2=mysqli_query($DB->GetConnection(),$query2);
	    while ($row=mysqli_fetch_array($Result2)) {
		$CategoryId=$row['CategoryId'];
		if($CategoryId==1){
			$Query3="Select * from articles where Category_id=1";
				$Result3=mysqli_query($DB->GetConnection(),$Query3);
					    while ($row=mysqli_fetch_array($Result3)) {
						$title=$row["title"];
						$link=$row["link"];
						?><a href="<?php echo $link ?>"><?php echo $title ?></a><?php
						echo"<br>";
						}
						    

}
		if($CategoryId==2){
			$Query3="Select * from articles where Category_id=2";
				$Result3=mysqli_query($DB->GetConnection(),$Query3);
					    while ($row=mysqli_fetch_array($Result3)) {
						$title=$row["title"];
						$link=$row["link"];
						?><a href="<?php echo $link ?>"><?php echo $title ?></a><?php
						echo"<br>";
						}
}
		if($CategoryId==3){
			$Query3="Select * from articles where Category_id=3";
				$Result3=mysqli_query($DB->GetConnection(),$Query3);
					    while ($row=mysqli_fetch_array($Result3)) {
						$title=$row["title"];
						$link=$row["link"];
						?><a href="<?php echo $link ?>"><?php echo $title ?></a><?php
						echo"<br>";
						}
}
		}
	}
		
		
		
		
		
	}
	

	public static function ReadFile($x,$y){
    $myfile = fopen('C:/wamp64/www/NewsAggregator/vizew/myfile.txt', "r") or die("Unable to open file!");
   ?>
   <h1>Summary</h1>
   <?php
  $myfiler=fread($myfile,filesize('C:/wamp64/www/NewsAggregator/vizew/myfile.txt'));
     echo $myfiler;
    fclose($myfile);
    $x = new user();
   // $x::savehistory($y,$myfiler,"hh");

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
    echo $query;
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

}
?>