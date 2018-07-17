<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['LC_Mitglieder'] = '{type_legend},type; {text_legend}, headline, text, fe_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';


$GLOBALS['TL_DCA']['tl_content']['fields']['fe_template'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['fe_template'],
    'default' => 'ce_LCMitglieder_list',
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_LC_Mitglieder_templates', 'getTemplates'),
    'eval' => array('tl_class' => 'w50'),
    'sql' => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['text'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['text'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('rte' => 'tinyMCE'),
    'sql' => "mediumtext NULL",
);




class tl_LC_Mitglieder_templates extends Backend
{
    public function getTemplates()
    {
        return $this->getTemplateGroup('ce_LCMitglieder_');
    }
}
