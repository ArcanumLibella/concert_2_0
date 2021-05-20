<?php
function display_type($type){
    if($type == "dossier"){
        $result = "Zoom sur";
    }
    elseif($type == "Article"){
        $result = "Actualité";
    }
    elseif($type == "presse"){
        $result = "Espace presse";
    }
    elseif($type == "video"){
        $result = "Vidéos";
    }
    return $result;
}