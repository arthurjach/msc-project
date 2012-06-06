<?php

function getQueryFilterBrandKeyword($profileid) {
    if ($profileid == 4570055){ 
        //kia.co.uk
        return 'medium == organic && keyword != (not provided) && keyword =@ kia';
    } else if ($profileid == 47702481){ 
        //nationalexpress.com
        return 'medium == organic && keyword != (not provided) && keyword =~ nat(.*)ex || keyword =~ e(.*)lin || keyword =~ n(.*)ress || keyword =~ national e(.*) || keyword =~ ex(.*)nat';
    } else if ($profileid == 14000365){ 
        //sunlifedirect.co.uk
        return 'medium == organic && keyword != (not provided) && keyword =@ sun || keyword =@ axa';
    } else if ($profileid == 5806854){ 
        //eastmidlandstrains.co.uk
        return 'medium == organic && keyword != (not provided) && keyword =~ emt || keyword =~ e(.*)mid(.*)tra || keyword =~ mid(.*)main';
    } else if ($profileid == 1939940){ 
        //mazumamobile.com
        return 'medium == organic && keyword != (not provided) && keyword =~ m(.*)z(.*)a || keyword =~ mas(.*)a || keyword =~ maz';
    } else if ($profileid == 32497540){ 
        //eastcoast.co.uk
        return 'medium == organic && keyword != (not provided) && keyword =~ e(.*)co(.*)t || keyword =~ gner || keyword =~ e(.*)coa|cao';
    }
}

function getQueryFilterNonBrandKeyword($profileid) {
    if ($profileid == 4570055){ 
        //kia.co.uk
        return 'medium == organic && keyword != (not provided) && keyword !@ kia';
    }else if ($profileid == 47702481){ 
        //nationalexpress.co.uk
        return 'medium == organic && keyword != (not provided) && keyword !~ nat(.*)ex && keyword !~ e(.*)lin && keyword !~ n(.*)ress && keyword !~ national e(.*) && keyword !~ ex(.*)nat';
    } else if ($profileid == 14000365){ 
        //sunlifedirect.co.uk
        return 'medium == organic && keyword != (not provided) && && keyword !@ sun && && keyword !@ axa';
    } else if ($profileid == 5806854){ 
        //eastmidlandstrains.co.uk
        return 'medium == organic && keyword != (not provided) && keyword !~ emt && keyword !~ e(.*)mid(.*)tra && keyword !~ mid(.*)main';
    } else if ($profileid == 1939940){ 
        //mazumamobile.com
        return 'medium == organic && keyword != (not provided) && keyword !~ m(.*)z(.*)a && keyword !~ mas(.*)a && keyword !~ maz';
    } else if ($profileid == 32497540){ 
        //eastcoast.co.uk
        return 'medium == organic && keyword != (not provided) && keyword !~ e(.*)co(.*)t && keyword !~ gner && keyword !~ e(.*)coa|cao';
    }
}

?>
