function chk_num(fname,num)
{
	var x=document.forms[fname][num].value;
	if(isNaN(x))
	{
		alert("please enter a valid number in "+num);
		return false;
	}
	return true;
}