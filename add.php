<?php

require_once "connection.php";

if(isset($_REQUEST['btn_insert']))
{
	try
	{
		$Name	= $_REQUEST['txt_Name']; //textbox name "txt_Name"
		$ICnum	= $_REQUEST['txt_ICnum']; //textbox name "txt_ICnum"
		$TelNo	= $_REQUEST['txt_TelNo']; //textbox name "txt_TelNo"
		$Gender	= $_REQUEST['txt_Gender']; //textbox name "txt_Gender"
		$Classs	= $_REQUEST['txt_Class']; //textbox name "txt_Class"
		$FName	= $_REQUEST['txt_FName']; //textbox name "txt_FName"
		$FICnum	= $_REQUEST['txt_fICnum']; //textbox name "txt_MICnum"
		$MName	= $_REQUEST['txt_MName']; //textbox name "txt_MName"
		$MICnum	= $_REQUEST['txt_MICnum']; //textbox name "txt_MICnum"
		$EName	= $_REQUEST['txt_ICnum']; //textbox name "txt_ICnum"
		$ERel	= $_REQUEST['txt_ERel']; //textbox name "txt_ERel"
		$ETelNo	= $_REQUEST['txt_ETelNo']; //textbox name "txt_ETelNo"
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//file name "txt_file"	
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
		
		$path="upload/".$image_file; //set upload folder path
		
		if(empty($Name)){
			$errorMsg="Please Enter Name";
		}
		else if(empty($ICnum)){
			$errorMsg="Please Enter IC Number";
		}
		else if(empty($TelNo)){
			$errorMsg="Please Enter Contact Number";
		}
		else if(empty($Gender)){
			$errorMsg="Please Enter Gender";
		}
		else if(empty($Classs)){
			$errorMsg="Please Enter Class";
		}
		else if(empty($FName)){
			$errorMsg="Please Enter Father's Name";
		}
		else if(empty($FICnum)){
			$errorMsg="Please Enter Father's IC Number";
		}
		else if(empty($MName)){
			$errorMsg="Please Enter Mother's Name";
		}
		else if(empty($MICnum)){
			$errorMsg="Please Enter Mother's IC Number";
		}
		else if(empty($EName)){
			$errorMsg="Please Enter Emergency Contact Name";
		}
		else if(empty($ERel)){
			$errorMsg="Please Enter Relationship";
		}
		else if(empty($ETelNo)){
			$errorMsg="Please Enter Emergency Contact Number";
		}
		else if(empty($image_file)){
			$errorMsg="Please Select Image";
		}
		else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
		{	
			if(!file_exists($path)) //check file not exist in your upload folder path
			{
				if($size < 5000000) //check file size 5MB
				{
					move_uploaded_file($temp, "upload/" .$image_file); //move upload file temperory directory to your upload folder
				}
				else
				{
					$errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
				}
			}
			else
			{	
				$errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
			}
		}
		else
		{
			$errorMsg="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
		}
		
		if(!isset($errorMsg))
		{
			$insert_stmt=$db->prepare('INSERT INTO student_file(name,icnum,telno,gender,class,image,fname,fICnum,mname,micnum,ename,erel,etelno) VALUES(:fname,:ficnum,:ftelno,:fgender,:fclass,:fimage,:ffname,:fficnum,:fmname,:fmicnum,:fename,:ferel,:fetelno)'); //sql insert query					
			$insert_stmt->bindParam(':fname',$Name);
			$insert_stmt->bindParam(':ficnum',$ICnum);
			$insert_stmt->bindParam(':ftelno',$TelNo);
			$insert_stmt->bindParam(':fgender',$Gender);
			$insert_stmt->bindParam(':fclass',$Classs);
			$insert_stmt->bindParam(':fimage',$image_file);	  
			$insert_stmt->bindParam(':ffname',$FName);
			$insert_stmt->bindParam(':fficnum',$FICnum);
			$insert_stmt->bindParam(':fmname',$MName);
			$insert_stmt->bindParam(':fmicnum',$MICnum);
			$insert_stmt->bindParam(':fename',$EName);
			$insert_stmt->bindParam(':ferel',$ERel);
			$insert_stmt->bindParam(':fetelno',$ETelNo);
			//bind all parameter 
		
			if($insert_stmt->execute())
			{
				$insertMsg="File Upload Successfully........"; //execute query success message
				header("refresh:3;index.php"); //refresh 3 second and redirect to index.php page
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head><title>Student Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
            padding: 10px 12px;
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

            .form-control {
  			display: block;
  			width: 100%;
  			height: 34px;
  			padding: 6px 12px;
  			font-size: 14px;
  			line-height: 1.42857143;
  			color: #555;
  			background-color: #fff;
  			background-image: none;
  			border: 1px solid #ccc;
  			border-radius: 4px;
  			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  			-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
       		-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          	transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
			}

			.form-horizontal .form-group {
  			margin-right: 45px;
  			margin-left: 1.5px;
			}
			.alert {
  			padding: 15px;
  			margin-bottom: 20px;
  			margin-left: 1.5px;
  			border: 1px solid transparent;
  			border-radius: 4px;
			}
.
        </style>
    </head>
<body>
	<div>
   <ul>
            <li><a class="active" href="add.php">Add New Student</a></li>
            <li><a href="index.php">View Student List</a></li>
        </div>
    <?php
		if(isset($errorMsg))
		{
			?>
            <div align="margin-left" class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div align="margin-left" class="alert alert-success">
				<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}
		?>   

<form method="post" class="form-horizontal" enctype="multipart/form-data">
				<div align="margin-left" style="margin-left:25%;padding:17px;height:1000px;">
                <h3 style="color:grey;">Student Registration</h3>
                <div>
                <h3 style="color: #191970;"><p>Register Information</p></h3>

				<div class="form-group">
				<label>Name:</label>
				<input type="text" name="txt_Name" class="form-control" placeholder="enter name" />
				</div>
				

				<div class="form-group">
				<label>IC Number:</label>
				<input type="number" name="txt_ICnum" class="form-control" placeholder="enter IC number" />
				</div>

				<div class="form-group">
				<label>Telephone Number:</label>
				<input type="text" name="txt_TelNo" class="form-control" placeholder="enter telephone number" />
				</div>

				<div class="form-group">
				<label>Gender:</label>
				<select name="txt_Gender" class="form-control" >
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                </select>
				</div>

				<div class="form-group">
				<label>Class:</label>
				<select name="txt_Class" class="form-control">
                        <option value="01A">01A</option>
                        <option value="01B">01B</option>
                        <option value="02A">02A</option>
                        <option value="02B">02B</option>
                </select>
				</div>

				<div class="form-group">
				<label>Photo:</label>
				<input type="file" name="txt_file" class="form-control" />
				</div>
			</div>
			<div>
                <h3 style="color: #191970;text-align:left;"><p>Parent's Information</p></h3>
				<div class="form-group">
				<label>Father's Name</label>
				<input type="text" name="txt_FName" class="form-control" placeholder="enter name" />
				</div>

				<div class="form-group">
				<label>Father's IC Number</label>
				<input type="number" name="txt_fICnum" class="form-control" placeholder="enter IC number" />
				</div>


				<div class="form-group">
				<label>Mother's Name</label>
				<input type="text" name="txt_MName" class="form-control" placeholder="enter name" />
				</div>

				<div class="form-group">
				<label>Mother's IC Number</label>
				<input type="number" name="txt_MICnum" class="form-control" placeholder="enter IC number" />
				</div>
			</div>
				<div>
					<h3 style="color: #191970;text-align:left;"><p>Emergency Contact Details</p></h3>
				<div class="form-group">
				<label>Emergency Contact Name</label>
				<input type="text" name="txt_EName" class="form-control" placeholder="enter name" />
				</div>

				<div class="form-group">
				<label>Relationship</label>
				<input type="text" name="txt_ERel" class="form-control" placeholder="enter relationship" />
				</div>

				<div class="form-group">
				<label>Emergency Contact Number</label>
				<input type="text" name="txt_ETelNo" class="form-control" placeholder="enter telephone number" />
				</div>
				</div>	
					
				<div class="form-group">
				<input type="submit"  name="btn_insert" class="btn btn-success " value="Insert">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
			</form>
			
		</div>
		
</body>
</html>