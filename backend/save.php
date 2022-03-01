<?php
include '../backend/dbconnection.php';
$sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = "../assets/images/" . $_FILES['file']['name']; // Target path where file is to be stored
$itype = $_POST["itype"];
$iname = $_POST["iname"];
$ides = $_POST["ides"];
@$icost = $_POST["icost"];
$iquan = $_POST["iquan"];
$idate=$_POST["idate"];
$iid = uniqid();
$image=$_FILES['file']['name'];
$check_image="";
if($image==""){
    $check_image="Untitled.png";
}
else{
    $check_image=$image;
}
if($itype=="")
{
    echo "Please Select Item Type";
}
else if($iname=="")
{
    echo "Please Select Item Name";
}
else if($ides=="")
{
    echo "Please Select Item Description";
}
else if($icost=="")
{
    echo "Please Select Item Cost";
}
else if($iquan=="")
{
    echo "Please Select Item Quantity";
}
else if($idate=="")
{
    echo "Please Select Item Adding Date";
}
else{
move_uploaded_file($sourcePath, $targetPath);
$sql = "insert into items(Itemid,Itemcat,Itemname,Itemdes,Icost,Iquan,Idate,Iimage)values('$iid','$itype','$iname','$ides','$icost','$iquan','$idate','$check_image')";
$execute = mysqli_query($connection, $sql);
if ($execute) {
    echo "Success";
} else {
    echo "Failed";
}
}
