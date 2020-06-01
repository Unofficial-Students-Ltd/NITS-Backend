
<!DOCTYPE html>
<?php 

error_reporting(0);

include('connection.php');

session_start();
if(!isset($_SESSION['username'])){echo "<script>window.location.href = 'http://localhost/nit2020/admin/index.php';</script>";}

if(isset($_POST['submitnewtopstories_btn']))
{
	$title = $_POST['title'];
	$link = $_POST['link'];
	

	
	
	$qry="INSERT INTO topstories (title ,link) VALUES('$title', '$link')";

	$result=mysqli_query($connection,$qry);
	if(isset($result))
	{
	
	
	}
	else
	{
		echo " error ";
	}

	if (isset($_POST['submitnewtopstories_btn'])) {
		# code...
		$file_name = $_FILES['piclink']['name'];
		$file_type = $_FILES['piclink']['type'];
		$file_size = $_FILES['piclink']['size'];
		$file_tem_loc = $_FILES['piclink']['tmp_name'];
		$ext= explode('.',$file_name);
		$_SESSION['ext']= $fileext=strtolower(end($ext));
		$file_store = "../uploads/topstories/".$title.".jpg";
		// echo "<script>alert('Update Picture');</script>";
		move_uploaded_file($file_tem_loc, $file_store);
		echo "<script>window.location.href = 'http://localhost/nit2020/admin/story.php';</script>";

	   
	}
 
}

if(isset($_POST['submitedittopstories_btn'])){

	$title = $_POST['title'];
	$link = $_POST['link'];



	$sql = "SELECT storyid, title, link FROM topstories WHERE storyid={$_POST['submitedittopstories_btn']}; ";
	$result = $connection->query($sql);

	$row = $result->fetch_assoc();

	$path="../uploads/topstories/";



	unlink($path.$row["title"].".jpg");
	
	$query="UPDATE topstories SET title='{$_POST['title']}',  link='{$_POST['link']}' WHERE storyid={$_POST['submitedittopstories_btn']};";
		echo $query;
		$result= mysqli_query($connection,$query) or die(mysqli_error($connection));
		if(!$result) echo "Unable to submit edited story";
		else echo "Submitted";
	
	
		if (isset($_POST['submitedittopstories_btn'])) {
			# code...
			$file_name = $_FILES['piclink']['name'];
			$file_type = $_FILES['piclink']['type'];
			$file_size = $_FILES['piclink']['size'];
			$file_tem_loc = $_FILES['piclink']['tmp_name'];
			$ext= explode('.',$file_name);
			$_SESSION['ext']= $fileext=strtolower(end($ext));
			$file_store = "../uploads/topstories/".$title.".jpg";
			// echo "<script>alert('Update Picture');</script>";
			move_uploaded_file($file_tem_loc, $file_store);
			echo "<script>window.location.href = 'http://localhost/nit2020/admin/story.php';</script>";
	
		   
		}	

	}
		if(isset($_POST['delete'])){

			$sql = "SELECT storyid, title, link FROM topstories WHERE storyid={$_POST['topstoriesradio']}; ";
			$result = $connection->query($sql);

			$row = $result->fetch_assoc();

			$path="../uploads/topstories/";

		

			unlink($path.$row["title"].".jpg");

			$sql = "DELETE FROM topstories WHERE storyid={$_POST['topstoriesradio']};";




	if ($connection->query($sql) === TRUE) {
   	 echo "Record deleted successfully";
	} else {
    	echo "Error deleting record: " . $conn->error;
		}

}


?>
<html>
    <head>
        <META NAME="robots" CONTENT="noindex">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Admin Panel | National Institute of Technology, Silchar</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/css/adminpanel.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> ></script>
        <script type="text/javascript" src="/js/bootstrap.js"></script>
		<div id="update" style="display:none"></div>
		
		<style>
			.bolded
			{
				font-weight:bold;
			}
			.greyed
			{
				font-style:italic;
				color:#aaa;
			}
			a:hover {
				color:orange;
			}
		</style>
