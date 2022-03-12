<?php
include '../backend/dbconnection.php';
if(isset($_POST["array"]))
{
    $a=$_POST["array"];
    for($i=0;$i<count($a);$i++)
    {
        $can=uniqid();
        $date = date("d/D/M/Y");
        date_default_timezone_set('Asia/Kolkata'); 
        $time=date("h:i:s a");
        $sql="select *from cart where Candid='$a[$i]'";
        $execute=mysqli_query($connection,$sql);
        @$fetch=mysqli_fetch_array($execute);
        $zero=$fetch[0];
        $one=$fetch[1];
        $two=$fetch[2];
        $three=$fetch[3];
        $four=$fetch[4];
        $five=$fetch[5];
        $sqd="select *from items where Itemid='$three'";
        $executed=mysqli_query($connection,$sqd);
        @$fetchd=mysqli_fetch_array($executed);
        $twoo=$fetchd[2];
        $fo=$fetchd[4];
        $seven=$fetchd[7];
        $insert="insert into confirm(Name,Phno,Tableno,Item,Quantity,Total,Candid,Iimage,Icost,Iname,Paymenttype,Status,Orderdate,OrderTime,Dtime,TS,Deliverystat,Est)values('$zero','$one','$two','$three','$four','$five','$can','$seven','$fo','$twoo','NS','NO','--','--','--','Approved','Not-Delivered','--')";
        $quer=mysqli_query($connection,$insert);
        if($quer)
        {
            echo "Success";
        }
        else{
            echo "Failed";
        }

    }
}
?>