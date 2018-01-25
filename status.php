<!DOCTYPE html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Status of federation</title>
<script type="text/javascript">


var vurl = 'https://www.cs.colostate.edu/~ct310/yr2016sp/more_assignments/project03masterlist.php';
var http = false;

http = new XMLHttpRequest();

var masterList;
http.open("POST", vurl, true);
http.setRequestHeader("Content-type", "text/json");
http.onreadystatechange = function() {
	if (http.readyState == 4) {
		masterList = (http.responseText);
	}
}


var tab = document.getElementById('masterlist');
var i = tab.rows.length;

for (j = 0; j < masterList.length; j++) {
	var rt = "<tr> <td>" + masterList[j].siteName + "</td> <td>" + masterList[j].awakeURL+ "</td> <td>" + masterList[j].petsListURL + "</td></tr>";
	var rr = tab.insertRow(i);
	rr.innerHTML = rt;
}
</script>
</head>
<body>
	<h3 style="text-align: center">Pet Federation status</h3>
	<table id='masterlist'>
		<tr>
			<th>siteName</th>
			<th>awakeURl</th>
			<th>petsListURL</th>
		</tr>
	</table>
</body>
</html>