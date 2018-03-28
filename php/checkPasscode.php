<?php
include "passcode.php";
$get_passcode = $_POST['passcode'];
$passcode = passcode();
if ($get_passcode == $passcode) {
    echo "pass";
} else {
    echo "false";
}
?>