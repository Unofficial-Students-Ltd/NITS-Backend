<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Updates</title>
</head>
<body>
<div>
    <div><h2>News Updates</h2></div>

    <?php
               require("../admin/connection.php");
               $query="SELECT * FROM studentcorner ORDER BY id DESC;";
               $result=mysqli_query($connection,$query);
               if($result)
               {
               
               	$row=mysqli_fetch_array($result);
               	while($row)
               	{
			        while($row and $row['visible']==0)
			         $row=mysqli_fetch_array($result);
			        if(!$row) continue;
               		
               		 if($row['status']) echo "<img src='../images/tnew.gif''/>";
					 if($row['bold']) echo "<b>";
                     echo" <a href='uploads/news/{$row["title"]}.{$row["ext"]}' target='_blank'>{$row['title']}</a></br>";
                  	 if($row['bold']) echo "</b>";
               		 $row=mysqli_fetch_array($result);
               		
               	}
               }
               ?>	    

</div>

    
</body>
</html>