<?php

// redirect 
function redirect(string $url){
    header('Location: '. $url);
    exit;
}

// render view 
function view(string $view, array $data = array()){
    $path = str_replace(".", DIRECTORY_SEPARATOR, $view);
    $viewFile = APP_ROOT . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $path . '.php';

    if (file_exists($viewFile)) {
        extract($data);
        require_once($viewFile);
    } else {
        throw new Exception("View file not found: $viewFile");
    }
}

// include view

function includeView(string $view, array $data = array()){
    $path = str_replace(".", DIRECTORY_SEPARATOR, $view);
    $viewFile = APP_ROOT. DIRECTORY_SEPARATOR. 'views'. DIRECTORY_SEPARATOR. $path. '.php';

    if (file_exists($viewFile)) {
        extract($data);
        include($viewFile);
    } else {
        throw new Exception("View file not found: $viewFile");
    }
}
