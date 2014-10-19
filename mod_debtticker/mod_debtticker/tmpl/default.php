<?php 
// No direct access
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addStyleSheet( JUri::root() . '/media/mod_debtticker/css/odometer.css' );
$doc->addScript( JUri::root() . '/media/mod_debtticker/js/odometer.js' );

?>
<div class="dt-mod">
    <div class="dt-text-before"><?= $settings['text_before'] ?></div>
    <div id="dt-display" class="odometer"><?=$comDebtTicker['current_liabilities']?></div>
    <div class="dt-text-before"><?= $settings['text_after'] ?></div>
</div>

<script type="text/javascript">
   var elmdt = document.getElementById('dt-display');
   
   var od = new Odometer({
     el: elmdt,
     value: <?=$comDebtTicker['current_liabilities']?>,

     // Any option (other than auto and selector) can be passed in here
     format: '(,ddd)',
     theme: 'train-station'
   });
   var seconds = <?= $seconds?>;
   
   var dttimer = setInterval( function() { setDebtValue() }, 3000);
   
   function setDebtValue() {
      debt_value = 400000000 * (1 + <?=$recentRate['rate']?> * ( seconds / 31104000));
      seconds += 3000;
      od.update(debt_value);      
   }
   
</script>