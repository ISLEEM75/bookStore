<?php
/**
 * Created by PhpStorm.
 * User: fuad abuowaimer
 * Date: 13-12-2018
 * Time: 6:20 AM
 */

class validate
{
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function test_validation($input, $reg_msg, $empty_msg, $error_msg)
    {
        if (empty($input)) {
            $ErrMSG = $empty_msg;
            $flag = false;
            return array($ErrMSG, $flag);
        } else if (!preg_match($reg_msg, $input)) {
            // check if name only contains letters and whitespace
            $ErrMSG = $error_msg;
            $flag = false;
            return array($ErrMSG, $flag);
        } else {
            $ErrMSG = '';
            $flag = true;
        }
        return array($ErrMSG, $flag);
    }

}