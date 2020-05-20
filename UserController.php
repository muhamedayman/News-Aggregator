<?php 
include 'User.php';
session_start();
$x = new user();

if(isset($_POST["signUp"])) {
$x->Fname=$_POST["Fname"];
$x->Lname=$_POST["Lname"];
$x->email=$_POST["Email"];
$x->password=$_POST["Password"];
$x->Gender=$_POST["gender"];

$x::SignUp($x);
header("Location:signupForm.php");
}


if(isset($_POST["Login"])) {
$x->email=$_POST["Email"];
$x->password=$_POST["Password"];
$x::Login($x->email,$x->password);

header("Location:UserDataa.php");

}

if(isset($_POST["signOut"])){
	$x::SignOut();
	header("Location:index.php");
}

if(isset($_POST['Delete'])){
	$x::DeleteUser($_SESSION["id"]);
	header("Location:login.php"); 
	  
  }
  if(isset($_POST['Edit'])){
  
	  header("Location:UpdateForm.php"); 
		
	}
	if(isset($_POST["searchHistory"])){
		header("Location:historypage.php");
		
	}
if(isset($_POST["btn"])){
	$x::curl_get_file_contents($_POST["URL"]);
   }
   
 

if(isset($_POST["submitRate"])){
	$rate=$_POST["rating"];
	$x::addRate($rate);	
}

if(isset($_POST["ArchiveSummary"])){
	$summary=$_POST["SummaryFinal"];
	$keyword=$_POST["Keyword"];
	$x::archiveSummary($summary);
	$x::savehistory($keyword,$summary,"recommend");

	header("Location:index.php");

}

if(isset($_POST["searchSummary"])){
		$Keyword=$_POST["searchboxSummary"];
		 header("Location:getSummary.php?searchKeyword=".$Keyword);


}
if(isset($_POST["searchSummaryFromHome"])){
		$Keyword=$_POST["searchboxSummary"];
		 header("Location:getSummary.php?searchKeyword=".$Keyword);	
	
	
}
if(isset($_POST["renew"])){
	$Keyword=$_POST["Keyword"];
	echo"yarab";
	echo $Keyword;
	header("Location:getSummary.php?searchKeyword=".$Keyword);	
	}
	

 
?>
