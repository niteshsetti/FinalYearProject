<?php
include '../backend/bookingstat.php';
if(isset($_POST["tablenumber"]))
{
    $tab_num=$_POST["tablenumber"];
    $del="delete from tablereservation where Tableno='$tab_num'";
    $qu=mysqli_query($connection,$del);
    $delcart="delete from cart where Tableno='$tab_num'";
    $qu1=mysqli_query($connection,$delcart);
    $delconfirm="delete from confirm where Tableno='$tab_num'";
    $qu2=mysqli_query($connection,$delconfirm);
    if($qu && $qu1 && $qu2)
    {
        echo "Success";
    }
    else{
        echo "Failed";
    }
}
