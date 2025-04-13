<?php
    
    /**
     * Contao Open Source CMS
     *
     * Copyright (c) 2005-2016 Leo Feyer
     *
     * @package   LC_Mitglieder
     * @author    reluem
     * @license   GNU/LGPL
     * @copyright Lucas Rech 2018
     */


// dca/tl_LC_Mitglieder.php
    /**
     * Set Tablename: tl_LC_Mitglieder
     */
    $strName = 'tl_LC_Mitglieder';
    
    $GLOBALS['TL_DCA'][$strName] = array
    (
        
        // Config
        'config' => array
        (
            'dataContainer' => 'Table',
            'enableVersioning' => true,
            'onsubmit_callback' => array
            (
                array('tl_LC_Mitglieder', 'storeDateAdded'),
            ),
            'sql' => array
            (
                'keys' => array
                (
                    'id' => 'primary',
                ),
            ),
        ),
        
        // List
        'list' => array
        (
            'sorting' => array
            (
                'mode' => 2,
                'fields' => array('name_last'),
                'flag' => 1,
                'panelLayout' => 'filter;sort,search,limit',
            ),
            'label' => array
            (
                'fields' => array('dateAdded', 'name_first', 'name_last', 'name_first_partner', 'name_last_partner'),
                'showColumns' => true,
            ),
            'global_operations' => array
            (
                'all' => array
                (
                    'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                    'href' => 'act=select',
                    'class' => 'header_edit_all',
                    'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"',
                ),
            ),
            'operations' => array
            (
                'edit' => array
                (
                    'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['edit'],
                    'href' => 'act=edit',
                    'icon' => 'edit.gif',
                ),
                'copy' => array
                (
                    'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['copy'],
                    'href' => 'act=copy',
                    'icon' => 'copy.gif',
                ),
                'delete' => array
                (
                    'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['delete'],
                    'href' => 'act=delete',
                    'icon' => 'delete.gif',
                    'attributes' => 'onclick="if(!confirm(\'' . (isset($GLOBALS['TL_LANG']['tl_LC_Mitglieder']['deleteConfirm']) ? $GLOBALS['TL_LANG']['tl_LC_Mitglieder']['deleteConfirm'] : 'Bist du sicher?') . '\'))return false;Backend.getScrollOffset()"',
                ),
                'show' => array
                (
                    'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['show'],
                    'href' => 'act=show',
                    'icon' => 'show.gif',
                ),
                'toggle' => array
                (
                    'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['toggle'],
                    'icon' => 'visible.gif',
                    'attributes' => 'onclick="Backend.getScrollOffset();"',
                    'haste_ajax_operation' => [
                        'field' => 'published',
                        'options' => [
                            [
                                'value' => '',
                                'icon' => 'invisible.gif',
                            ],
                            [
                                'value' => '1',
                                'icon' => 'visible.gif',
                            ],
                        ],
                    ],
                ),
            ),
        ),
        
        
        // Palettes
        'palettes' => array
        (
//        '__selector__' => array(''),
            'default' => '{mitglied_legend}, name_first, name_last, titel, titel_lang, image, president, deceased, retired; {partner_legend}, name_first_partner, name_last_partner, titel_partner, titel_lang_partner, image_partner;',
        ),
        
        // Fields
        'fields' => array
        (
            'id' => array
            (
                'sql' => "int(10) unsigned NOT NULL auto_increment",
            ),
            'tstamp' => array
            (
                'sql' => "int(10) unsigned NOT NULL default '0'",
            ),
            'dateAdded' => array
            (
                'label' => &$GLOBALS['TL_LANG']['MSC']['dateAdded'],
                'default' => time(),
                'sorting' => false,
                'flag' => 6,
                'eval' => array('rgxp' => 'datim', 'doNotCopy' => true),
                'sql' => "int(10) unsigned NOT NULL default '0'",
            ),
            'published' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['published'],
                'exclude' => true,
                'filter' => true,
                'inputType' => 'checkbox',
                'sql' => "char(1) NOT NULL default ''",
            ),
            'retired' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['retired'],
                'exclude' => true,
                'inputType' => 'checkbox',
                'default' => 1,
                'eval' => ['tl_class' => 'w50 clr'],
                'sql' => "char(1) NOT NULL default ''",
            ),
            'name_last' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['name_last'],
                'inputType' => 'text',
                'exclude' => true,
                'sorting' => true,
                'flag' => 1,
                'search' => true,
                'eval' => array(
                    'mandatory' => true,
                    'maxlength' => 255,
                    'tl_class' => 'w50',
                ),
                'sql' => "varchar(255) NOT NULL default ''",
            ),
            'name_first' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['name_first'],
                'exclude' => true,
                'sorting' => true,
                'inputType' => 'text',
                'eval' => array('maxlength' => 255, 'tl_class' => 'w50'),
                'sql' => "varchar(255) NOT NULL default ''",
            ),
            'image' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['image'],
                'exclude' => true,
                'inputType' => 'fileTree',
                'eval' => array(
                    'fieldType' => 'radio',
                    'files' => true,
                    'filesOnly' => true,
                    'tl_class' => 'clr',
                    'extensions' => $GLOBALS['TL_CONFIG']['validImageTypes'],
                ),
                'sql' => "binary(16) NULL",
            ),
            'titel' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['titel'],
                'exclude' => true,
                'sorting' => true,
                'inputType' => 'text',
                'eval' => array('maxlength' => 255, 'tl_class' => 'w50'),
                'sql' => "varchar(255) NOT NULL default ''",
            
            ),
            'titel_lang' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['titel_lang'],
                'exclude' => true,
                'sorting' => false,
                'inputType' => 'text',
                'eval' => array('maxlength' => 255, 'tl_class' => 'w50'),
                'sql' => "varchar(255) NOT NULL default ''",
            
            ),
            'president' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['president'],
                'exclude' => true,
                'sorting' => false,
                'inputType' => 'text',
                'eval' => array('rgxp' => 'digit', 'maxlength' => 4, 'tl_class' => 'w50'),
                'sql' => "varchar(4) NOT NULL default ''",
            
            ),
            'deceased' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['deceased'],
                'exclude' => true,
                'sorting' => false,
               'inputType' => 'text',
                'eval' => array('rgxp' => 'digit', 'maxlength' => 4, 'tl_class' => 'w50'),
                'sql' => "varchar(4) NOT NULL default ''",
            ),
            
            'image_partner' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['image_partner'],
                'exclude' => true,
                'inputType' => 'fileTree',
                'eval' => array(
                    'fieldType' => 'radio',
                    'files' => true,
                    'filesOnly' => true,
                    'tl_class' => 'clr',
                    'extensions' => $GLOBALS['TL_CONFIG']['validImageTypes'],
                ),
                'sql' => "binary(16) NULL",
            ),
            'name_first_partner' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['name_first_partner'],
                'exclude' => true,
                'sorting' => false,
                'inputType' => 'text',
                'eval' => array('maxlength' => 255, 'tl_class' => 'w50'),
                'sql' => "varchar(255) NOT NULL default ''",
            ),
            'name_last_partner' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['name_last_partner'],
                'exclude' => true,
                'sorting' => false,
                'inputType' => 'text',
                'eval' => array('maxlength' => 255, 'tl_class' => 'w50'),
                'sql' => "varchar(255) NOT NULL default ''",
            ),
            'titel_partner' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['titel_partner'],
                'exclude' => true,
                'sorting' => false,
                'inputType' => 'text',
                'eval' => array('maxlength' => 255, 'tl_class' => 'w50'),
                'sql' => "varchar(255) NOT NULL default ''",
            
            ),
            'titel_lang_partner' => array(
                'label' => &$GLOBALS['TL_LANG']['tl_LC_Mitglieder']['titel_lang_partner'],
                'exclude' => true,
                'sorting' => false,
                'inputType' => 'text',
                'eval' => array('maxlength' => 255, 'tl_class' => 'w50'),
                'sql' => "varchar(255) NOT NULL default ''",
            
            ),
        ),
    );
    
    class tl_LC_Mitglieder extends Backend
    {
        /**
         * Store the date when the account has been added
         *
         * @param DataContainer $dc
         */
        public
        function storeDateAdded(
            $dc
        ) {
            // Front end call
            if (!$dc instanceof DataContainer) {
                return;
            }
            // Return if there is no active record (override all)
            if (!$dc->activeRecord || $dc->activeRecord->dateAdded > 0) {
                return;
            }
            // Fallback solution for existing accounts
            if ($dc->activeRecord->lastLogin > 0) {
                $time = $dc->activeRecord->lastLogin;
            } else {
                $time = time();
            }
            $this->Database->prepare("UPDATE tl_LC_Mitglieder SET dateAdded=? WHERE id=?")
                ->execute($time, $dc->id);
        }
    }
