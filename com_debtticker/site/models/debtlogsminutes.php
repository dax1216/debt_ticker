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
   public function insertMinuteLog($rates) {
      $db = JFactory::getDbo();
      $query = $db->getQuery(true);
      
      $query->select(array('SUM(rate_val1) + SUM(rate_val2) + SUM(comp_rate_val)') )
            ->from($db->quoteName('#__debtticker_debtlogsdaily'));
      
      $db->setQuery($query);
      
      $row = $db->loadRow();

      $minutes = floor((time() - strtotime(date('Y-m-d 00:00:00'))) / 60);

      $data = new stdClass();
      $data->comp_rate_val = ($row[0] * $rates['comp_interest_rate'] / 360) / (1440 * $minutes);
      $data->debt = $row[0] + $data->comp_rate_val;
      
      $result = $db->insertObject('#__debtticker_debtlogsminutes', $data);
   }
    

}