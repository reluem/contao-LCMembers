<?php

// config/config.php
    
    $GLOBALS['BE_MOD']['content']['LC_Mitglieder'] = array(
        'tables' => array('tl_LC_Mitglieder'),
        'icon' => 'system/modules/LC_Mitglieder/assets/images/LIONS_BE_Logo.gif',
    );
    
    $GLOBALS['TL_CTE']['LIONS']['LCMitglieder_list'] = \Reluem\LCMembers::class;
    $GLOBALS['TL_CTE']['LIONS']['LCMitglieder_table'] = \Reluem\LCMembers::class;
    $GLOBALS['TL_CTE']['LIONS']['LCMitglieder_gallery'] = \Reluem\LCMembers::class;
