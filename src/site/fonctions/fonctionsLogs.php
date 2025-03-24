<?php


function logConnec($succes){

    $date = getdate();
    $fjson = fopen("../logs/log-"."$date[mday]"."-$date[mon]"."-$date[year]".".json", "a+");

    ##$array = [$_SERVER['REMOTE_ADDR'],date("d-m-Y H:i:s") ,$_SESSION['login'],"Tentative de connexion",$succes];

    $dict = array("date"=>date("d-m-Y"),
                "heure" => date("H:i:s"),
                "ip"=>"194.182.29.1",
                "login" => "tata",
                "success"=>true);

    $json = json_encode($dict);
    file_put_contents("../logs/log-"."$date[mday]"."-$date[mon]"."-$date[year]".".json", $json, FILE_APPEND);
    fclose($fjson);
}

logConnec(true);



