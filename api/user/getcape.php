<?php
$MinecraftUUID = $_GET["uuid"];
if(file_exists($_SERVER["DOCUMENT_ROOT"]."/users/$MinecraftUUID.json"))
{
    $UserMeta = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/users/$MinecraftUUID.json"));
    $CapeName = $UserMeta->currentcape;
    if ($CapeName != null)
    {
        $CapeData = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/assets/capes/$CapeName.png");
        header('content-type: image/png');
        echo($CapeData);
    }
    else{
        http_response_code(404);
    }
}
else{
    http_response_code(404);
}

?>