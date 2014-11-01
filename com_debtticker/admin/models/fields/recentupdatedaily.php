<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('JPATH_BASE') or die;


class JFormFieldRecentUpdateDaily extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since   1.6
	 */
	protected $type = 'recentupdatedaily';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string	The field input markup.
	 *
	 * @since   1.6
	 */
	protected function getInput() {
      $db = JFactory::getDbo(); 
      // Create a new query object.
      $query = $db->getQuery(true);

      $query->select($db->quoteName(array('id', 'debt', 'rate_date', 'log_date')));
      $query->from($db->quoteName('#__debtticker_debtlogsdaily'));        
      $query->order('log_date DESC');

      $db->setQuery($query);

      $recentRate = $db->loadAssoc();
      return
			'<input class="input-medium" type="text" name="' . $this->name . '" id="' . $this->id . '" value="'
			. number_format($recentRate['debt'], 2) . '" readonly="readonly" />';
   }
   
}