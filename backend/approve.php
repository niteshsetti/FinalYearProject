<?php
include '../backend/dbconnection.php';
if(isset($_POST["array"]) || isset($_POST["payment"]))
{
    $arr=$_POST["array"];
    $payment=$_POST["payment"];
    $date = date("d/D/M/Y");
    date_default_timezone_set('Asia/Kolkata'); 
    $time=date("h:i:s a");
    for($i=0;$i<count($arr);$i++)
    {
        $candid=$arr[$i];
        $sql="update confirm set Paymenttype='$payment',Status='Yes',Orderdate='$date',OrderTime='$time' where Candid='$candid'";
        $execute=mysqli_query($connection,$sql);
        if($execute)
        {
            echo "Success";
        }
        else{
            echo "Failed";
        }

    }
}
