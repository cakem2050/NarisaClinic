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
    $bill = $_POST['bills_id'];
    $stmt = $conn->prepare("UPDATE bills SET bills_status='D' WHERE bills_id=:bills_id");
    $stmt->bindParam(':bills_id', $bill);
    $stmt->execute();
    echo "pass";
?>
