function add_file()
{ 
   if (document.getElementById('attach_file')) 
   {	          
	var curentROW = document.getElementById("attach_file");
	if (curentROW.childNodes.length == 13) {return false;}
 	var input_file = document.createElement("input");
	input_file.setAttribute("type",'file'); 
	input_file.setAttribute("name",'file[]');
	input_file.setAttribute("value",'empty'); 
	input_file.setAttribute("SIZE",'40');

	var br = document.createElement("br");
	
	curentROW.appendChild(br);
	curentROW.appendChild(input_file);             
    }
}

function rem_file()
{ 
   if (document.getElementById('attach_file')) 
   {	                        	
      var curentROW = document.getElementById("attach_file");
      if (curentROW.lastChild.getAttribute("name")  != "rem_button")      //rem_button это кнопка "-"
      {
	curentROW.removeChild(curentROW.lastChild);
	curentROW.removeChild(curentROW.lastChild);	                 
      }
    }
} 