<?php
session_start();
$con=mysqli_connect('localhost','root','vnirmala30!');
if($con)
{
	echo "Connection established successfully";
}
else
{
	echo "No connection";
}
mysqli_select_db($con,'miniproject');

$name=$_POST['name'];
$pass=$_POST['pass'];


$q="select * from signin where name='$name' && password='$pass'";

$result=mysqli_query($con,$q);

$num=mysqli_num_rows($result);

if($num==1)
{
	
	header('location:allow.php');
}
else
{
	header('location:notallow.php');
}
?>