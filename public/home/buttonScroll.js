const sessionCategory = document.getElementsByClassName("sessionCategory");


//EVENTOS
setEventos();

window.addEventListener('resize', function(){
 setEventos();
});




//FUNCIONES
function botonScrollLeft(boton){
    
    let maxScrollLeft = boton.parentElement.scrollWidth - boton.parentElement.clientWidth;
    let medirScroll =  boton.parentElement.scrollLeft;

    boton.parentElement.scrollBy({
        top: 0,
        left: +300,
        behavior: "smooth"
      })

      setTimeout(function(){

        console.log(maxScrollLeft);
        console.log(boton.parentElement.scrollLeft);

        if(maxScrollLeft == boton.parentElement.scrollLeft){
            boton.classList.remove('buttonScroll');
            boton.style.display = 'none'   
        }
        
        boton.nextElementSibling.classList.add('buttonScrollLeft');
        boton.nextElementSibling.style.display = 'block';
      }, 400);    
}



function botonScrollRight(boton){

    boton.parentElement.scrollBy({
        top: 0,
        left: -300,
        behavior: "smooth"
      })

      setTimeout(function(){
        if(boton.parentElement.scrollLeft == 0){
            boton.classList.remove('buttonScrollLeft');
            boton.style.display = 'none';  
        }
        
        boton.previousElementSibling.classList.add('buttonScroll');
        boton.previousElementSibling.style.display = 'block';
      }, 400); 
}



function botonScrollHiden(){
    let botonDeScroll = this.getElementsByClassName('buttonScroll')[0];
    let botonDeScrollLeft =this.getElementsByClassName('buttonScrollLeft')[0];

    if(botonDeScrollLeft){
        botonDeScrollLeft.style.display = 'none';
    }

    if(botonDeScroll){
        botonDeScroll.style.display = 'none';
    }
    
}



function botonScrollVisible(){
    let botonDeScroll = this.getElementsByClassName('buttonScroll')[0];
    let botonDeScrollLeft =this.getElementsByClassName('buttonScrollLeft')[0];
    
    if(botonDeScrollLeft){
        if(botonDeScrollLeft.classList.contains('buttonScrollLeft')){
            botonDeScrollLeft.style.display = 'block';
            let saveScroll = botonDeScrollLeft.parentElement.scrollLeft;
        
            if(botonDeScrollLeft.parentElement.scrollLeft == 0){
                botonDeScrollLeft.classList.remove('buttonScrollLeft');
                botonDeScrollLeft.style.display = 'none';
            }else{
                botonDeScrollLeft.classList.add('buttonScrollLeft');
                botonDeScrollLeft.style.display = 'block';
            }

            botonDeScrollLeft.parentElement.scrollLeft = saveScroll;
        }
    }

    if(botonDeScroll){
        
        if(botonDeScroll.classList.contains('buttonScroll')){
            let saveScroll = botonDeScroll.parentElement.scrollLeft;
            let maxScrollLeft = botonDeScroll.parentElement.scrollWidth - botonDeScroll.parentElement.clientWidth;
            let medirScroll =  botonDeScroll.parentElement.scrollLeft;

            botonDeScroll.parentElement.scrollLeft += 100;

            if(medirScroll != maxScrollLeft){
                botonDeScroll.classList.add('buttonScroll');
                botonDeScroll.style.display = 'block';
            }else{
                botonDeScroll.classList.remove('buttonScroll');
                botonDeScroll.style.display = 'none';
            }
            
            botonDeScroll.parentElement.scrollLeft = saveScroll;
        }
    }
}




function setEventos(){
    let contador = 0;
    
    while(sessionCategory.length > contador){

        let botonDeScroll = sessionCategory[contador].getElementsByClassName('buttonScroll')[0];
        let botonDeScrollLeft = sessionCategory[contador].getElementsByClassName('buttonScrollLeft')[0];

        if(window.innerWidth > 800){

            if(!botonDeScrollLeft){
                if(sessionCategory[contador].lastElementChild.children[1]){
                    sessionCategory[contador].lastElementChild.children[1].classList.add('buttonScrollLeft');
                }
            }
            
           if(!botonDeScroll){
                if(sessionCategory[contador].lastElementChild.children[0]){
                    sessionCategory[contador].lastElementChild.children[0].classList.add('buttonScroll');
                }
           }

            sessionCategory[contador].addEventListener('mouseleave', botonScrollHiden);
            sessionCategory[contador].addEventListener('mouseenter', botonScrollVisible);
        }else{

            if(botonDeScrollLeft){
                botonDeScrollLeft.classList.remove('buttonScrollLeft');
                botonDeScrollLeft.style.display = 'none';
            }
           if(botonDeScroll){
            botonDeScroll.classList.remove('buttonScroll');
            botonDeScroll.style.display = 'none';
           }
           
            sessionCategory[contador].removeEventListener('mouseleave', botonScrollHiden);
            sessionCategory[contador].removeEventListener('mouseover', botonScrollVisible);
        }
        contador++;
    }

}