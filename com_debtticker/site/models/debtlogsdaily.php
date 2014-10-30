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
            ->from($db->quoteName('#__debtticker_debtlogsdaily'));
      
      $db->setQuery($query);
      
      $row = $db->loadRow();
      $data->comp_rate_val = ($row[0] + $data->rate_val1 + $data->rate_val2) * $data->comp_interest_rate / 360;
      $data->debt = $row[0] + $data->rate_val1 + $data->rate_val2 + $data->comp_rate_val;
      
      $result = $db->insertObject('#__debtticker_debtlogsdaily', $data);
   }


}