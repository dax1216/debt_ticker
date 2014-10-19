<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 */
class DebtTickerModelRateLogs extends JModelList
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
            ->select($db->quoteName(array('id', 'rate', 'rate_date')))
            ->from('#__debtticker_ratelogs')
            ->order('log_date DESC');

        return $query;
    }
}