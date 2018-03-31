<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 25/3/2561
 * Time: 1:21
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
td{
    margin-top: 0px;
}
table {
    border-collapse: collapse;
}
.sum{
    text-align: center;
}
.margin-left-10{
    margin-left: 10px;
}
.red{
    color: #bf6464;
}
</style>
<h1 class='sum' style='font-size: 20px;'>Narisa Clinic</h1>
<h1>รายงานการชำระ CREDIT ".$report_date."</h1>
<div class='container'>
    <table>
        <thead>
            <tr>
                <th width='5%'>ลำดับ</th>
                <th width='15%'>ชื่อ นามสกุล</th>
                <th width='15%'>วันที่/เวลา โอน</th>
                <th width='12%'>ยอดชำระ</th>
                <th width='10%'>ส่วนลด</th>
                <th width='10%'>ราคาสุทธิ</th>
                <th width='10%'>ค้างชำระ</th>
                <th width='12%'></th>
            </tr>
        </thead>
        <tbody>
    ";
include "php/connect.php";
include "php/func.php";
$op = new func();
$sql = "SELECT * FROM bills WHERE bills_datetime LIKE :datecheck AND bills_ptype = 'CC'";
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
        $content = $content."<td>".$result_opd['cus_name']." ".$result_opd['cus_sname'];
        $content = $content."<p>เงินสด".$result['bills_cash']."</p></td>";

    }
    $op1 = new func();
    $data2 = $op1->date($result['bills_datetime']);

    $content = $content."<td>".$data2."<div class='margin-left-10'>";
    $sql_bk = "SELECT * FROM bank WHERE bak_status = :status ORDER BY bak_no ASC";
    $stmt_bk = $conn->prepare($sql_bk);
    $stmt_bk->execute(array(':status'=>"E"));
    while($result_bk = $stmt_bk->fetch( PDO::FETCH_ASSOC )){
        $content = $content."<p class='nomargin'>".$result_bk['bak_id']." ";
        $st = " bills_".strtolower($result_bk['bak_id']);
        $sql_sbk = "SELECT SUM(".$st.") FROM bills WHERE bills_datetime LIKE :datecheck AND bills_ptype = 'CC' AND bills_no = :no";
        $stmt_sbk = $conn->prepare($sql_sbk);
        $stmt_sbk->execute(array(':datecheck'=>$date,':no'=>$result['bills_no']));
        while($result_sbk = $stmt_sbk->fetch( PDO::FETCH_ASSOC )){
            $content = $content.$result_sbk['SUM('.$st.')']."</p>";
        }
    }
    $content = $content."</td></div>";

    $content = $content."
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
                <td class=\"text-center\"><b>รวม</b></td>
                <td colspan=\"7\">
                    <p class=\"margin-top-0 margin-bottom-10\">เงินสด";
$sql_cash = "SELECT SUM(bills_cash) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CC'";
$cash = $conn->prepare($sql_cash);
$cash->execute(array(':datecheck'=>$date));
while($result_cash = $cash->fetch( PDO::FETCH_ASSOC )){
    $content = $content.$result_cash['SUM(bills_cash)'];
}
$content = $content."</p>";
$sql_bk = "SELECT * FROM bank WHERE bak_status = :status ORDER BY bak_no ASC";
$stmt_bk = $conn->prepare($sql_bk);
$stmt_bk->execute(array(':status'=>"E"));
while($result_bk = $stmt_bk->fetch( PDO::FETCH_ASSOC )){
    $content = $content."<p class=\"nomargin\">".$result_bk['bak_id']." ";
    $st = " bills_".strtolower($result_bk['bak_id']);
    $sql_sbk = "SELECT SUM(".$st.") FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CC'";
    $stmt_sbk = $conn->prepare($sql_sbk);
    $stmt_sbk->execute(array(':datecheck'=>$date));
    while($result_sbk = $stmt_sbk->fetch( PDO::FETCH_ASSOC )){
        $content = $content.$result_sbk['SUM('.$st.')']."</p>";
    }
}
$content = $content."
                </td>
            </tr>
        </tbody>
    </table>
</div>";
$mpdf->WriteHTML($content);
$mpdf->Output();
?>
