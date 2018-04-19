<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 24/3/2561
 * Time: 23:51
 */
?>
<?php
include "../connect.php";
include  "../../vendor/autoload.php";
include "../func.php";
$op2 = new func2();
$date = $op2->date($_GET['date'])."%";
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
<h1>รายงานการโอนที่ LINE@ ประจำวันที่ ".$report_date."</h1>
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
$sql = "SELECT * FROM bills WHERE bills_datetime LIKE :datecheck AND bills_ptype = 'TL'";
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
    $op1 = new func();
    $data2 = $op1->date($result['bills_datetime']);
    $content = $content."
            <td>".$data2."</td>
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
$sql_pay = "SELECT SUM(bills_pay),SUM(bills_discount),SUM(bills_ost),SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TL'";
$pay = $conn->prepare($sql_pay);
$pay->execute(array(':datecheck'=>$date));
while($result = $pay->fetch( PDO::FETCH_ASSOC )) {
    $content = $content."<td>" . number_format($result['SUM(bills_pay)'],2) . "</td><td>" . number_format($result['SUM(bills_discount)'],2) . "</td><td>" . number_format($result['SUM(bills_net)'],2) . "</td><td>" . number_format($result['SUM(bills_ost)'],2) . "</td><td></td>";
}

$content = $content."
            </tr>
        </tbody>
    </table>
</div>";
$mpdf->WriteHTML($content);
$mpdf->Output();



?>
