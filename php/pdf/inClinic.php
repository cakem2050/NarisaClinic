<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 24/3/2561
 * Time: 1:07
 */
?>
<?php
include "../connect.php";
include  "../../vendor/autoload.php";
include "../func.php";
$op = new func();
$date = $_GET['date'];
echo $date;
$report_date = $op->date($date);
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
<h1>รายงานการโอนที่ CLINIC ประจำวันที่ ".$report_date."</h1>
<div class='container'>
    <table>
        <thead>
            <tr>
                <th width='5%'>ลำดับ</th>
                <th width='15%'>ชื่อ นามสกุล</th>
                <th width='13%'>วันที่/เวลา โอน</th>
                <th width='12%'>ยอดชำระ</th>
                <th width='10%'>ส่วนลด</th>
                <th width='10%'>ราคาสุทธิ</th>
                <th width='10%'>ค้างชำระ</th>
                <th width='12%'></th>
            </tr>
        </thead>
        <tbody>
    ";
$date = "".$_GET["date"]."%";
$sql = "SELECT * FROM bills WHERE bills_datetime LIKE :datecheck AND bills_ptype = 'TC'";
$stmt = $conn->prepare($sql);
$stmt->execute(array(':datecheck'=>$date));
$i = 1;
while($result = $stmt->fetch( PDO::FETCH_ASSOC )){

    $content = $content."
        <tr>
            <td>".$i."</td>
    ";
    $sql_opd = "SELECT * FROM customer WHERE cus_opd = :opd";
    $stmt_opd = $conn->prepare($sql_opd);
    $stmt_opd->execute(array(':opd'=>$result['cus_opd']));
    while($result_opd = $stmt_opd->fetch( PDO::FETCH_ASSOC )){
        $content = $content."<td>".$result_opd['cus_name']." ".$result_opd['cus_sname']."</td>";
    }
    $data = $op->date($result['bills_datetime']);
    $content = $content."
            <td>".$data."</td>
            <td>".$result['bills_pay']."</td>
            <td>".$result['bills_discount']."</td>
            <td>".$result['bills_net']."</td>
            <td>".$result['bills_ost']."</td><td>
    ";
    if($result['bills_status'] == "D"){
        $content = $content."<span class='red'>รายการที่ถูกยกเลิก</span>";
    }
    $content = $content."
        </td></tr>
    ";
    $i++;
}
$content = $content."
        <tr>
            <td colspan='3' class='sum'>รวม</td>
            ";
$sql_pay = "SELECT SUM(bills_pay),SUM(bills_discount),SUM(bills_ost),SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TC'";
$pay = $conn->prepare($sql_pay);
$pay->execute(array(':datecheck'=>$date));
while($result = $pay->fetch( PDO::FETCH_ASSOC )) {
    $content = $content."<td>" . $result['SUM(bills_pay)'] . "</td><td>" . $result['SUM(bills_discount)'] . "</td><td>" . $result['SUM(bills_net)'] . "</td><td>" . $result['SUM(bills_ost)'] . "</td><td></td>";
}

$content = $content."
            </tr>
        </tbody>
    </table>
</div>";
$mpdf->WriteHTML($content);
$mpdf->Output();



?>
