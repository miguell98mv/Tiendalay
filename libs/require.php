<?php

if(file_exists('../../config/config.php')){
    require_once '../../config/config.php';
    require_once '../../libs/database.php';
    require_once '../../libs/view.php';
    require_once '../../libs/controller.php';
}

if(file_exists('../config/config.php')){
    require_once '../config/config.php';
    require_once '../libs/database.php';
    require_once '../libs/view.php';
    require_once '../libs/controller.php';
}

if(file_exists('config/config.php')){
    require_once 'config/config.php';
    require_once 'libs/database.php';
    require_once 'libs/view.php';
    require_once 'libs/controller.php';
}
