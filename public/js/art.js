let url = window.location.href;
let artno = url.split("/").pop();

buildTH();

function buildTH() {
  let data = fetch("../data/articles.json").then((resp) => resp.json().then(function(data) {
    let key = contentByID(data, artno)[0];
    let keycon = key.art;
    keycon.forEach(a => buildCON(a));
    let tag = createNode('span');
    let bl = createNode('div');
    let hea = createNode('H1');
    let pt1 = createNode('p'), pt2 = createNode('p'), pt3 = createNode('p');
    bl.classList.add('hl');
    pt2.classList.add('t');
    pt3.classList.add('t');
    tag.innerHTML = key.tag;
    hea.innerHTML = key.header;
    pt1.innerHTML = key.description;
    pt2.innerHTML = key.by_auth;
    pt3.innerHTML = key.date;
    ban.style.backgroundImage = key.img;
    append(th, tag);
    append(th, hea);
    append(th, bl);
    append(th, pt1);
    append(th, pt2);
    append(th, pt3);
  }));
}

function buildCON(a){
  let con = document.getElementById('con');
  let par = createNode('p');
  par.innerHTML = a;
  append(con, par);
}

function contentByID(data, id) {
    for (var i = 0; i < data.length; i++) {
        if (data[i].id == id) {
            return(data[i].content);
        }
    }
}

function createNode(element) {
  return document.createElement(element);
}

function append(parent, elm) {
  return parent.appendChild(elm);
}
