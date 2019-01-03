<?php
    
    $GLOBALS['TL_DCA']['tl_content']['palettes']['LC_Mitglieder'] = '{type_legend},type, headline; {text_legend}, text, customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
    
    
    $GLOBALS['TL_DCA']['tl_content']['fields']['customTpl']['options'] = array
    (
        'ce_LCMitglieder_gallery',
        'ce_LCMitglieder_list',
        'ce_LCMitglieder_table',
    );
    $GLOBALS['TL_DCA']['tl_content']['fields']['text']['eval'] = array
    (
        'mandatory' => false,
        'rte' => 'tinyMCE',
        'helpwizard' => true,
    );
    
    unset($GLOBALS['TL_DCA']['tl_content']['fields']['customTpl']['options_callback']);
