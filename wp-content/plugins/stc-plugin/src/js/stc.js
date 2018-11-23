import { loadResults } from './loadResults.js';
import { shortCodes } from './shortCodes.js';

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
    
    if (stParams.st_pojo_active ||  stParams.st_jquery_active) {    
        // process parameters passed in from PHP: 
        const st_endpoint = stParams.st_api_url; 
        const st_api_key =  stParams.st_api_key;
        const st_qr = stParams.st_qr;
        const st_uid = stParams.st_uid;
        let combined_info_url = st_endpoint.replace("{id}", st_uid).replace("{qr}", st_qr);

        let msgs = document.querySelectorAll(".msg")
        msgs.forEach(element => {
            element.innerHTML = stParams[element.id];
        });

        // if we have an element with the ID st_json, load our JSON in there:
        let stJson = document.querySelector("#st-json");
        if (stJson) {
            stJson.innerHTML = "LOADING....";
        }

        loadResults(combined_info_url, st_api_key, function(stc){
            if (stParams.st_jquery_active) {
                window.stc = stc;
                console.log("Created ScanTrust Javascript object: window.stc : " + window.stc);
            }
            if (stParams.st_jquery_active) {
                if (JQuery) { 
                    JQuery.stc = stc;               
                } else {
                    console.log("ERROR: JQuery not found!");
                }
            }
            console.log("updating shortcodes:")
            shortCodes(stc);
        }); 

    } 
});
