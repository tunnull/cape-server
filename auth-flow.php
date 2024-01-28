<?php
#This includes all user UUIDs/Auth Tokens which are allowed elevated access to enpoints such as /setcape /adduser or /rmuser

$OperatorAuthHeader = getallheaders()["operatorauthorization"];
$OwnerUUIDs = array("d77b73c3-6323-484d-9f9c-8d96f802f2fe", "65208d03-7c9a-480f-828a-2de1ad361ff0", "a110886e-7321-4e98-a54a-b5b5d564c2cc");
$AESPassword = 'gFS/R45I=I\D5Xz]"w7£NQ|fjY)t7';

#Key 0 = tunnull
#Key 1 = santyclouds
#Key 2 = hexic98

if(isset($OperatorAuthHeader))
{
    $AuthToken = openssl_decrypt($OperatorAuthHeader, 'AES-128-ECB', $AESPassword);
}


if(in_array($AuthToken, $OwnerUUIDs))
{
    http_response_code(200);
    $IsClientAuthed = true;
}
else{
    http_response_code(401);
    $IsClientAuthed = false;
}
?>