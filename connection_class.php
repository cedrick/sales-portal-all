<?php
Class Connection
{
	
	function connect()
	{
		 if(mysql_connect("localhost","root", ""))
		 {
			 mysql_select_db("db_test")or die(mysql_error());
			 return TRUE;
		 }else
		 {
			 return FALSE;
		 }
	}
}
?>