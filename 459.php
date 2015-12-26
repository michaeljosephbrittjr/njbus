<html>
<body>
<?php 
$tostops = array(20053,19956,19957,19958,19959,19961,15776,15777,15751,15798,15801,15769,31240,15800,16222,16217,15607,15623,15619,15939,16313,16325,16338,16353,16285,15947,15897,15815,14894,15657,30440,15125,15136,15037,15031); 
$fromstops = array(15141,15122,15654,15810,15944,16277,16294,15939,15621,15622,16229,15796,15797,15790,15794,15795,20029,19964,19966,19968,20034);
$to = 'Camden';
$from = 'Turnersville';
$route = '403';
// everything above is hardcoded *for now*
// ---------------------------------------
// everything seen below can be reused without modification
$therekey = count($tostops);
$backkey = count($fromstops); 
?>

<div id='therekey' style='display:none';><? echo $therekey; ?></div>
<div id='backkey' style='display:none';><? echo $backkey; ?></div>
<div id='to' style='display:none';><? echo $to; ?></div>
<div id='from' style='display:none';><? echo $from; ?></div>
<div id='route' style='display:none';><? echo $route; ?></div>

<?php
for ($therecount=0;$therecount<$therekey;$therecount++) 
	{echo '<div id="'.$therecount.'">'.$tostops[$therecount].'</div>';}
for ($backcount=0;$backcount<$backkey;$backcount++) 
	{echo '<div id="'.($backcount+$therekey).'">'.$fromstops[$backcount].'</div>';}
?>

<script src="getbustimes.js"></script>
<button onclick="showall(<?php echo ($backcount+$therekey);?>)">[show all]</button>
<br>
<br>
<a href="400.php">400</a> | <a href="403.php">403</a> | <a href="459.php">459</a>

</body>
</html>
