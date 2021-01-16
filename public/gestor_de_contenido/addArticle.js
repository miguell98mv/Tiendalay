//VARIABLES
const articulo = document.formulario.articulo;
const descripcion = document.formulario.descripcion;
const precio = document.formulario.precio;
const costo = document.formulario.costo;
const errorImage = document.getElementById('mensaje');
const tableArticles = document.querySelector('#tableArticles tbody');
const category = document.getElementById('category');
const labelSelection = document.getElementById('label');
const pagination = document.getElementById('paginacion');
const selectionCategory = document.getElementById('category');
const placeholderText = [labelSelection.placeholder ,articulo.placeholder, descripcion.placeholder, precio.placeholder, costo.placeholder];


var error;

if(document.formulario.urlname.value && !isNaN(document.formulario.urlname.value)){
    var urlName = parseInt(document.formulario.urlname.value);
}else{
    var urlName = 1;
}



//EVENTOS

window.onload = getArticles;

document.formulario.añadir.addEventListener('click', function(){
    validate();
});

document.getElementById('filee').addEventListener('input', function(){
    let photo = document.getElementById("filee").files[0];
    if(photo){
    document.getElementById('loadFileXml').value = photo.name;
    }
});

document.getElementById('loadFileXml').addEventListener('click', function(){
    errorImage.classList.remove('error');
    errorImage.innerHTML = "";
});

window.addEventListener('click',function(){
    
    if(errorImage.classList.contains('true')){
        errorImage.classList.remove('true');
        errorImage.innerHTML = "";
    }
});

    



//FUNCIONES
function validate(){

    let photo = document.getElementById("filee").files[0];
    error = false;
    const inputs = [articulo, descripcion, precio, costo, labelSelection];
    
    for(let e in inputs){
        inputs[e].addEventListener('focus', function(){ removeClass(this, e) });
        
        if( inputs[e].value===""){
            addClass(inputs[e]);
        }
    }

    if(isNaN(costo.value)){
        costo.value='';
        costo.placeholder = 'Solo numeros';
        costo.classList.add("empty"); 
        error=true;
    }

    if(isNaN(precio.value)){
        precio.value='';
        precio.placeholder = 'Solo numeros';
        precio.classList.add("empty"); 
        error=true;
    }

    if(!photo){
        errorImage.classList.remove('true');
        errorImage.innerHTML = "";
        errorImage.classList.add('error');
        errorImage.innerHTML = "Debes subir una imagen de su articulo";
        error=true;
    }

    if(!error){
        let formData = new FormData();
        formData.append('photo', document.getElementById("filee").files[0]);
        formData.append('name', articulo.value);
        formData.append('description', descripcion.value);
        formData.append('price', precio.value);
        formData.append('cost', costo.value);
        formData.append('category', category.value);
        formData.append('labelSelection', labelSelection.value);

        let http = new XMLHttpRequest();
        http.open("POST", MYURL+'controller/gestor_de_contenido/addArticleController.php');
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                getData(this.responseText);
              }
        }
        http.send(formData);
    }
}



function removeClass(myInput, e){
    myInput.placeholder = placeholderText[e]; 
    myInput.classList.remove("empty");   
}


function addClass(myInput){
    myInput.placeholder = 'Campo obligatorio';
    myInput.classList.add("empty"); 
    error=true;
}



function getData(data){
    let addArticle = JSON.parse(data);

    if(addArticle.validate){
        document.getElementById("filee").value='';
        document.getElementById('loadFileXml').value = 'Subir imagen';
        articulo.value='';
        costo.value='';
        descripcion.value='';
        precio.value='';
        labelSelection.value='';
        errorImage.classList.add('true');
        errorImage.innerHTML = "Se añadio un nuevo articulo con exito";
        getArticles();
        eliminar();
    }else{
        errorImage.classList.remove('true');
        errorImage.innerHTML = "";
        errorImage.classList.add('error');
        errorImage.innerHTML = "Error no se pudo añadir el articulo";
    }
}

