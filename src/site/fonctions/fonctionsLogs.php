<?php


function logConnec($succes){

    $date = getdate();
    $fjson = file_get_contents("../logs/log-" . "$date[mday]" . "-$date[mon]" . "-$date[year]" . ".json", "a+");
    $json = json_decode($fjson, true);

    $dict = array("date"=>date("d-m-Y"),
                    "ip" => $_SERVER['REMOTE_ADDR'],
                    "login" => $_SESSION['login'],
                    "success"=>$succes);

    $json['logs'][date("H:i:s")] = $dict;


    $json = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents("../logs/log-"."$date[mday]"."-$date[mon]"."-$date[year]".".json", $json);
}




