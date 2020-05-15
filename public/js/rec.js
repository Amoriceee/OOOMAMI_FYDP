const cuisine = ["African", "American", "British", "Cajun", "Caribbean", "Chinese", "Eastern European", "European", "French", "German", "Greek", "Indian", "Irish", "Italian", "Japanese", "Jewish", "Korean", "Latin American", "Mediterranean", "Mexican", "Middle Eastern", "Southern", "Spanish", "Thai", "Vietnamese"];
const intolerance = ["Dairy", "Egg", "Gluten", "Grain", "Peanut", "Seafood", "Sesame", "Shellfish", "Soy", "Sulfite", "Tree Nut", "Wheat"];
const diets = ["Gluten Free", "Ketogenic", "Vegetarian", "Lacto-Vegetarian", "Ovo-Vegetarian", "Vegan", "Pescetarian", "Paleo", "Primal", "Whole30"];
const filters = document.getElementById('filters');
let res_grid = document.getElementById('results_grid');
let usrcus = [];
let usrint = [];
let usrdie = [];
let offset = 0;
let query = "";
let fun = "";
let maxpg = 0;

createFilterView();
createFormSubLis();
createItemButLis(usrcus, "cuisine");
createItemButLis(usrint, "intolerance");
createItemButLis(usrdie, "diets");
createFormButLis();
setData();
createPageButListener();
setPageNumber();

function findFun() {
  if(fun == "gqr") {
    console.log(fun);
    getQueryRecipe(query);
  } else if (fun == "ghr") {
    getHomeRecipeView();
  }
}

function createItemButLis(arr, str) {
  let x = 'li button.' + str;
  let but = document.querySelectorAll(x);
  but.forEach(a => {
    a.addEventListener("click", function(){
      if(arr.indexOf(this.value) > -1){
        arr = arr.filter(e => e !== this.value);
        this.classList.remove('active');
      } else {
        arr.push(this.value);
        this.classList.add('active');
      };
    });
  });
}

function createFormButLis() {
  let but_res = document.getElementById('but_res');
  let but_sea = document.getElementById('but_sea');
  but_res.addEventListener("click", function(){
    resetButLis();
    usrcus = [];
    usrint = [];
    usrdie = [];
    getHomeRecipeView();
  });
  but_sea.addEventListener("click", function(){
    getHomeRecipeView();
  });
}

function createPageButListener() {
  let but_l = document.getElementById('loff');
  let but_r = document.getElementById('roff');
  but_l.addEventListener("click", function(){
    (offset == 0) ? offset = 0 : offset = offset - 1;
    console.log(offset);
    setPageNumber();
    findFun();
  });
  but_r.addEventListener("click", function(){
    (offset == maxpg) ? offset = maxpg : offset = offset + 1;
    console.log(offset);
    setPageNumber();
    findFun();
  });
}

function setPageNumber(){
  document.getElementById('pg_id').innerHTML = "Page " + (offset + 1);
}

function createFormSubLis(){
  const fsub = document.getElementById('rec-sea');
  fsub.addEventListener("submit", function(e){
    e.preventDefault();
    let sb = document.getElementById('search-bar');
    getQueryRecipe(sb.value);
  });
}

function resetButLis() {
  const but = document.querySelectorAll('li button');
  but.forEach(a => {
    a.classList.remove('active');
  });
}

function createFilterView(){
  let div = createNode('div');
  //Cuisine
  let ul = createNode('ul');
  let cu = createNode('h2');
  cu.innerHTML = 'Cuisine';
  cuisine.forEach(a => {
    let li = createNode('li');
    let link = createNode('button');
    link.value = a;
    link.innerHTML = a;
    link.href = '';
    link.classList.add('cuisine');
    append(li, link);
    append(ul, li);
  });
  //Intolerance
  let ul2 = createNode('ul');
  let cu2 = createNode('h2');
  cu2.innerHTML = 'Intolerance';
  intolerance.forEach(a => {
    let li = createNode('li');
    let link = createNode('button');
    link.value = a;
    link.innerHTML = a;
    link.href = '';
    link.classList.add('intolerance');
    append(li, link);
    append(ul2, li);
  });
  //Diets
  let ul3 = createNode('ul');
  let cu3 = createNode('h2');
  cu3.innerHTML = 'Diets';
  diets.forEach(a => {
    let li = createNode('li');
    let link = createNode('button');
    link.value = a;
    link.innerHTML = a;
    link.href = '';
    link.classList.add('diets');
    append(li, link);
    append(ul3, li);
  });
  //fAppend
  let but_div = createNode('div');
  let but_res = createNode('button');
  let but_sea = createNode('button');
  but_res.innerHTML = "RESET";
  but_sea.innerHTML = "SUBMIT";
  but_res.value = "RESET";
  but_sea.value = "SUBMIT";
  but_res.id = "but_res";
  but_sea.id = "but_sea";
  but_res.classList.add('filter_func');
  but_sea.classList.add('filter_func');
  append(but_div, but_res);
  append(but_div, but_sea);
  append(div, cu2);
  append(div, ul2);
  append(div, cu3);
  append(div, ul3);
  append(div, cu);
  append(div, ul);
  append(filters, div);
  append(filters, but_div);
}

