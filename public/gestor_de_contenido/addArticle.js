//VARIABLES
const articulo = document.formulario.articulo;
const descripcion = document.formulario.descripcion;
const precio = document.formulario.precio;
const costo = document.formulario.costo;
const errorImage = document.getElementById('mensaje');
const placeholderText = [articulo.placeholder, descripcion.placeholder, precio.placeholder, costo.placeholder];
var error;



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
    if(document.getElementById("backgrounPause").style.display == "block"){    
        document.getElementById("backgrounPause").style.display = "none";
        document.getElementById("validatePause").style.display = "none";
    }

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

        var request = new XMLHttpRequest();
        request.open("POST", MYURL+'controller/gestor_de_contenido/addArticleController.php');
        request.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                saludar(request.responseText);
              }
        }
        request.send(formData);
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


function saludar(data){
    let addArticle = JSON.parse(data);

    if(addArticle.validate){
        document.getElementById("filee").value='';
        document.getElementById('loadFileXml').value = 'Subir imagen';
        articulo.value='';
        costo.value='';
        descripcion.value='';
        precio.value='';
        errorImage.classList.add('true');
        errorImage.innerHTML = "Se añadio un nuevo articulo con exito";
    }else{
        console.log('error');
    }
}