<?php
// classes/LCMitglieder.php
namespace reluem\LC_Mitglieder\classes;

/**
 * Class LC_Mitglieder
 * @package LC_Mitglieder\classes
 */
class LC_Mitglieder extends \ContentElement
{
    
    protected $strTemplate = 'ce_LCMitglieder_list';
    
    /**
     * Compile the current element
     */
    protected function compile()
    {
        $objMember = $this->Database->execute("SELECT * FROM tl_LC_Mitglieder where published = '1' ORDER BY name_last, name_first ");
        
        
        if (($this->fe_template != $this->strTemplate) && ($this->fe_template != '')) {
            $this->strTemplate = $this->fe_template;
            $this->Template = new \FrontendTemplate($this->strTemplate);
        }
        
        $arrObj = $objMember->fetchAllAssoc();
        
        $this->Template->members = \HeimrichHannot\Haste\Util\Arrays::ObjecttoArray($arrObj);
    }
}