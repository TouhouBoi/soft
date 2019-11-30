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

	public function genPackages($server_address, $path = "", $mysql)
	{
		$packages_query = $mysql->query("SELECT * FROM packages");
		print("<address>".$server_address."</address>\r\n");
		print("<path>".$path."</path>\r\n");
		print("<packages>\r\n");
		while($packages = $packages_query->fetch_assoc())
		{
			print("<package>\r\n");
			print("<name>".$packages['name']."</name>\r\n");
			print("<filename>".$packages['filename']."</filename>\r\n");
			print("<category>".$packages['category']."</category>\r\n");
			print("<version>".$packages['version']."</version>\r\n");
			print("<description>".$packages['description']."</description>\r\n");
			print("<author>".$packages['author']."</author>\r\n");
			print("<license>".$packages['license']."</license>\r\n");
			print("<size>".$packages['size']."</size>\r\n");
			print("<sha256>".$packages['sha256']."</sha256>\r\n");
			print("<dependencies>".$packages['dependencies']."</dependencies>\r\n");
			print("<suggestions>".$packages['suggestions']."</suggestions>\r\n");
			print("<type>".$packages['type']."</type>\r\n");
			print("</package>\r\n");
		}
		print("</packages>\r\n");
	}
}