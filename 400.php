<html>
<body>
<?php 
$route = '400'; 
$to = 'Philadelphia'; 
$from = 'Sicklerville'; 
$tostops = array(19847,19853,19839,19880,19881,20033,19956,19957,19958,19959,19961,19962,20038,20039,15802,15702,15708,15717,15718,16242,16244,14922,14865,15836,15190,15193,15136,15031,15032,15010); 
$fromstops = array(27961,27949,27954,27947,27957,27960,30380,15034,15209,15212,15214,15216,15833,14929,14931,16240,15682,15685,15693,15699,20044,20046,20029,19964,19965,19966,19968,20034,20024,19854,19847,16439,16405,16422);
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
