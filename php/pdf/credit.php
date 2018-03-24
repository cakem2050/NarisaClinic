<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 25/3/2561
 * Time: 0:40
 */
?>
<?php
include "../connect.php";
include  "../../vendor/autoload.php";
include "../func.php";
$op = new func();
$date = $_GET['date'];
echo $date;

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
.margin-left-10{
    margin-left: 10px;
}
</style>
<h1>รายงานการชำระ CREDIT</h1>
<div class='container'>
    <table>
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th width='28%'>ชื่อ นามสกุล</th>
                <th width='20%'>วันที่/เวลา โอน</th>
                <th width='12%'>ยอดชำระ</th>
                <th width='10%'>ส่วนลด</th>
                <th width='12%'>ราคาสุทธิ</th>
                <th width='12%'>ค้างชำระ</th>
            </tr>
        </thead>
        <tbody>
    ";
include "php/connect.php";
include "php/func.php";
$op = new func();
$date = "".$_GET["date"]."%";
$sql = "SELECT * FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CD'";
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
        $content = $content."<div class='margin-left-10'>
                                                    <p class='nomargin'>credit</p>";
        $sql_bk = "SELECT * FROM bank WHERE bak_status = :status ORDER BY bak_no ASC";
        $stmt_bk = $conn->prepare($sql_bk);
        $stmt_bk->execute(array(':status'=>"E"));
        while($result_bk = $stmt_bk->fetch( PDO::FETCH_ASSOC )){
            $content = $content."<p class='nomargin'>".$result_bk['bak_id']." ";
            $st = " bills_".strtolower($result_bk['bak_id']);
            $sql_sbk = "SELECT SUM(".$st.") FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CD' AND bills_no = :no";
            $stmt_sbk = $conn->prepare($sql_sbk);
            $stmt_sbk->execute(array(':datecheck'=>$date,':no'=>$result['bills_no']));
            while($result_sbk = $stmt_sbk->fetch( PDO::FETCH_ASSOC )){
                $content = $content.$result_sbk['SUM('.$st.')']."</p>";
            }
        }
        $content = $content."</div></td>";
    }
    $data = $op->date($result['bills_datetime']);
    $content = $content."
            <td>".$data."</td>
            <td>".$result['bills_pay']."</td>
            <td>".$result['bills_discount']."</td>
            <td>".$result['bills_net']."</td>
            <td>".$result['bills_ost']."</td>
        </tr>
    ";
    $i++;
}
$content = $content."
            <tr>
                <td class=\"text-center\"><b>รวม</b></td>
                <td colspan=\"6\">";
                $sql_bk = "SELECT * FROM bank WHERE bak_status = :status ORDER BY bak_no ASC";
                $stmt_bk = $conn->prepare($sql_bk);
                $stmt_bk->execute(array(':status'=>"E"));
                while($result_bk = $stmt_bk->fetch( PDO::FETCH_ASSOC )){
                    $content = $content."<p class=\"nomargin\">".$result_bk['bak_id']." ";
                    $st = " bills_".strtolower($result_bk['bak_id']);
                    $sql_sbk = "SELECT SUM(".$st.") FROM bills WHERE bills_datetime LIKE :datecheck AND bills_status = 'E' AND bills_ptype = 'CD'";
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
