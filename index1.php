<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To NIT Silchar</title>
</head>
<body>

    <div>

        <div><h2>Top Stories</h2></div>

        <div >
					<?php 
					require("admin/connection.php");
					
					$query="SELECT * FROM topstories ORDER BY storyid DESC LIMIT 3;";
						
						
						$result=mysqli_query($connection,$query);
						if($result)
						{
						
							$row=mysqli_fetch_array($result);
							echo"<div ><a href='{$row['link']}' target='_blank'>";
					echo "<img src='uploads/topstories/{$row['title']}.jpg' height='120' />";
					echo "<div style='margin-top:10px;'>{$row['title']}<div ></br><a href='{$row['link']}' target='_blank'>READ MORE</a></div></div>
					</div>
					";
					}
					$row=mysqli_fetch_array($result);
					if($row)
					{
					echo "<div ><a href='{$row['link']}' target='_blank'>";
					echo "<img src='uploads/topstories/{$row['title']}.jpg' height='120' />";
					echo "<div style='margin-top:10px;'>{$row['title']}<div ></br><a href='{$row['link']}' target='_blank'>READ MORE</a></div></div>";
				
					echo "</div>";
					}

					$row=mysqli_fetch_array($result);
					if($row)
					{
					echo "<div ><a href='{$row['link']}' target='_blank'>";
					echo "<img src='uploads/topstories/{$row['title']}.jpg' height='120' />";
					echo "<div style='margin-top:10px;'>{$row['title']}<div ></br><a href='{$row['link']}' target='_blank'>READ MORE</a></div></div>";
				
					echo "</div>";
					}
?>
					</div>
    
    </div>
<br>


	</div>
                <div  >
                    <div ><h2>News Updates</h2></div>
                    <div >
					<div>
										<?php
						require("admin/connection.php");
						$query="SELECT * FROM newsupdates ORDER BY id DESC LIMIT 10;";
						
						
						$result=mysqli_query($connection,$query);
						if($result)
						{
						
							$row=mysqli_fetch_array($result);
							while($row)
							{
								while($row and $row['visible']==0)
								  $row=mysqli_fetch_array($result);
								if(!$row) continue;
								
								if($row['status']) echo "<img src='images/tnew.gif' />";
									else echo "&nbsp;";
								if($row['bold'])echo"<b>";
									
								 echo" <a href='uploads/news/{$row["title"]}.{$row["ext"]}' target='_blank'>{$row['title']}</a></br>";
								if($row['bold']) echo "</b>";
								$row=mysqli_fetch_array($result);
								
							}
						}
						?>
					
					</div>
					<div ><a href="readMore/newsupdates.php">READ MORE</a></div>
					</div>
                </div>

				<br>
				<div>
				<div><H2>Student Corner</H2></div>

				<?php
						require("admin/connection.php");
						$query="SELECT * FROM studentcorner ORDER BY id DESC LIMIT 10;";
						
						
						$result=mysqli_query($connection,$query);
						if($result)
						{
						
							$row=mysqli_fetch_array($result);
							while($row)
							{
								while($row and $row['visible']==0)
								  $row=mysqli_fetch_array($result);
								if(!$row) continue;
								
								if($row['status']) echo "<img src='images/tnew.gif' />";
									else echo "&nbsp;";
								if($row['bold'])echo"<b>";
									
								 echo" <a href='uploads/news/{$row["title"]}.{$row["ext"]}' target='_blank'>{$row['title']}</a></br>";
								if($row['bold']) echo "</b>";
								$row=mysqli_fetch_array($result);
								
							}
						}
						?>
						</div>
				<div ><a href="readMore/student.php">READ MORE</a></div>
				</div>

				</div>

				<br>
				<div>
				<div><H2>Notice Board</H2></div>

				<?php
						require("admin/connection.php");
						$query="SELECT * FROM studentcorner ORDER BY id DESC LIMIT 10;";
						
						
						$result=mysqli_query($connection,$query);
						if($result)
						{
						
							$row=mysqli_fetch_array($result);
							while($row)
							{
								while($row and $row['visible']==0)
								  $row=mysqli_fetch_array($result);
								if(!$row) continue;
								
								if($row['status']) echo "<img src='images/tnew.gif' />";
									else echo "&nbsp;";
								if($row['bold'])echo"<b>";
									
								 echo" <a href='uploads/noticeboard/{$row["title"]}.{$row["ext"]}' target='_blank'>{$row['title']}</a></br>";
								if($row['bold']) echo "</b>";
								$row=mysqli_fetch_array($result);
								
							}
						}
						?>
						</div>
				<div ><a href="readMore/noticeboard.php">READ MORE</a></div>
				</div>

				</div>

				<br>
				<div>
				<div><H2>Event Calender</H2></div>

				<?php
						require("admin/connection.php");
						$query="SELECT * FROM calender ORDER BY id DESC LIMIT 10;";
						
						
						$result=mysqli_query($connection,$query);
						if($result)
						{
						
							$row=mysqli_fetch_array($result);
							while($row)
							{
								while($row and $row['visible']==0)
								  $row=mysqli_fetch_array($result);
								if(!$row) continue;
								
								if($row['status']) echo "<img src='images/tnew.gif' />";
									else echo "&nbsp;";
								if($row['bold'])echo"<b>";
									
								 echo" <a href='uploads/calender/{$row["title"]}.{$row["ext"]}' target='_blank'>{$row['title']}</a></br>";
								if($row['bold']) echo "</b>";
								$row=mysqli_fetch_array($result);
								
							}
						}
						?>
						</div>
				<div ><a href="readMore/calender.php">READ MORE</a></div>
				</div>

				</div>

				<br>
				<div>
				<div><H2>Recruitment</H2></div>

				<?php
						require("admin/connection.php");
						$query="SELECT * FROM recruitment ORDER BY id DESC LIMIT 10;";
						
						
						$result=mysqli_query($connection,$query);
						if($result)
						{
						
							$row=mysqli_fetch_array($result);
							while($row)
							{
								while($row and $row['visible']==0)
								  $row=mysqli_fetch_array($result);
								if(!$row) continue;
								
								if($row['status']) echo "<img src='images/tnew.gif' />";
									else echo "&nbsp;";
								if($row['bold'])echo"<b>";
									
								 echo" <a href='uploads/recruitment/{$row["title"]}.{$row["ext"]}' target='_blank'>{$row['title']}</a></br>";
								if($row['bold']) echo "</b>";
								$row=mysqli_fetch_array($result);
								
							}
						}
						?>
						</div>
				<div ><a href="readMore/recruitment.php">READ MORE</a></div>
				</div>

				</div>

				<br>
				<div>
				<div><H2>Tender</H2></div>

				<?php
						require("admin/connection.php");
						$query="SELECT * FROM tender  ORDER BY id DESC LIMIT 10;";
						
						
						$result=mysqli_query($connection,$query);
						if($result)
						{
						
							$row=mysqli_fetch_array($result);
							while($row)
							{
								while($row and $row['visible']==0)
								  $row=mysqli_fetch_array($result);
								if(!$row) continue;
								
								if($row['status']) echo "<img src='images/tnew.gif' />";
									else echo "&nbsp;";
								if($row['bold'])echo"<b>";
									
								 echo" <a href='uploads/tender/{$row["title"]}.{$row["ext"]}' target='_blank'>{$row['title']}</a></br>";
								if($row['bold']) echo "</b>";
								$row=mysqli_fetch_array($result);
								
							}
						}
						?>
						</div>
				<div ><a href="readMore/tender.php">READ MORE</a></div>
				</div>

				</div>

    
</body>
</html>