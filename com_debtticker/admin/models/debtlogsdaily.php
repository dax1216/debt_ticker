<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class DebtTickerModelDebtLogsDaily extends JModelList
{
    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
    protected function getListQuery()
    {
        // Create a new query object.           
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        // Select some fields from the hello table
        $query
            ->select($db->quoteName(array('id', 'rate', 'rate_val1', 'rate_val2', 'comp_rate', 'comp_rate_val', 'rate_date', 'debt')))
            ->from('#__debtticker_debtlogsdaily')
            ->order('id DESC');

        return $query;
    }
}