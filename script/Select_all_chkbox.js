// JavaScript Document

function Select_all_chkbox(forma)
{   
	for (var i = 0; i<forma.elements.length; i++) 
     {   
		  var Idi = forma.elements[i].name;
		  if (Idi.search("gjkt") > -1)     
		  {
			  var chk = document.getElementById(Idi);
			  chk.checked = true;
		  } 
		  if (Idi.search("zxc") > -1)
		  {
		          document.getElementById(Idi).style.display = 'block';
		  }
     }
}
function unSelect_all_chkbox(forma)
{   
	for (var i = 0; i<forma.elements.length; i++) 
     {   
 		  var Idi = forma.elements[i].id;  
		  if ((Idi.search("gjkt") > -1)||(Idi.search("asc") > -1)||(Idi.search("desc") > -1))    
		  {
			  var chk = document.getElementById(Idi);
			  chk.checked = false;
		  }
		  if (Idi.search("zxc") > -1)
		  {
			  var chk = document.getElementById(Idi);
			  chk.checked = false;
		  }
	 }
}