!function a(o,u,i){function c(t,e){if(!u[t]){if(!o[t]){var r="function"==typeof require&&require;if(!e&&r)return r(t,!0);if(l)return l(t,!0);var n=new Error("Cannot find module '"+t+"'");throw n.code="MODULE_NOT_FOUND",n}var s=u[t]={exports:{}};o[t][0].call(s.exports,function(e){return c(o[t][1][e]||e)},s,s.exports,a,o,u,i)}return u[t].exports}for(var l="function"==typeof require&&require,e=0;e<i.length;e++)c(i[e]);return c}({1:[function(e,t,r){"use strict";Object.defineProperty(r,"__esModule",{value:!0}),r.loadResults=function(e,t,r){console.log("Requesting: "+e);var n=new XMLHttpRequest;n.open("GET",e),n.setRequestHeader("x-scantrust-consumer-api-key",t),n.send(),n.onreadystatechange=function(e){console.log("JSON Loaded: "+n.responseText),r(n.responseText)}}},{}],2:[function(e,t,r){"use strict";Object.defineProperty(r,"__esModule",{value:!0}),r.syntaxHighlight=function(e){"string"!=typeof e&&(e=JSON.stringify(e,void 0,2));return(e=e.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;")).replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g,function(e){var t="number";return/^"/.test(e)?t=/:$/.test(e)?"key":"string":/true|false/.test(e)?t="boolean":/null/.test(e)&&(t="null"),'<span class="'+t+'">'+e+"</span>"})}},{}],3:[function(e,t,r){"use strict";var u=e("./loadResults.js"),i=e("./prettify.js");window.addEventListener("load",function(){for(var e=document.querySelectorAll("ul.nav-tabs > li"),t=0;t<e.length;t++)e[t].addEventListener("click",r);function r(e){e.preventDefault(),document.querySelector("ul.nav-tabs > li.active").classList.remove("active"),document.querySelector(".tab-pane.active").classList.remove("active");var t=e.currentTarget,r=e.target.getAttribute("href");t.classList.add("active"),document.querySelector(r).classList.add("active")}var n=stParams.st_api_url,s=stParams.st_api_key,a=(stParams.st_qr,n+"/"+stParams.st_uid+"/combined-info/");document.querySelectorAll(".msg").forEach(function(e){e.innerHTML=stParams[e.id]});var o=document.querySelector("#st_json");o.innerHTML="LOADING....",(0,u.loadResults)(a,s,function(e){o.innerHTML=(0,i.syntaxHighlight)(JSON.parse(e))})})},{"./loadResults.js":1,"./prettify.js":2}]},{},[3]);
//# sourceMappingURL=stc.js.map