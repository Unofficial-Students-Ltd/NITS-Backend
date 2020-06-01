
<!DOCTYPE html>
<?php 

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
			<div class="row">
				<div class="col-md-3 nopadding">
				<ul style="font-size:22px;"  class="nav nav-tabs nav-stacked">
					<li class="active">
						<a href="story.php"  style="text-decoration:none; color:black"  data-toggle="tab">Top Stories </a>
					</li>
					<li>
						<a href="newsupdates.php"  style="text-decoration:none" data-toggle="tab">News Updates</a>
					</li>
					<li>
						<a href="student.php" style="text-decoration:none" data-toggle="tab">Student Corner</a>
					</li>

					<li>
						<a href="noticeboard.php" style="text-decoration:none" data-toggle="tab">Notice Board</a>
					</li>
					<li>
						<a href="tender.php"  style="text-decoration:none" data-toggle="tab">Tenders</a>
					</li>
					<li>
						<a href="calender.php" style="text-decoration:none" data-toggle="tab">Event Calendar</a>
					</li>
					<li>
						<a href="recruitment.php"  style="text-decoration:none" data-toggle="tab">Recruitment</a>
					</li>
					<li>
						<a href="#" style="text-decoration:none" >Faculty</a>
					</li>
					<li >
						<a href="logout.php" style="text-decoration:none" >Logout</a>
					</li>
				</ul>
				</div>
				<div class="col-md-9 nopadding">
					<div class="tab-content">
					<?php require("connection.php");?>
					<div class="tab-pane fade in panel-body" id="newsupdates" >
							<label>List of Noticeboard:</label>
							<form action="admin_notice.php" id="newsupdates_form" method="post" style="display:inline;">
							<div class="panel" style="padding:0 10px;">

						
							<?php
							$query="SELECT * FROM noticeboard ORDER BY id DESC;";
							$result=mysqli_query($connection,$query);
							if($result)
							{
							
								$row=mysqli_fetch_array($result);
								while($row)
								{
									echo "<div class='radio'>
												<input type='radio' name='newsupdatesradio' checked value='{$row['id']}'>";
									$spanclass_b="";
									$spanclass_inv="";
									$spanclass_new="";
									if($row['visible']==0) $spanclass_inv="greyed";
									if($row['bold']) $spanclass_b="bolded";
									if($row['status']) $spanclass_new="newpost";

									
									echo"<span class='{$spanclass_inv} {$spanclass_b} {$spanclass_new}'>{$row['title']}</span>";
									
									if($row['status']) echo"<b class='{$spanclass_inv}'> (NEW) </b>";
									

									echo"</div>";
									$row=mysqli_fetch_array($result);
								}
							}
							?>
							</div>
							
							<br>
							<input type="hidden" name="form_type" value="newsupdates">
							
							<!--<input type="submit" name="Add_new"  value="Add_new" id="addnewnews_btn">-->
							<input type="submit"  name="edit"  value="Edit" id="editnews_btn">
							<span class="btn-separator"></span>
							
							<input type="submit" value="Delete" name="delete" id="deletenews_btn" >

							<input type="submit" value="Up" name="orderup">
							<input type="submit" value="Down" name="orderdown">
							</form>
							<br>
							
						
							<form action="admin_notice.php" method="post" onsubmit="return checknewsupdates()" enctype="multipart/form-data" >
							<input type="hidden" name="form_type" value="newsupdates">
							<div class="enterinfo" id="addnewsupdates">
							<table>
							<tr>
								<td>Enter a new news update:</td>
								<td><input type="text" name="title" id="newnewsupdates_content" class="adminpanel_field"></td>
							</tr>
							<tr>
								<td>Select file:</td>
								<td><input type="file" name="piclink" id="newnewsupdates_piclink" class="adminpanel_field"></td>
							</tr>
							<tr>
								<td>New Content?: </td>
								<td><input type="checkbox"  id="newnewsupdates_newstatus" name="newstatus" class="adminpanel_field shortfield"></td>
							</tr>
							<tr>
								<td>Bold?: </td>
								<td><input type="checkbox"  id="newnewsupdates_bolded" name="bolded" class="adminpanel_field shortfield"></td>
							</tr>
							<tr>
								<td>Visible in main website?:</td>
								<td><input type="checkbox" id="newnewsupdates_visible" name="visible" class="adminpanel_field shortfield" checked></td>
							</tr>
							<tr>
								<td><input type="submit" name="submitnewnewsupdates_btn" value="Submit"></td>
							</tr>
							</table>
							</div>
							</form>
                        


							<?php if(isset($_POST['form'])){?>

							

							<form action="admin_notice.php" method="post" onsubmit="return checkeditnewsupdates()" enctype="multipart/form-data" >
							<input type="hidden" name="form_type" value="newsupdates">
							<div class="enterinfo" id="editnewsupdates">
							<table>
							<tr>
								<td>Change news update title: </td>
								<td><input type="text"  id="editnewsupdates_content" name="title" value="" class="adminpanel_field"></td>
							</tr>
							<tr>
								<td>Select file:</td>
								<td><input type="file" name="piclink" id="editnewsupdates_piclink" class="adminpanel_field"></td>
							</tr>
							<tr>
								<td>New Content?: </td>
								<td><input type="checkbox"  id="editnewsupdates_newstatus" name="newstatus" class="adminpanel_field shortfield"></td>
							</tr>
							<tr>
								<td>Bold?: </td>
								<td><input type="checkbox"  id="editnewsupdates_bolded" name="bolded" class="adminpanel_field shortfield"></td>
							</tr>
							<tr>
								<td>Visible in main website?:</td>
								<td><input type="checkbox" id="editnewsupdates_visible" name="visible" class="adminpanel_field shortfield" ></td>
							</tr>
							<input type="hidden" id="editnewsupdates_storyid" name="storyid">
							<tr>
							<td><button type="submit" name="submiteditnewsupdates_btn" value=<?php echo $_POST['form'] ?>>confirm</button></td>
							</tr>
							</table>
							</div>
							</form>
                            <?php }?>
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

			$( "#deletetopstories_btn").click(function(){
						var r=confirm('Are you sure you want to delete this story?\nNote that this cannot be reversed.');
						if(r == true)
							return true;
						else
							return false;
				

}); 

			$( "#deletenews_btn").click(function(){
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


					


			$( "#addnewnews_btn").click(function(){
				$("#addnewsupdates").slideDown("fast");
				$("#editnewsupdates").slideUp("fast");
});


			$( "#editnews_btn").click(function(){
				$("#addnewsupdates").slideUp("fast");

				document.getElementById("editnewsupdates_content").value=$("input[type='radio'][name='newsupdatesradio']:checked").next().text();
				document.getElementById("editnewsupdates_link").value=$("input[type='radio'][name='newsupdatesradio']:checked").next().next().text();
				document.getElementById("editnewsupdates_storyid").value=$("input[type='radio'][name='newsupdatesradio']:checked").val();
				

				if($("input[type='radio'][name='newsupdatesradio']:checked").next().hasClass("bolded")==true)
					document.getElementById("editnewsupdates_bolded").checked=true;
				else
					document.getElementById("editnewsupdates_bolded").checked=false;
			
				if($("input[type='radio'][name='newsupdatesradio']:checked").next().hasClass("newpost")==true)
					document.getElementById("editnewsupdates_newstatus").checked=true;
				else
					document.getElementById("editnewsupdates_newstatus").checked=false;

				if($("input[type='radio'][name='newsupdatesradio']:checked").next().hasClass("greyed")==false)
					document.getElementById("editnewsupdates_visible").checked=true;
				else
					document.getElementById("editnewsupdates_visible").checked=false;
				$("#editnewsupdates").slideDown("fast");
				
});

		function checknewsupdates(){
				if(document.getElementById("newnewsupdates_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("newnewsupdates_piclink").value=='')
				{
				alert("file is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to add this news update?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

		function checkeditnewsupdates(){
				if(document.getElementById("editnewsupdates_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("editnewsupdates_piclink").value=='')
				{
				alert("file is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to edit this news update?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};




$("#addnewnotice_btn").click(function(){
				$("#addnotice").slideDown("fast");
				$("#editnotice").slideUp("fast");
});

			$("#editnotice_btn").click(function(){
				$("#addnotice").slideUp("fast");

				document.getElementById("editnotice_content").value=$("input[type='radio'][name='noticeboardradio']:checked").next().text();
				document.getElementById("editnotice_link").value=$("input[type='radio'][name='noticeboardradio']:checked").next().next().text();
				document.getElementById("editnotice_storyid").value=$("input[type='radio'][name='noticeboardradio']:checked").val();
				
				if($("input[type='radio'][name='noticeboardradio']:checked").next().is("b")==true)
					document.getElementById("editnotice_bolded").checked=true;
				else
					document.getElementById("editnotice_bolded").checked=false;
			
				if($("input[type='radio'][name='noticeboardradio']:checked").next().next().next().text()==" (NEW) ")
					document.getElementById("editnotice_newstatus").checked=true;
				else
					document.getElementById("editnotice_newstatus").checked=false;
					
				if($("input[type='radio'][name='noticeboardradio']:checked").next().is("i")==false)
					document.getElementById("editnotice_visible").checked=true;
				else
					document.getElementById("editnotice_visible").checked=false;
					
				$("#editnotice").slideDown("fast");
});

		function checknoticeboard(){
				if(document.getElementById("newnotice_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("newnotice_link").value=='')
				{
				alert("Link is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to add this notice?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

		function checkeditnotice(){
				if(document.getElementById("editnotice_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("editnotice_link").value=='')
				{
				alert("Link is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to edit this notice?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

			$( "#deletenotice_btn").click(function(){
						var r=confirm('Are you sure you want to delete this notice?\nNote that this cannot be reversed.');
						if(r == true)
							return true;
						else
							return false;
				

			});

			
			
			
$("#addnewtender_btn").click(function(){
				$("#addtender").slideDown("fast");
				$("#edittender").slideUp("fast");
});

			$("#edittender_btn").click(function(){
				$("#addtender").slideUp("fast");

				document.getElementById("edittender_content").value=$("input[type='radio'][name='tenderradio']:checked").next().text();
				document.getElementById("edittender_link").value=$("input[type='radio'][name='tenderradio']:checked").next().next().text();
				document.getElementById("edittender_storyid").value=$("input[type='radio'][name='tenderradio']:checked").val();
				
				if($("input[type='radio'][name='tenderradio']:checked").next().is("b")==true)
					document.getElementById("edittender_bolded").checked=true;
				else
					document.getElementById("edittender_bolded").checked=false;
			
				if($("input[type='radio'][name='tenderradio']:checked").next().next().next().text()==" (NEW) ")
					document.getElementById("edittender_newstatus").checked=true;
				else
					document.getElementById("edittender_newstatus").checked=false;
					
				if($("input[type='radio'][name='tenderradio']:checked").next().is("i")==false)
					document.getElementById("edittender_visible").checked=true;
				else
					document.getElementById("edittender_visible").checked=false;

				$("#edittender").slideDown("fast");
});

		function checktender(){
				if(document.getElementById("newtender_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("newtender_link").value=='')
				{
				alert("Link is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to add this tender?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

		function checkedittender(){
				if(document.getElementById("edittender_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("edittender_link").value=='')
				{
				alert("Link is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to edit this tender?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

			$( "#deletetender_btn").click(function(){
						var r=confirm('Are you sure you want to delete this tender?\nNote that this cannot be reversed.');
						if(r == true)
							return true;
						else
							return false;
				

			});			
			
			
			
			
			
			$("#addnewcalendar_btn").click(function(){
				$("#addcalendar").slideDown("fast");
				$("#editcalendar").slideUp("fast");
});

			$("#editcalendar_btn").click(function(){
				$("#addcalendar").slideUp("fast");

				document.getElementById("editcalendar_content").value=$("input[type='radio'][name='calendarradio']:checked").next().text();
				document.getElementById("editcalendar_link").value=$("input[type='radio'][name='calendarradio']:checked").next().next().text();
				document.getElementById("editcalendar_storyid").value=$("input[type='radio'][name='calendarradio']:checked").val();
				
				if($("input[type='radio'][name='calendarradio']:checked").next().is("b")==true)
					document.getElementById("editcalendar_bolded").checked=true;
				else
					document.getElementById("editcalendar_bolded").checked=false;
			
				if($("input[type='radio'][name='calendarradio']:checked").next().next().next().text()==" (NEW) ")
					document.getElementById("editcalendar_newstatus").checked=true;
				else
					document.getElementById("editcalendar_newstatus").checked=false;
					
				if($("input[type='radio'][name='calendarradio']:checked").next().is("i")==false)
					document.getElementById("editcalendar_visible").checked=true;
				else
					document.getElementById("editcalendar_visible").checked=false;

				$("#editcalendar").slideDown("fast");
});

		function checkcalendar(){
				if(document.getElementById("newcalendar_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("newcalendar_link").value=='')
				{
				alert("Link is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to add this calendar update?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

		function checkeditcalendar(){
				if(document.getElementById("editcalendar_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("editcalendar_link").value=='')
				{
				alert("Link is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to edit this calendar update?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

			$( "#deletecalendar_btn").click(function(){
						var r=confirm('Are you sure you want to delete this calendar update?\nNote that this cannot be reversed.');
						if(r == true)
							return true;
						else
							return false;
				

			});
			
			
			
						
			$("#addnewrecruit_btn").click(function(){
				$("#addrecruit").slideDown("fast");
				$("#editrecruit").slideUp("fast");
});

			$("#editrecruit_btn").click(function(){
				$("#addrecruit").slideUp("fast");

				document.getElementById("editrecruit_content").value=$("input[type='radio'][name='recruitradio']:checked").next().text();
				document.getElementById("editrecruit_link").value=$("input[type='radio'][name='recruitradio']:checked").next().next().text();
				document.getElementById("editrecruit_storyid").value=$("input[type='radio'][name='recruitradio']:checked").val();
				
				if($("input[type='radio'][name='recruitradio']:checked").next().is("b")==true)
					document.getElementById("editrecruit_bolded").checked=true;
				else
					document.getElementById("editrecruit_bolded").checked=false;
			
				if($("input[type='radio'][name='recruitradio']:checked").next().next().next().text()==" (NEW) ")
					document.getElementById("editrecruit_newstatus").checked=true;
				else
					document.getElementById("editrecruit_newstatus").checked=false;
					
				if($("input[type='radio'][name='recruitradio']:checked").next().is("i")==false)
					document.getElementById("editrecruit_visible").checked=true;
				else
					document.getElementById("editrecruit_visible").checked=false;
					
				$("#editrecruit").slideDown("fast");
});

		function checkrecruit(){
				if(document.getElementById("newrecruit_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("newrecruit_link").value=='')
				{
				alert("Link is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to add this recruitment update?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

		function checkeditrecruit(){
				if(document.getElementById("editrecruit_content").value=='')
				{
				alert("Content is blank");
				return false;
				} 
				if(document.getElementById("editrecruit_link").value=='')
				{
				alert("Link is blank");
				return false;
				}
				
				var r=confirm("Are you sure you want to edit this recruitment update?");
				if(r == true)
				{
				return true;
				}
				else
				return false;
};

			$( "#deleterecruit_btn").click(function(){
						var r=confirm('Are you sure you want to delete this recruitment update?\nNote that this cannot be reversed.');
						if(r == true)
							return true;
						else
							return false;
				

			});
			
			$(function () {
   var activeTab = $('[href=' + location.hash + ']');
   activeTab && activeTab.tab('show');
});
</script>
			
		</div>
		</body>
			
		</html>