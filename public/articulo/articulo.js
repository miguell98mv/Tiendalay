const id = document.getElementById('url').value;
const cajaImage = document.getElementById('cajaImagen');
const categoria = document.getElementById('categoria');
const precio = document.getElementById('precio');
const tituloArticulo = document.getElementById('tituloArticulo');
const descripcion = document.getElementById('descripcion');

window.onload = getArticulo;

//FUNCIONES

function getArticulo(){

    const http = new XMLHttpRequest;
    http.open('post', MYURL+'controller/articulo/getArticuloController.php');
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.send(`id=${id}`);

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            getData(this.responseText);
        }
    }
}

function getData(data){

    data = JSON.parse(data);
    console.log(data);
    
    const image = document.createElement('img');
    image.setAttribute('src', `${MYURL}assets/imagen_article/${data[0].image}`);

    cajaImage.append(image);
    categoria.setAttribute('href', `${MYURL}categoria/${data[0].category}`);
    categoria.append(data[0].category);
    precio.append(`$${data[0].price}`);
    tituloArticulo.append(data[0].name);
    descripcion.append(data[0].description);
}