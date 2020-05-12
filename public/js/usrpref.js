const intolerance = ["Dairy", "Egg", "Gluten", "Grain", "Peanut", "Seafood", "Sesame", "Shellfish", "Soy", "Sulfite", "Tree Nut", "Wheat"];
const diets = ["Gluten Free", "Ketogenic", "Vegetarian", "Lacto-Vegetarian", "Ovo-Vegetarian", "Vegan", "Pescetarian", "Paleo", "Primal", "Whole30"];

setDP();
setMDi();
setMDd();
setMDChecked();

function setDP() {
  let dp = document.getElementById('usr_dp');
  dp.style.backgroundImage = "url(" + dpp + ")";
}

function setMDi() {
  let md = document.getElementById('mdint');
  let hea = createNode('h1');
  hea.innerHTML = 'Intolerances'
  append(md, hea);
  intolerance.forEach(a => {
    let div = createNode('div');
    div.classList.add('yndiv')
    let n = createNode('input');
    n.setAttribute("type", "checkbox");
    n.id = a;
    n.value = a;
    n.name = a;
    n.classList.add('tgl')
    n.classList.add('tgl-flip');
    n.checked = true;
    let tag = createNode('h3');
    tag.innerHTML = a;
    let lab = createNode('label');
    lab.htmlFor = a;
    lab.classList.add('tgl-btn');
    lab.setAttribute("data-tg-on", "YUM!");
    lab.setAttribute("data-tg-off", "ICK!");
    append(div, tag);
    append(div, n);
    append(div, lab);
    append(md, div);
  });

  let subdiv = createNode('div');
  let sub = createNode('input');
  sub.name = "submit";
  sub.value = "SET INTOLERANCE PREFERENCES";
  sub.setAttribute("type", "submit");
  append(subdiv, sub);
  append(md, subdiv);
}

function setMDd() {
  let md = document.getElementById('mddie');
  let hea = createNode('h1');
  hea.innerHTML = 'Diets'
  append(md, hea);
  diets.forEach(a => {
    let div = createNode('div');
    div.classList.add('yndiv2')
    let n = createNode('input');
    n.setAttribute("type", "checkbox");
    n.id = a;
    n.value = a;
    n.name = a;
    n.classList.add('tgl')
    n.classList.add('tgl-flip');
    let tag = createNode('h3');
    tag.innerHTML = a;
    let lab = createNode('label');
    lab.htmlFor = a;
    lab.classList.add('tgl-btn');
    lab.setAttribute("data-tg-on", "YES!");
    lab.setAttribute("data-tg-off", "NOPE!");
    append(div, tag);
    append(div, n);
    append(div, lab);
    append(md, div);
  });

  let subdiv = createNode('div');
  let sub = createNode('input');
  sub.name = "submit";
  sub.value = "SET DIET PREFERENCES";
  sub.setAttribute("type", "submit");
  append(subdiv, sub);
  append(md, subdiv);
}

function setMDChecked() {
  let data = fetch("../uploads/int_data.json").then(resp => resp.json().then(function(a) {
    a.forEach(b => {
      (b.Dairy == "true") ? document.getElementById("Dairy").checked = true : document.getElementById("Dairy").checked = false;
      (b.Egg == "true") ? document.getElementById("Egg").checked = true : document.getElementById("Egg").checked = false;
      (b.Gluten == "true") ? document.getElementById("Gluten").checked = true : document.getElementById("Gluten").checked = false;
      (b.Grain == "true") ? document.getElementById("Grain").checked = true : document.getElementById("Grain").checked = false;
      (b.Peanut == "true") ? document.getElementById("Peanut").checked = true : document.getElementById("Peanut").checked = false;
      (b.Seafood == "true") ? document.getElementById("Seafood").checked = true : document.getElementById("Seafood").checked = false;
      (b.Sesame == "true") ? document.getElementById("Sesame").checked = true : document.getElementById("Sesame").checked = false;
      (b.Shellfish == "true") ? document.getElementById("Shellfish").checked = true : document.getElementById("Shellfish").checked = false;
      (b.Soy == "true") ? document.getElementById("Soy").checked = true : document.getElementById("Soy").checked = false;
      (b.Sulfite == "true") ? document.getElementById("Sulfite").checked = true : document.getElementById("Sulfite").checked = false;
      (b.Tree == "true") ? document.getElementById("Tree Nut").checked = true : document.getElementById("Tree Nut").checked = false;
      (b.Wheat == "true") ? document.getElementById("Wheat").checked = true : document.getElementById("Wheat").checked = false;
    });
  }, function(err) {
    console.log(err);
  }));
  let data2 = fetch("../uploads/die_data.json").then(resp => resp.json().then(function(a) {
    a.forEach(b => {
      (b.Gluten == "true") ? document.getElementById("Gluten Free").checked = true : document.getElementById("Gluten Free").checked = false;
      (b.Ketogenic == "true") ? document.getElementById("Ketogenic").checked = true : document.getElementById("Ketogenic").checked = false;
      (b.Vegetarian == "true") ? document.getElementById("Vegetarian").checked = true : document.getElementById("Vegetarian").checked = false;
      (b.Lacto == "true") ? document.getElementById("Lacto-Vegetarian").checked = true : document.getElementById("Lacto-Vegetarian").checked = false;
      (b.Ovo == "true") ? document.getElementById("Ovo-Vegetarian").checked = true : document.getElementById("Ovo-Vegetarian").checked = false;
      (b.Vegan == "true") ? document.getElementById("Vegan").checked = true : document.getElementById("Vegan").checked = false;
      (b.Pescetarian == "true") ? document.getElementById("Pescetarian").checked = true : document.getElementById("Pescetarian").checked = false;
      (b.Paleo == "true") ? document.getElementById("Paleo").checked = true : document.getElementById("Paleo").checked = false;
      (b.Primal == "true") ? document.getElementById("Primal").checked = true : document.getElementById("Primal").checked = false;
      (b.Whole30 == "true") ? document.getElementById("Whole30").checked = true : document.getElementById("Whole30").checked = false;
    });
  }, function(err) {
    console.log(err);
  }));
}

function createNode(element) {
  return document.createElement(element);
}

function append(parent, elm) {
  return parent.appendChild(elm);
}
