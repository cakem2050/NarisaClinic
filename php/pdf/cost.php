<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 26/3/2561
 * Time: 1:16
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
td{
    position: relative;
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
span{
top: 10px;
right: 10px;
    float: right;
}
</style>
<h1>รายงานสรุปการเงิน ".$report_date."</h1>
<div class='container'>
    <table width='700px'>
        <tbody>
    ";
include "php/connect.php";
$date = "".$_GET["date"]."%";

$sql_tc = "SELECT SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TC'";
$pay_tc = $conn->prepare($sql_tc);
$pay_tc->execute(array(':datecheck'=>$date));

$sql_to = "SELECT SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TO'";
$pay_to = $conn->prepare($sql_to);
$pay_to->execute(array(':datecheck'=>$date));

$sql_tl = "SELECT SUM(bills_net) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'TL'";
$pay_tl = $conn->prepare($sql_tl);
$pay_tl->execute(array(':datecheck'=>$date));

$sql_ch = "SELECT SUM(bills_cash) FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CH'";
$pay_ch = $conn->prepare($sql_ch);
$pay_ch->execute(array(':datecheck'=>$date));
$content = $content."
    <tr>
        <td width='33%'>เงินโอนที่ clinic<span>
             ";
$result_tc_cop = "";
while($result_tc = $pay_tc->fetch( PDO::FETCH_ASSOC )) {
    $result_tc_cop = $result_tc['SUM(bills_net)'];
    $content = $content.$result_tc['SUM(bills_net)'];
}
$content = $content."
        </span>
        </td>
        <td width='33%'>เงินสด
        <span>
             ";
$result_ch_cop = "";
while($result_ch = $pay_ch->fetch( PDO::FETCH_ASSOC )) {
    $result_ch_cop = $result_ch['SUM(bills_cash)'];
    $content = $content.$result_ch['SUM(bills_cash)'];
}
$content = $content."
        </span></td>
        <td width='33%'>credit</td>
    </tr>
";


$content = $content."
    <tr>
        <td width='33%'>เงินโอนที่นอก clinic <span>
             ";
$result_to_cop = "";
while($result_to = $pay_to->fetch( PDO::FETCH_ASSOC )) {
    $result_to_cop = $result_to['SUM(bills_net)'];
    $content = $content . $result_to['SUM(bills_net)'];
}
    $content = $content."
        </span></td>
        <td></td>
        <td rowspan='2'>";
$sql_bk = "SELECT * FROM bank WHERE bak_status = :status ORDER BY bak_no ASC";
$stmt_bk = $conn->prepare($sql_bk);
$stmt_bk->execute(array(':status'=>"E"));
$sum_credit = 0;
while($result_bk = $stmt_bk->fetch( PDO::FETCH_ASSOC )){
    $content = $content. "<span>+ ".$result_bk['bak_id']."</span>";
    $st = " bills_".strtolower($result_bk['bak_id']);
    $sql_sbk = "SELECT SUM(".$st.") FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E'";
    $stmt_sbk = $conn->prepare($sql_sbk);
    $stmt_sbk->execute(array(':datecheck'=>$date));
    while($result_sbk = $stmt_sbk->fetch( PDO::FETCH_ASSOC )){
        $sum_credit = $sum_credit + $result_sbk['SUM('.$st.')'];
        $content = $content. "<span> ".$result_sbk['SUM('.$st.')']."</span><br>";
    }
}
$content = $content."     
</td>
    </tr>
";

$content = $content."     
    <tr>
        <td>เงินโอน Line@ <span>
";
$result_tl_cop = "";
while($result_tl = $pay_tl->fetch( PDO::FETCH_ASSOC )) {
    $result_tl_cop = $result_tl['SUM(bills_net)'];
    $content = $content.$result_tl['SUM(bills_net)'];
}
$content = $content."     
        </span></td>
    <td></td>
</tr>
";

$content = $content."     
        <tr>
            <td>รวม <span>
";
$sum = $result_tc_cop + $result_to_cop + $result_tl_cop;
$content = $content.$sum;
$content = $content."     
       </span></td>
       <td><span>
";
$content = $content.$result_ch_cop;
$content = $content."     
       </span></td>
        <td><span>
";
$content = $content.$sum_credit;
$content = $content."
                </span></td>
            </tr>
        </tbody>
    </table>
</div>";
$mpdf->WriteHTML($content);
$mpdf->Output();
?>