<?php
include '../backend/dbconnection.php';
$sql="select *from tablereservation";
$query=mysqli_query($connection,$sql);
$tables_check=[];
$table_infos=[];
while($fetch=mysqli_fetch_array($query))
{
    $get_tab_num=$fetch['Tableno'];
    $get_tab_dat=$fetch['Dat'];
    $get_tab_tim=$fetch['Tim'];
    array_push($tables_check,$get_tab_num);
    $table_infos[$get_tab_num]=[$get_tab_dat,$get_tab_tim];
}

