let seabar = document.getElementById('search-bar');
seabar.addEventListener("readystatechange", getRecSea());

function getRecSea() {
  let seabar2 = document.getElementById('search-bar');
  let url = "https://api.spoonacular.com/recipes/autocomplete?apiKey=9b63a2e942394efdbfea78104168032d&number=5&query=" + seabar2.value;
  let data = fetch(url).then(resp => resp.json().then(function(a) {
    console.log(a);
    return a;
  }, function(err) {
    console.log(err); // Error: "It broke"
  }));
  return data;
}

function createNode(element) {
  return document.createElement(element);
}

function append(parent, elm) {
  return parent.appendChild(elm);
}
