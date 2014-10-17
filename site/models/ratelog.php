<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * HelloWorld Model
 */
class DebtTickerModelRateLog extends JModelItem
{
   /**
   * @var string msg
   */
   protected $textBefore;
   
   protected $textAfter;
   
   protected $currentLiabilities;

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
}