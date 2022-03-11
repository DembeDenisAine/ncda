
$(document).ready(function(){

var menu = document.querySelector('.menu');


function showMenu(x, y){

    console.log(x);
    console.log(y);

   menu.style.left = x /2+ 'px';
    menu.style.top = y/2 + 'px';
    menu.classList.add('show-menu');
}

function hideMenu(){
    menu.classList.remove('show-menu');
}

function onContextMenu(e){
    console.log(e);
    e.preventDefault();
    showMenu(e.pageX, e.pageY);
    document.addEventListener('click', onClick, false);
}

function onClick(e){
    hideMenu();
    document.removeEventListener('click', onClick);
}

document.addEventListener('contextmenu', onContextMenu, false);

});

