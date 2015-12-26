<html>
<body>
<?php
function scrape($id,$direction,$route) {
	$where = file_get_contents('http://mybusnow.njtransit.com/bustime/wireless/html/eta.jsp?route=' . $route . '&direction=' . $direction . '&id=' . $id . '&showAllBusses=off');
	if (strpos($where, 'No service is scheduled for this stop at this time.') !== FALSE) { return FALSE; }
	if (strpos($where, 'No arrival times available.') !== FALSE) { return FALSE; }
	$start = strpos($where, '<hr/>');
	$info = substr($where, $start, (strrpos($where, '<hr />') + 6) - $start);
	if (stripos($info, $direction) !==FALSE) {

		$getridofthis = '<b>#' . $route . '&nbsp;</b>';
		$info = str_replace($getridofthis,'',$info);
		$getridofthis = 'To ' . $route;
		$info = str_replace($getridofthis,'',$info); 

		$info = str_replace('<font size="+1">','',$info);
		$info = str_replace('<font size="-1">','',$info);
		$info = str_replace('</font>','',$info);

		$stopbegin = strpos($where, 'Stop: ') + 6;
		$stopend = strpos($where, 'Selected Stop #:') - 9;
		$distance = $stopend - $stopbegin;
		$selectedstop = substr($where, $stopbegin, $distance);
		
		$a = strpos($where, 'MIN') - 12;
		$min = substr($where, $a, $a + 19);
		$min = str_replace('&nbsp;MIN</b>','', $min); 
		$a = strpos($min, '<b>');
		$min = substr($min, $a, $a + 5);

		$selectedstop = '<hr/><b>' . rtrim($min) . ' MIN ' . rtrim($selectedstop) . '</b>';

		$info = str_replace('<hr/>', $selectedstop, $info);
		echo str_replace("<br/>", "", $info);
	}
}
	$id = $_GET['id'];
	$direction = $_GET['direction'];
	$route = $_GET['route'];

	scrape($id,$direction,$route);

?>
</body>
</html>