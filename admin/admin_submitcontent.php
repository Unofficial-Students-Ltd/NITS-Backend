<?php 
require_once 'connection.php';

if ($_POST)
{

	require("connection.php");
	if(!isset($connection))
	{
		echo "Couldn't connect to SQL database";
		die;
	}
	
	if(isset($_POST['form_type']))
	{
		if($_POST['form_type']=='topstories')
		{
			$dbname='topstories';
			$radioname='topstoriesradio';
			
		}
		else if($_POST['form_type']=='newsupdates')
		{
			$dbname='newsupdates';
			$radioname='newsupdatesradio';
			
		}
		else if($_POST['form_type']=='noticeboard')
		{
			$dbname='noticeboard';
			$radioname='noticeboardradio';
			
		}
		else if($_POST['form_type']=='tenders')
		{
			$dbname='tenders';
			$radioname='tenderradio';
			
		}
		else if($_POST['form_type']=='calendar')
		{
			$dbname='calendar';
			$radioname='calendarradio';
			
		}
		else if($_POST['form_type']=='recruitment')
		{
			$dbname='recruitment';
			$radioname='recruitradio';
			
		}
		else if($_POST['form_type']=='faculty')
		{
			$dbname='csefaculty';
			$radioname='csefacultyradio';
		}
		//echo $_POST['form_type'];
	}
	
	// NEWS UPDATES
	//====================================================================================================================
	if(isset($_POST['submitnewnewsupdates_btn']) or isset($_POST['submitnotice_btn']) or isset($_POST['submittender_btn']) or isset($_POST['submitcalendar_btn']) or isset($_POST['submitrecruit_btn']))
	{
		$_POST['title']=mysqli_real_escape_string($connection,$_POST['title']);
		$title = $_POST['title'];
	/*$_POST['link']=mysqli_real_escape_string($connection,$_POST['link']);*/
	if(isset($_POST['bolded']))
		$bolded=1;
	else
		$bolded=0;
	
	if(isset($_POST['newstatus']))
		$newstatus=1;
	else
		$newstatus=0;

	if(isset($_POST['visible']))
		$postvisible=1;
	else
		$postvisible=0;


		
	if (isset($_POST['submitnewnewsupdates_btn'])) {
		# code...
		$file_name = $_FILES['piclink']['name'];
		$file_type = $_FILES['piclink']['type'];
		$file_size = $_FILES['piclink']['size'];
		$file_tem_loc = $_FILES['piclink']['tmp_name'];
		$ext= explode('.',$file_name);
		$_SESSION['ext']= $fileext=strtolower(end($ext));

		$extn = pathinfo($_FILES['piclink']['name'],PATHINFO_EXTENSION);

		echo $extn;

		$file_store = "../uploads/news/".$title.".".$extn;
		// echo "<script>alert('Update Picture');</script>";
		move_uploaded_file($file_tem_loc, $file_store);


		$query="INSERT INTO newsupdates (visible,title ,ext,bold,status) VALUES('$postvisible', '$title','$extn','$bolded','$newstatus')";
		$result= mysqli_query($connection,$query) or die(mysqli_error($connection));
		if(!$result) {echo "Unable to submit new ";}
		else echo "Submitted";

		echo "<script>window.location.href = 'http://localhost/nit2020/admin/newsupdates.php';</script>";

	   
	}

	
	}



	if(isset($_POST['edit'])){?>

		<?php echo "chinmoy"; 

		

		?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		
			<form action="newsupdates.php" method="post" name="myform" >
			<input type="hidden" name="form"  value="<?php  echo $_POST[$radioname]; ?>" />
			</form>
				
			<script type="text/javascript">
    			document.myform.submit();
			</script>	
	</body>
	</html>
		

		<!--<form  name="myForm" id="myForm"  action="newsupdates.php" method="post" style="display:inline;" >
		
		<input type="hidden" name="form" value=<//?php $_POST[$radioname]; ?> />

		</form>-->


		
		
		
		
		<?php
		//$v=2;
		//$_SESSION['v']=$v;

		//$val=$_POST[$radioname];

		//$_SESSION['val']=$val;

		//echo "<script>window.location.href = 'http://localhost/nit2020/admin/newsupdates.php';</script>";

	}

	if(isset($_POST['delete']) and $_POST['form_type']!='faculty')
	{
			 //echo $_POST['form_type'];
			 //header("location: main.php");


			 $sql = "SELECT id, title, ext FROM  $dbname WHERE id={$_POST[$radioname]}; ";
			 $result = $connection->query($sql);
 
			 $row = $result->fetch_assoc();
 
			 $path="../uploads/news/";
 
		 
 
			 unlink($path.$row["title"].".".$row["ext"]);

			 
		$query="DELETE FROM $dbname where id={$_POST[$radioname]}";
		$result= mysqli_query($connection,$query);// or die(mysqli_error($connection));
		if(!$result) echo "<script>alert('Unable to delete');</script>";
		else  echo "<script>alert('Deleted');</script>";
		
		echo "<script>window.location.href = 'http://localhost/nit2020/admin/newsupdates.php';</script>";
	}

	if(isset($_POST['submiteditnewsupdates_btn']) or isset($_POST['submiteditnotice_btn']) or isset($_POST['submitedittender_btn']) or isset($_POST['submiteditcalendar_btn']) or isset($_POST['submiteditrecruit_btn']))
	{
		$_POST['title']=mysqli_real_escape_string($connection,$_POST['title']);
		$titl = $_POST['title'];
		if(isset($_POST['bolded']))
		$bolded=1;
	else
		$bolded=0;
	
	if(isset($_POST['newstatus']))
		$newstatus=1;
	else
		$newstatus=0;

	if(isset($_POST['visible']))
		$postvisible=1;
	else
		$postvisible=0;


		if (isset($_POST['submiteditnewsupdates_btn'])) {

			$id=3;

			echo $id;

			$sql = "SELECT id, title, ext FROM  $dbname WHERE id={$_POST['submiteditnewsupdates_btn']}; ";
			$result = $connection->query($sql);

			$row = $result->fetch_assoc();

			$path="../uploads/news/";

		

			unlink($path.$row["title"].".".$row["ext"]);

			
	   	
	   	

			# code...
			$file_name = $_FILES['piclink']['name'];
			$file_type = $_FILES['piclink']['type'];
			$file_size = $_FILES['piclink']['size'];
			$file_tem_loc = $_FILES['piclink']['tmp_name'];
			$ext= explode('.',$file_name);
			$_SESSION['ext']= $fileext=strtolower(end($ext));
	
			$extn = pathinfo($_FILES['piclink']['name'],PATHINFO_EXTENSION);
	
			echo $extn;
	
			$file_store = "../uploads/news/".$titl.".".$extn;
			// echo "<script>alert('Update Picture');</script>";
			move_uploaded_file($file_tem_loc, $file_store);
			
	

				
		$query="UPDATE $dbname SET title='{$_POST['title']}', visible= {$postvisible}, ext='{$extn}', status='{$newstatus}',bold='{$bolded}' WHERE id={$_POST['submiteditnewsupdates_btn']};";
		echo $query;
		$result= mysqli_query($connection,$query) or die(mysqli_error($connection));
		if(!$result) echo "Unable to submit edited ";
		else echo "Submitted";


		echo "<script>window.location.href = 'http://localhost/nit2020/admin/newsupdates.php';</script>";
		   
		}
	
	}

	if(isset($_POST['orderup']))
	{
		$query="SELECT id FROM $dbname where id> {$_POST[$radioname]} ORDER BY id LIMIT 1;";
		$result= mysqli_query($connection,$query);
		if($result)
		{
		$row=mysqli_fetch_array($result);
	$temp=$row['id'];

		$query="UPDATE $dbname SET id=-{$_POST{$radioname}} WHERE id={$temp}";
		mysqli_query($connection,$query);
		
		$query="UPDATE $dbname SET id={$temp} WHERE id={$_POST{$radioname}}";
		mysqli_query($connection,$query);
		$query="UPDATE $dbname SET id={$_POST{$radioname}} WHERE id=-{$_POST{$radioname}}";
		mysqli_query($connection,$query);
		echo "<script>window.location.href = 'http://localhost/nit2020/admin/newsupdates.php';</script>";

		}

	}


	if(isset($_POST['orderdown']))
	{
		$query="SELECT id FROM $dbname where id< {$_POST[$radioname]} ORDER BY id DESC LIMIT 1";
		$result= mysqli_query($connection,$query);// or die(mysqli_error($connection));
		if($result)
		{
		$row=mysqli_fetch_array($result);
	$temp=$row['id'];
	
		$query="UPDATE $dbname SET id=-{$_POST{$radioname}} WHERE id={$temp}";
		mysqli_query($connection,$query);
		
		$query="UPDATE $dbname SET id={$temp} WHERE id={$_POST{$radioname}}";
		mysqli_query($connection,$query);
		$query="UPDATE $dbname SET id={$_POST{$radioname}} WHERE id=-{$_POST{$radioname}}";
		mysqli_query($connection,$query);

		 }
		 else{
			echo mysqli_error($connection);
			echo "Not Successful";
		 }

		 echo "<script>window.location.href = 'http://localhost/nit2020/admin/newsupdates.php';</script>";

		}

	/*
	$hashloc=$_POST['form_type'];
	header("location: adminpanel.php#$hashloc");
*/
	
	

}

?>