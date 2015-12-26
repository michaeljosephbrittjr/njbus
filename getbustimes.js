function getbustime(counter,url,busesontheroad) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
	    if (xhr.readyState == 4) {
	    	var element = document.getElementById(counter);
	        element.innerHTML = xhr.responseText;
	        var busid = element.innerHTML.substr((element.innerHTML.indexOf("Bus") + 4),4);
	        if (busesontheroad.indexOf(busid) > -1) { element.style.display = 'none'; }
			else { busesontheroad.push(busid); }
	    }
	}
	xhr.open('GET', url, true);
	xhr.send(null);
}

function showall(stop) {
	for (i=0;i<stop;i++) {
		document.getElementById(i).style.display = 'block'; 
	}
}

var therekey = Number(document.getElementById('therekey').innerHTML);
var backkey = Number(document.getElementById('backkey').innerHTML);
var to = document.getElementById('to').innerHTML;
var from = document.getElementById('from').innerHTML;
var route = document.getElementById('route').innerHTML;
var url = '';
var stopidnumber = '';
var busesontheroad = [];

for (i=0;i<therekey;i++) {
	stopidnumber = document.getElementById(i).innerHTML;
	url = 'scrape.php?' + 'id=' + stopidnumber + '&direction=' + to +'&route=' + route; 
	getbustime(i,url,busesontheroad); 
}

for (i=therekey;i<(backkey+therekey);i++) {
	stopidnumber = document.getElementById(i).innerHTML;
	url = 'scrape.php?' + 'id=' + stopidnumber + '&direction=' + from + '&route=' + route; 
	getbustime(i,url,busesontheroad); 
}