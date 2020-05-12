let apiK = "85abbfe652cd4bf8a5335a721306b010";
let apiK2 = "9b63a2e942394efdbfea78104168032d";

getRecipeInfo(rid);
getSimilarById(rid);

function getRecipeInfo(id) {
  let url = "https://api.spoonacular.com/recipes/" + id + "/information?includeNutrition=true&apiKey=" + apiK;
  let data = fetch(url).then(resp => resp.json().then(function(data) {
    buildPost(data);
  }, function(err) {
    console.log(err);
  }));
}

function getSimilarById(id) {
  let url = "https://api.spoonacular.com/recipes/" + id + "/similar?&number=5&apiKey=" + apiK;
  let data = fetch(url).then(resp => resp.json().then(function(data) {
    data.forEach(buildSimilar);
  }, function(err) {
    console.log(err);
  }));
}

function buildPost(item){
  console.log(item);
  let recPost = document.getElementById('rec_grid');
  let article = createNode('article');
  article.classList.add('recipe');
  //title
  let title = createNode('h1'), serv = createNode('h2');
  title.innerHTML = item.title;
  serv.classList.add('servings');
  serv.innerHTML = "about " + item.servings + " servings";
  //divs
  let ic = createNode('div'), mb = createNode('div'), info = createNode('div'), inst = createNode('div');
  ic.classList.add('image_cover');
  mb.classList.add('main_block');
  info.classList.add('information');
  inst.classList.add('instructions');
  ic.style.backgroundImage = "url(" + item.image + ")";

  //information[ingredients]
  let ulinfo = createNode('ul');
  ulinfo.classList.add('ingredients');
  let institem = item.nutrition;
  institem.ingredients.forEach(b => {
      let li = createNode('li');
      li.innerHTML = b.amount + "" + b.unit + " <span>" + b.name + "</span>" ;
      append(ulinfo, li);
    });
  append(info, ulinfo);
  //information[nutrition]
  let ulnut = createNode('ul');
  ulnut.classList.add('nutrition');
  let nutitem = item.nutrition;
  nutitem.nutrients.slice(0, 8).forEach(b => {
      let li = createNode('li');
      li.style.height = li.style.width;
      li.innerHTML = b.title + ":<br>" + b.amount + b.unit;
      append(ulnut, li);
    });
  //Instructions
  item.analyzedInstructions.forEach(a => {
    a.steps.forEach(b => {
      let op = createNode('ol');
      let instli = createNode('li');
      instli.innerHTML = "<span>Step " + b.number + ":</span><br>" + b.step;
      instli.classList.add('instructions__step');
      append(op, instli);
      append(inst, op);
    });
  });
  /** LIKE FORM **/
  let hba = createNode('form');
  hba.classList.add('rb');
  hba.method = "POST";
  var csrfVar = $('meta[name="csrf-token"]').attr('content');
  $(hba).append("<input name='_token' value='" + csrfVar + "' type='hidden'>");
  let hid_id = createNode('input');
  hid_id.name = "id";
  hid_id.type = "hidden";
  hid_id.value = item.id;
  append(hba, hid_id);
  let hid_name = createNode('input');
  hid_name.name = "name";
  hid_name.type = "hidden";
  hid_name.value = item.title;
  append(hba, hid_name);
  let hid_image = createNode('input');
  hid_image.name = "image";
  hid_image.type = "hidden";
  hid_image.value = item.image;
  append(hba, hid_image);
  let heart_but = createNode('button');
  heart_but.type = 'submit';
  heart_but.innerHTML = '<i class="far fa-heart fa-ha"></i>';
  let rinfo = "http://127.0.0.1:8000/uploads/htc_data.json";
  let data = fetch(rinfo).then(resp => resp.json().then(function(data) {
    data.forEach(a => {
      if(a.user_id == cID) {
        let htc = a.htc;
        Object.keys(htc).forEach(b => {
          if(htc[b].id == rid){
            heart_but.innerHTML = '<i class="fa fa-heart fa-ha"></i>';
          }
        });
      }
    });
  }, function(err) {
    heart_but.innerHTML = '<i class="far fa-heart fa-ha"></i>';
  }));
  /** END **/

  let tdiv = createNode('div');
  tdiv.classList.add('tdiv');
  let tdh2 = createNode('h2');
  tdh2.innerHTML = 'Tags:'
  append(tdiv, tdh2);

  if(item.vegetarian) {
    let veg = createNode('button');
    veg.innerHTML = 'Vegetarian';
    append(tdiv, veg);
  }

  if(item.vegan) {
    let vega = createNode('button');
    vega.innerHTML = 'Vegan';
    append(tdiv, vega);
  }

  if(item.glutenFree) {
    let gf = createNode('button');
    gf.innerHTML = 'Gluten Free';
    append(tdiv, gf);
  }

  if(item.dairyFree) {
    let df = createNode('button');
    df.innerHTML = 'Dairy Free';
    append(tdiv, df);
  }

  if(item.veryHealthy) {
    let vh = createNode('button');
    vh.innerHTML = 'Very Healthy!';
    append(tdiv, vh);
  }

  if(item.cheap) {
    let cheap = createNode('button');
    cheap.innerHTML = 'cheap';
    append(tdiv, cheap);
  }

  if(item.veryPopular) {
    let vp = createNode('button');
    vp.innerHTML = 'Popular!';
    append(tdiv, vp);
  }

  if(item.sustainable) {
    let sus = createNode('button');
    sus.innerHTML = 'Sustainable';
    append(tdiv, sus);
  }

  append(hba, heart_but);
  append(mb, info);
  append(mb, inst);
  append(article, ic);
  append(article, title);
  append(article, serv);
  append(article, hba);
  append(article, ulnut);
  append(article, mb);
  append(article, tdiv);
  append(recPost, article);
}
function buildSimilar(item){
  let simgrid = document.getElementById('sim_grid');
  let fa = createNode('a');
  fa.href = '/rec/' + item.id;
  let divC = createNode('div'), divH = createNode('div'), divB = createNode('div');
  divC.classList.add('rec-card');
  divB.classList.add('rec-body');
  divC.style.backgroundImage = "url(" + item.image + ")";
  let hea = createNode('h2');
  hea.innerHTML = item.title;
  let hba = createNode('form');
  hba.classList.add('sim');
  hba.method = "POST";
  var csrfVar = $('meta[name="csrf-token"]').attr('content');
  $(hba).append("<input name='_token' value='" + csrfVar + "' type='hidden'>");
  let hid_id = createNode('input');
  hid_id.name = "id";
  hid_id.type = "hidden";
  hid_id.value = item.id;
  append(hba, hid_id);
  let hid_name = createNode('input');
  hid_name.name = "name";
  hid_name.type = "hidden";
  hid_name.value = item.title;
  append(hba, hid_name);
  let hid_image = createNode('input');
  hid_image.name = "image";
  hid_image.type = "hidden";
  hid_image.value = item.image;
  append(hba, hid_image);
  let heart_but = createNode('button');
  heart_but.type = 'submit';
  heart_but.innerHTML = '<i class="far fa-heart fa-ha"></i>';
  let rinfo = "http://127.0.0.1:8000/uploads/htc_data.json";
  let data = fetch(rinfo).then(resp => resp.json().then(function(data) {
    data.forEach(a => {
      if(a.user_id == cID) {
        let htc = a.htc;
        Object.keys(htc).forEach(b => {
          if(htc[b].id == rid){
            heart_but.innerHTML = '<i class="fa fa-heart fa-ha"></i>';
          }
        });
      }
    });
  }, function(err) {
    heart_but.innerHTML = '<i class="far fa-heart fa-ha"></i>';
  }));
  append(hba, heart_but);
  append(divB, hea);
  append(divB, hba);
  append(divC, divB);
  append(fa, divC);
  append(simgrid, fa);

}

function createNode(element) {
  return document.createElement(element);
}

function append(parent, elm) {
  return parent.appendChild(elm);
}
