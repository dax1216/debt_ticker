<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * HelloWorldList Model
 */
class DebtTickerModelDebtLogsDaily extends JModelItem
{
   /**
   * Method to build an SQL query to load the list data.
   *
   * @return      string  An SQL query
   */
   public function insertDailyLog($data) {
      $db = JFactory::getDbo();
      $query = $db->getQuery(true);
      
      $query->select(array('SUM(rate_val1) + SUM(rate_val2) + SUM(comp_rate_val)') )
            ->from($db->quoteName('#__debtticker_debtlogsdaily'))
            ->where($db->quoteName('rate_date') . ' >= ' . $db->quote('2011-11-08'));
      
      $db->setQuery($query);
      
      $row = $db->loadRow();
      
      $total_sum = 0;
      
      if(!empty($row[0])) $total_sum = $row[0];
      
      $data->comp_rate_val = ($total_sum + $data->rate_val1 + $data->rate_val2) * $data->comp_rate / 360;
      
      $query = $db->getQuery(true);
      
      $query->select(array('SUM(rate_val1) + SUM(rate_val2) + SUM(comp_rate_val)') )
            ->from($db->quoteName('#__debtticker_debtlogsdaily'));
      
      $db->setQuery($query);
      
      $row = $db->loadRow();
      
      $total_sum = 0;
      
      if(!empty($row[0])) $total_sum = $row[0];
      
      $data->debt = round($total_sum + $data->rate_val1 + $data->rate_val2 + $data->comp_rate_val, 2);
      
      $result = $db->insertObject('#__debtticker_debtlogsdaily', $data);
   }

}