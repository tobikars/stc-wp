import { syntaxHighlight } from './prettify.js';

// all the shortcode magic happens here:
export function shortCodes(stc) {
    let shortCodesList = [
        {name: "st_json", generate: stJSON, elementName: "#st-json"},
        {name: "st_scan", generate: stScan, elementName: "#st-scan"},
        {name: "st_code", generate: stCode, elementName: "#st-code"},
        {name: "st_product", generate: stProduct, elementName: "#st-product"},
        {name: "st_brand", generate: stBrand, elementName: "#st-brand"},
        {name: "st_campaign", generate: stCampaign, elementName: "#st-campaign"},
    ];
    
    function stJSON(el) {
        console.log("stJSON")
        el.innerHTML = syntaxHighlight(JSON.stringify(stc));
    }

    function stScan(el) {
        console.log("stScan: " + stc.scan);
        let s = stc.scan;
        el.innerHTML = s.app + " / " + s.reason + "(" + s.result + ") country:" + s.country;
    }

    function stCode(el) {
        console.log("stCode: " + stc.code);
        let c = stc.code;
        let serial = c.qrcode.serial_number ? c.qrcode.serial_number : "none";
        el.innerHTML = c.qrcode.message + " (created on " + c.qrcode.creation_date + "), scan count:" + c.scan_count + " times ";
        el.innerHTML += " status: " + c.qrcode.activation_status + " serial: " + serial; 
    }

    function stProduct(el) {
        console.log("stProduct: " + stc.code.product);
        let product = stc.code.product;
        f(".st-product-title", product.sku + " - <a href='" +product.url + "'>" +  product.name + "</a>");
        f(".st-product-description", product.description);
        f(".st-product-img", "<img src='"+product.image + "' width='200px'/>");
    }

    function stBrand(el) {
        console.log("stBrand: " + stc.code.brand);
        let brand = stc.code.brand;
        f(".st-brand-title", brand.name);
        f(".st-brand-description", brand.description);
        f(".st-brand-img", "<img src='"+brand.image + "' width='200px'/>");
    }

    function stCampaign(el) {
        console.log("stCampaign: " + stc.scan);
        let s = stc.campaign;
        el.innerHTML = s.name + " (" + s.products.length + " products)";
    }

    function fillAll() {
        console.log("Activating Shortcodes: " + shortCodesList.length);
        shortCodesList.forEach( function (shortCode) {
            console.log("Generating shortcode " + shortCode.name + " into " + shortCode.elementName);
            let element = document.querySelector(shortCode.elementName);
            if (element) shortCode.generate(element);
        });
    } 

    function f(el, val) {
        document.querySelector(el).innerHTML = val;
    }

    fillAll();
}