<?php

include("connection_class.php");

Class Check extends Connection
{
    function checkuser($user,$pass)
	{			
		if($this->connect())
		{
			$result= mysql_query("select * from tbluser where username='$user' and password='$pass'")or die(mysql_error());
			$count=mysql_num_rows($result);
			   
			if ($count==1)
			{
				return TRUE;
			}else
			{
				return FALSE;
			}
		}else
		{
			echo "Database error";
		}
	}
	
	function register($user,$pass)
	{
					
		if($this->connect())
		{
			$sql="insert into tbluser(username, password) values('".$user."','".$pass."')"; 
			
			if (mysql_query($sql))
			{
				return TRUE;
			}else
			{
				return FALSE;
			}
		}else
		{
			echo "Database error";
		}
		
	}
}
?>