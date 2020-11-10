<?php

require_once ("db.php");
require_once 'excel_library/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("message.xlsx");

$list_data = $db->query("SELECT * FROM messages WHERE type = 'vip' ORDER BY id DESC");

$start_number = 6;

if($list_data->num_rows > 0 ){
    foreach ($list_data as $key => $row){
        $num = $start_number + $key;
        $objPHPExcel-> setActiveSheetIndex(0)
            ->setCellValue("K".$num,++$key)
            ->setCellValue("J".$num,$row['title'])
            ->setCellValue("I".$num,$row['name'])
            ->setCellValue("H".$num,$row['phone'])
            ->setCellValue("G".$num,$row['email'])
            ->setCellValue("F".$num,$row['message'])
            ->setCellValue("E".$num,explode( ' ',$row['created_at'])[0])
        ;
    }
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean(); // Added by me
ob_start(); // Added by me

$date = explode(' ',date("Y-m-d H:i:s"))[0];
$time = explode(' ',date("Y-m-d H:i:s"))[1];


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="MargorateVipRequests-'.$date.':'.$time.'.xlsx"');

header('Cache-Control: max-age=0');
$objWriter->save('php://output');


?>