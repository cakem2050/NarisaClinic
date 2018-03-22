<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 20/3/2561
 * Time: 3:00
 */
    include "../connect.php";
?>

<?php
$username = $_POST["username"];
$password = $_POST["password"];
//$opd = "423423";
$sql = "SELECT * FROM users WHERE usr_uname = :username && usr_pass = :password";
$stmt = $conn->prepare($sql);
$stmt->execute(array(':username'=>$username,':password'=>$password));
$usr_level ="";
    while($result = $stmt->fetch( PDO::FETCH_ASSOC )){
        //echo $result['usr_level'];
        $usr_level = $result['usr_level'];
        $usr_name = $result['usr_name'];
    }
    if($usr_level != ""){
        session_start();
        $_SESSION['usr_level'] = $usr_level;
        $_SESSION['usr_name'] = $usr_name;

        if($usr_level == "M"){
            echo "manager".$_SESSION['usr_level']."<br>".$_SESSION['usr_name'];
        }
        if($usr_level == "C"){
            echo "staff".$_SESSION['usr_level']."<br>".$_SESSION['usr_name'];
        }
        //header("location: /narisaclinic/login.php");
    }else{
        $code_error="ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง !";
        header("location: /narisaclinic/login.php?error=".$code_error);
    }


?>
