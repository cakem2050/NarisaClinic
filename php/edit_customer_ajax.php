<?php

include "connect.php";

$id = $_POST['id'];

$sql = "SELECT * FROM customer WHERE cus_opd LIKE LOWER('".$id."')";
$result = $conn->query($sql);

if ($result) {
    // output data of each row
    $count = 1;
    while($row = $result->fetch()) {
        echo "<fieldset>
                                        <div class=\"row\">
                                            <div class=\"col-md-4 col-sm-4\">
                                                <input type=\"text\" placeholder=\"เลข OPD\" name=\"opd\" id=\"opd\" value=\"".$row['cus_opd']."\"
                                                       class=\"form-control required\" disabled>
                                                <div id=\"opdc\" style=\"color: #bf6464;display: none;\">รหัส opd
                                                    นี้ถูกใช้งานแล้ว !
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-4 col-sm-4\">
                                                <input type=\"text\" placeholder=\"ชื่อคนไข้\" id=\"name\" name=\"name\"
                                                       value=\"".$row['cus_name']."\" class=\"form-control required\">
                                            </div>
                                            <div class=\"col-md-4 col-sm-4\">
                                                <input type=\"text\" placeholder=\"นามสกุล\" id=\"sname\" name=\"sname\"
                                                       value=\"".$row['cus_sname']."\" class=\"form-control required\">
                                            </div>
                                            <div class=\"col-md-4 col-sm-4\">
                                                <input type=\"text\" placeholder=\"เบอร์โทร\" id=\"tel\" name=\"tel\" value=\"".$row['cus_tel']."\"
                                                       class=\"form-control required\">
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12 col-sm-12\">
                                                <textarea name=\"add\" id=\"add\" placeholder=\"ที่อยู่\" rows=\"4\"
                                                          class=\"form-control required\">".$row['cus_add']."</textarea>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-12 col-sm-12\">
                                                <textarea name=\"detail\" id=\"detail\" placeholder=\"รายละเอียดอื่นๆ\"
                                                          rows=\"4\" class=\"form-control required\">".$row['cus_detail']."</textarea>
                                            </div>
                                        </div>
                                    </fieldset>";
    }
}else{
    echo "<div style='color: red;text-align: center;font-size: 22px'>ไม่พบข้อมูล</div>";
}
