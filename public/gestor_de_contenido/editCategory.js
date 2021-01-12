//VARIABLES
const category = document.formulario.categoria;
const descripcion = document.formulario.descripcion;
const placeholderText = [category.placeholder, descripcion.placeholder];
var error;



//EVENTOS
document.formulario.añadir.addEventListener('click', function(){
    validate();
});  



//FUNCIONES
function validate(){

    error = false;
    const inputs = [category, descripcion];
    
    for(let e in inputs){
        inputs[e].addEventListener('focus', function(){ removeClass(this, e) });
        
        if( inputs[e].value===""){
            addClass(inputs[e]);
        }
    }

    if(!error){
        let formData = new FormData();
        formData.append('description', descripcion.value);
        formData.append('category', category.value);

        let http = new XMLHttpRequest();
        http.open("POST", MYURL+'controller/gestor_de_contenido/editCategoryController.php');
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                window.location.href = MYURL+'administrador/categorias'; 
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