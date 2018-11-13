
// loadResults: load the STC data and call the callback with the JSON
// Namecard:
// API key: eyJjYW1wYWlnbl9pZCI6Mzd9:1gM7Wm:2W2ywtk8xip3aLH6x9NG2x5C_l0
// Redirect URL: https://stc.scantrust.com/team/#/product/{qr}?uid={id}
    
export function loadResults(url, api_key, cb) {
    console.log("Requesting: " + url);
    const Http = new XMLHttpRequest();
    Http.open("GET", url);
    Http.setRequestHeader("x-scantrust-consumer-api-key", api_key);
    Http.send();
    Http.onreadystatechange = function(e) {
        console.log("JSON Loaded: " +  Http.responseText);
        cb(Http.responseText);
    }
}