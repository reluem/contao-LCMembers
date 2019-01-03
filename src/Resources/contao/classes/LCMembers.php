<?php
// classes/LCMitglieder.php
    namespace Reluem;
    
    /**
     * Class LC_Mitglieder
     * @package LC_Mitglieder\classes
     */
    class LCMembers extends \ContentElement
    {
        
        protected $strTemplate = 'ce_LCMitglieder_list';
        
        /**
         * Compile the current element
         */
        protected function compile()
        {
            $objMember = $this->Database->execute("SELECT * FROM tl_LC_Mitglieder where published = '1' ORDER BY name_last, name_first ");
            
            
            if (($this->customTpl !== $this->strTemplate) && ($this->customTpl !== '')) {
                $this->strTemplate = $this->customTpl;
                $this->Template = new \FrontendTemplate($this->strTemplate);
            }
            
            $this->Template->members = $objMember->fetchAllAssoc();
        }
    }