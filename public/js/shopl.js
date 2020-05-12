let ml = document.getElementById('my_lists');

cLists();

function cLists() {
  let data = fetch("../uploads/shopping_data.json").then(resp => resp.json().then(function(a) {
    let mdata = a.filter(a => a.user_id == cID)[0];
    mdata.shoppingList.forEach(buildList);
  }, function(err) {
    console.log(err);
  }));
}

function buildList(l) {
  let lid = l.list_id;
  let tdiv = createNode('div');
  tdiv.classList.add('list_card');
  let hea = createNode('h2');
  hea.innerHTML = l.list_name;
  append(tdiv, hea);
  let axxx = createNode('a');
  axxx.classList.add('axxx');
  axxx.href = "/shopl/del/" + l.list_id;
  axxx.innerHTML = 'x';
  append(tdiv, axxx);
  //FORM
  let form = createNode('form');
  form.id = "form_" + l.list_id;
  form.method = "POST";
  form.enctype = "multipart/form-data";
  form.action = "/shopl";
  var csrfVar = $('meta[name="csrf-token"]').attr('content');
  $(form).append("<input name='_token' value='" + csrfVar + "' type='hidden'>");
  let hi = createNode('input');
  hi.type = "hidden";
  hi.name = 'hid';
  hi.value = l.list_id;
  append(form, hi);
  let fdiv = createNode('div');
  //LOAD
  if(l.list_items.length > 0 ){
    for (const [ key, value ] of Object.entries(l.list_items)) {
      for (const [k, v] of Object.entries(value)){
        console.log(v);
        //label
        let lab = createNode('label');
        lab.classList.add('item_lab');
        lab.id = "ib_" + k;
        //input checkbox
        let inp = createNode('input');
        inp.name = "hi[]"
        inp.type = 'checkbox';
        v == true ? inp.checked = true : inp.checked == false;
        let hinp = createNode('input');
        hinp.type = 'hidden';
        hinp.name = 'hi[]';
        hinp.value = k;
        //name span
        let span = createNode('span');
        span.innerHTML = k;
        //xspan
        let ax = createNode('button');
        ax.type = "button";
        ax.addEventListener("click", function(){
          lab.remove();
        });
        ax.innerHTML = 'x';
        let xspan = createNode('span');
        xspan.classList.add('xspan');
        append(xspan, ax);
        append(lab, hinp);
        append(lab, inp);
        append(lab, span);
        append(lab, xspan);
        append(fdiv, lab);
      }
    }
  }
  //ADD
  let adiv = createNode('div');
  adiv.classList.add('addi');
  let text = createNode('input');
  let button = createNode('input');
  text.type = 'text';
  text.placeholder = 'Forget Anything?';
  button.type = 'button';
  button.value = '➕';
  button.setAttribute('data-button','outline');
  button.addEventListener('click', function(){
    console.log(text.value);
    let lab = createNode('label');
    lab.classList.add('item_lab');
    //input checkbox
    let inp = createNode('input');
    inp.type = 'checkbox';
    inp.checked = false;
    let hinp = createNode('input');
    hinp.type = 'hidden';
    hinp.name = 'hi[]';
    hinp.value = text.value;
    //name span
    let span = createNode('span');
    span.innerHTML = text.value;
    //xspan
    let ax = createNode('button');
    ax.type = "button";
    ax.addEventListener("click", function(){
      lab.remove();
    });
    ax.innerHTML = 'x';
    let xspan = createNode('span');
    xspan.classList.add('xspan');
    append(xspan, ax);
    append(lab, hinp);
    append(lab, inp);
    append(lab, span);
    append(lab, xspan);
    append(fdiv, lab);
    //reset text
    text.value = '';
  });

  //submit
  let sub = createNode('input');
  sub.classList.add('fsub');
  sub.name = "sub[]";
  sub.value = 'Save Changes';
  sub.type = 'submit';

  append(adiv, text);
  append(adiv, button);
  append(form, fdiv);
  append(form, adiv);
  append(form, sub);
  append(tdiv, form);
  append(ml, tdiv);
}

function createNode(element) {
  return document.createElement(element);
}

function append(parent, elm) {
  return parent.appendChild(elm);
}
