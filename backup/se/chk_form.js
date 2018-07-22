function chk_form(idname)
{
	var sp="!#$%^&*(){}[]-+=;:'|/><?\\,\"";
	var len=sp.length;
	
	var x=document.getElementById(idname).value;
	if(x==""||x==null)
	{
		alert(idname +" must be filled");
		return false;
	}
	
	for(var i=0;i<len;i++)
	{
		for(var j=0;j<x.length;j++)
		{
			if(x.charAt(j)==sp.charAt(i) || x.charAt(j)==' ')
			{
				alert("Use of invalid symbol in " +idname);
				return false;
			}
		}
	}
	return true;
}

