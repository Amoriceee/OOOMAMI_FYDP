let ml = document.getElementById('my_cb');

cLists();

function cLists() {
  let data = fetch("../uploads/cookbook_data.json").then(resp => resp.json().then(function(a) {
    let mdata = a.filter(a => a.user_id == cID)[0];
    mdata.cookbookList.forEach(buildList);
  }, function(err) {
    console.log(err);
  }));
}

function buildList(c) {
    let li = createNode('li');
    let a = createNode('a');
    a.classList.add('book');
    a.href = "/cb/" + c.cookbook_id;
    let img = createNode('img');
    img.src = c.cookbook_cover;
    let h3 = createNode('h3');
    h3.innerHTML = c.cookbook_name;
    append(a, img);
    append(li, a);
    append(li, h3);
    append(ml, li);
}

function createNode(element) {
  return document.createElement(element);
}

function append(parent, elm) {
  return parent.appendChild(elm);
}
