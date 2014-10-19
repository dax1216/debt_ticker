<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_debtticker/models', 'DebtTickerModel');

class ModDebtTickerHelper
{
    /**
     * Show liability settings
     *
     * 
     **/
   public static function getRecentRate()
   {
      $db = JFactory::getDbo();

      // Create a new query object.
      $query = $db->getQuery(true);

      $query->select($db->quoteName(array('id', 'rate', 'rate_date', 'log_date')));
      $query->from($db->quoteName('#__debtticker_ratelogs'));        
      $query->order('log_date DESC');

      $db->setQuery($query);  
      
      return $db->loadAssoc();  
   }
    
   public static function getSettings()
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
   public static function getData(&$params) {
      $modDTSettings['text_before'] = $params->get('text_before');
      $modDTSettings['text_after'] = $params->get('text_after');
      
      return $modDTSettings;
   }
}
