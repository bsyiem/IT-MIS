function chk_email(fname,uname)
{
	var sp="!#$%^&*(){}[]-+=;:'|/>?<\\,\"";
	var len=sp.length;
	var x=document.forms[fname][uname].value;
	if(x==""||x==null)
	{
		alert(uname+" must be filled");
		return false;
	}
	var apos=x.indexOf("@");
	var lapos=x.lastIndexOf("@");
	var dpos=x.lastIndexOf(".");
	if(apos<1 || dpos<apos+2 || dpos+2>x.length || apos!=lapos)
	{
		alert("invalid "+uname+"!");
		return false;
	}
	for(var i=0;i<len;i++)
	{
		for(var j=0;j<x.length;j++)
		{
			if(x.charAt(j)==sp.charAt(i) || x.charAt(j)==' ')
			{
				alert("Use of invalid symbol in " +uname);
				return false;
			}
		}
	}
	if(!isNaN(x.charAt(0)))
	{
		alert(uname+" cannot start with a number");
		return false;
	}
	return true;
}