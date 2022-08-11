<?php
include '../backend/dbconnection.php';
if(isset($_POST["feedname"]) || isset($_POST["feedphno"]) || isset($_POST["feedmsg"]))
{
$name=$_POST["feedname"];
$phone=$_POST["feedphno"];
$msg=$_POST["feedmsg"];
$sql="insert into feedback(Name,Phone,Message)values('$name','$phone','$msg')";
$exec=mysqli_query($connection,$sql);
if($exec)
{
    echo "Feedback Submitted Successfully";
}
else{
    echo "Feedback Failed to Submit";
}
}
?>