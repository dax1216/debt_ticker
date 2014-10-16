<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * HelloWorld Model
 */
class DebtTickerModelDebtTicker extends JModelItem
{
    /**
    * @var string msg
    */
    protected $textBefore;

    protected $textAfter;

    /**
    * Get the message
    * @return string The message to be displayed to the user
    */
    public function getTextBefore() 
    {
       if (!isset($this->textBefore)) 
       {
          $this->textBefore = 'Hello World!';
       }

       return $this->textBefore;
    }
   
    public function getTextAfter() 
    {
       if (!isset($this->textAfter)) 
       {
          $this->textBefore = 'Bye World!';
       }

       return $this->textAfter;
    }
   
    public function getSettings() 
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__debtticker');
        $query->where($db->quoteName('id')." = ".$db->quote(1));
        $db->setQuery((string)$query);
        $options = $db->loadRow();
        
        return $settings;
    }
}