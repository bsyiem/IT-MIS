function chk_date(fname,uname)
{
	var x=document.forms[fname][uname].value;
	for(var j=0;j<x.length;j++)
	{
		if(isNaN(x.charAt(j)) && x.charAt(j)!='/')
		{
			alert("invalid "+j+uname);
			return false;
		}
	}
	var i=0;
	for(var j=0;j<x.length;j++)
	{
		if(x.charAt(j)=='/')
		{
			i++;
		}
	}
	if(i>2)
	{
		alert("invalid "+uname);
		return false;
	}
	var spos=x.indexOf("/");
	var lpos=x.lastIndexOf("/");
	if(spos<1 || spos>2 || spos+2>lpos || lpos+4>x.length)
	{
			alert("invalid "+uname);
			return false;
	}
	return true;
}