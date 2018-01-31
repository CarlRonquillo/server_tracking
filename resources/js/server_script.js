	function mouseDown(buttonName,fieldName)
	{
	    document.getElementById(buttonName).addEventListener("mousedown", function(e){
        var pwd = document.getElementById(fieldName);
        pwd.setAttribute("type","text");
    	});
	}

	function mouseUp(buttonName,fieldName)
	{
		document.getElementById(buttonName).addEventListener("mouseup", function(e){
	    var pwd = document.getElementById(fieldName);
	    pwd.setAttribute("type","password");
	    });
	}