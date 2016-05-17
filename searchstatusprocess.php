<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<title>Assignment1</title>
</head>
<body>
<h1>Matching Status</h1>

<?php
    $input = $_GET["status"];
    $statusPattern = "/^[a-zA-Z0-9\s!?.,]+$/";
    
    // validate user input to search database
    if(!empty($input))
    {
        if(!preg_match($statusPattern, $input))
        {
            print"<p>Please enter a valid status only including alphanumric characters, spaces and \", . ! ?\"</p>";
        }
        else
        {
            //connect to database
            $db = new mysqli("localhost", "root", "", "statuspost") or die("Unable to connect");
            //	$connection = mysqli_connect("localhost"[,"root","","satuspost"]);
            $query = "SELECT * FROM statusposts WHERE status LIKE '% $input %' OR status LIKE '$input %' OR status LIKE '%$input'";
            $queryResult = mysqli_query($db,$query);
            $row = mysqli_fetch_row($queryResult);
            print "<table width='30%' border='1'>";
            print "<tr><th>Status Code</th><th>Status</th><th>Share</th><th>Date Posted</th><th>Permission</th></tr>";
            if(!$row)
            {
                print"<tr><td>No matching status found</td></tr>";
            }
            while ($row)
            {
                print"<tr><td>{$row[0]}</td>
					<td>{$row[1]}</td>
					<td>{$row[2]}</td>
					<td>{$row[3]}</td>";
		
			if($row[4] || $row[5] || $row[6])
			{
				print"<td>Likes, Comments, Share</td></tr>";
			}
			elseif($row[4] || $row[5])
			{
				print"<td>Likes, Comments </td></tr>";
			}
			elseif($row[5] || $row[6])
			{
				print"<td>Comments, Share</td></tr>";
			}
			elseif($row[4] || $row[6])
			{
				print"<td>Like, Share</td></tr>";
			}
			elseif($row[4])
			{
				print"<td>Likes </td></tr>";
			}
			elseif($row[5])
			{
				print"<td>Comments</td></tr>";
			}
			elseif($row[6])
			{
				print"<td>Share</td></tr>";
			}
			else
			{				
					print"<td>None</td></tr>";
			}
            $row = mysqli_fetch_row($queryResult);
            }
            print "</table>";
        }
    }
    else
    {
        print"Please enter a valid input";
    }
    
    ?>
<br><br>
<form>
<input class="searchButton1" type="button" value="Search another status" onclick="window.location.href='searchstatusform.php'" />
<input class="postButton1" type="button" value="Post a status" onclick="window.location.href='poststatusform.php'" />
<input class="homeButton1" type="button" value="Home" onclick="window.location.href='index.php'" />
</form

</body></html>