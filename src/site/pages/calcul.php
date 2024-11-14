<?php
if (isset($_POST["OK"])){
$test = "a";
$test2 = "b";
$command = escapeshellcmd("python /home/sitesae/PROBABILITY/src/calcul/calculProba.py $test, $test2");
exec($command, $output);
echo $output[0];
echo $output[1];
}
