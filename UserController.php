<?php 
include 'User.php';
//include'twitterIndex.php';
session_start();
$x = new user();
//$S = new ST();


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

if(isset($_POST["AddInterest"])){
	header("Location:addInterestForm.php");

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
   
 
 if(isset($_POST["WriteTweet"])){
	  header("Location:WriteTweetForm.php");
	}
if(isset($_POST["submitTweet"])){
	//$Tweet=$_POST["Tweet"];
	//echo $Tweet;
	header("Location:TwitterApi/twitterIndex.php");

}
if(isset($_POST["submitAddInterest"])){
	header("Location:UserDataa.php");
	$x::AddInterest();
	
	
}
if(isset($_POST["ReadArticlesFromInterest"])){
	$x::GetArticlesByInterests();
}

if(isset($_POST["submitRate"])){
	$rate=$_POST["rating"];
	$x::addRate($rate);	
}

if(isset($_POST["Searchbtn"])){
//  $text= $_POST["input"]; 
//$x = new user();
//$x::predict($text);
 header("Location:runPython.php");
 }
?>
