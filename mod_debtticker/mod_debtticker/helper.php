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

      $query->select($db->quoteName(array('id', 'debt', 'log_date')));
      $query->from($db->quoteName('#__debtticker_debtlogsminutes'));        
      $query->order('id DESC');

      $db->setQuery($query);
      
      return $db->loadAssoc();  
   }
   
   public static function getData(&$params) {
      $modDTSettings['text_before'] = $params->get('text_before');
      $modDTSettings['text_after'] = $params->get('text_after');
      
      return $modDTSettings;
   }
}
