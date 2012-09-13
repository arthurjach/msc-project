<?php

/**
 * The analysis of organic search click-through rates (CTR) 
 * from different Google search result positionsGAPI - Google Analytics PHP Interface
 * 
 * https://github.com/arthurjach/msc-project
 * 
 * @copyright Artur Jach 2012
 * @author Artur Jach <arthurjach@yahoo.co.uk>
 * @version 1.0
 * 
 */

//please not that in order to keep the analysed data anonymous the keywords used
// in this research have been removed from the final version of the code.
function getQueryFilterBrandKeyword($profileid) {
    if ($profileid == 4570055){ 
        return 'medium == organic && keyword != (not provided) && keyword =@ INSERT_KEYWORD_HERE';
    } else if ($profileid == 47702481){ 
        return 'medium == organic && keyword != (not provided) && keyword =~ INSERT_KEYWORD_HERE || keyword =~ INSERT_KEYWORD_HERE';
    } else if ($profileid == 14000365){ 
        return 'medium == organic && keyword != (not provided) && keyword =@ INSERT_KEYWORD_HERE || keyword =@ INSERT_KEYWORD_HERE';
    } else if ($profileid == 61072160){ 
        return 'medium == organic && keyword != (not provided) && keyword =~ INSERT_KEYWORD_HERE || keyword =~ INSERT_KEYWORD_HERE';
    } else if ($profileid == 1939940){ 
        return 'medium == organic && keyword != (not provided) && keyword =~ INSERT_KEYWORD_HERE || keyword =~ INSERT_KEYWORD_HERE';
    } else if ($profileid == 32497540){ 
        return 'medium == organic && keyword != (not provided) && keyword =~ INSERT_KEYWORD_HERE || keyword =~ INSERT_KEYWORD_HERE';
    } else if ($profileid == 53070092){ 
        return 'medium == organic && keyword != (not provided) && keyword =~ INSERT_KEYWORD_HERE || keyword =@ INSERT_KEYWORD_HERE';
    }
}

function getQueryFilterNonBrandKeyword($profileid) {
    if ($profileid == 4570055){ 
        return 'medium == organic && keyword != (not provided) && keyword !@ INSERT_KEYWORD_HERE';
    }else if ($profileid == 47702481){ 
        return 'medium == organic && keyword != (not provided) && keyword !~ INSERT_KEYWORD_HERE';
    } else if ($profileid == 14000365){ 
        return 'medium == organic && keyword != (not provided) && keyword !@ INSERT_KEYWORD_HERE';
    } else if ($profileid == 61072160){ 
        return 'medium == organic && keyword != (not provided) && keyword !~ INSERT_KEYWORD_HERE';
    } else if ($profileid == 1939940){ 
        return 'medium == organic && keyword != (not provided) && keyword !~ INSERT_KEYWORD_HERE';
    } else if ($profileid == 32497540){ 
        return 'medium == organic && keyword != (not provided) && keyword !~ INSERT_KEYWORD_HERE';
    } else if ($profileid == 53070092){ 
        return 'medium == organic && keyword != (not provided) && keyword !~ INSERT_KEYWORD_HERE';
    }
}

?>
