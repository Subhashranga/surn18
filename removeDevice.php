<?php
include('config.php');

if (empty($_GET)){
	echo "nothing";
    }
else{

	$ip = $_GET["ip"];
	$port = $_GET['port'];
	$community = $_GET['community'];
	$version = $_GET['version'];

	
	$check = $db->query("SELECT * FROM info WHERE IP='$ip'");
	while($i = $check->fetchArray(SQLITE3_ASSOC)){
		
			
		if ($i['IP'] != $ip) {
			echo 'IP not Found';
		}
		else{
			$sql1 =<<<EOF
			DELETE FROM info WHERE IP = '$ip';
EOF;
			$run1 = $db->exec($sql1);
			
			if(!$run1){
				echo "retry";
			}
			else{
				echo "Removed";
			}		}
	}

}

$db->close();

?>