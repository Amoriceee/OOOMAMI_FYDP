window.onload = function(){
document.querySelector('.con').className = "con";
}
var c = 0;
function open_close(){
  if(c % 2 == 0){
document.querySelector('.con').className = "con con-a";
c++;
  }else {
document.querySelector('.con').className = "con";
c++;
  }
}
