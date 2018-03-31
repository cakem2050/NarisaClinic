<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 27/3/2561
 * Time: 0:54
 */
?>
<?php
include "../connect.php";
include  "../../vendor/autoload.php";
include "../func.php";
$op3 = new func3();
$date = $op3->date($_GET['date'])."%";
echo $date;
$report_date = $_GET['date'];
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
$content = "<style>
.container,th,td,h1{
    font-family: 'Garuda';
    font-size: 12pt;
}
table, th, td {
   border: 1px solid black;
}
th,td{
    padding:5px;
}
table {
    border-collapse: collapse;
}
.sum{
    text-align: center;
}
.red{
    color: #bf6464;
}
</style>
<h1 class='sum' style='font-size: 20px;'>Narisa Clinic</h1>
<h1>รายงานสรุปการขายยา ประจำวันที่ ".$report_date."</h1>
<div class='container'>
    <table>
        <thead>
            <tr>
                <th width=\"5%\">ลำดับ</th>
                <th width=\"20%\">รหัส barcode</th>
                <th>ชื่อยา</th>
                <th width=\"10%\">จำนวน</th>
            </tr>
        </thead>
        <tbody>
    ";
$sql_pro = "SELECT * FROM product WHERE pro_status ='E'";
$stmt_pro = $conn->prepare($sql_pro);
$stmt_pro->execute(array(':datecheck' => $date));
$i = 1;
while($result = $stmt_pro->fetch( PDO::FETCH_ASSOC )) {

    $content = $content . "
        <tr>
            <td>" . $i . "</td>
            <td>" . $result['pro_id'] . "</td>
            <td>" . $result['pro_name'] . "</td>
    ";
    $sql_prc = "SELECT SUM(bild_value) FROM billsdetail WHERE bild_timestamp LIKE :datecheck AND bild_status = 'E' AND pro_id = :pro_id";
    $stmt_prc = $conn->prepare($sql_prc);
    $stmt_prc->execute(array(':datecheck' => $date, 'pro_id' => $result['pro_id']));
    while ($result_prc = $stmt_prc->fetch(PDO::FETCH_ASSOC)) {
        $content = $content ."<td>" . $result_prc['SUM(bild_value)'] . "</td>";
    }
}
$content = $content."
            </tr>
        </tbody>
    </table>
</div>";
$mpdf->WriteHTML($content);
$mpdf->Output();



?>
