<?php
/**
* Created by PhpStorm.
* @file $Id:functions.php
* @version 1.0.0
* @description 文件说明
* @date 2015/5/12 14:28
* @author lifuping
* @copyright Panorama Network Co., Ltd, All Rights Reserved
* @link http://www.p5w.net/
*/

function p5wFile($url)
{
    $c = file($url);
    return implode('', $c);
}

/**
 * @param $mixed
 * @return bool
 * var_export( isint( '123' ) ); //This will return true
 * var_export( isint( 123 ) ); //This will return true
 * var_export( isint( 'asd' ) ); //This will return false
 * var_export( isint( '123asd123' ) ); //This will return false
 */
function isint( $mixed )
{
    return ( preg_match( '/^\d*$/'  , $mixed) == 1 );
}

/**
 * @param $int
 * @return bool
 * The above returns:
 * 155        TRUE
 * 15.5       FALSE
 * "155"      TRUE
 * "15.5"     FALSE
 * "0155"     TRUE
 * "I'm 155"  FALSE
 * "test"     FALSE
 * ""         FALSE
 */
function isint2($int){

    // First check if it's a numeric value as either a string or number
    if(is_numeric($int) === TRUE){

        // It's a number, but it has to be an integer
        if((int)$int == $int){

            return TRUE;

            // It's a number, but not an integer, so we fail
        }else{

            return FALSE;
        }

        // Not a number
    }else{

        return FALSE;
    }
}

/**
 * @param $input
 * @return bool
 * check if input is a valid number
 * first number must be 1 thru 9, followed by a number 0-9, no decimals
 * true for "1", "1000"
 * false for "01", "-1", "1.2"
 */
function isInteger($input){
    return preg_match('@^[1-9][0-9]*$@',$input) === 1;
}
