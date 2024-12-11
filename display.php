<?php
require ('connect.php');
$sql = "SELECT * FROM table_students";
if(isset($_POST['search']))
        {
            $name = $_POST['nd'];
            $sql = "SELECT * FROM table_students WHERE fullname LIKE '%$name' OR hometown LIKE '%$name%'";
        }

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<head>
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        
*
{
    font-family: Arial, Helvetica, sans-serif;
}
.button_delete
{
    background-color: red;
    color : white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    font-size: large;
    padding: 5px;
}
.button_update
{
    background-color: blue;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    font-size:large;
    padding: 5px;    
}
.button_delete:hover
{
    background-color: orange;
    cursor: pointer;
}
.button_update:hover
{
    background-color: black;
    cursor: pointer;
}

table
{
    text-align: center;
    table-layout: fixed;
    width: 100%;
    border-collapse: collapse;
    margin-top: 25px;
    border-radius: 10px;
    overflow: hidden;
    font-size:larger;
}
table th
{
    background-color: black;
    color:white;
    height: 50px;

}
table td
{
    padding: 10px;
    border-bottom: 1px solid #cec9c9;

}
.insert
{
    color: white;
    background-color: green;
    border-radius: 5px;
    width: 180px;
    height: 30px;
    padding-top: 10px;
    font-size: large;
    text-align: center;
    float: right;
}
.insert:hover{
    background-color: darkgreen;
}
.search
{
    text-align: center;
    background-color: darkorange;
    color: white;
    border-radius: 5px;
    width: 200px;
    font-size: larger;
    height: 37px;
    border: none;
}
.search:hover
{
    background-color: lightgray;
    cursor: pointer;
}
.border
{
    border: 1px solid black;
    height: 31px;
    border-radius: 5px;
    margin: 1px;
    width: 1000px;
    font-size: large;
}
.them
{
    text-decoration: none;
    color: white;

}
.ds
{
    display: flex;
}
.mar
{
    width: 95%;
    padding-left: 35px;
    padding-top: 20px;
}


    </style>    
</head>
<body>
    <div>
<h1 style="text-align: center;">Danh sách sinh viên</h1>
<div class="mar">
        <div class="insert">
        <a class="them" href="add.php"><i class="fa-solid fa-user-plus"></i>  Thêm sinh viên</a>
        </div>
        <div class="ds">
        <form method="post">
        <input class="border" type = "text" name="nd" placeholder="Nhập tên hoặc quê quán để tìm kiếm sinh viên">
        <button class="search" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i>Tìm kiếm</button>
        </form>
        </div>
        <table>
        <tr>
            <th><i class="fa-solid fa-list"></i>  Họ và tên</th>
            <th><i class="fa-regular fa-calendar-days"></i>  Ngày sinh</th>
            <th><i class="fa-solid fa-venus-mars"></i>  Giới tính</th>
            <th><i class="fa-solid fa-house"></i>  Quê quán</th>
            <th><i class="fa-solid fa-school"></i>  Trình độ học vấn</th>
            <th><i class="fa-solid fa-user-group"></i>  Nhóm</th>
            <th><i class="fa-solid fa-wrench"></i>  Chỉnh sửa</th>
        </tr>
            <?php
            
            while($row = $result->fetch_assoc())
            {
                if($row['level']==0)
                {
                    $level = "Tiến sĩ";
                }
                else if($row['level']==1)
                {
                    $level = "Thạc sỹ";
                }
                else if($row['level']==2)
                {
                    $level = "Kỹ sư";
                }
                else
                {
                    $level = "Khác";
                }
                switch($row['grp'])
                {
                    case 1:
                        $grp = "Nhóm 1";
                        break;
                    case 2:
                        $grp = "Nhóm 2";
                        break;
                    case 3:
                        $grp = "Nhóm 3";
                        break;
                    case 4:
                        $grp = "Nhóm 4";
                        break;
                    case 5:
                        $grp = "Nhóm 5";
                        break;
                    case 6:
                        $grp = "Nhóm 6";
                        break;
                    case 7:
                        $grp = "Nhóm 7";
                        break;
                    case 8:
                        $grp = "Nhóm 8";
                        break;
                    case 9:
                        $grp = "Nhóm 9";
                        break;
                    default: 
                     $grp = "Không Có Nhóm";
                }
                if($row['gender']==1)
            {
                $gender = "Nam";
            }
            else
            {
                $gender = "Nữ";
            }
            $date_from_db = $row['dob'];
            $formatted_date = date('d/m/y', strtotime($date_from_db));
                echo 
                "<tr>
                <td>".$row['fullname']."</td>
                <td>".$formatted_date."</td>
                <td>".$gender."</td>
                <td>".$row['hometown']."</td>
                <td>".$level."</td>
                <td>".$grp."</td>
                <td style='width: 120px;'>
                    <a class='button_update' href='update.php?id=".$row['id']."'><i class='fa-solid fa-pen-to-square'></i>  Sửa</a>
                    <a class='button_delete' href='delete.php?id=".$row['id']."'><i class='fa-solid fa-trash-can'></i>  Xóa</a>
                </td>
                ";
            }
            ?>
    </table>
</div>
    </div>
</body>
