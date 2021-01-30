const searchArticle = document.getElementById('search');
const spanSearch = document.getElementById('spanSearch');
const searchMenu = document.getElementById('searchMenu');
var indexItemSearch = -1;


window.addEventListener('load', configWidth);

window.addEventListener('resize', configWidth);

searchArticle.addEventListener('click', search);

searchArticle.addEventListener('input', search);

searchArticle.addEventListener('keydown', keySearch);

window.addEventListener('click', function(){
    clearSearch();
    searchMenu.style.display = 'none';
});

spanSearch.addEventListener('click', function(){
    location.href =  `${MYURL}busqueda/${searchArticle.value}`;
});

//FUNCIONES

function keySearch(e){
if(searchMenu.childElementCount){
    var itemsSearch = searchMenu.childElementCount;
}else{
    var itemsSearch = 0;
}
    switch(e.code){
        case 'Enter':
            window.location.href = `${MYURL}busqueda/${searchArticle.value}`;
        break;

        case 'Insert':
            window.location.href = `${MYURL}busqueda/${searchArticle.value}`;
        break;

        case 'ArrowUp':
            itemsSearch ? indexItemSearch-- : false;
            indexItemSearch <= -1 ?  indexItemSearch=-1 : false;
        break;

        case 'ArrowDown':
            itemsSearch ? indexItemSearch++ : false;
            indexItemSearch >= itemsSearch-1 ?  indexItemSearch=itemsSearch-1 : false;
        break;

        default:
        break;
    }

    itemsSearch ? selectionSearch(indexItemSearch) : false;
}

function selectionSearch(e){

    for(let a=0; a<searchMenu.childElementCount; a++){
        searchMenu.children[a].classList.remove('selectionSearch');
    }

    if(e!==-1){
        searchMenu.children[e].classList.add('selectionSearch');
        searchArticle.value = searchMenu.children[e].textContent;
    }
}

function configWidth(){
    const sizeElemtWidth = spanSearch.offsetWidth + searchArticle.offsetWidth-1;
    const positionTop = searchArticle.offsetTop+searchArticle.offsetHeight-3;
    
    searchMenu.style.width = sizeElemtWidth+'px';
    searchMenu.style.top = positionTop;
}


function search(){
    
    indexItemSearch= -1;
    let http = new XMLHttpRequest;

    http.open('post', MYURL+'controller/home/searchController.php');
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.send(`search=${searchArticle.value}`);

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            getSearch(this.responseText);
        }
    }
}

function getSearch(data){

    clearSearch()

    data = JSON.parse(data);
    
    if(data){
    data.forEach(e =>{
        let createElemt = document.createElement('div');
        createElemt.append(`${e}`);
        searchMenu.append(createElemt);
    });
        searchMenu.style.display = 'block';
    }else{
        clearSearch(); 
        searchMenu.style.display = 'none';
    }

    if(!searchArticle.value){
        clearSearch(); 
        searchMenu.style.display = 'none';
    }

    if(searchMenu.childElementCount){
    
        for(let a=0; a<searchMenu.childElementCount; a++){
            searchMenu.children[a].addEventListener('click', function(){
                searchArticle.value = searchMenu.children[a].textContent;
            });
        }
    }
}

function clearSearch(){

    if(searchMenu.childElementCount){
        let countElements = searchMenu.childElementCount;
        for(var a=0; a<countElements; a++){
            searchMenu.removeChild(searchMenu.lastElementChild);
        }     
    }
}