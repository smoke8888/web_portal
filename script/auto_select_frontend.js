function autopodbor_ct(selected_element)
{       
   
	var nas_punkt="punkty";
    var uzel_svyazi="uzly";
	var ploshadki="ploshadki";
	// Create new JsHttpRequest object.
    var req = new JsHttpRequest();
    // Code automatically called on load finishing.
	document.getElementById("load_gif1").style.display = "inline";
    req.onreadystatechange = function() 
    {
         if (req.readyState == 4) 
	     {
	       document.getElementById("load_gif1").style.display = "none";
		   //обработка select "Узел связи" --------------------------------------------------------------------------------------------
	       if (document.getElementById(uzel_svyazi)) 
	       {	          
		  		  document.getElementById(uzel_svyazi).innerHTML = null;
	              //заполнение select Узел связи наименованием узлов
                  if (req.responseJS.UZEL.length>0)
                  {
	            		for(i=0;i<req.responseJS.UZEL.length;i++)
       	            	{     
							   var option = document.createElement("option");
							   var optionText = document.createTextNode(req.responseJS.UZEL[i]);
							   option.appendChild(optionText);
							   option.setAttribute("value",req.responseJS.ID_UZEL[i]);
							   document.getElementById(uzel_svyazi).appendChild(option);
                    	}
                  }
           }  
           //обработка select "Населенный пункт" --------------------------------------------------------------------------------------------
           if (document.getElementById(nas_punkt)) 
	       {  
	          	  document.getElementById(nas_punkt).innerHTML = null;
          	      //заполнение select Населенный пункт наименованием пунктов
               	  if (req.responseJS.PUNKT.length>0)
               	  {              
	            		for(i=0;i<req.responseJS.PUNKT.length;i++)
                   		{
							   var option = document.createElement("option");
							   var optionText = document.createTextNode(req.responseJS.PUNKT[i]);
							   option.appendChild(optionText);
							   option.setAttribute("value",req.responseJS.ID_PUNKT[i]);
							   document.getElementById(nas_punkt).appendChild(option);
                        }
                  }
	       }
		   //обработка select "Площадки" --------------------------------------------------------------------------------------------		   
		   if (document.getElementById(ploshadki)) 
		   {  
				  document.getElementById(ploshadki).innerHTML = null;
				  //заполнение select Населенный пункт наименованием пунктов
				  if (req.responseJS.PLOSHADKI.length>0)
				  {              
						for(i=0;i<req.responseJS.PLOSHADKI.length;i++)
						{
							   var option = document.createElement("option");
							   var optionText = document.createTextNode(req.responseJS.PLOSHADKI[i]);
							   option.appendChild(optionText);
							   option.setAttribute("value",req.responseJS.ID_PLOSHADKI[i]);
							   document.getElementById(ploshadki).appendChild(option);
						}
				  }
		   }
		}
     }
    	 // Prepare request object (automatically choose GET or POST).
    	 req.open(null, 'script/auto_select_backend.php', true);
    	 // Send data to backend.
    	 req.send({selected_data: document.getElementById(selected_element).value, selected_element: selected_element});
}
function autopodbor_uzel(selected_element)
{       
        var nas_punkt="punkty";
		var ploshadki="ploshadki";
	    // Create new JsHttpRequest object.
    	var req1 = new JsHttpRequest();
    	// Code automatically called on load finishing.
		document.getElementById("load_gif2").style.display = "inline";
    	req1.onreadystatechange = function() 
    	{
             if (req1.readyState == 4) 
	     	 {
               		document.getElementById("load_gif2").style.display = "none";
					//обработка select "Населенный пункт" --------------------------------------------------------------------------------------------
               		if (document.getElementById(nas_punkt)) 
	       			{
	          			document.getElementById(nas_punkt).innerHTML = null;
          	  			//заполнение select Населенный пункт наименованием пунктов
               	  		if (req1.responseJS.PUNKT.length>0)
               	  		{           
	           				 for(i=0;i<req1.responseJS.PUNKT.length;i++)
                    		 {
	               					var option = document.createElement("option");
              	       				var optionText = document.createTextNode(req1.responseJS.PUNKT[i]);
              	       				option.appendChild(optionText);
              	       				option.setAttribute("value",req1.responseJS.ID_PUNKT[i]);
                       				document.getElementById(nas_punkt).appendChild(option);
                    		 }
                  		}
	       			}
					//обработка select "Площадки" --------------------------------------------------------------------------------------------		   
				   if (document.getElementById(ploshadki)) 
				   {  
						  document.getElementById(ploshadki).innerHTML = null;
						  //заполнение select Населенный пункт наименованием пунктов
						  if (req1.responseJS.PLOSHADKI.length>0)
						  {              
								for(i=0;i<req1.responseJS.PLOSHADKI.length;i++)
								{
									   var option = document.createElement("option");
									   var optionText = document.createTextNode(req1.responseJS.PLOSHADKI[i]);
									   option.appendChild(optionText);
									   option.setAttribute("value",req1.responseJS.ID_PLOSHADKI[i]);
									   document.getElementById(ploshadki).appendChild(option);
								}
						  }
				   } 	       	       		  
            }
       }        
    // Prepare request object (automatically choose GET or POST).
    req1.open(null, 'script/auto_select_backend.php', true);
    // Send data to backend.
    req1.send({selected_data: document.getElementById(selected_element).value, selected_element: selected_element});
} 
function autopodbor_punkt(selected_element, type_ploshadki)
{              
        var nas_punkt="punkty";
        var uzel_svyazi="uzly";
		var ploshadki="ploshadki";
        // Create new JsHttpRequest object.
    	var req2 = new JsHttpRequest();
    	// Code automatically called on load finishing.
		document.getElementById("load_gif3").style.display = "inline";
    	req2.onreadystatechange = function() 
    	{
             if (req2.readyState == 4) 
	         {	    	         	      
	               document.getElementById("load_gif3").style.display = "none";
				   //обработка select "Площадки" --------------------------------------------------------------------------------------------		   
				   if (document.getElementById(ploshadki)) 
				   {  
						  document.getElementById(ploshadki).innerHTML = null;
						  //заполнение select Населенный пункт наименованием пунктов
						  if (req2.responseJS.PLOSHADKI.length>0)
						  {              
								for(i=0;i<req2.responseJS.PLOSHADKI.length;i++)
								{
									   var option = document.createElement("option");
									   var optionText = document.createTextNode(req2.responseJS.PLOSHADKI[i]);
									   option.appendChild(optionText);
									   option.setAttribute("value",req2.responseJS.ID_PLOSHADKI[i]);
									   document.getElementById(ploshadki).appendChild(option);
								}
						  }
				   }                 
             }	 	       		  
         }
    // Prepare request object (automatically choose GET or POST).
    req2.open(null, 'script/auto_select_backend.php', true);
    // Send data to backend.
    req2.send({selected_data: document.getElementById(selected_element).value, selected_element: selected_element});
} 

