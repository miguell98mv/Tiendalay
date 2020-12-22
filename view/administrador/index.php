<?php

if(empty($this->dataObtained)){
require_once 'view/administrador/newAdmin.php';
}else{
    require_once 'view/administrador/loginAdmin.php';
}