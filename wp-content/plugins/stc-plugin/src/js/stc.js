
import { loadResults } from './loadResults.js';
import { syntaxHighlight } from './prettify.js';

window.addEventListener("load", function(){
    
    // store tabs variables
    var tabs = document.querySelectorAll("ul.nav-tabs > li");
    for( let i =0; i<tabs.length; i++) {
        tabs[i].addEventListener("click", switchTab);
    }

    function switchTab(event) {
        event.preventDefault(); // prevent URL to change

        document.querySelector("ul.nav-tabs > li.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");

        var clickedTab = event.currentTarget;
        var anchor = event.target;
        var activePaneID = anchor.getAttribute("href");

        clickedTab.classList.add("active");
        document.querySelector(activePaneID).classList.add("active");
    }
    
    // process parameters passed in from PHP: 
    const st_endpoint = stParams.st_api_url; 
    const st_api_key =  stParams.st_api_key;
    const st_qr = stParams.st_qr;
    const st_uid = stParams.st_uid;
    const combined_info_url = st_endpoint + "/" + st_uid + "/combined-info/";

    let msgs = document.querySelectorAll(".msg")
    msgs.forEach(element => {
        element.innerHTML = stParams[element.id];
    });

    // Test namecard used:
    // HTTPS://ST4.CH/Q/45EC0A5D100418MPP05181654E6F9D5
    // Redirects to:
    // https://stc.scantrust.com/team/#/product/45EC0A5D100418MPP05181654E6F9D5?uid=4083e7e5-1dc3-4d97-918f-84a91a6a8492
    let stJson = document.querySelector("#st_json");
    stJson.innerHTML = "LOADING....";
    loadResults(combined_info_url, st_api_key, showScanResults);

    function showScanResults(jsonResults) {
        stJson.innerHTML = syntaxHighlight(JSON.parse(jsonResults));
        //stJson.classList.add("prettyprint");
    }

});
