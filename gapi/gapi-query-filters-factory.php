<?php

function getQueryFilterBrandKeyword($profileid) {
    if ($profileid == 4570055){ 
        //kia.co.uk
        return 'medium == organic && keyword != (not provided) && keyword =@ kia';
    }
    //return false;
}

function getQueryFilterNonBrandKeyword($profileid) {
    if ($profileid == 4570055){ 
        //kia.co.uk
        return 'medium == organic && keyword != (not provided) && keyword !@ kia';
    }
    //return false;
}

?>
