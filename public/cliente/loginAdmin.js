const password = document.formulario.password;
const client = document.formulario.client;
const userLogin = document.formulario.userLogin;
const errorMensaje = document.getElementById('error');
const placeholderText = [client.placeholder, password.placeholder];
var error;



$("[name='botom']").click(function(){
    login();
});

function login(){
    error = false;
    const inputs = [client, password];
    

    for(let e in inputs){
        inputs[e].addEventListener('click', function(){ removeClass(this, e) });
        
        
        if( inputs[e].value===""){
            addClass(inputs[e]);
        }
    }


    if(!error){
        const http = new XMLHttpRequest;
        http.open('post', MYURL+'controller/gestor_de_contenido/log_in.php');
        http.send();
        let formulario = {email:client.value, password:password.value};
        $.post(MYURL+'controller/cliente/loginClientController.php', formulario, getClient);
    }
}


function getClient(datos){
   
    datos = JSON.parse(datos);

    if(datos.validate){
        userLogin.value = datos.user;
        password.value = '';

        document.formulario.submit();
    }else{
        errorMensaje.innerHTML = "<p>La contraseña o el email es incorrecto!</p>";
    }
}


function removeClass(myInput, e){
    myInput.placeholder = placeholderText[e];
    myInput.previousSibling.classList.remove("emptySpan"); 
    myInput.classList.remove("empty");   
}


function addClass(myInput){
    myInput.placeholder = 'Campo obligatorio';
    myInput.previousSibling.classList.add("emptySpan"); 
    myInput.classList.add("empty"); 
    error=true;
}