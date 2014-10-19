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
    // Get a db connection.
    public function insertRate($rate, $rate_date) {
       // Create and populate an object.
        $rateObj = new stdClass();
        $rateObj->rate = $rate;
        $rateObj->rate_date = $rate_date;       
        // Insert the object into the user profile table.
        $result = JFactory::getDbo()->insertObject('#__debtticker_ratelogs', $rateObj);
    }
    
    public function getRecentRate() {
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        
        $query->select($db->quoteName(array('id', 'rate', 'rate_date', 'log_date')));
        $query->from($db->quoteName('#__debtticker_ratelogs'));        
        $query->order('log_date DESC');
        
        $db->setQuery($query);
        
        return $db->loadAssoc();
    }
}