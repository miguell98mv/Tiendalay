const slider = document.getElementById("fondoSlider");

//mover imagen al primer lugar
//slider.firstElementChild


//EVENTOS
slider.lastElementChild.insertBefore = slider.firstElementChild;
slider.style.marginLeft = "-100%";

setInterval(function(){
    slider.animate({
        marginLeft:"+0%"
        },1000).onfinish = function(){

            slider.insertBefore(slider.lastElementChild, slider.firstElementChild);
            slider.style.marginLeft = '-100%';
        };
}, 10000);