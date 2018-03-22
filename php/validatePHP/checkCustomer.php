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
    $opd = $_POST["opd"];
    //$opd = "423423";
    $sql = "SELECT * FROM customer WHERE cus_opd = :cus_opd";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':cus_opd'=>$opd));

//    while($result = $stmt->fetch( PDO::FETCH_ASSOC )){
//        echo $result['cus_name'];
//    }

echo sizeof($stmt->fetchAll());


?>

