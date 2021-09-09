<?php 
include('header.php');
include_once("db_connect.php");
if(!empty($_GET['import_status'])) {
    switch($_GET['import_status']) {
        case 'success':
            $message_stauts_class = 'alert-success';
            $import_status_message = 'Employee data inserted successfully.';
            break;
        case 'error':
            $message_stauts_class = 'alert-danger';
            $import_status_message = 'Error: Please try again.';
            break;
        case 'invalid_file':
            $message_stauts_class = 'alert-danger';
            $import_status_message = 'Error: Please upload a valid CSV file.';
            break;
        default:
            $message_stauts_class = '';
            $import_status_message = '';
    }
}
?>
<title>phpzag.com : Demo Import CSV File into MySQL using PHP</title>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
<?php include('container.php');?>
<div class="container">
	<h2>Example: Import CSV File into MySQL using PHP</h2>	
    <?php if(!empty($import_status_message)){
        echo '<div class="alert '.$message_stauts_class.'">'.$import_status_message.'</div>';
    } ?>
    <div class="panel panel-default">        
        <div class="panel-body">
			<br>
			<div class="row">
				<form action="import.php" method="post" enctype="multipart/form-data" id="import_form">				
						<div class="col-md-3">
						<input type="file" name="file" />
						</div>
						<div class="col-md-5">
						<input type="submit" class="btn btn-primary" name="import_data" value="IMPORT">
						</div>			
				</form>
			</div>
			<br>
			<div class="row">
				<table class="table table-bordered">
					<thead>
						<tr>
						  <th>ID</th>
						  <th>First Name</th>
						  <th>Last Name</th>
						  <th>Email</th>
						  <th>Hobbies</th>
						  <th>Gender</th>
						  <th>Joining Date</th>
						  <th>Department</th>
						  <th>Picture</th>                     
						</tr>
					</thead>
					<tbody>
					<?php
						$sql = "SELECT id, FirstName,LastName,Email,Hobbies,Gender,JoiningDate,Department,Picture FROM crud ORDER BY id DESC LIMIT 10";
						$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
						if(mysqli_num_rows($resultset)) { 
						while( $rows = mysqli_fetch_assoc($resultset) ) { 
						?>
						<tr>
						  <td><?php echo $rows['id']; ?></td>
						  <td><?php echo $rows['FirstName']; ?></td>
						   <td><?php echo $rows['LastName']; ?></td>
						  <td><?php echo $rows['Email']; ?></td>
						  <td><?php echo $rows['Hobbies']; ?></td>
						  <td><?php echo $rows['Gender']; ?></td> 
						  <td><?php echo $rows['JoiningDate']; ?></td>
						  <td><?php echo $rows['Department']; ?></td>
						  <td><?php echo $rows['Picture']; ?></td>          
						</tr>
						<?php } } else { ?>  
						<tr><td colspan="5">No records to display.....</td></tr>
						<?php } ?>					
					</tbody>
				</table>
			</div>	
        </div>
    </div>		
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/import-csv-file-into-mysql-using-php/" title="">Back to Tutorial</a>			
	</div>		
</div>
<?php include('footer.php');?>