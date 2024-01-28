<?php
include($_SERVER['DOCUMENT_ROOT']."/auth-flow.php");

if($IsClientAuthed == true)
{
    SetCape($_GET['uuid'], $_GET['cape']);
}
else
{
    http_response_code(401);
}

function SetCape($MinecraftUUID, $CapeName)
{

    if(file_exists("../../assets/capes/$CapeName.png"))
    {
        $usermeta = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/users/$MinecraftUUID.json"), true);
        //if(in_array($CapeName, $usermeta["ownedcapes"]))
        //{
        $usermeta["currentcape"] = $CapeName;
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/users/$MinecraftUUID.json", json_encode($usermeta));
        //}
        //else{
        //    echo("User does not own cape.");
        //    http_response_code(401);
        //}

    }
    else
    {
        echo("Specified cape does not exist.");
        http_response_code(404);
    }
}
?>