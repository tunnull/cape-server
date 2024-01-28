<?php
include($_SERVER['DOCUMENT_ROOT']."/auth-flow.php");
if($IsClientAuthed == true)
{
    if(isset($_GET["upload"]))
    {
        $ImageFile = $_FILES["capefield"];
        CreateCape($ImageFile);
    }
}
else
{
    http_response_code(401);
}

function CreateCape($ImageFile)
{
    echo("Cape ".$_GET["capename"]." is being uploaded.");
    $CapeList = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/masterlists/capelist.json"),true);
    //$NewCapeData = array($_GET["capename"]=>"$".$_GET["price"]);
    if($CapeList == null)
    {
        $CapeList = array("capes");
    }
    //array_push($CapeList["capes"], $NewCapeData);
    //file_put_contents($_SERVER['DOCUMENT_ROOT']."/masterlists/capelist.json", json_encode($CapeList));
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/assets/capes/".$_GET["capename"].".png", file_get_contents($ImageFile['tmp_name']));
}


?>