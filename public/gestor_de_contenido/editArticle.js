//VARIABLES
const articulo = document.formulario.articulo;
const descripcion = document.formulario.descripcion;
const precio = document.formulario.precio;
const costo = document.formulario.costo;
const nameCategory = document.formulario.nameCategory;
const nameLabel = document.formulario.label;
const errorImage = document.getElementById('mensaje');
const placeholderText = [articulo.placeholder, descripcion.placeholder, precio.placeholder, costo.placeholder];
const category = document.getElementById('category');
const selectionCategory = document.getElementById('category');
const id = document.formulario.id;
var error;
 

for(let a=0; a<(category.options).length; a++){
    if(category.options[a].value === nameCategory.value){
        category.options[a].setAttribute('selected', '');
    }
}





//EVENTOS

window.onload = getSelectionCategory;

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
        formData.append('labelSelection', nameLabel.value);
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