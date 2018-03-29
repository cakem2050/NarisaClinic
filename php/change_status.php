<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 29/3/2561
 * Time: 21:20
 */
?>

<?php
    include "connect.php";

try{
    $bill = $_POST['bills_id'];
    $stmt = $conn->prepare("UPDATE bills SET bills_status='D' WHERE bills_id=:bills_id");
    $stmt->bindParam(':bills_id', $bill);
    $stmt->execute();

    $stmt_d = $conn->prepare("UPDATE billsdetail SET bild_status='D' WHERE bills_id=:bills_ids");
    $stmt_d->bindParam(':bills_ids', $bill);
    $stmt_d->execute();
    echo "pass";
}catch (Exception $e){
    echo $e->getMessage();
}

?>
