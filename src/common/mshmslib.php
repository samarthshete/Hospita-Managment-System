<?php

/* Copyrights by Praxis Infotech (c)2017,2018
 * Product Name: MSHMS V1.0
 * File Name:
 * File Path:
 * Description:
 * //Purpose :
 * First Created By: Sr. Tech Leader, Praxis Infotech
 * First Created On: Jan 4, 2018 @15:05
 * Modified By:
 * Modified On:
 * Reason for Modifications:
 * 1.
 * Latest Version Label:
 */

// Start Typing from Here ....
function random_code($limit)
{
    //This function can be used to genereate OTP or Random Code of specified length
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}


//echo random_code(8);
?>

