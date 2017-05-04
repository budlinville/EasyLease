/*
Written by Ben Conner
Tested by Weston Hack
Debugged by Ben Conner

5/1/17
Verifies user login credentials
*/

function logout() {
	document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/";
	location.reload();
}

function getCookie(name) {
	var cookieString = decodeURIComponent(document.cookie);
	var cookies = cookieString.split(";");
	for (var i in cookies) {
		var index = cookies[i].indexOf(name + "=");
		if (index + 1) { // != 0
			return cookies[i].substr(cookies[i].indexOf("=")+1);
		}
	}
	return "";
}

var locations = ["aboutUs.html"];
var names = ["About Us"]

var user = getCookie("user")

if (user !== "") { //if the user is logged in
	locations.splice(0,0,"manageAccount.html","javascript:logout()","createListing.html")
	names.splice(0,0,user,"Log Out","Make Listing")
} else {
	locations.splice(0,0,"login.html","createAccount.html")
	names.splice(0,0,"Login","Sign Up")
}

var basename = document.location.pathname;
basename = basename.substr(basename.lastIndexOf('/')+1);

var buildHtml = `
<ul id="navigation">
	<li class="title"><a href="./">EasyLease</a></li>
	<div id="right">
`

var baseEntry = `
<li class="{classname}"><a href="{href}">{title}</a></li>
`

for (i in locations) {
	var entry = baseEntry;
	entry = entry.replace("{classname}",(locations[i] == basename) && "here" || "").replace(
	"{href}",locations[i]).replace(
	"{title}",names[i]);
	buildHtml += entry;
}

buildHtml += `
<div></ul>
`
$(function() {
	$("#header").append(buildHtml)
})