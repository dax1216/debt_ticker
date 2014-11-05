<?php
// No direct access
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addStyleSheet( JUri::root() . '/media/mod_debtticker/css/odometer.css' );
$doc->addScript( JUri::root() . '/media/mod_debtticker/js/odometer.js' );

?>
<div class="dt-mod">
    <div class="dt-text-before"><?= $settings['text_before'] ?></div>
    <div id="dt-display" class="odometer"><?=$recentRate['debt']?></div>
    <div class="dt-text-before"><?= $settings['text_after'] ?></div>
</div>
<input type="hidden" id="debt" value="<?=$recentRate['debt']?>" />
<input type="hidden" value="<?=date('Y-m-d H:i:s')?>" />
<script type="text/javascript">
   var elmdt = document.getElementById('dt-display');

   var od = new Odometer({
     el: elmdt,
     value: <?=$recentRate['debt']?>,
     // Any option (other than auto and selector) can be passed in here
     format: '(,ddd)',
     theme: 'train-station',
     auto: true
   });

   var dttimer = setInterval( function() { setDebtValue() }, 3000);
   var debt = <?=$recentRate['debt']?>;

   function setDebtValue() {
      od.update(debt++);
   }


</script>