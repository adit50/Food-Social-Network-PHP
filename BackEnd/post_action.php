<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
ini_set("display_errors",1);
if(isset($_POST))
{
$mydate = date("Y-m-d");
$mytime = date("h:i:sa");
$hour = date("h");
$minute = date("i");
$second = date("s");
$date = date("d");
$month = date("m");
$year = date("Y");
$am = date("a");
$monName = date("M");
$day = date("D");
$z = 1;
$time = time();
    if(!isset($_FILES['Image']) || !is_uploaded_file($_FILES['Image']['tmp_name']))
    {
	$insert = "INSERT INTO post (fname , lname , userid ,count , time , date , h , i , s , d , m , y , a , mon , day , title , share , minu , serv , stamp) VALUES ('".$_POST['sess_fname']."' , '".$_POST['sess_lname']."' , '".$_POST['sess_id']."' , '".$_POST['count']."' ,  '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".mysqli_real_escape_string($conn ,$_POST['title'])."' , '".$_POST['share']."' , '".mysqli_real_escape_string($conn ,$_POST['minu'])."' , '".mysqli_real_escape_string($conn ,$_POST['serv'])."' , '".$time."')";  
    mysqli_query($conn ,$insert);
	$insertID = mysqli_insert_id($conn);
	$update = "UPDATE regvisitor SET post = post + 1 WHERE userid = '".$_POST['sess_id']."' ";
	mysqli_query($conn ,$update);
	$notify = "INSERT INTO notification(userid , postid , status , time , date , h , i , s , d , m , y , a , mon , day , stamp) VALUES('".$_POST['sess_id']."' , '".$insertID."' , 'post' , '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".$time."')" ;
	mysqli_query($conn ,$notify);
	if(strlen($_POST['title']) > 1) {
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$title = '!@';
$all = $title.mysqli_real_escape_string($conn ,$_POST['title']).'@!';
file_put_contents($a, $all);
echo 'done';
}

if(strlen($_POST['1I']) > 1) {
for($i=1; $i <= $_POST['count']; $i++)
{
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$open = file_get_contents($a);
$Ingredient = ' [';
$accu = ''.mysqli_real_escape_string($conn ,$_POST[$i.'I']).'-'.mysqli_real_escape_string($conn ,$_POST[$i.'Q']).'-'.mysqli_real_escape_string($conn ,$_POST[$i.'S']).'%$#'.$i.'] ';
$all = $open.$Ingredient.$i.'#$%'.$accu;
file_put_contents($a, $all);
echo 'done';
}
}

if(strlen($_POST['about']) > 1) {
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$open = file_get_contents($a);
$about = '*()';
$all = $open.$about.mysqli_real_escape_string($conn ,$_POST['about']).'()* ';
file_put_contents($a, $all);
echo 'done';
}
if(strlen($_POST['process']) > 1) {
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$open = file_get_contents($a);
$process = '&^';
$all = $open.$process.mysqli_real_escape_string($conn ,$_POST['process']).'^&';
file_put_contents($a, $all);
echo 'done';
}else{
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$open = file_get_contents($a);
$process = '&^';
$all = $open.$process.'^&';
file_put_contents($a, $all);
}


	}
	else
		{
$todir = 'members/'.$_POST['sess_email'].'/';
$RandomNum   = rand(0, 9999999999);
    $info = explode('.', strtolower( $_FILES['Image']['name']) ); // whats the extension of the file
	$png = 'png';
     if(move_uploaded_file( $_FILES['Image']['tmp_name'], $todir . basename($_FILES['Image']['name']-$RandomNum) ) )
	 {
     $handle= 'members/'.$_POST['sess_email'].'/'.basename($_FILES['Image']['name']-$RandomNum);
	 echo 'uploaded';
	 }
	$insert = "INSERT INTO post (image , fname , lname , userid , count ,  time , date , h , i , s , d , m , y , a , mon , day , title , share , minu , serv , stamp) VALUES ('".mysqli_real_escape_string($conn ,$handle)."' , '".$_POST['sess_fname']."' , '".$_POST['sess_lname']."' , '".$_POST['sess_id']."' , '".$_POST['count']."' ,  '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".mysqli_real_escape_string($conn ,$_POST['title'])."' , '".$_POST['share']."' , '".mysqli_real_escape_string($conn ,$_POST['minu'])."' , '".mysqli_real_escape_string($conn ,$_POST['serv'])."' , '".$time."')";  
    mysqli_query($conn ,$insert);
	$insertID = mysqli_insert_id($conn);
	$update = "UPDATE regvisitor SET post = post + 1 WHERE userid = '".$_POST['sess_id']."' ";
	mysqli_query($conn ,$update);
	$notify = "INSERT INTO notification(userid , postid , status , time , date , h , i , s , d , m , y , a , mon , day , stamp) VALUES('".$_POST['sess_id']."' , '".$insertID."' , 'post' , '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".$time."')" ;
	mysqli_query($conn ,$notify);
	if(strlen($_POST['title']) > 1) {
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$title = '!@';
$all = $title.mysqli_real_escape_string($conn ,$_POST['title']).'@!';
file_put_contents($a, $all);
echo 'done';
}

if(strlen($_POST['1I']) > 1) {
for($i=1; $i <= $_POST['count']; $i++)
{
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$open = file_get_contents($a);
$Ingredient = ' [';
$accu = ''.mysqli_real_escape_string($conn ,$_POST[$i.'I']).'-'.mysqli_real_escape_string($conn ,$_POST[$i.'Q']).'-'.mysqli_real_escape_string($conn ,$_POST[$i.'S']).'%$#'.$i.'] ';
$all = $open.$Ingredient.$i.'#$%'.$accu;
file_put_contents($a, $all);
echo 'done';
}
}

if(strlen($_POST['about']) > 1) {
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$open = file_get_contents($a);
$about = '*()';
$all = $open.$about.mysqli_real_escape_string($conn ,$_POST['about']).'()* ';
file_put_contents($a, $all);
echo 'done';
}
if(strlen($_POST['process']) > 1) {
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$open = file_get_contents($a);
$process = '&^';
$all = $open.$process.mysqli_real_escape_string($conn ,$_POST['process']).'^&';
file_put_contents($a, $all);
echo 'done';
}else{
$a = 'members/'.$_POST['sess_email'].'/'.$insertID.'.txt';
$open = file_get_contents($a);
$process = '&^';
$all = $open.$process.'^&';
file_put_contents($a, $all);
}

	}
	
}
