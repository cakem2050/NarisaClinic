<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 19/3/2561
 * Time: 2:42
 */
    include "../connect.php";
?>
<?php
    //$opd = $_POST["opd"];
    $opd = "ertreter";
    $sql = "SELECT * FROM customer WHERE cus_opd = :cus_opd";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':cus_opd'=>$opd));


while($result = $stmt->fetch( PDO::FETCH_ASSOC )){
    echo $result['cus_opd'];
}
//while ($row = $result->fetch(PDO::FETCH_ASSOC))
//{
//    echo $row['cus_opd'];
//}
?>

