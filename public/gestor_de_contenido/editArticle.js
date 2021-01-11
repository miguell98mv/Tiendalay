//VARIABLES
const articulo = document.formulario.articulo;
const descripcion = document.formulario.descripcion;
const precio = document.formulario.precio;
const costo = document.formulario.costo;
const nameCategory = document.formulario.nameCategory;
const nameLabel = document.formulario.nameLabel;
const errorImage = document.getElementById('mensaje');
const placeholderText = [articulo.placeholder, descripcion.placeholder, precio.placeholder, costo.placeholder];
const category = document.getElementById('category');
const labelSelection = document.getElementById('labelSelection');
const id = document.formulario.id;
var error;
 

for(let a=0; a<(category.options).length; a++){
    if(category.options[a].value === nameCategory.value){
        category.options[a].setAttribute('selected', '');
    }
}

for(let a=0; a<(labelSelection.options).length; a++){
    if(labelSelection.options[a].value === nameLabel.value){
        labelSelection.options[a].setAttribute('selected', '');
    }
}





//EVENTOS
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
    const inputs = [articulo, descripcion, precio, costo];
    
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

    if(!error){
        let formData = new FormData();
        formData.append('photo', document.getElementById("filee").files[0]);
        formData.append('name', articulo.value);
        formData.append('description', descripcion.value);
        formData.append('price', precio.value);
        formData.append('cost', costo.value);
        formData.append('category', category.value);
        formData.append('labelSelection', labelSelection.value);
        formData.append('id', id.value);

        let http = new XMLHttpRequest();
        http.open("POST", MYURL+'controller/gestor_de_contenido/editArticleController.php');
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                window.location.href = MYURL+'administrador/contenido';
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


function viewData(data){

    var n= document.querySelectorAll('td');
    n.forEach(e=>{
        e.remove();
    });

    data = JSON.parse(data);

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
        newTds[6].append(dataEditArticle);
        newTds[7].append(dataSetArticle);
    });
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
                }
            }
        });
    }
}

function ir(id){window.location.href = `${MYURL}administrador/contenido/edit/${id}`}