function getQueryRecipe(q) {
  (q != null) ? query = q : query = "";
  resetResults();
  fun = "gqr";
  let off = retOff();
  let ps = getURL();
  let url = "https://api.spoonacular.com/recipes/complexSearch" + ps + "&query=" + query + "&number=15&offset=" + off + "&sort=popularity&apiKey=9b63a2e942394efdbfea78104168032d";
  let data = fetch(url).then(resp => resp.json().then(function(data) {
    data.results.forEach(buildPost);
    maxpg = data.totalResults / 15;
  }, function(err) {
    console.log(err);
  }));
}

function getHomeRecipeView() {
  resetResults();
  fun = "ghr";
  let off = retOff();
  let ps = getURL();
  let url = "https://api.spoonacular.com/recipes/complexSearch" + ps + "&number=15&offset=" + off + "&sort=popularity&apiKey=9b63a2e942394efdbfea78104168032d";
  let data = fetch(url).then(response => response.json().then(function(data) {
    console.log(data);
    maxpg = data.totalResults / 15;
    console.log(maxpg);
    data.results.forEach(buildPost);
  })
  .catch(err => {
    console.log(err);
  }));
}

function getURL() {
  let cur_url = "?cuisine=";
  usrcus.forEach(a => cur_url = cur_url + "" + a + "&");
  let die_url = "&diet=";
  usrdie.forEach(a => die_url = die_url + "" + a + "&");
  let int_url = "&intolerance=";
  usrint.forEach(a => int_url = int_url + "" + a + "&");
  return cur_url + die_url + int_url
}

function retOff(){
  return offset * 10;
}

function buildPost(item) {
  let div = document.getElementById('rg');
  let fa = createNode('a');
  fa.href = '/rec/' + item.id;
  let divC = createNode('div'), divH = createNode('div'), divB = createNode('div');
  divC.classList.add('rec-card');
  divB.classList.add('rec-body');
  divC.style.backgroundImage = "url(" + item.image + ")";
  let hea = createNode('h2');
  hea.innerHTML = item.title;
  append(divB, hea);
  append(divC, divB);
  append(fa, divC);
  append(div, fa);
  append(res_grid, div);
}

function setData() {
  let data = fetch("../uploads/int_data.json").then(resp => resp.json().then(function(a) {
    a.filter(f => f.user_id == cID).forEach(b => {
      if(b.Dairy == "false") usrint.push("Dairy");
      if(b.Egg == "false") usrint.push("Egg") ;
      if(b.Gluten == "false") usrint.push("Gluten");
      if(b.Grain == "false") usrint.push("Grain");
      if(b.Peanut == "false") usrint.push("Peanut");
      if(b.Seafood == "false") usrint.push("Seafood");
      if(b.Sesame == "false") usrint.push("Sesame");
      if(b.Shellfish == "false") usrint.push("Shellfish");
      if(b.Soy == "false") usrint.push("Soy");
      if(b.Sulfite == "false") usrint.push("Sulfite");
      if(b.Tree == "false") usrint.push("Tree Nut");
      if(b.Wheat == "false") usrint.push("Wheat");
    });
    let x = 'li button.intolerance';
    let but = document.querySelectorAll(x);
    but.forEach(b => {
      if(usrint.includes(b.value)) b.classList.add('active');
    });

  }, function(err) {
    console.log(err);
  }));
  let data2 = fetch("../uploads/die_data.json").then(resp => resp.json().then(function(a) {
    a.filter(f => f.user_id == cID).forEach(b => {
      if(b.Gluten == "true") usrdie.push("Gluten Free");
      if(b.Ketogenic == "true") usrdie.push("Ketogenic") ;
      if(b.Vegetarian == "true") usrdie.push("Vegetarian");
      if(b.Lacto == "true") usrdie.push("Lacto-Vegetarian");
      if(b.Ovo == "true") usrdie.push("Ovo-Vegetarian");
      if(b.Vegan == "true") usrdie.push("Vegan");
      if(b.Pescetarian == "true") usrdie.push("Pescetarian");
      if(b.Paleo == "true") usrdie.push("Paleo");
      if(b.Primal == "true") usrdie.push("Primal");
      if(b.Whole30 == "true") usrdie.push("Whole30");
    });
    let x = 'li button.diets';
    let but = document.querySelectorAll(x);
    but.forEach(b => {
      if(usrdie.includes(b.value)) b.classList.add('active');
    });

  }, function(err) {
    console.log(err);
  }));
}

function everyOther() {
  let eo = res_grid.querySelectorAll('div.rec-head').forEach(function(node,i){
    if(i % 2 == 0) node.classList.add("fr");
  });
}

function resetResults() {
  return document.getElementById('rg').innerHTML = '';
}

function createNode(element) {
  return document.createElement(element);
}

function append(parent, elm) {
  return parent.appendChild(elm);
}
