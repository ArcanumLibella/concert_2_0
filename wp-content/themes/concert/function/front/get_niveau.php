<?php
function get_niveau($value){

    if($value == "Bac +2"){
        $niveau = "+2ème année";
    }
    elseif($value == "Bac +3"){
        $niveau = "+3ème année";
    }
    elseif($value == "Bac +4"){
        $niveau = "+4ème année";
    }
    elseif($value == "Bac +5"){
        $niveau = "+5ème année";
    }
    elseif($value == "Sans niveau"){
        $niveau = "Sans niveau";
    }

    return $niveau;
}