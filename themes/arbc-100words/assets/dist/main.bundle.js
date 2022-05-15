/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./static/src/main.css":
/*!*****************************!*\
  !*** ./static/src/main.css ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://harrington-theme/./static/src/main.css?");

/***/ }),

/***/ "./static/src/index.js":
/*!*****************************!*\
  !*** ./static/src/index.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _main_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./main.css */ \"./static/src/main.css\");\n\n\n\"use strict\";\n\nconst mobileMenu = document.getElementById('mobile-menu');\nconst openMobileMenu = document.getElementById('open-mobile-menu');\nconst closedNavIcon = document.getElementById('closed-nav-icon');\nconst openNavIcon = document.getElementById('open-nav-icon');\n\nopenMobileMenu.addEventListener( 'click', () => {\n  if( mobileMenu.classList.contains( 'hidden' ) && (window.innerWidth < 639) ) {\n    mobileMenu.classList.remove( 'hidden' );\n    closedNavIcon.classList.add('hidden');\n    openNavIcon.classList.remove('hidden');\n  } else {\n    mobileMenu.classList.add( 'hidden' );\n    closedNavIcon.classList.remove('hidden');\n    openNavIcon.classList.add('hidden');\n  }\n});\n\nwindow.addEventListener('resize', () => {\n  if ( window.innerWidth > 639 ) {\n    mobileMenu.classList.add( 'hidden' );\n  }\n});\n\n\n\n\n\n\n//# sourceURL=webpack://harrington-theme/./static/src/index.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./static/src/index.js");
/******/ 	
/******/ })()
;