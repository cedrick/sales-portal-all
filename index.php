<?php session_start(); ?>
<html>
<head>
	<title>Northstar Solutions - Singtel Sales Export</title>
	<?php include ("template/head.css"); ?>
	<?php include("library/datevalid.js");?>
	<link rel="stylesheet" href="library/ui-lightness/jquery-ui.css" />
	<script type="text/javascript" src="library/jquery.js"></script>
	<script type="text/javascript" src="library/jquery-ui.min.js"></script>
	<script type="text/javascript" src="library/datepicker.js"></script>
<script language = "Javascript">
	$(document).ready(function(){
			$('#sdate').datepicker({ dateFormat: 'mm/dd/yy' });
		});
</script>
</head>
<body>
	<div class='container'>
		<div class="header">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img
				src="template/images/head.png" alt="" width="351" height="78" />
		</div>
		<div class="liner"></div>
		<br />
		<center>
		<div class="content">
			<br />
			<div>
				<img class="splash" src="template/images/singtel.png" alt="splash_head"/>
				<form name="frmSample" class="date-form" method="post" action="" onSubmit="return ValidateForm()">
					<input type="text" size="50" name="sdate" id="sdate" value="<?php echo $_POST["sdate"];?>"/>
					<input type="submit" name="submit" value="Go" />
					<br><br>
					<select name="campaign">
						<option value="NSI_SINGTEL" <?php echo $_POST['campaign']=='NSI_SINGTEL' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL</option>
						<option value="NSI_SINGTEL_ACQ_STM" <?php echo $_POST['campaign']=='NSI_SINGTEL_ACQ_STM' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_ACQ_STM</option>	
						<option value="NSI_SINGTEL_BPL" <?php echo $_POST['campaign']=='NSI_SINGTEL_BPL' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_BPL</option>
						<option value="NSI_SINGTEL_DEL_2" <?php echo $_POST['campaign']=='NSI_SINGTEL_DEL_2' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_DEL_2</option>	
						<option value="NSI_SINGTEL_DEL_3" <?php echo $_POST['campaign']=='NSI_SINGTEL_DEL_3' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_DEL_3</option>	
						<option value="NSI_SINGTEL_SNBB" <?php echo $_POST['campaign']=='NSI_SINGTEL_SNBB' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_SNBB</option>
						<option value="NSI_SINGTEL_TMO" <?php echo $_POST['campaign']=='NSI_SINGTEL_TMO' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_TMO</option>
						<option value="NSI_SINGTEL_FTTH" <?php echo $_POST['campaign']=='NSI_SINGTEL_FTTH' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_FTTH</option>
						<option value="NSI_SINGTEL_BPL_CHURN" <?php echo $_POST['campaign']=='NSI_SINGTEL_BPL_CHURN' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_BPL_CHURN</option>
						<option value="NSI_SINGTEL_HR_STM_DEL" <?php echo $_POST['campaign']=='NSI_SINGTEL_HR_STM_DEL' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_HR_STM_DEL</option>
						<option value="NSI_SINGTEL_JINGXUAN_B2A" <?php echo $_POST['campaign']=='NSI_SINGTEL_JINGXUAN_B2A' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_JINGXUAN_B2A</option>
						<option value="NSI_SINGTEL_JINGXUAN_B3A" <?php echo $_POST['campaign']=='NSI_SINGTEL_JINGXUAN_B3A' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_JINGXUAN_B3A</option>
						<option value="NSI_SINGTEL_JINGXUAN_B3B" <?php echo $_POST['campaign']=='NSI_SINGTEL_JINGXUAN_B3B' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_JINGXUAN_B3B</option>
						<option value="NSI_SINGTEL_MID_ARPU" <?php echo $_POST['campaign']=='NSI_SINGTEL_MID_ARPU' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_MID_ARPU</option>
						<option value="NSI_SINGTEL_MID_ARPU_GRPC" <?php echo $_POST['campaign']=='NSI_SINGTEL_MID_ARPU_GRPC' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_MID_ARPU_GRPC</option>
						<option value="NSI_SINGTEL_MID_ARPU_GRPD" <?php echo $_POST['campaign']=='NSI_SINGTEL_MID_ARPU_GRPD' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_MID_ARPU_GRPD</option>
						<option value="NSI_SINGTEL_MIO_HOME" <?php echo $_POST['campaign']=='NSI_SINGTEL_MIO_HOME' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_MIO_HOME</option>
						<option value="NSI_SINGTEL_MIO_HOME_2" <?php echo $_POST['campaign']=='NSI_SINGTEL_MIO_HOME_2' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_MIO_HOME_2</option>
						<option value="NSI_SINGTEL_NEWBORN_GRP1" <?php echo $_POST['campaign']=='NSI_SINGTEL_NEWBORN_GRP1' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_NEWBORN_GRP1</option>
						<option value="NSI_SINGTEL_ACQ_MIO_PLAN_TM" <?php echo $_POST['campaign']=='NSI_SINGTEL_ACQ_MIO_PLAN_TM' ? 'selected="selected"' : ''; ?>>NSI_SINGTEL_ACQ_MIO_PLAN_TM</option>
					</select>
				</form>
			</div>
			<br><br><br>
			<div class="logo">
			<?php
			if(isset($_POST["submit"])){
				session_unset();
				require_once "includes/connection.php";
				$dbConn = new connection();
				$database = $_POST['campaign'];
				if($dbConn->connectdb($database)){
					$query = "sales_export '".$_POST["sdate"]."'";
					$result = mssql_query($query);
					
					//Get Result Count
					$result_count = mssql_num_rows($result);
					if($result_count>0)
					{
							//Print headers on excel
							$fields = array();
							for ($i = 0; $i < mssql_num_fields($result); ++$i) {
								// Fetch the field information
								$field = mssql_fetch_field($result, $i);
								//Convert to array;
								$fields[$i] = $field->name;
							}
							$_SESSION['report_header'] = $fields;
		
							//Print rows in excel
							$j = 0;
							while($row = mssql_fetch_object($result))
							{
								for ($i = 0; $i < mssql_num_fields($result); ++$i) {
									$field = mssql_fetch_field($result, $i);
									$field_name = $field->name;
									$_SESSION['report_values'][$j][$i]=$row->$field_name." ";
								}
								$j++;
							}
							$fname=$database.".xls";
							$counter='<font color="#2A0000" size="4">'
							.$result_count.
		                                            '</font>'.
		                                            '<font size="4" color="#2A1FFF">'.
		                                              "Found".
		                                            '</font>';
		
							echo '<div class="result">'
							.$counter.'&nbsp; '.'&nbsp; '.'&nbsp; '.'&nbsp; '.'&nbsp; '.'&nbsp; '.'&nbsp; '.
		                                            '<a href="export_report.php?fn='.$fname.' style="border-style:0;">
		                                              
		                                                <font color="#000000" size="4">Export to</font><font color="#2A1FFF" size="4"> Excel
		                                              
		                                            </a>'. 
		                                         '</div>';
					}else{
					
						echo '<div class="result"> <font color="RED" size="4">No Sales!</div>';                         
					}
			
		
			}
				
		}
			?>


			</div>
		</div>
		</center>
	</div>
	<br />
	<?php include"template/footer.php";?>
</body>
</html>
