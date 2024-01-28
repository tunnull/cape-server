<?php
include($_SERVER['DOCUMENT_ROOT']."/auth-flow.php");

if($IsClientAuthed == true)
{
    CreateUser($_GET['uuid'], $_GET['usertype'], $_GET['discord_userid']);
}
else
{
    http_response_code(401);
}

function CreateUser($MinecraftUUID, $UserType, $DiscordID)
{
    if(is_file($_SERVER['DOCUMENT_ROOT']."/users/$MinecraftUUID.json"))
    {
        echo("Specified user already exists.");
        http_response_code(400);
        die();
    }
    else if (is_null($MinecraftUUID))
    {
        echo("Specified UUID is invalid.");
        http_response_code(400);
        die();
    }
    else
    {
        $UserMeta = array();
        $UserMeta["usertype"] = $UserType;
        $UserMeta["discordid"] = $DiscordID;
        if($DiscordID == null)
        {
            echo("No Discord User ID provided.");
            http_response_code(400);
            die(); 
        }
        if($UserType == "beta")
        {
            $UserMeta["ownedcapes"][0] = "betacape";
        }
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/users/$MinecraftUUID.json", json_encode($UserMeta));
        http_response_code(201);
    }
}
?>