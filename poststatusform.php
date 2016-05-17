<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<script type="text/javascript" src="validation.js"></script>
	<title>Assignemnent 1</title>
	
</head>
<body>
	<h1>Post Your Status</h1>
	
<form name="postForm" action="poststatusprocess.php" onsubmit="return validateForm()" method ="post" >
 <label>Status Code(required): <input class="statusInput" type="text" name="statusCode" ></label><br><br>
 <label>Status (required): <input class="statusInput" type="text" name="status" ></label><br><br>
 <label>Date: <input class="statusInput" type="text" name="date" value="<?php echo date('d/m/y');?>" ></label><br><br>
 
 <label>Share:  </label><input type="radio" name="share" value="Public">Public
 <input type="radio" name="share" value="Friends">Friends
 <input type="radio" name="share" value="Only Me">Only Me<br><br>
 
 
 <label> Permission Type: </label><input type="checkbox" name="permission[]" value="Like">Allow Like
 <input type="checkbox" name="permission[]" value="Comment">Allow Comment
 <input type="checkbox" name="permission[]" value="Share">Allow share<br><br><br>
 <button class="submitPost" type="submit" value="submit">Submit</button>
<button class="resetStatus" type="reset" value="Reset">Reset</button>
 <input class="homeButton1" type="button" value="Home" onclick="window.location.href='index.php'" />
 </form>

</body></html> 
