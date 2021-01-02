var url = document.getElementById('url').value;

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