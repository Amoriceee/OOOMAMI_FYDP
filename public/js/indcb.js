let ml = document.getElementById('my_cb');
let myr = document.getElementById('myr');
let cbr = document.getElementById('cbr');

cookbookInfo();
likedInfo();
cbrInfo();

function cookbookInfo() {
  let data = fetch("../uploads/cookbook_data.json").then(resp => resp.json().then(function(a) {
    let mdata = a.filter(a => a.user_id == cID)[0];
    let fdata = mdata.cookbookList.filter(a => a.cookbook_id == cbID)[0];
    setDelBut(fdata);
    buildCookbookInfo(fdata);
  }, function(err) {
    console.log(err);
  }));
}

function buildCookbookInfo(c) {
    let li = createNode('li');
    li.classList.add('book');
    let a = createNode('a');
    a.href = "/cb/" + c.cookbook_id;
    let img = createNode('img');
    img.src = c.cookbook_cover;
    append(a, img);
    append(li, a);
    append(ml, li);
    document.getElementById('cng_cb').value = c.cookbook_name;
    document.getElementById('hid').value = cbID;
    if(c.cookbook_status == "public") document.getElementById('cbh3h3').checked = true;
}

function likedInfo() {
  let data = fetch("../uploads/htc_data.json").then(resp => resp.json().then(function(a) {
    let mdata = a.filter(a => a.user_id == cID)[0].htc;
    Object.keys(mdata).forEach(b => {
      buildPost(mdata[b]);
    });
    //mdata.forEach(buildLikedInfo);
  }, function(err) {
    console.log(err);
  }));
}

function setDelBut(data){
  document.getElementById('delbut').href = "/cb/" + data.cookbook_id + "/del";
}

function buildPost(c) {
  let div = createNode('div');
  let a = createNode('a');
  a.href = "../rec/" + c.id + "/";
  a.innerHTML = c.name;
  let form = createNode('form');
  form.id = "form_" + c.id;
  form.method = "POST";
  form.enctype = "multipart/form-data";
  form.action = "/cb/" + cbID;
  var csrfVar = $('meta[name="csrf-token"]').attr('content');
  $(form).append("<input name='_token' value='" + csrfVar + "' type='hidden'>");
  let hi = createNode('input');
  hi.type = "hidden";
  hi.name = 'hid_id';
  hi.value = c.id;
  let hin = createNode('input');
  hin.type = "hidden";
  hin.name = 'hid_name';
  hin.value = c.name;
  let sub = createNode('button');
  sub.name = "sub_add[]";
  sub.type = 'submit';
  sub.innerHTML = '<i class="fas fa-chevron-right fa-2x"></i>';
  append(form, hi);
  append(form, hin);
  append(form, sub);
  append(div, a);
  append(div, form)
  append(myr, div);
}

function cbrInfo() {
  let data = fetch("../uploads/cookbook_data.json").then(resp => resp.json().then(function(a) {
    let mdata = a.filter(a => a.user_id == cID)[0];
    let fdata = mdata.cookbookList.filter(a => a.cookbook_id == cbID)[0].cookbook_recipes;
    Object.keys(fdata).forEach(b => {
      buildCbrPost(fdata[b]);
    });
  }, function(err) {
    console.log(err);
  }));
}

function buildCbrPost(c) {
  console.log(c);
  let div = createNode('div');
  let a = createNode('a');
  a.href = "../rec/" + c.recipe_id + "/";
  a.innerHTML = c.recipe_name;
  let form = createNode('form');
  form.id = "form2_" + c.recipe_id;
  form.method = "POST";
  form.enctype = "multipart/form-data";
  form.action = "/cb/" + cbID;
  var csrfVar = $('meta[name="csrf-token"]').attr('content');
  $(form).append("<input name='_token' value='" + csrfVar + "' type='hidden'>");
  let hi = createNode('input');
  hi.type = "hidden";
  hi.name = 'hid_id';
  hi.value = c.recipe_id;
  let sub = createNode('button');
  sub.name = "sub_del[]";
  sub.type = 'submit';
  sub.innerHTML = '<i class="fas fa-times fa-2x"></i>';
  append(form, hi);
  append(form, sub);
  append(div, a);
  append(div, form)
  append(cbr, div);
}

function createNode(element) {
  return document.createElement(element);
}

function append(parent, elm) {
  return parent.appendChild(elm);
}
