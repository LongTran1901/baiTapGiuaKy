<?php
require 'connect.php';
$id=(int) $_GET['id'];
$sql = "DELETE FROM `table_students` WHERE `id` = {$id}";
$result=$conn->query($sql);
if($result)
{
    header('Location:display.php');
}
?>