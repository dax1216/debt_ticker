<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * HelloWorld Model
 */
class DebtTickerModelDebtLogMinutes extends JModelItem
{
    // Get a db connection.
   public function insertMinuteLog($data) {
      $db = JFactory::getDbo();
      $query = $db->getQuery(true);
      
      $query->select(array('SUM(rate_val1) + SUM(rate_val2) + SUM(comp_rate_val)') )
            ->from($db->quoteName('#__debtticker_debtlogsdaily'));
      
      $db->setQuery($query);
      
      $row = $db->loadRow();
      
      $result = $db->insertObject('#__debtticker_debtlogsminutes', $data);
   }
    

}