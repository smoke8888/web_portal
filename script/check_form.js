function checkform(f,deistvie,sposob_soxraneniya) 
{ 
  // ���� ���� ���������� ��� �������� � ������� f, ���������� � �������� ��������� �������, � ������ ������ - ���� �����.            
  if (deistvie == 1)
  {  
     var filter = false; 
	 var text_form = "";
	 for (var i = 0; i<f.elements.length; i++)  // ���������, �������� �� ������� �������
     {    
           text_form = f.elements[i].name;
           text_form = text_form.substring(0, 4); 
           if ((!isEmpty(f.elements[i].value))&&(text_form == "text"))   {filter = true; break;}
     } 
	 if ((filter==false)&&(deistvie == 1))
     {
          alert("�� ���� ���� �� ���������!");
          return false;
     }
  }
  if (deistvie == 2)  // ��������� EDIT � ADD 
  {
     var err = false; 
	 for (var i = 0; i<f.elements.length; i++)  // ���������, �������� �� �������
     {
           if (isEmpty(f.elements[i].value)) // ������
           {    //alert(f.elements[i].name);
                if (f.elements[i].name != "file[]") {err = true; break;}
           }  // ��������� ��������� �� ������
     } 
     if (sposob_soxraneniya==0) {var input1=document.createElement('input');  // ��������� EDIT ���� ����� APPLY 
	    			   //input1.type='hidden'; //input1.value='apply';
	    			   input1.setAttribute("type","hidden");
	    			   input1.setAttribute("name","apply");
	    			   input1.setAttribute("value","apply");
		   		   document.getElementById('form_edit').appendChild(input1); 
     				  }
     if (sposob_soxraneniya==1) {var input1=document.createElement('input');  //��������� EDIT ���� ����� SAVE
	    			   //input1.type='hidden'; //input1.value='save';
	    			   input1.setAttribute("type","hidden");
	    			   input1.setAttribute("name","save");
	    			   input1.setAttribute("value","save");
		   		   document.getElementById('form_edit').appendChild(input1); 
     				  }					        
     if (err==true)
     {
          alert("��������� ���� �� ���������!\n����������, ������� ��� ������!");
          return false;
     }
  } 	  // ���� ��������� �� ������ �� �����, ������� ���, � ���������� false   
  if (deistvie == 3)  // ��������� ����� ������ ����� ������� - ��������� ����������� ������ ��� �����
  {  
	 var box_checked = false;
	 for (var i = 0; i<f.elements.length; i++)  // ������� ��������� �����
     {    
          var Idi = f.elements[i].name;
		  if (Idi.search("gjkt") > -1)     
		  {
			  if (document.getElementById(Idi)) var chk = document.getElementById(Idi);
			  if (chk.checked) box_checked = true; 
		  }
     }
	 if ((box_checked == false)&&(deistvie == 3))
     {
          alert("�������� ����������!\n���������� �������� ���� �� ���� ����!");
          return false;
     }  
  }  	    
  
if ((err==false)||(filter==true)||(box_checked==true)) {f.submit();}   // ���� ��� �� ���������� ����� �� ������
}



function isEmpty(str) 
{
   for (var i = 0; i < str.length; i++)
      if (" " != str.charAt(i))
          return false;
      return true;
}

function positive_number(e)
{
	
	e = e || window.event;
    var key = e.keyCode || e.charCode || e.which;
    return (key >= 48 && key <= 57)||(key == 8)||(key == 46) ;
}


