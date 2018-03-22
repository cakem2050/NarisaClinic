<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 22/3/2561
 * Time: 18:34
 */
?>

<?php
    session_start();
    session_destroy();
    header("location: /narisaclinic/login.php")
?>
