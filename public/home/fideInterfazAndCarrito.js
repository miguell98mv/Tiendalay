const interfazUsuario = document.getElementById('interfazUsuario');
const interfazCart = document.getElementById('interfazCart');
const menu3 = document.getElementById('menu3');
const pUsuario = document.getElementById('pUsuario');
const imgUsuario = document.getElementById('imgUsuario');
const cerrarSession = document.getElementById('cerrarSession');
const spanCart = document.getElementById('spanCart');
const getClientImput = document.getElementById('getClientImput');

window.addEventListener('load', configWidthUsuario);

window.addEventListener('load', getCartClient);

imgUsuario.addEventListener('click', usuarioDisplay);

pUsuario.addEventListener('click', usuarioDisplay);

spanCart.addEventListener('click', cartDisplay);

window.addEventListener('click', function(e){
    
    if(e.target !== imgUsuario && e.target !== pUsuario && e.target !== interfazUsuario){
        interfazUsuario.animate({
            opacity: 0
        }, 300).onfinish = function(){
            interfazUsuario.style.display = 'none';
        };
    }
});

window.addEventListener('click', function(e){
    
    if(e.target !== interfazCart && e.target !== spanCart && e.target !== interfazCart.getElementsByClassName('divVacio')[0]){
        interfazCart.animate({
            opacity: 0
        }, 300).onfinish = function(){
            interfazCart.style.display = 'none';
        };
    }
});

if(cerrarSession){
    cerrarSession.addEventListener('click', function(){

        const http = new XMLHttpRequest;
        http.open('post', MYURL+'controller/gestor_de_contenido/log_in.php');
        http.send();
        
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                location.href = MYURL;
            }
        }
    });
}

window.addEventListener('resize', configWidthUsuario);


function cartDisplay(){

    if(getClientImput){
    if(interfazCart.style.display == 'block'){
        interfazCart.animate({
            opacity: 0
        }, 300).onfinish = function(){
            interfazCart.style.display = 'none';
        };
        
    }else{
        interfazCart.style.display = 'block';
    }
    }else{
        location.href = `${MYURL}cliente/iniciarSession`;
    }
}

function usuarioDisplay(){
    if(interfazUsuario.style.display == 'block'){
        interfazUsuario.animate({
            opacity: 0
        }, 300).onfinish = function(){
            interfazUsuario.style.display = 'none';
        };
        
    }else{
        interfazUsuario.style.display = 'block';
    }
   
}

function configWidthUsuario(){

    if(window.innerWidth <= 800){
        const positionLeft = imgUsuario.offsetLeft-imgUsuario.offsetWidth-40;
        interfazUsuario.style.left = positionLeft;
    }else{
        const positionLeft = imgUsuario.offsetLeft-imgUsuario.offsetWidth;
        interfazUsuario.style.left = positionLeft;
    }
}

function getCartClient(){

    if(getClientImput){
        const http = new XMLHttpRequest;
        http.open('post', MYURL+'controller/cliente/getCartClientController.php');
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.send(`client=${getClientImput.value}`);
    
        http.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){
                getArticles(this.responseText);
            }
        }
    }

}

function getArticles(data){
    interfazCart.innerHTML = '';
    data = JSON.parse(data);
    console.log(data);

    if(Object.keys(data).length){
        data.forEach(e =>{
            let divArticle = document.createElement('div');
            let divImage = document.createElement('div');
            let imgArticle = document.createElement('img');
            let pPrecio = document.createElement('p');
            let pArticle = document.createElement('p');
            let removeArticleCart = document.createElement('button');
    
            divArticle.setAttribute('class', 'divArticle');
            divImage.setAttribute('class', 'imgArticle');
            pPrecio.setAttribute('class', 'pPrecio');
            imgArticle.setAttribute('src', `${MYURL}assets/imagen_article/${e.image}`);
            pArticle.setAttribute('class', 'pArticle');
            removeArticleCart.setAttribute('onclick', `removeArticleCart(${e.idBuy})`);

            removeArticleCart.append('Quitar de carrito');
            pPrecio.append('$'+e.price);
            pArticle.append(e.name);
            divImage.append(imgArticle);
    
            
            divArticle.append(divImage);
            divArticle.append(pPrecio);
            divArticle.append(pArticle);
            divArticle.append(removeArticleCart);
    
            interfazCart.append(divArticle);
        });
    }else{
        let divArticle = document.createElement('div');
        divArticle.setAttribute('class', 'divVacio');
        divArticle.append('El carrito esta vacio');
        interfazCart.append(divArticle);
    }
}

function removeArticleCart(id){
    const http = new XMLHttpRequest;
    http.open('post', MYURL+'controller/cliente/removeArticleCartController.php');
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.send(`id=${id}`);
    
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            getCartClient();
        }
    }
}