<!-- <script type="text/javascript" src="js/jquery.form.js"></script> 
		
		<script>
							$(document).ready(function() {
						var options = { 
							target:        '#update',   // target element(s) to be updated with server response 
							beforeSubmit:  showRequest,  // pre-submit callback 
							success:       showResponsemsg,  // post-submit callback 
							url:'admin_submitcontent.php',
							type: 'post',
							};
							
							$('#topstories_form').ajaxForm(options);
							
					});

					function showRequest(formData, jqForm, options) { 
						var queryString = $.param(formData); 
						return true; 
					} 

					// post-submit callback 
					function showResponsemsg(responseText, statusText, xhr, $form)  { 
						alert(responseText);
						
						
					   return true;
					   
					}
		</script> -->
    </head>
    <body>
        <div class="container" style="margin-top:15px">
            <div class="panel panel-default panel-trans titlepanel">
                <div class="logo"></div>
                <div class="superheading"><p style="font-family:Lucida Bright;color:#656870;font-size:30px;">National Institute of Technology,Silchar</p>
				
                <p style="color:#656870;font-size:30px;">राष्ट्रीय प्रौद्योगिकी संस्थान,सिलचर</p>
                </div>
            </div><h1>ADMIN PANEL</h1>
			<div class="row">
				<div class="col-md-3 nopadding">
				<ul style="font-size:22px;"  class="nav nav-tabs nav-stacked">
					<li class="active">
						<a href="story.php" style="text-decoration:none"  data-toggle="tab">Top Stories </a>
					</li>
					<li>
						<a href="newsupdates.php"  style="text-decoration:none" data-toggle="tab">News Updates</a>
					</li>
					<li>
						<a href="student.php" style="text-decoration:none" data-toggle="tab">Student Corner</a>
					</li>

					<li>
						<a href="noticeboard.php"  style="text-decoration:none" data-toggle="tab">Notice Board</a>
					</li>
					<li>
						<a href="#tenders" style="text-decoration:none" data-toggle="tab">Tenders</a>
					</li>
					<li>
						<a href="#calendar" style="text-decoration:none" data-toggle="tab">Event Calendar</a>
					</li>
					<li>
						<a href="#recruitment" style="text-decoration:none" data-toggle="tab">Recruitment</a>
					</li>
					<li>
						<a href="admin_faculty.php"  style="text-decoration:none" >Faculty</a>
					</li>
					<li  >
						<a href="logout.php" style="text-decoration:none">Logout</a>
					</li>
				</ul>
				</div>
				<div class="col-md-9 nopadding">
					<div class="tab-content">
					
					<!--  
					##################################################
					TOP STORIES
					##################################################
					-->
					
						<div class="tab-pane fade in active panel-body" id="topstories" >
							<?php require('connection.php');?>
							<label>List of top stories:</label>
							<form action="story.php" id="topstories_form" method="post" style="display:inline;">
							<div class="panel" style="padding:0 10px;">

							<?php
							
							$query="SELECT * FROM topstories ORDER BY storyid DESC;";
							$result=mysqli_query($connection,$query);
							if($result)
							{
							
								$row=mysqli_fetch_array($result);
								while($row)
								{
									echo "<div class='radio' id='top_div{$row['storyid']}'>
												<input type='radio' name='topstoriesradio' value='{$row['storyid']}'  checked id='top_div_{$row['storyid']}'> <span>{$row['title']}</span> (<span>{$row['link']}</span>)
											</div>";
									$row=mysqli_fetch_array($result);
								}
							}
							?>
							</div>
							
							<br>
							<input type="hidden" name="form_type" value="topstories">
							
							
							<input type="submit" name="edit" value="Edit"  id="edittopstories_btn">
							<span class="btn-separator"></span>
							
							<input type="submit" name="delete" value="Delete" id="deletetopstories_btn" >

						<!--<input type="submit" value="Up" name="orderup">
							<input type="submit" value="Down" name="orderdown">-->
							</form>
						
							<br>
							<form action="story.php" method="post" onsubmit="return checktopstories()" enctype="multipart/form-data">
							<input type="hidden" name="form_type" value="topstories">
							<div class="enterinfo" id="addtopstories">
							<table>
							<tr>
								<td>Enter a new top story:</td>
								<td><input type="text" name="title" id="newtopstories_content" class="adminpanel_field"></td>
							</tr>
							<tr>
								<td>Link to full content:</td>
								<td><input type="text" name="link" id="newtopstories_link" class="adminpanel_field" value="http://"></td>
							</tr>
							<tr>
								<td>Select image:</td>
								<td><input type="file" name="piclink" id="newtopstories_piclink" class="adminpanel_field"></td>
							</tr>
							<tr>
								<td><input type="submit" name="submitnewtopstories_btn" value="Submit"></td>
							</tr>
							</table>
							</div>
							</form>
							<?php if(isset($_POST['edit'])){?>
							<form action="story.php" method="post" onsubmit="return checkedittopstories()"  enctype="multipart/form-data">
							<input type="hidden" name="form_type" value="topstories">
							<div class="enterinfo" id="edittopstories">
							<table>
							<tr>
								<td>Change story title: </td>
								<td><input type="text" name="title" id="edittopstories_content" value="" class="adminpanel_field"></td>
							</tr>
							<tr>
								<td>Link to full content: </td>
								<td><input type="text" name="link" id="edittopstories_link" class="adminpanel_field"></td>
							</tr>
							<tr>
								<td>Select image:</td>
								<td><input type="file" name="piclink" id="edittopstories_piclink" class="adminpanel_field"  accept=".jpg,.jpeg,.png" ></td>
							</tr>
							<input type="hidden" name="storyid" id="edittopstories_storyid"   >
							<tr>
							<td><button type="submit" name="submitedittopstories_btn" value=<?php echo $_POST['topstoriesradio']; ?> >Confirm</button></td>
							</tr>
							</table>
							</div>
							</form>
				            <?php } ?>
						
						
						</div>
					</div>
				</div>
			
			
			
			</div>
			
			<script>
			
			
			$( "#addnewtopstories_btn").click(function(){
				$("#addtopstories").slideDown("fast");
				$("#edittopstories").slideUp("fast");
});

			$( "#edittopstories_btn").click(function(){
				$("#addtopstories").slideUp("fast");

				document.getElementById("edittopstories_content").value=$("input[type='radio'][name='topstoriesradio']:checked").next().text();
				document.getElementById("edittopstories_link").value=$("input[type='radio'][name='topstoriesradio']:checked").next().next().text();
				document.getElementById("edittopstories_storyid").value=$("input[type='radio'][name='topstoriesradio']:checked").val();
				$("#edittopstories").slideDown("fast");
});



			
			$("deletetopstories_btn").click(function(){
						var r=confirm('Are you sure you want to delete this story?\nNote that this cannot be reversed.');
						if(r == true)
							return true;
						else
							return false;
				

}); 

			$( "deletenews_btn").click(function(){
						var r=confirm('Are you sure you want to delete this news update?\nNote that this cannot be reversed.');
						if(r == true)
							return true;
						else
							return false;
				

			}); 

		function checktopstories(){
				if(document.getElementById("newtopstories_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("newtopstories_link").value=="" || document.getElementById("newtopstories_link").value=="http://")
				{
				alert("Link is blank");
				return false;
				}
				if(document.getElementById("newtopstories_piclink").value=='')
				{
				alert("Picture link is blank");
				return false;
				}
				var r=confirm("Are you sure you want to add this story?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

		function checkedittopstories(){
				if(document.getElementById("edittopstories_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("edittopstories_link").value=='' || document.getElementById("edittopstories_link").value=='http://')
				{
				alert("Link is blank");
				return false;
				}
				if(document.getElementById("edittopstories_piclink").value=='')
				{
				alert("Picture link is blank");
				return false;
				}
				var r=confirm("Are you sure you want to edit this story?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};


					


		
			
			$(function () {
   var activeTab = $('[href=' + location.hash + ']');
   activeTab && activeTab.tab('show');
});
</script>
			
		</div>
		</body>
			
		</html>