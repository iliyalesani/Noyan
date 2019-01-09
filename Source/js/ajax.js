// JavaScript Document
<!-- Ajax -->


var divid = 'ajaxloader';
function AJAX(){
var xmlHttp;
try{
xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
return xmlHttp;
}
catch (e){
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
return xmlHttp;
}
catch (e){
try{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
return xmlHttp;
}
catch (e){
alert("مرورگر شما به روز نیست");
return false;
}
}
}
}


function formget(f, url) {
var data = getFormValues(f);
postData(url, data);

}
function formget2(f, url) {
var data = getFormValues2(f);
//alert (data);
postData(url, data);

}


function postData(url,data)
{

var xmlHttp = AJAX();
xmlHttp.onreadystatechange =  function(){
if(xmlHttp.readyState > 0 && xmlHttp.readyState < 4){
document.getElementById(divid).innerHTML=" <div id='txtHint' class='contentmsgbox'> <img src='img/loading.gif' /> </div>";
}
if (xmlHttp.readyState == 4) {
document.getElementById(divid).innerHTML="<div id='txtHint' class='contentmsgbox'>"+xmlHttp.responseText+"</div>";
}
}
xmlHttp.open("GET", url+"?"+data , true);
xmlHttp.send(); 
}



function getFormValues(fobj)
{
var str = "";
var valueArr = null;
var val = "";
var cmd = "";
for(var i = 0;i < fobj.elements.length;i++)
{
//alert(	fobj.elements[i].value);
switch(fobj.elements[i].type)

{
case "text": 
str += fobj.elements[i].name +
"=" + fobj.elements[i].value + "&";
break;
case "email": 
str += fobj.elements[i].name +
"=" + fobj.elements[i].value + "&";
break;
case "hidden": 
str += fobj.elements[i].name +
"=" + fobj.elements[i].value + "&";
break;
case "textarea":

str += fobj.elements[i].name +
"=" + fobj.elements[i].value + "&";
break;
case "select-one":
str += fobj.elements[i].name +
"=" + fobj.elements[i].options[fobj.elements[i].selectedIndex].value + "&";

break;

}

}

//str = str.substr(0,(str.length - 1));
return str;
}


function getFormValues2(fobj)
{
var str = "";
var valueArr = null;
var val = "";
var cmd = "";
for(var i = 0;i < fobj.elements.length;i++)
{
//alert(	fobj.elements[i].value);
switch(fobj.elements[i].type)

{
case "text": 
str += fobj.elements[i].name +
"=" + fobj.elements[i].value + "&";
break;
case "password": 
str += fobj.elements[i].name +
"=" + fobj.elements[i].value + "&";
break;
case "email": 
str += fobj.elements[i].name +
"=" + fobj.elements[i].value + "&";
break;
case "hidden": 
str += fobj.elements[i].name +
"=" + fobj.elements[i].value + "&";
break;
case "textarea":

str += fobj.elements[i].name +
"=" + fobj.elements[i].value + "&";
break;
case "select-one":
str += fobj.elements[i].name +
"=" + fobj.elements[i].options[fobj.elements[i].selectedIndex].value + "&";

break;

}

}

//str = str.substr(0,(str.length - 1));
return str;
}
