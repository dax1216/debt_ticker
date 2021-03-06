<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

define('MINUTES_IN_A_DAY', 1440); 
/**
 * HelloWorld Model
 */
class DebtTickerModelDebtLogsMinutes extends JModelItem
{
    // Get a db connection.
   public function insertMinuteLog($rates) {
      $db = JFactory::getDbo();
      $query = $db->getQuery(true);
      
      $query->select(array('SUM(rate_val1) + SUM(rate_val2) + SUM(comp_rate_val)') )
            ->from($db->quoteName('#__debtticker_debtlogsdaily'))
            ->where($db->quoteName('rate_date') . ' >= ' . $db->quote('2011-11-08'));
      
      $db->setQuery($query);
      
      $row = $db->loadRow();

      $total_sum = 0;
      
      if(!empty($row[0])) $total_sum = $row[0];
      
      $minutes = floor((time() - strtotime(date('Y-m-d 00:00:00'))) / 60);

      $data = new stdClass();
      $data->comp_rate_val = ((($total_sum * $rates['comp_interest_rate']) / 360) / MINUTES_IN_A_DAY) * $minutes;

      $query = $db->getQuery(true);
      
      $query->select(array('SUM(rate_val1) + SUM(rate_val2)') )
            ->from($db->quoteName('#__debtticker_debtlogsdaily'));
      
      $db->setQuery($query);
      
      $row = $db->loadRow();
      
      $total_sum = 0;
      
      if(!empty($row[0])) $total_sum = $row[0];
      
      $data->debt = $total_sum + $data->comp_rate_val;
      
      $query = $db->getQuery(true);
      
      $query->select(array('SUM(comp_rate_val)') )
            ->from($db->quoteName('#__debtticker_debtlogsdaily'))
            ->where($db->quoteName('rate_date') . ' < ' . $db->quote(date('Y-m-d')));
            
      $db->setQuery($query);
      
      $row = $db->loadRow();
      
      if(!empty($row[0])) 
         $data->debt = $data->debt + $row[0];
      
      $data->debt = round($data->debt, 2);
      
      $result = $db->insertObject('#__debtticker_debtlogsminutes', $data);
   }
    

}