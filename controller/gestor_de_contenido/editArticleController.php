<?php

require_once '../../libs/require.php';

class EditArticleController{
    
    function __construct()
    {
        require_once '../../model/gestor_de_contenido/editArticleModel.php';
        $this->model = new EditArticleModel;
    }
}

$editArticle = new EditArticleController;

$name=$_POST['name'];
$price=$_POST['price'];
$cost=$_POST['cost'];
$description=$_POST['description'];
$category=$_POST['category'];
$labelSelection=$_POST['labelSelection'];
$id=$_POST['id'];


if(isset($_FILES["photo"])){
    $hash1 = password_hash(basename($_FILES["photo"]["name"]), PASSWORD_DEFAULT);
    $hash2 = password_hash($hash1, PASSWORD_DEFAULT);
    $hash3 = password_hash($hash1.$hash1, PASSWORD_DEFAULT);
    $keyImage = $hash1.$hash2.$hash3;
    $keyImage = str_replace('/', 'o', $keyImage);
    $keyImage = $keyImage.$_FILES["photo"]["name"];

    if(move_uploaded_file($_FILES["photo"]["tmp_name"] , '../../assets/imagen_article/'.$keyImage)){
       $editArticle->model->EditArticle($name, $price, $cost, $description, $category, $labelSelection, $id, $keyImage);
    }
}else{
    $editArticle->model->EditArticle($name, $price, $cost, $description, $category, $labelSelection, $id);
}