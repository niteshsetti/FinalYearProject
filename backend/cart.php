<?php
include '../backend/dbconnection.php';
if(isset($_POST["itemid"]) || isset($_POST["name"]) || isset($_POST["phno"]) || isset($_POST["tableno"]) || isset($_POST["quan"]) || isset($_POST["icost"]))
{
    $itemid=$_POST["itemid"];
    $c_name=$_POST["name"];
    $c_phno=$_POST["phno"];
    $table_no=$_POST["tableno"];
    $quan=$_POST["quan"];
    $total_cost=$_POST["icost"];
    $op=$quan*$total_cost;
    $c_id=uniqid();
    $sql="insert into cart(Candid,Name,Phno,Tableno,Item,Quantity,Total)values('$c_id','$c_name','$c_phno','$table_no','$itemid','$quan','$op')";
    $execute=mysqli_query($connection,$sql);
    if($execute)
    {
        echo "Success";
    }
    else
    {
        echo "Failed";
    }

}
?>