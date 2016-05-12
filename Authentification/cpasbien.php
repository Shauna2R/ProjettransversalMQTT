<?php
$json = file_get_contents("tresSensible.json");
$parsed_json = json_decode($json);
global $passwordConfirmed;
$passwordConfirmed =  $parsed_json->{'password'};