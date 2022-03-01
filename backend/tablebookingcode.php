<?php
include './dbconnection.php';
if (isset($_POST["name"]) || isset($_POST["phone"]) || isset($_POST["tablenumber"])) {
    $c_name=$_POST["name"];
    $c_number=$_POST["phone"];
    $table_number = $_POST["tablenumber"];
    $table_id = uniqid();
    $date = date("d/D/M/Y");
    date_default_timezone_set('Asia/Kolkata'); 
    $time=date("h:i:s a");
    $dup_check="select *from tablereservation where Tableno='$table_number'";
    $dup_query=mysqli_query($connection,$dup_check);
    $dup_r=mysqli_num_rows($dup_query);
    if($dup_r>0)
    {
        echo "Error";
    }
    else{
    $insert = "insert into tablereservation(Name,Phone,TableId,Tableno,Dat,Tim,Tablestatus)values('$c_name','$c_number','$table_id','$table_number','$date','$time','Booked')";
    $execute=mysqli_query($connection,$insert);
    if($execute)
    {
        echo "Table Booked Successfully";
    }
    else{
        echo "Table Failed to Book";
    }
}
}
if(isset($_POST["pnos"]) || isset($_POST["recno"]))
{
    $tab_no=$_POST["recno"];
    $pnos=$_POST["pnos"];
    $sql="select *from tablereservation where Tableno='$tab_no'";
    $ex=mysqli_query($connection,$sql);
    @$fetch=mysqli_fetch_array($ex);
    $p=$fetch[1];
    if($p==$pnos)
    {
        echo "Success";
    }
    else{
        echo "Failed";
    }

}
