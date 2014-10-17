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
define('INIT_VALUE', 400000000);
define('SEC_IN_A_YR', 31104000);
define('DATE_START', '2014-10-16 00:00:00');

class DebtTickerController extends JControllerLegacy
{

   public function set_debt_value() {
      $datetime = date('Y-m-d H:i:s');
      $seconds = strtotime($datetime) - strtotime(DATE_START);
      $rate = $this->_get_latest_rate();
      $debt_value = INIT_VALUE * (1 + $rate * ($seconds / SEC_IN_A_YR));


   }
}