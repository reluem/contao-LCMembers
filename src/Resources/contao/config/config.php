<?php

// config/config.php
    
    $GLOBALS['BE_MOD']['content']['LC_Mitglieder'] = array(
    'tables' => array('tl_LC_Mitglieder'),
    'icon' => 'system/modules/LC_Mitglieder/assets/images/LIONS_BE_Logo.gif',
);

$GLOBALS['TL_CTE']['LIONS']['LC_Mitglieder'] = \Reluem\LCMembers::class;

