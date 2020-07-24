<?php
require_once "connection.php";       
		$id = $_REQUEST['read_id']; //get "read_id" from index.php page through anchor tag operation and store in "$id" variable
		$select_stmt = $db->prepare('SELECT * FROM student_file WHERE id = :id'); //sql select query
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute(); 
		$row = $select_stmt->fetch(PDO::FETCH_ASSOC)
		
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>View Student Details</title>
		
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
		
</head>
<style>
body {
             margin: 0;
            }

            ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 25%;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
            }

            li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
            }

            li a.active {
            background-color: #191970;
            color: white;
            }

            li a:hover:not(.active) {
            background-color: #483D8B;
            color: white;
            }
            .form-group {
            margin-bottom: 15px;
            }

</style>
	<body>
	<div>
   <ul>
            <li><a href="add.php">Add New Student</a></li>
            <li><a href="index.php">View Student List</a></li>
        </div>
        <div align="margin-left" style="margin-left:25%;padding:1px 16px;height:1000px;">
		<h3 style="color: #191970;text-align:left;"><p>Student List</p></h3>

					<div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row['name']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>IC Number</label>
                        <p class="form-control-static"><?php echo $row['icnum']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Telephone Number</label>
                        <p class="form-control-static"><?php echo $row['telno']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <p class="form-control-static"><?php echo $row['gender']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <p class="form-control-static"><?php echo $row['class']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <p class="form-control-static"><img src="upload/<?php echo $row['image']; ?>" width="110px" height="120px"></p>
                    </div>
                    <div class="form-group">
                        <label>Father Name</label>
                        <p class="form-control-static"><?php echo $row['fname']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Father IC Number</label>
                        <p class="form-control-static"><?php echo $row['ficnum']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Mother Name</label>
                        <p class="form-control-static"><?php echo $row['mname']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Mother IC Number</label>
                        <p class="form-control-static"><?php echo $row['micnum']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Emergency Contact Name</label>
                        <p class="form-control-static"><?php echo $row['ename']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Relationship</label>
                        <p class="form-control-static"><?php echo $row['erel']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Emergency Contact Number</label>
                        <p class="form-control-static"><?php echo $row['etelno']; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
</div>
</body>
</html>									
                                     