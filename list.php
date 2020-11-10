<?php


require_once("db.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> لیست خروجی  </title>
    <link rel="stylesheet" href="bootstrap.css"  crossorigin="anonymous">

</head>
<body>


<div style="padding: 30px 80px ">
    <div class="row" style="border: 2px solid black;padding-top: 20px" >
        <div class="col-md-12">
            <h3>  VIP لیست درخواست های    </h3>
            <a href="message_export.php" type="button" class="btn btn-primary"> خروجی    </a><br /><br />
            <table class="table table-hover" dir="rtl">
                <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان  </th>
                    <th>نام </th>
                    <th> تماس  </th>
                    <th> ایمیل  </th>
                    <th> پیام  </th>
                    <th> تاریخ  </th>
                </tr>
                </thead>
                <tbody>

                <?php

                $list_data = $db->query("SELECT * FROM messages WHERE type = 'vip' ORDER BY id DESC");

                if($list_data->num_rows > 0 ){
                    foreach ($list_data as $key => $row){
                        echo '
                            <tr>
                                <td> '.++$key.'</td>
                                <td> '.$row['title'].' </td>
                                <td> '.$row['name'].' </td>
                                <td> '.$row['phone'].' </td>
                                <td> '.$row['email'].' </td>
                                <td> '.$row['message'].' </td>
                                <td> '.$row['created_at'].' </td>
                            </tr>
                        ';
                    }
                }else {
                    echo '
                        <tr>
                            <td> کدام اطلاعاتی وجود ندارد   </td>
                        </tr>
                    ';
                }


                ?>


                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>