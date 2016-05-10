<?php
require("../phpMQTT.php");

$mqtt = new phpMQTT(" messagesight.demos.ibm.com", 1883, "ingesupb2/groupe1"); //Change client name to something unique
if(!$mqtt->connect()){
    exit(1);
}
$topics['ferries/IOW/#'] = array("qos"=>0, "function"=>"procmsg");
$mqtt->subscribe($topics,0);
while($mqtt->proc()){

}
$mqtt->close();
function procmsg($topic,$msg){
    echo "Msg Recieved: ".date("r")."\nTopic:{$topic}\n$msg\n";
}

?>