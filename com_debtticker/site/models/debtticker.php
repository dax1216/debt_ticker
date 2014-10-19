<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * HelloWorld Model
 */
class DebtTickerModelDebtTicker extends JModelItem
{
   
   
    public function getSettings() 
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select($db->quoteName(array('id', 'current_liabilities', 'start_date')));
        $query->from('#__debtticker');
        $query->where($db->quoteName('id')." = ".$db->quote(1));
        $db->setQuery($query);
        
        $options = $db->loadAssoc();
        
        return $options;
    }
    
    public function updateSettings($settings) { 
        // Must be a valid primary key value.        
        // Update their details in the users table using id as the primary key.
        $result = JFactory::getDbo()->updateObject('#__debtticker', $settings, 'id');
    }
}