<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 24/3/2561
 * Time: 23:07
 */
?>

<?php
    class func {
        function date($para) {
            $data = $para;
            $data =  substr($data,0,16);
            $year = substr($data,0,4);
            $month = substr($data,5,2);
            $day = substr($data,8,2);
            $datecut = substr($data,0,10);
            $date = $day."/".$month."/".$year;
            $date2 = str_replace($datecut,$date,$data);
            return $date2;
        }
    }
?>

