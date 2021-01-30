const userName = document.formulario.userName;
const email = document.formulario.email;
const password = document.formulario.password;
const confirm2 = document.formulario.confirm;
const placeholderText = [userName.placeholder, email.placeholder, password.placeholder, confirm2.placeholder];
const errorMensaje = document.getElementById('error');
var error;

document.formulario.botom.addEventListener('click', function(){
    validate();
});

function validate(){
    error = false;
    const inputs = [userName, email, password, confirm2];
    
    for(let e in inputs){
        inputs[e].addEventListener('click', function(){ removeClass(this, e) });
        
        if( inputs[e].value===""){
            addClass(inputs[e]);
        }
    }

    if(password.value !== confirm2.value && password.value !== '' && confirm2.value !== ''){
        addClass(inputs[3]); confirm2.value = ''; confirm2.placeholder = 'La contraseña no concide';
    }

    if(!error){
        const http = new XMLHttpRequest;
        http.open('POST', MYURL+'controller/cliente/newClientController.php');
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.send(`password=${password.value}&userName=${userName.value}&email=${email.value}`);

        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                setUserClient(this.responseText);
            }
        }
    }
}

function setUserClient(data){
    
    if(data!=0){
       location.href = MYURL+'cliente/iniciarSession'; 
    }else{
        errorMensaje.innerHTML = "<p>El email que usted escribio ya existe!</p>";
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