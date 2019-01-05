<?php
    
    $GLOBALS['TL_DCA']['tl_content']['palettes']['LCMitglieder_gallery'] = '{type_legend},type, headline;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
    $GLOBALS['TL_DCA']['tl_content']['palettes']['LCMitglieder_list'] = '{type_legend},type, headline; {text_legend}, text;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
    $GLOBALS['TL_DCA']['tl_content']['palettes']['LCMitglieder_table'] = '{type_legend},type, headline; {protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
    
    $GLOBALS['TL_DCA']['tl_content']['fields']['text']['eval'] = array
    (
        'mandatory' => false,
        'rte' => 'tinyMCE',
        'helpwizard' => true,
    );
    