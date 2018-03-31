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
    class func2 {
        function date($para) {
            $data = $para;
            $year = substr($data,6,4);
            $month = substr($data,3,2);
            $day = substr($data,0,2);
            $date = $year."-".$month."-".$day;
            return $date;
        }
    }
    class func3 {
        function date($para) {
            $data = $para;
            $year = substr($data,6,4)-543;
            $month = substr($data,3,2);
            $day = substr($data,0,2);
            $date = $year."-".$month."-".$day;
            return $date;
        }
    }
?>