function autopodbor_search(selected_element, priznak)
{              
        // Create new JsHttpRequest object.
    	var req2 = new JsHttpRequest();
    	// Code automatically called on load finishing.
    	req2.onreadystatechange = function() 
    	{
             if (req2.readyState == 4) 
	         {	    	         	      
	               //обработка select "Площадки" --------------------------------------------------------------------------------------------		   
				   if (document.getElementById(priznak)) 
				   {  
						  document.getElementById(priznak).innerHTML = null;
						  //заполнение select Населенный пункт наименованием пунктов
						  if ((req2.responseJS.SEARCH)&&(req2.responseJS.SEARCH.length>0))
						  {              
								var last_group = "";
								for(i=0;i<req2.responseJS.SEARCH.length;i++)
								{
								     if (req2.responseJS.SEARCH_group != "no")	   
								     {	   
									   if (req2.responseJS.SEARCH_group[i] != undefined)// если есть деление на группы, выводим их
									   {
										   var optgroup = document.createElement("optgroup");
										   optgroup.label = req2.responseJS.SEARCH_group[i];
										   last_group = req2.responseJS.SEARCH_group[i];
									   }
					                             }
								     var option = document.createElement("option");
								     var optionText = document.createTextNode(req2.responseJS.SEARCH[i]);
								     option.appendChild(optionText);
								     option.setAttribute("value",req2.responseJS.ID_SEARCH[i]);
								     if (req2.responseJS.SEARCH_group != "no")	   
								     {
						  		           optgroup.appendChild(option);
					                             }
								     if ((req2.responseJS.SEARCH_group != "no")&&(req2.responseJS.SEARCH_group[i] != undefined))// если есть деление на группы, выводим их
								     {
				                                           document.getElementById(priznak).appendChild(optgroup);
					                             }	    
								     if (req2.responseJS.SEARCH_group == "no") document.getElementById(priznak).appendChild(option);
								     
									   
								}
								if (req2.responseJS.SEARCH_group[i] != undefined) {optgroup.appendChild(option);}
						  }
						  else 
						  {
								document.getElementById(priznak).innerHTML = "null";
								var option = document.createElement("option");
								var optionText = document.createTextNode('Ничего не найдено');
								option.appendChild(optionText);
								option.setAttribute("value",'');
								document.getElementById(priznak).appendChild(option);  
						  }
				   }                 
             }	 	       		  
         }
	if (document.getElementById(selected_element).value != "")
	{
		// Prepare request object (automatically choose GET or POST).
		req2.open(null, 'script/auto_select_backend.php', true);
		// Send data to backend.
		req2.send({selected_data: document.getElementById(selected_element).value, selected_element: selected_element, priznak: priznak});
	}
	else 
	{
		document.getElementById(priznak).innerHTML = "null";
		var option = document.createElement("option");
		var optionText = document.createTextNode('Введите текст для поиска');
		option.appendChild(optionText);
		option.setAttribute("value",'');
		document.getElementById(priznak).appendChild(option);
	}
}   

