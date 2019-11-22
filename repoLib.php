<?php
class XeSoft
{
	public function setHeaderType($headerType = 1)
	{
		$header_1 = "Content-Type: text/plain";
		
		if ($headerType == 1)
		{
			header($header_1);
		}
	}
	
	
}