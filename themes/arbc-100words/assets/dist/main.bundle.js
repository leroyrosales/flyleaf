(()=>{"use strict";const e=document.querySelector("[data-mobile-menu]"),t=document.querySelector("[data-mobile-nav]"),n=document.getElementById("navbar");document.addEventListener("click",(function(e){e.target.matches("[data-menu-btn]")}),!1),e.addEventListener("click",(()=>{t.style.display="none"===t.style.display?"":"none",n.style.display="none"}))})();