function autopodbor_otkazy(selected_element, priznak)
{              
        // Create new JsHttpRequest object.
    	var req = new JsHttpRequest();
    	// Code automatically called on load finishing.
    	req.onreadystatechange = function() 
    	{
             if (req.readyState == 4) 
	         {	    	         	      
	               //обработка select "Площадки" --------------------------------------------------------------------------------------------		   
				   if (document.getElementById("otkazy_uslugi")) 
				   {  
						  document.getElementById("otkazy_uslugi").innerHTML = null;
						  //заполнение select Населенный пункт наименованием пунктов
						  if (req.responseJS.OTKAZY.length>0)
						  {              
								for(i=0;i<req.responseJS.OTKAZY.length;i++)
								{
									   var option = document.createElement("option");
									   var optionText = document.createTextNode(req.responseJS.OTKAZY[i]);
									   option.appendChild(optionText);
									   option.setAttribute("value",req.responseJS.ID_OTKAZY[i]);
									   document.getElementById("otkazy_uslugi").appendChild(option);
								}
						  }
				   }                 
             }	 	       		  
         }
    // Prepare request object (automatically choose GET or POST).
    req.open(null, 'script/auto_select_backend.php', true);
    // Send data to backend.
    req.send({selected_data: document.getElementById(selected_element).value, selected_element: selected_element});
} 

function autopodbor_lzk_group1(selected_element)
{       
	var lzk_group2="lzk_group2";
    var lzk_group3="lzk_group3";
    var req = new JsHttpRequest();
	document.getElementById("load_gif5").style.display = "inline";
    req.onreadystatechange = function() 
    { 
         if (req.readyState == 4) 
	     {
	       document.getElementById("load_gif5").style.display = "none";
		   //обработка select "lzk_group2" --------------------------------------------------------------------------------------------
	       if (document.getElementById(lzk_group2)) 
	       {	          
		  		  document.getElementById(lzk_group2).innerHTML = null;
                  if (req.responseJS.LZK_GROUP2.length>0)
                  {
	            		for(i=0;i<req.responseJS.LZK_GROUP2.length;i++)
       	            	{     
							   var option = document.createElement("option");
							   var optionText = document.createTextNode(req.responseJS.LZK_GROUP2[i]);
							   option.appendChild(optionText);
							   option.setAttribute("value",req.responseJS.ID_LZK_GROUP2[i]);
							   document.getElementById(lzk_group2).appendChild(option);
                    	}
                  }
           }  
           //обработка select "lzk_group3" --------------------------------------------------------------------------------------------
           if (document.getElementById(lzk_group3)) 
	       {  
	          	  document.getElementById(lzk_group3).innerHTML = null;
               	  if (req.responseJS.LZK_GROUP3.length>0)
               	  {              
	            		for(i=0;i<req.responseJS.LZK_GROUP3.length;i++)
                   		{
							   var option = document.createElement("option");
							   var optionText = document.createTextNode(req.responseJS.LZK_GROUP3[i]);
							   option.appendChild(optionText);
							   option.setAttribute("value",req.responseJS.ID_LZK_GROUP3[i]);
							   document.getElementById(lzk_group3).appendChild(option);
                        }
                  }
		   }
		}
     }
    	 req.open(null, 'script/auto_select_backend.php', true);
    	 req.send({selected_data: document.getElementById(selected_element).value, selected_element: selected_element});
}
function autopodbor_lzk_group2(selected_element)
{       
        var lzk_group3="lzk_group3";
    	var req1 = new JsHttpRequest();
		document.getElementById("load_gif6").style.display = "inline";
    	req1.onreadystatechange = function() 
    	{
             if (req1.readyState == 4) 
	     	 {
               		document.getElementById("load_gif6").style.display = "none";
					//обработка select "lzk_group3" --------------------------------------------------------------------------------------------
               		if (document.getElementById(lzk_group3)) 
	       			{
	          			document.getElementById(lzk_group3).innerHTML = null;
               	  		if (req1.responseJS.LZK_GROUP3.length>0)
               	  		{           
	           				 for(i=0;i<req1.responseJS.LZK_GROUP3.length;i++)
                    		 {
	               					var option = document.createElement("option");
              	       				var optionText = document.createTextNode(req1.responseJS.LZK_GROUP3[i]);
              	       				option.appendChild(optionText);
              	       				option.setAttribute("value",req1.responseJS.ID_LZK_GROUP3[i]);
                       				document.getElementById(lzk_group3).appendChild(option);
                    		 }
                  		}
	       			} 	       	       		  
            }
       }        
    // Prepare request object (automatically choose GET or POST).
    req1.open(null, 'script/auto_select_backend.php', true);
    // Send data to backend.
    req1.send({selected_data: document.getElementById(selected_element).value, selected_element: selected_element});
} 