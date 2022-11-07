function toggleText() {

  document.getElementById('hideText').classList.toggle('showText');

  if(document.getElementById('hideText').classList.contains('showText')) {
    document.getElementById('readMore_btn').innerHTML = 'Ver menos'
  }
  else {
    document.getElementById('readMore_btn').innerHTML = 'Ver más'
  }
}