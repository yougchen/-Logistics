<?php
preg_match('@^(?:http://)?([^/]+)@i',"http://www.webtech.tw", $matches);
$host = $matches[1]."<br/>";
echo   $host;
preg_match('/[^.]+\.[^.]+$/', $host, $matches);
echo $matches[0];

?>