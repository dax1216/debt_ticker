<?php
/**
* @package Joomla.Administrator
* @subpackage com_debtticker
*
* @copyright Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE.txt
*/
 
// No direct access to this file
defined('_JEXEC') or die;
 
// import Joomla controller library
jimport('joomla.application.component.controller');


/**
 * Hello World Component Controller
 *
 * @since   0.0.1
 */

define('BASIS_RATE1', 397705109.71);
define('BASIS_RATE2', 20031908.58);

set_time_limit(0);

class DebtTickerController extends JControllerLegacy
{

   public function setDebtValueDaily() {
      $model = $this->getModel('DebtLogsDaily', 'DebtTickerModel');
      
      $rates = $this->getRates();
      
      if($rates === false) {
         echo 'No rates set.';
         exit;
      }
      
      $obj = new stdClass();
      $obj->rate_date = date('Y-m-d');
      $obj->rate = $rates['interest_rate'];
      $obj->comp_rate = $rates['comp_interest_rate'];
      $obj->rate_val1 = round(BASIS_RATE1 * (1/360) * $rates['interest_rate'], 2);
      $obj->rate_val2 = round(BASIS_RATE2 * (1/360) * $rates['interest_rate'], 2);
      
      $model->insertDailyLog($obj);
      
      exit;
   }

   public function setDebtValueMinutes() { 
      $model = $this->getModel('DebtLogsMinutes', 'DebtTickerModel');

      $rates = $this->getRates();
      
      if($rates === false) {
         echo 'No rates set.';
         exit;
      }
      
      $model->insertMinuteLog($rates);
      exit;
   }
  
   public function getRates() {
      $db = JFactory::getDbo();
      $query = $db->getQuery(true);
      
      $query->select(array('params') )
            ->from($db->quoteName('#__modules'))
            ->where($db->quoteName('module') . ' = ' . $db->quote('mod_debtticker'));
      
      $db->setQuery($query);
      
      $row = $db->loadRow();
      if(isset($row[0]) && !empty($row[0])) {
         $params = json_decode($row[0]);

         return array('interest_rate' => (float) $params->interest_rate, 'comp_interest_rate' => (float) $params->comp_interest_rate);
      } else {
         return false;
      }
   }
}