<?php
include($_SERVER['DOCUMENT_ROOT']."/auth-flow.php");

if($IsClientAuthed == true)
{
    RemoveUser($_GET['uuid']);
}
else
{
    http_response_code(401);
}

function RemoveUser($MinecraftUUID)
{
    switch(is_file($_SERVER['DOCUMENT_ROOT']."/users/$MinecraftUUID.json"))
    {
        case false:
            echo("Specified user does not exist.");
            http_response_code(404);
            break;
        case true:
            unlink($_SERVER['DOCUMENT_ROOT']."/users/$MinecraftUUID.json");
            break;
    }
}

?>