var url = document.getElementById('url').value;
const spanMenuBoton = document.getElementById('spanMenuBoton');
const displayMenu = document.getElementsByClassName('menu_horizontal')[0];
const displayContent = document.getElementsByClassName('content')[0];

if(url==='contenido' || !url){
document.getElementById("contenido").classList.add('selection');}

if(url==='categorias'){
document.getElementById("categorias").classList.add('selection');}

if(url==='ventas'){
document.getElementById("ventas").classList.add('selection');}

$('#salir').click(function(){
   $.post(MYURL+'controller/gestor_de_contenido/log_in.php', home);
});

function home(){
window.location.href = MYURL;
}



spanMenuBoton.addEventListener('click', function(){

   if(document.getElementsByClassName('contentResponsi')[0]){
       displayContent.classList.remove('contentResponsi');
       displayContent.classList.add('contentResponsi2');
       displayMenu.classList.remove('menu_horizontalResponsi');
       displayMenu.classList.add('menu_horizontalResponsi2');
       spanMenuBoton.classList.remove('icon-cross');
       
    }else{
        displayMenu.classList.remove('menu_horizontalResponsi2');
       spanMenuBoton.classList.add('icon-cross');
       displayContent.classList.add('contentResponsi');
       displayContent.classList.remove('contentResponsi2');
       displayMenu.classList.add('menu_horizontalResponsi');
   }
  
});