// JavaScript Document

function show_hide_sort_field(ID)
{   
	if (document.getElementById("divs" + ID).style.display == 'block') 
	{
		document.getElementById("divs" + ID).style.display = 'none';
		document.getElementById("asc" + ID).checked = false;
		document.getElementById("desc" + ID).checked = false;
	}
	else 
	{
		document.getElementById("divs" + ID).style.display = 'block';
		document.getElementById("asc" + ID).style.display = 'inline';
		document.getElementById("desc" + ID).style.display = 'inline';
		document.getElementById("asc" + ID).checked = true;
	}
}

function unselect_sort(Name,ID)
{   
	if (document.getElementById("gjkt" + Name).checked == false) 
	{
		document.getElementById("divs" + ID).style.display = 'none';
		document.getElementById("zxc" + ID).style.display = 'none';
		document.getElementById("zxc" + ID).checked = false;
		document.getElementById("asc" + ID).checked = false;
		document.getElementById("desc" + ID).checked = false;
	}
	else
	{
		document.getElementById("divs" + ID).style.display = 'none';
		document.getElementById("zxc" + ID).style.display = 'block';
		document.getElementById("zxc" + ID).checked = false;
		document.getElementById("asc" + ID).checked = false;
		document.getElementById("desc" + ID).checked = false;
	}
}

