<?php
include '../backend/bookingstat.php';
if(isset($_POST["tablenumber"]))
{
    $tab_num=$_POST["tablenumber"];
    $del="delete from tablereservation where Tableno='$tab_num'";
    $qu=mysqli_query($connection,$del);
    $delcart="delete from cart where Tableno='$tab_num'";
    $qu1=mysqli_query($connection,$delcart);
    if($qu && $qu1)
    {
        echo "Success";
    }
    else{
        echo "Failed";
    }
}
