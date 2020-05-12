document.getElementById('Recipie').style.display = 'block';

document.getElementById('rBut').onclick = function() {
  closeTabs();
  document.getElementById('Recipie').style.display = 'block';
}

document.getElementById('iBut').onclick = function() {
  closeTabs();
  document.getElementById('Ingredients').style.display = 'block';
}

function closeTabs(){
  document.getElementById('Recipie').style.display = 'none';
  document.getElementById('Ingredients').style.display = 'none';
}
