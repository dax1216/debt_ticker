<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class DebtTickerModelLiabilityLogs extends JModelItem
{
   /**
   * Method to build an SQL query to load the list data.
   *
   * @return      string  An SQL query
   */
   public function insertLog($data) {
      $result = JFactory::getDbo()->insertObject('#__debtticker_liabilitylogs', $data);
   }

   public function getLatestLog() {
      $db = JFactory::getDbo();

      // Create a new query object.
      $query = $db->getQuery(true);

      $query->select($db->quoteName(array('id', 'liability', 'log_date')));
      $query->from($db->quoteName('#__debtticker_liabilitylogs'));
      $query->order('log_date DESC');

      $db->setQuery($query);

      return $db->loadAssoc();
   }
}