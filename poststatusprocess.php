<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<title>Assignment1</title>
</head>
<body>
	<h1>Post your Status</h1>
	
<?php    
    if(!empty($_POST["share"]))
    {
       $share = ($_POST["share"]);
    }
    else
    {
        $share = NULL;
    }
    $date = $_POST["date"];
 
// get statusCode and status passed from client

	if(!empty($_POST["statusCode"]) && !empty($_POST["status"]))
	{
        $statusCode = $_POST["statusCode"];
        $status = $_POST["status"];
    }
     //connect to database
        $db = new mysqli("localhost", "root", "", "statuspost") or die("Unable to connect");
        $query = "SELECT * FROM statusposts WHERE code LIKE '$statusCode'";
        $queryResult = mysqli_query($db,$query);
        $row = mysqli_fetch_row($queryResult);
        if($row)
        {
            print"<p>$statusCode already in use, please select another S#### code</p>";
        }
       
		else
		{
			$query = "INSERT INTO statusposts (code, status, share, date) VALUES ('$statusCode', '$status', '$share', '$date')";
			mysqli_query($db,$query);
            if(!empty($_POST['permission']))
            {
			foreach ($_POST['permission'] as $choice)
			{
				switch ($choice)
				{
				case 'Like':
				$query2 = "UPDATE statusposts SET likes = true WHERE code = '$statusCode'";
				mysqli_query($db,$query2);
				break;
				case 'Comment':
				$query2 = "UPDATE statusposts SET comment = true WHERE code = '$statusCode'";
				mysqli_query($db,$query2);
				break;
				case 'Share':
				$query2 = "UPDATE statusposts SET sharePost = true WHERE code = '$statusCode'";
				mysqli_query($db,$query2);
				break;
				}
			}
            }
                print"<p>Your status has been posted!<p>";
        }
    
?>
<br>
<form>
<input class="postButton1" type="button" value="Post a status" onclick="window.location.href='poststatusform.php'" />
<input class="homeButton" type="button" value="Home" onclick="window.location.href='index.php'" />
</form>
</body>
</html>