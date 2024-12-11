<?php
$conn = mysqli_connect("localhost:3307","root","","QLSV_TranMinhLong");

if(!$conn)
{
    die ("Kết nối không thành công".mysqli_connect_error());
}

?>