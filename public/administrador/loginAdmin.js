const password = document.formulario.password;
const email = document.formulario.email;
const userLogin = document.formulario.userLogin;
const emailLogin = document.formulario.emailLogin;
const passwordLogin = document.formulario.passwordLogin;

const placeholderText = [email.placeholder, password.placeholder];
var error;

$("[name='botom']").click(function(){
    login();
});

function login(){
    error = false;
    const inputs = [email, password];
    

    for(let e in inputs){
        inputs[e].addEventListener('click', function(){ removeClass(this, e) });
        
        
        if( inputs[e].value===""){
            addClass(inputs[e]);
        }
    }


    if(!error){
        let formulario = {email:email.value, password:password.value};
        $.post('controller/administrador/loginAdminController.php', formulario, saluda);
    }
}


function saluda(datos){
    var loginData = JSON.parse(datos);
    userLogin.value = loginData.user;
    emailLogin.value = loginData.email;
    passwordLogin.value = loginData.password;
    
    if(!loginData.validate){
        let father = document.getElementById('error');
        
        father.innerHTML = "<p>La contraseña o el email es incorrecto!</p>";
    }else{
        document.formulario.submit();
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