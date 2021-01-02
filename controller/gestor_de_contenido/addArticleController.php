<?php

require '../../libs/require.php';

class AddArticle{
    function __construct()
    {
        require_once '../../model/gestor_de_contenido/addArticleModel.php';
        $this->model = new AddArticleModel;
    }
}

$AddArticle = new AddArticle;

$hash1 = password_hash(basename($_FILES["photo"]["name"]), PASSWORD_DEFAULT);
$hash2 = password_hash($hash1, PASSWORD_DEFAULT);
$hash3 = password_hash($hash1.$hash1, PASSWORD_DEFAULT);
$keyImage = $hash1.$hash2.$hash3;
$keyImage = str_replace('/', 'o', $keyImage);
$keyImage = $keyImage.$_FILES["photo"]["name"];

if(move_uploaded_file($_FILES["photo"]["tmp_name"] , '../../assets/imagen_article/'.$keyImage)){
    $validar = $AddArticle->model->addArticle($_POST['name'], $_POST['price'], $_POST['cost'], $_POST['description'],$keyImage);
    echo json_encode($validar);
}













