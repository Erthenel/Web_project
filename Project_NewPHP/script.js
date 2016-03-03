function highlight(){
  var atags=document.getElementsByTagName('li');
  for(i in atags){
        if(document.location.href==atags[i].firstChild.href){
            atags[i].className = "active";
    } else {
           atags[i].className = "inactive";}
  }  
};

function flip_login_bar() {
    
 var arr1=document.getElementById('logblock1');
 var arr2=document.getElementById('logblock2');

 if (arr1.style.visibility=='hidden')
 {
    arr1.style.visibility='visible';
    arr2.style.visibility='visible';

 }else{
    arr1.style.visibility='hidden';
    arr2.style.visibility='hidden';

 }
   
}
function popUp(art_id){
 var arr2=document.getElementById('wrapbox'); 
    var arr3=document.getElementById('article_info');
    if (arr2.style.visibility=='hidden')
 {
    arr2.style.visibility='visible';
  arr3.value=art_id;
 }else{
    arr2.style.visibility='hidden';

 }
    
}


function DelCookieMin1()
{
  var id=new Date();
  var hash=new Date();
  id.setMinutes(0);
  hash.setMinutes(0);
  document.cookie="id=/; path=/; expires="+ id.toGMTString();
  document.cookie="hash=/; path=/; expires="+ hash.toGMTString();
 
  location.reload();
}

function teleport(){
        window.location = "index.php";}
function teleport2(){
        window.location = "add_article.php";}

function teleport3(arg1,arg2){
        window.location = "edit.php?id="+arg1+"&user="+arg2;}
function teleport4(arg1){
        window.location = "article.php?id="+arg1;}

function show_me_user(id){
    
    var arg1=document.getElementById('user_login_info'+id);
    var arg2=document.getElementById('user_login_info');
    if(id!=0){
                window.location = "user.php?login="+arg1.value;            } else{
        window.location = "user.php?login="+arg2.value;}
}

//работа с BB кодами

$(document).ready(function(){
 $('.bb_bar a').click(function() {
  var button_id = attribs = $(this).attr("alt");
     if ((button_id!='color')&&(button_id!='size')&&(button_id!='font')){
  button_id = button_id.replace(/\[.*\]/, '');
  if (/\[.*\]/.test(attribs)) { attribs = attribs.replace(/.*\[(.*)\]/, ' $1'); } else attribs = '';
  var start = '['+button_id+attribs+']';
  var end = '[/'+button_id+']';
     }
     else {
        if ((button_id!='color')&&(button_id!='font')) {var arr1=document.getElementById('size');  }
         else if (button_id=='color') { var arr1=document.getElementById('color');}  
         else { var arr1=document.getElementById('font_mult'); }
     button_id = button_id.replace(/\[.*\]/, '');
  if (/\[.*\]/.test(attribs)) { attribs = attribs.replace(/.*\[(.*)\]/, ' $1'); } else attribs = '';
  var start = '['+button_id+'='+arr1.value+attribs+']';
  var end = '[/'+button_id+']';
     } 
  insert(start, end);
  return false;
 });
});

 function insert(start, end) {
  element = document.getElementById('content');
  if (document.selection) {
   element.focus();
     // element.selectionStart = element.value.length;
      
   sel = document.selection.createRange();
   sel.text = start + sel.text + end;
  } else if (element.selectionStart || element.selectionStart == '0') {
   element.focus();
      //element.selectionStart = element.value.length;
   var startPos = element.selectionStart;
   var endPos = element.selectionEnd;
   element.value = element.value.substring(0, startPos) + start + element.value.substring(startPos, endPos) + end + element.value.substring(endPos, element.value.length);
  } else {
   element.value += start + end;
  }
 }

$.fn.hyphenate = function() {
	var RusA = "[абвгдеёжзийклмнопрстуфхцчшщъыьэюя]";
	var RusV = "[аеёиоуыэю\я]";
	var RusN = "[бвгджзклмнпрстфхцчшщ]";
	var RusX = "[йъь]";
	var Hyphen = "\xAD";
	
	var re1 = new RegExp("("+RusX+")("+RusA+RusA+")","ig");
	var re2 = new RegExp("("+RusV+")("+RusV+RusA+")","ig");
	var re3 = new RegExp("("+RusV+RusN+")("+RusN+RusV+")","ig");
	var re4 = new RegExp("("+RusN+RusV+")("+RusN+RusV+")","ig");
	var re5 = new RegExp("("+RusV+RusN+")("+RusN+RusN+RusV+")","ig");
	var re6 = new RegExp("("+RusV+RusN+RusN+")("+RusN+RusN+RusV+")","ig");
	console.log(this);
	this.each(function(){
		var text=$(this).html();
		text = text.replace(re1, "$1"+Hyphen+"$2");
		text = text.replace(re2, "$1"+Hyphen+"$2");
		text = text.replace(re3, "$1"+Hyphen+"$2");
		text = text.replace(re4, "$1"+Hyphen+"$2");
		text = text.replace(re5, "$1"+Hyphen+"$2");
		text = text.replace(re6, "$1"+Hyphen+"$2");
		$(this).html(text);
	});
};

function show_add_comms() {
    
 var arr1=document.getElementById('comms');


 if (arr1.style.display=='none')
 {
    arr1.style.display='inline-block';      
}
    
}
function show_add_comms2(id) {
   
 var arr1=document.getElementById('comms'+id);
var arr2=document.getElementById('show_comms'+id);

 if (arr1.style.display=='none')
 {
    arr1.style.display='block';  
     arr2.textContent="↑";
}
    else if (arr1.style.display=='block')
 {
    arr1.style.display='none';  
     arr2.textContent="↓";
}   
    
}
function show_add_comms3(id) {
   
 var arr1=document.getElementById('comms'+id);

 if (arr1.style.display=='none')
 {
    arr1.style.display='block';  

}
   
}


function popUp2(comm_id){

 var arr2=document.getElementById('wrapbox'); 
    var arr3=document.getElementById('comment_info');
    if (arr2.style.visibility=='hidden')
 {
    arr2.style.visibility='visible';
    arr3.value=comm_id;
   
 }else{
    arr2.style.visibility='hidden';
 }
    
}


