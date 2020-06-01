<?php
include('connection.php');
session_start();
if(!isset($_SESSION['username'])){echo "<script>window.location.href = 'http://localhost/nit2020/admin/index.php';</script>";}
?>
<html>
    <head>
        <META NAME="robots" CONTENT="noindex">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Admin Panel | National Institute of Technology, Silchar</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/css/adminpanel.css" />
        <script type="text/javascript" src="/js/jquery-1.11.1.js"></script>
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
			<div style="font-size:19px;"  class="row">
				<div  style="color:black;" class="col-md-3 nopadding">
				<ul style="font-size:22px;"  class="nav nav-tabs nav-stacked">
					<li class="active">
						<a href="story.php" style="text-decoration:none"  data-toggle="tab">Top Stories </a>
					</li>
					<li>
						<a href="newsupdates.php" style="text-decoration:none" data-toggle="tab">News Updates</a>
					</li>
					<li>
						<a href="student.php" style="text-decoration:none" data-toggle="tab">Student Corner</a>
					</li>

					<li>
						<a href="noticeboard.php" style="text-decoration:none" data-toggle="tab">Notice Board</a>
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
						<a href="admin_faculty.php" style="text-decoration:none">Faculty</a>
					</li>
					<li  >
						<a href="logout.php" style="text-decoration:none" >Logout</a>
					</li>
				</ul>
				</div>
      </div>
    </div>  
    </div>
	</body>
</html>