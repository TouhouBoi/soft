<?php
class XeSoft
{
	public function connectDB($server, $user, $pass, $dbname) {
		$mysql = new mysqli($server, $user, $pass, $dbname);
		$mysql->set_charset('utf8mb4');
		if($mysql->connect_errno){
			http_response_code(502); die("MySQL Database Connection Failed!");
		}
		$mysql->query('SET time_zone = "-4:00"');
		date_default_timezone_set('America/New_York');
		return($mysql);
	}	
	
	public function setHeaderType($headerType = 1)
	{
		$header_1 = "Content-Type: text/plain";
		
		if ($headerType == 1)
		{
			header($header_1);
		}
	}
	
	public function genIndex($server_address, $repo_name, $packages_path, $xenonos_version)
	{
		print("<eyePorts>\r\n");
		print("<portServer>\r\n");
		print("<address>".$server_address."</address>\r\n");
		print("<name>".$repo_name."</name>\r\n");
		print("<path>".$packages_path."</path>\r\n");
		print("<version>".$xenonos_version."</version>\r\n");
		print("</portServer>\r\n");
		print("</eyePorts>");
	}
}