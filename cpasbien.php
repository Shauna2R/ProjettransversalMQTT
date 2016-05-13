<?php

$jsonPass = file_get_contents("tresSensible.json");

$parsed_jsonPass = json_decode($jsonPass);


global $passwordConfirmed;
$passwordConfirmed =  $parsed_jsonPass->{'password'};


$jsonGroupe = file_get_contents("groupe.json");
$parsed_jsonGroupe = json_decode($jsonGroupe);

global $groupeName;
$groupeName = $parsed_jsonGroupe->{"name"};

global $arrayGroupeName;
$arrayGroupeName = json_decode($jsonGroupe);