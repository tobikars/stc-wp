<h1>Template: Testing the API Settings</h1>
Redirect from the platform typically calls something like: https://smartlabel.sites.scantrust.com/#/?uid={id}&api_key={api_key}&qr={qr}
<br/>Test namecard used:<br/>
<pre>HTTPS://ST4.CH/Q/45EC0A5D100418MPP05181654E6F9D5</pre>
Redirects to:<br/>
<pre>https://stc.scantrust.com/team/#/product/45EC0A5D100418MPP05181654E6F9D5?uid=4083e7e5-1dc3-4d97-918f-84a91a6a8492<br/></pre> 
<h2>How to Use:</h2>
<ul>
    <li>1. Add the &uid= and/or &qr= parameters to the URL above. </li>
    <li>2. If no uid= parameter is used the system will set a demo-scan: <b>4083e7e5-1dc3-4d97-918f-84a91a6a8492</b></li>
    <li>3. If no qr= parameter is used the system will set a demo-qr: <b>DD599859850418MPP051822749258AF</b></li>
    <li>4. Some JS magic will happen and the pretty-printed JSON will be shown below</li>
    <li>5. When you know it is all working, set the redirect in the ScanTrust campaign to a page and the data will be made available to the page. </li>
</ul>

<h2>Options set:</h2>

<h3>Endpoint: </h3>
<PRE class="msg" id="st_api_url_msg"></PRE>

<h3>API key:</h3>
<PRE class="msg" id="st_api_key_msg"></PRE>

<h2>2. Check if the parameters are passed correctly to Wordpress:</h2>

<h3>Scan UID: </h3>
<PRE class="msg" id="st_uid_msg"></PRE>

<h3>QR Code:</h3>
<PRE class="msg" id="st_qr_msg"></PRE>

<h2>Show if the data was retrieved correctly:</h2>
<PRE class="msg" id="config_error_msg"></PRE>

<h3>Scan JSON:</h3>
<PRE class="msg" id="st_json"></PRE>


