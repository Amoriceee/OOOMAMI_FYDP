let ff = document.getElementById('ff');
let mf = document.getElementById('mf');
let fc = document.getElementById('feed-container');
let myfc = document.getElementById('my-feed-container');

ff.addEventListener('click', function(){
  mf.classList.remove('fs-active');
  ff.classList.add('fs-active');
  fc.style.display = 'block';
  myfc.style.display = 'none';
});

mf.addEventListener('click', function(){
  ff.classList.remove('fs-active');
  mf.classList.add('fs-active');
  myfc.style.display = 'block';
  fc.style.display = 'none';
});

buildFeed();

function buildFeed() {
  let data = fetch("../uploads/data.json").then(resp => resp.json().then(function(result) {
  result.reverse().forEach(buildPost);
  result.filter(n => n.user_id == cID).forEach(buildMyPost);
  console.log(result);
  }, function(err) {
    console.log(err); // Error: "It broke"
  }));
}
function buildPost(item){
  let feedPosts = document.getElementById('feed-posts');

  //date
  let date = new Date(item.datetime_submitted);
  let dateNow = new Date();
  dateNow.getUTCDate();
  let seconds = ((dateNow.getTime() - date.getTime()) / 1000) - 3600;
  let feedDate = '';
  if (seconds < 60) {
    feedDate = "just now";
  } else if (seconds < 3600){
    let minutes = seconds / 60;
    feedDate = minutes.toFixed(0) + " minutes ago";
  } else if (seconds < 86400){
    let minutes = seconds / 60;
    let hours = minutes / 60;
    feedDate = hours.toFixed(0) + " hours ago";
  } else {
    let minutes = seconds / 60;
    let hours = minutes / 60;
    let days = hours / 24;
    let rh = hours % 24;
    if (rh.toFixed(0) == 1) {
      feedDate = days.toFixed(0) + " day " + rh.toFixed(0) + " hour ago";
    } else {
      feedDate = days.toFixed(0) + " day " + rh.toFixed(0) + " hours ago";
    }
  }
  //post item
  let li = createNode('li');
  li.classList.add('post');
  li.id = item.id;
  //divs
  let divC = createNode('div'), divH = createNode('div'), divB = createNode('div'), divF = createNode('div');
  divC.classList.add('post-content');
  divH.classList.add('post-header');
  divB.classList.add('post-body');
  divF.classList.add('post-footer');
  divB.style.backgroundImage = "url(" + item.path + ")";
  let use = createNode('h3');
  use.innerHTML = "<span>@" + item.user_name + "</span> posted this " + feedDate;
  //avatar
  let a = createNode('a');
  a.classList.add('post-avatar');
  a.style.backgroundImage = "url(" + item.dp + ")";
  //heart
  let aicon = createNode('a');
  aicon.href = "/lul/" + cID + "/" + item.id;
  let icon = createNode('i');
  if(item.liked_by.includes(cID)){
    icon.classList.add('fa');
  } else {
    icon.classList.add('far');
  }
  icon.classList.add('fa-heart');
  icon.classList.add('fa-ha');
  //like
  like = createNode('h3');
  if (item.liked_by.length == 1) {
    like.innerHTML = "<span>" + item.liked_by.length + " like</span>";
  } else if (item.liked_by.length > 1){
    like.innerHTML = "<span>" + item.liked_by.length + " likes</span>";
  }
  append(aicon, icon);
  append(divF, aicon);
  append(divF, like);
  append(divH, use);
  append(divC, divH);
  append(divC, divB);
  append(divC, divF);
  append(li, divC);
  append(li, a);
  append(feedPosts, li);
}

function buildMyPost(item){
  let feedPosts = document.getElementById('my-feed-posts');

  //date
  let date = new Date(item.datetime_submitted);
  let dateNow = new Date();
  dateNow.getUTCDate();
  let seconds = ((dateNow.getTime() - date.getTime()) / 1000) - 3600;
  let feedDate = '';
  if (seconds < 60) {
    feedDate = "just now";
  } else if (seconds < 3600){
    let minutes = seconds / 60;
    feedDate = minutes.toFixed(0) + " minutes ago";
  } else if (seconds < 86400){
    let minutes = seconds / 60;
    let hours = minutes / 60;
    feedDate = hours.toFixed(0) + " hours ago";
  } else {
    let minutes = seconds / 60;
    let hours = minutes / 60;
    let days = hours / 24;
    let rh = hours % 24;
    if (rh.toFixed(0) == 1) {
      feedDate = days.toFixed(0) + " day " + rh.toFixed(0) + " hour ago";
    } else {
      feedDate = days.toFixed(0) + " day " + rh.toFixed(0) + " hours ago";
    }
  }
  //post item
  let li = createNode('li');
  li.classList.add('post');
  li.id = item.id;
  //divs
  let divC = createNode('div'), divH = createNode('div'), divB = createNode('div'), divF = createNode('div');
  divC.classList.add('post-content');
  divH.classList.add('post-header');
  divB.classList.add('post-body');
  divF.classList.add('post-footer');
  divB.style.backgroundImage = "url(" + item.path + ")";
  let use = createNode('h3');
  use.innerHTML = "<span>@" + item.user_name + "</span> posted this " + feedDate;
  //avatar
  let a = createNode('a');
  a.classList.add('post-avatar');
  a.style.backgroundImage = "url(" + item.dp + ")";
  //heart
  let aicon = createNode('a');
  aicon.href = "/lul/" + cID + "/" + item.id;
  let icon = createNode('i');
  if(item.liked_by.includes(cID)){
    icon.classList.add('fa');
  } else {
    icon.classList.add('far');
  }
  icon.classList.add('fa-heart');
  icon.classList.add('fa-ha');
  //like
  like = createNode('h3');
  if (item.liked_by.length == 1) {
    like.innerHTML = "<span>" + item.liked_by.length + " like</span>";
  } else if (item.liked_by.length > 1){
    like.innerHTML = "<span>" + item.liked_by.length + " likes</span>";
  }
  append(aicon, icon);
  append(divF, aicon);
  append(divF, like);
  append(divH, use);
  append(divC, divH);
  append(divC, divB);
  append(divC, divF);
  append(li, divC);
  append(li, a);
  append(feedPosts, li);
}

function createNode(element) {
  return document.createElement(element);
}

function append(parent, elm) {
  return parent.appendChild(elm);
}
