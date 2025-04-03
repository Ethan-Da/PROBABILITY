<?php


function logConnec($succes, $login){

    $date = getdate();
    $path = "/logs/log-"."$date[mday]"."-$date[mon]"."-$date[year]".".json";

if (!file_exists($path)){
    $file = fopen($path, "w");
}

    $fjson = file_get_contents($path);
    $json = json_decode($fjson, true);

    $dict = array("date"=>date("d-m-Y"),
                    "ip" => $_SERVER['REMOTE_ADDR'],
                    "login" => $login,
                    "success"=>$succes);

    $json['logs'][date("H:i:s")] = $dict;


    $json = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents($path, $json);
}




