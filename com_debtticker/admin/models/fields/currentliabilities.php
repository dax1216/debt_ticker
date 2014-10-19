<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('JPATH_BASE') or die;


class JFormFieldCurrentLiabilities extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since   1.6
	 */
	protected $type = 'currentliabilities';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string	The field input markup.
	 *
	 * @since   1.6
	 */
	protected function getInput() {
      $db = JFactory::getDbo(); 
      $query = $db->getQuery(true);
      $query->select($db->quoteName(array('id', 'current_liabilities')));
      $query->from('#__debtticker');
      $query->where($db->quoteName('id')." = ".$db->quote(1));
      $db->setQuery($query);

      $options = $db->loadAssoc();
      return
			'<input class="input-small" type="text" name="' . $this->name . '" id="' . $this->id . '" value="'
			. htmlspecialchars($options['current_liabilities']) . '" readonly="readonly" />';
   }
   
}