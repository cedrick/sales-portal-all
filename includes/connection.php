<?php 
Class Connection {

		var $connection;

		function connectdb($database) {
			define("HOST","HELIX");
			//define("DB", "round8_havenlink");
			define("UNAME", "sa");
			define("PWORD", "1nfin1ty");

			$this->connection = mssql_connect(HOST, UNAME, PWORD)
					or die("Could not connect: " . mssql_error());
			$db = mssql_select_db($database, $this->connection)
					or die("Unable to select database" . mssql_error());
			return true;
		}


		function closedb() {
			mssql_close($this->connection)
				or die("Unable to close database: " . mssql_errno());
			$this->connection = false;
			return;
		}
}

?>