function chk_empty(idname)
{
	var x=document.getElementById(idname).value;
	if(x==""||x==null)
	{
		alert(idname +" must be filled");
		return false;
	}
	return true;
}