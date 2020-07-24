<?php

	require_once "connection.php";
	
	if(isset($_REQUEST['delete_id']))
	{
		// select image from db to delete
		$id=$_REQUEST['delete_id'];	//get delete_id and store in $id variable
		
		$select_stmt= $db->prepare('SELECT * FROM student_file WHERE id =:id');	//sql select query
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute();
		$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		unlink("upload/".$row['image']); //unlink function permanently remove your file
		
		//delete an orignal record from db
		$delete_stmt = $db->prepare('DELETE FROM student_file WHERE id =:id');
		$delete_stmt->bindParam(':id',$id);
		$delete_stmt->execute();
		
		header("Location:index.php");
	}

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
p {
  border-top: 1px solid grey;
  border-bottom: 2px solid black;
  width: 100%;
}
.right {
  float: right;
}
.column {
  float: left;
  width: 50.00%;
}
.column2 {
  float: left;
  width: 33.33%;
}
.container .btn:hover {
  background-color: black;
  color: white;
}
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

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings';
        font-style: normal;
        font-weight: normal;
        line-height: 1;

        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
}
.glyphicon-eye-open:before {
  content: "\e105";
}
.glyphicon-eye-close:before {
  content: "\e106";
}
.glyphicon-pencil:before {
  content: "\270f";
}
.glyphicon-trash:before {
  content: "\e020";
}
</style>
	<body>
	<div>
   <ul>
            <li><a href="add.php">Add New Student</a></li>
            <li><a class="active" href="index.php">View Student List</a></li>
        </div>
        <div align="margin-left" style="margin-left:25%;padding:1px 16px;height:1000px;">
<h3 style="color: #191970;text-align:left;"><p>Student List</p></h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>ICNo</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$select_stmt=$db->prepare("SELECT * FROM student_file");	//sql select query
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['icnum']; ?></td>
                                            <td><img src="upload/<?php echo $row['image']; ?>" width="110px" height="120px"></td>
                                            <td>
                                              <a href="read.php?read_id=<?php echo $row['id']; ?>"title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href="edit.php?update_id=<?php echo $row['id']; ?>"title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a> 
                                              <a href="?delete_id=<?php echo $row['id']; ?>" title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a></td>
                                        </tr>
                                    <?php
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
		</div>
		
	</div>
			
	</div>
									
	</body>
</html>