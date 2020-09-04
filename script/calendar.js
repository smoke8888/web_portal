window.onload = function(){bscal.init()}

var bscal = 
{
	left : 0,
    top  : 0,
    width: 0,
    height: 0,
    format: "%Y-%m-%d",

    wds  : new Array("пн","вт","ср","чт","пт","сб","вс"),
    mns  : new Array("Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"),
    dim  : new Array(31,28,31,30,31,30,31,31,30,31,30,31),

    nowD : new Date().getDate(),
    nowM : new Date().getMonth()+1,
    nowY : new Date().getFullYear(),

    curD : null,
    curM : null,
    curY : null,

    minY : 1995,
    maxY : new Date().getFullYear() + 5,

    /*css  : document.createElement("link"),*/
    div  : document.createElement("div"),
    /*ifr  : document.createElement("iframe"),*/
    msel : null,
    ysel : null,
    obj  : null,
    id_to: null,
    hover: null,

init : function()
{
    bscal.div.id = 'bscal';
    bscal.div.setAttribute("class","div-style");
    bscal.div.innerHTML = bscal.html();
    bscal.div.style.display = "none";
    document.body.appendChild(bscal.div);
    bscal.msel = document.getElementById("bs_month");
    bscal.msel.style.width = "100%";
    for (var i=0;i<bscal.mns.length;i++)
        bscal.msel.options[i] = new Option(bscal.mns[i], i+1);
    bscal.ysel = document.getElementById("bs_year");
    bscal.ysel.style.width = "100%";
    for (var i=0;i<=bscal.maxY-bscal.minY;i++)
        bscal.ysel.options[i] = new Option(bscal.maxY-i, bscal.maxY-i);
},

draw : function()
{
    //очищаем дни
    for (var y=1;y<=6;y++)
    for (var x=1;x<=7;x++)
    {
	var el = document.getElementById("cell_"+y+"_"+x)
        el.className   = (x <6) ? "day" : "weekend";
        el.style.cursor = 'default';
	el.innerHTML   = "&nbsp;";
    }
    //alert(bscal.curD+'-'+bscal.curM+'-'+bscal.curY)
    all_days = (bscal.curM == 2 && bscal.isLeap(bscal.curY)) ? 29 : bscal.dim[bscal.curM-1];
    begin = new Date(bscal.curY,bscal.curM-1,1).getDay();

    //заполняем месяц
    y=1; x=begin!=0 ? begin:7;
    for (c=1;c<=all_days;c++)
    {
        var el = document.getElementById("cell_"+y+"_"+x)
        if (bscal.istoday(c)){el.className="today";}
        el.innerHTML   = c;
        el.style.cursor = 'pointer';
        x++; if (x>7){x=1;y++;}
    }
},
	
retD : function(r_day)
{
    if (!r_day || r_day=="&nbsp;") return false;
    res = bscal.format;
    res = res.replace("%d",(r_day < 10 ? "0":"") + r_day);
    res = res.replace("%m",(bscal.curM<10?"0":"") + bscal.curM);
    res = res.replace("%Y",bscal.curY);
    bscal.obj.value = res;
    bscal.hide();
},
	
istoday : function(day)
{
    return (bscal.nowD==day && bscal.curM==bscal.nowM && bscal.curY == bscal.nowY) ? true : false;
},

dover : function(el)
{
    if (el.innerHTML=='&nbsp;') return false;
    bscal.hover = el.className;
    el.className = 'over';
},

dout  : function(el)
{
    if (el.innerHTML=='&nbsp;') return false;
    el.className = bscal.hover;
    bscal.hover = null;
},

today : function()
{
    bscal.curD = bscal.nowD;
    bscal.curM = bscal.nowM;
    bscal.curY = bscal.nowY;
    bscal.scroll_M(0);
},

change_M : function (dir)
{
    bscal.curM = dir*1;
    bscal.scroll_Y(0);
},

scroll_M : function (dir)
{
    bscal.curM = bscal.curM + dir;
    if (bscal.curM < 1) 
    {
        bscal.curM = 12;
        bscal.curY -= 1;
    }
    if (bscal.curM > 12) 
    {
	bscal.curM = 1;
	bscal.curY += 1;
    }
    document.getElementById('bs_month').selectedIndex=bscal.curM-1
    bscal.scroll_Y(0);
},

change_Y : function (dir)
{
    if (dir.length != 4) return false;
    bscal.curY = dir*1;
    bscal.scroll_Y(0);
},
	
scroll_Y : function (dir)
{
    bscal.curY+= dir;
    if (bscal.curY < bscal.minY) bscal.curY = bscal.minY;
    if (bscal.curY > bscal.maxY) bscal.curY = bscal.maxY;
    document.getElementById('bs_year').value = bscal.curY;
    bscal.draw();
},

isLeap : function (year) 
{
    return (((year % 4)==0) && ((year % 100)!=0) || ((year % 400)==0)) ? true : false 
},

html : function()
{
     var res  = "";
     res += "<table cellpadding=0 cellspacing=1 unselectable=on class='body-style'>\n";
     res += "<tr class=title-style><td onclick='bscal.hide();' align=right style='cursor:pointer' colspan=7><strong>X</strong></td></tr>\n";
     res += "<tr unselectable=on><td colspan=4 unselectable=on><select id='bs_month' onchange=\"bscal.change_M(this.value);bscal.div.focus();\"></select></td><td colspan=3 unselectable=on><select id='bs_year' type='text' style='width:100%' onchange=\"bscal.change_Y(this.value);\" onkeyup=\"bscal.change_Y(this.value);\"></select></td></tr>\n";
     // дни недели пн, вт, ср......
     res += "<tr unselectable=on align=center class='title-background-style'>\n";   
     for (var x=0;x<7;x++)
     res += "<TD width=30 unselectable=on>"+bscal.wds[x]+"</TD>\n";
     res += "</tr>";
     for (var y=1;y<=6;y++)
     {
	 //тело календаря с датами
	 res += "<TR align=center class='normal-day-style' unselectable=on>\n";
         for (var x=1;x<=7;x++)
	 {
            res += "<td id='cell_"+y+"_"+x+"' onmouseover=\"bscal.dover(this);\" onmouseout=\"bscal.dout(this);\" onclick=\"bscal.retD(this.innerHTML);\" unselectable=on>"+y+"_"+x+"</td>\n";
	 }
	 res += "</TR>\n";
     }
     res += "<tr align=center class='title-background-style'>\n"+"<td style='cursor:pointer' onClick=bscal.scroll_Y(-1);>&laquo;</td><td style='cursor:pointer' onClick=bscal.scroll_M(-1);>&lt;</td>\n"+
            "<td colspan=3 style='cursor:pointer' onClick=\"bscal.today();bscal.retD("+bscal.nowD+");\">сегодня</td>\n"+
            "<td style='cursor:pointer' onClick=bscal.scroll_M(1);>&gt;</td><td class=bot onClick=bscal.scroll_Y(1);>&raquo;</td>\n"+
	    "</tr>\n";
     res += "</table>";
     return res;
},

show : function(id_to) 
{
    var	ie = document.all;
	if (id_to==bscal.id_to)
    {
        bscal.hide(); return false;
    }
    bscal.id_to = id_to;
    bscal.obj = document.getElementById(id_to); 
    var pos = bscal.pos(bscal.obj);
    pos.x += bscal.obj.offsetWidth+bscal.left; 
    pos.y += bscal.obj.offsetHeight+bscal.top;    
    bscal.today();
    if ((pos.y+bscal.height)>document.body.offsetHeight)pos.y-= bscal.height+bscal.obj.offsetHeight;
    if ((pos.x+bscal.width)>document.body.offsetWidth)pos.x = document.body.offsetWidth-bscal.width;
    
    bscal.width = bscal.div.offsetWidth;
    bscal.height = bscal.div.offsetHeight;	
    bscal.div.style.left = pos.x+"px";
    bscal.div.style.top = pos.y+"px";
    bscal.div.style.position = "absolute";
    bscal.div.style.display = "block";
},

hide : function() 
{
        bscal.id_to = null;
    	bscal.div.style.display = "none";
},

pos  : function (el) 
{
    var r = { x: el.offsetLeft, y: el.offsetTop };
    if (el.offsetParent) 
    {
        var tmp = bscal.pos(el.offsetParent);
        r.x += tmp.x;
        r.y += tmp.y;
    }
    return r;
}

};
