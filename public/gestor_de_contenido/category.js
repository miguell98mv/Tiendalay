//VARIABLES
const category = document.formulario.categoria;
const descripcion = document.formulario.descripcion;
const añadir = document.getElementById('añadir');
const placeholderText = [category.placeholder, descripcion.placeholder];
const mensaje = document.getElementById('mensaje');
const tableCategory = document.querySelector('#tableCategory tbody');
const pagination = document.getElementById('paginacion');
var error = false;

if(document.formulario.urlname.value && !isNaN(document.formulario.urlname.value)){
    var urlName = parseInt(document.formulario.urlname.value);
}else{
    var urlName = 1;
}

//EVENTOS

window.onload = getArticles;

añadir.addEventListener('click', validate);

window.addEventListener('click', function(){
    mensaje.innerHTML = '';
    mensaje.classList.remove('error');
    mensaje.classList.remove('true');
});


//FUNCIONES
function validate(){
    error=false;
    const inputs = [category, descripcion];
    
    for(let e in inputs){
        inputs[e].addEventListener('focus', function(){ removeClass(this, e) });
        
        if( inputs[e].value===""){
            addClass(inputs[e]);
        }
    }

    if(!error){

        const http = new XMLHttpRequest;
        http.open('post', MYURL+'controller/gestor_de_contenido/addCategoryController.php');
        http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        http.send(`category=${category.value}&description=${descripcion.value}`);

        http.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){
                addCategory(this.responseText);
            }
        }
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

function addCategory(data){
    var data = JSON.parse(data);

    if(data.validate){
        category.value = '';
        descripcion.value = '';
        mensaje.classList.remove('error');
        mensaje.innerHTML = "";
        mensaje.classList.add('true');
        mensaje.innerHTML = "Se añadio una categoria con exito";
        getArticles();
    }else{
        mensaje.classList.remove('true');
        mensaje.innerHTML = "";
        mensaje.classList.add('error');
        mensaje.innerHTML = "Esta categoria ya existe";
    }
}


function getArticles(){
    const http = new XMLHttpRequest;

    http.open('POST', MYURL+'controller/gestor_de_contenido/getCategoryController.php');
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    http.send(`urlName=${urlName}`);
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
        
            var dataSetCategory = document.createElement('input');
            dataSetCategory.setAttribute('type', 'button');
            dataSetCategory.setAttribute('value', 'Eliminar');
            dataSetCategory.setAttribute('class', 'eliminar');
            dataSetCategory.setAttribute('data-value', e.Category);

            var dataEditCategory = document.createElement('input');
            dataEditCategory.setAttribute('onclick', `ir('${e.Category}')`);
            dataEditCategory.setAttribute('type', 'button');
            dataEditCategory.setAttribute('value', 'Editar');
            dataEditCategory.setAttribute('class', 'editar');
        

            while(newTds.length < 4){ 
                newTds.push(document.createElement("td")); 
            }
        
            for(let a=0; a<4; a++){
                tableCategory.append(newTr);
                newTr.append(newTds[a]);
            }

            newTds[0].append(e.Category);
            newTds[1].append(e.Description);
            newTds[2].classList.add('quitarPadding');
            newTds[2].append(dataEditCategory);
            newTds[3].classList.add('quitarPadding');
            newTds[3].append(dataSetCategory);
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
                boxPagination.setAttribute('href', `${MYURL}administrador/categorias/${a}`);

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

            http.open('POST', MYURL+'controller/gestor_de_contenido/removeCategoryController.php');
            http.send(idRemove);

            http.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    getArticles();
                }
            }
        });
    }
}

function ir(id){window.location.href = `${MYURL}administrador/categorias/edit/${id}`}