function getArticles(){
    getSelectionCategory();
    const http = new XMLHttpRequest;
     let formData = new FormData;
     
    formData.append('urlName', urlName);
    http.open('POST', MYURL+'controller/gestor_de_contenido/getArticleController.php');
    http.send(formData);
    http.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            viewData(http.responseText);
        }
    }
}

function viewData(data){

    var n= document.querySelectorAll('td');
    n.forEach(e=>{
        e.remove();
    });

    data = JSON.parse(data);
    let totalPaginas = data[data.length-1];
    data.pop();
    
    if(data){
        data.forEach(e => {
            
            var newTr = document.createElement("tr");
            var newTds = [];
        
            var dataSetArticle = document.createElement('input');
            dataSetArticle.setAttribute('type', 'button');
            dataSetArticle.setAttribute('value', 'Eliminar');
            dataSetArticle.setAttribute('class', 'eliminar');
            dataSetArticle.setAttribute('data-value', e.id);

            var dataEditArticle = document.createElement('input');
            dataEditArticle.setAttribute('type', 'button');
            dataEditArticle.setAttribute('onclick', `ir(${e.id})`);
            dataEditArticle.setAttribute('value', 'Editar');
            dataEditArticle.setAttribute('class', 'editar');
        

            while(newTds.length < 8){ 
                newTds.push(document.createElement("td")); 
            }
        
            for(let a=0; a<8; a++){
                tableArticles.append(newTr);
                newTr.append(newTds[a]);
            }

            newTds[0].append(e.name);
            newTds[1].append(e.price);
            newTds[2].append(e.cost);
            newTds[3].append(e.description);
            newTds[4].append(e.category);
            newTds[5].append(e.label);
            newTds[6].classList.add('quitarPadding');
            newTds[6].append(dataEditArticle);
            newTds[7].classList.add('quitarPadding');
            newTds[7].append(dataSetArticle);
        });

        switch(urlName){

            case 1:case 2:case 3:
                var inicioPagination = 1;
                var finPagination = 5;
            break;

            case totalPaginas:case totalPaginas-1:
                var inicioPagination = totalPaginas-4;
                var finPagination = totalPaginas;
            break;

            default:
                var inicioPagination = urlName-2;
                var finPagination = urlName+2;
            break;

        }
        
        pagination.innerHTML = '';
        for(let a=inicioPagination; a<=finPagination; a++){

            if(a>0 && a<totalPaginas+1){
                let boxPagination = document.createElement('a');
                boxPagination.append(a);
                boxPagination.setAttribute('href', `${MYURL}administrador/contenido/${a}`);

                if(urlName===a){
                    boxPagination.setAttribute('id', 'selectionHref');
                }

                pagination.append(boxPagination);
            }
        }
    }
    eliminar();
}

function eliminar(){
    let eventClick = document.getElementsByClassName('eliminar');

    for(let a=0; a<eventClick.length; a++){
        eventClick[a].addEventListener('click', function(){
            
            let http = new XMLHttpRequest;
            let idRemove = new FormData();
            idRemove.append('id', this.dataset.value);

            http.open('POST', MYURL+'controller/gestor_de_contenido/removeArticleController.php');
            http.send(idRemove);

            http.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    getArticles();
                }
            }
        });
    }
}

function ir(id){window.location.href = `${MYURL}administrador/contenido/edit/${id}`}


function getSelectionCategory(){

    const http = new XMLHttpRequest;

    http.open('post', MYURL+'controller/gestor_de_contenido/getSelectionCategory.php');
    http.send();

    http.onreadystatechange = function (){
        if(http.readyState === 4 && http.status === 200){
            setSelection(this.responseText);
        }
    }
}

function setSelection(data){

    data = JSON.parse(data);

    data.forEach(e =>{
        let setOption = document.createElement('option');
        setOption.append(e);
        selectionCategory.append(setOption);
    });
}