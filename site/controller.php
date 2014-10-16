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

define('RATE_URL', 'http://www.emmi-benchmarks.eu/euribor-eonia-org/about-eonia.html');

set_time_limit(0);

class DebtTickerController extends JControllerLegacy
{

    public function set_rate() {
        $contents = $this->_make_request(RATE_URL);

        preg_match("/<br\/>(-?[0-9]\d*(\.\d+))<br\/>/i", $contents, $rate_matches);                
        preg_match("/<br\/> \((\d{2}\/\d{2}\/\d{4})\)/i", $contents, $rate_date_matches);
        
        if(!empty($rate_matches) && !empty($rate_date_matches) && !empty($rate_matches[1]) && !empty($rate_date_matches[1])) {
           
            
        }
    }
    
    public function get_rate() {
        
    }
    
    private function _make_request($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,            $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT,      'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.12) Gecko/20080201 Firefox/2.0.0.12');
        curl_setopt($curl, CURLOPT_HEADER,         0);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
     }

    private function _send_email() {
        $mailer = JFactory::getMailer();
        
        $config = JFactory::getConfig();
        $sender = array( 
            $config->getValue( 'config.mailfrom' ),
            $config->getValue( 'config.fromname' ) );

        $mailer->setSender($sender);
        
        $mailer->addRecipient($config->getValue( 'config.mailfrom' ));
        
        $body = "Component unable to retrieve interest rate from http://www.emmi-benchmarks.eu/euribor-eonia-org/about-eonia.html. Please contact developer for help.";
        $mailer->setSubject('Joomla Debt Ticker notification');
        $mailer->setBody($body);
        
        $send = $mailer->Send();
        if ( $send !== true ) {
            echo 'Error sending email: ' . $send->__toString();
        } else {
            echo 'Mail sent';
        }
    }
}