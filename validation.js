function validateForm()

 {			
    var code = document.forms["postForm"]["statusCode"].value;
	var curStatus = document.forms["postForm"]["status"].value;
	var date = document.forms["postForm"]["date"].value;
	var firstLetter = code.substr(0, 1);
	var codeNums = code.substr(1,4);
	var statusPattern = /^[a-z\d\-_\s]+$/i;
	var datePattern = /^\d{2}\/\d{2}\/\d{2}$/;
    if(code == null || code == "" || curStatus == null || curStatus == "")
	{
		alert("Please ensure that you have entered a status code and valid status");
		return false;
	}
	else if(firstLetter != 'S' || code.length != 5 || isNaN(codeNums)) 
	{
		alert("Please enter a code starting with S followed by a 4 digit number eg. S0003");
		return false;
	}
	else if(!curStatus.match(statusPattern))
	{
		alert("Please enter a valid status only including alphanumric characters.");
		return false;
	}
	else if(!date.match(datePattern))
	{
		alert("Please enter a valid date in the dd/mm/yy format");
		return false;
	}
    else
    {
        return true;
    }
                
 }

 