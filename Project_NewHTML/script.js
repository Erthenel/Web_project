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

function teleport(){
        window.location = "index.html";}