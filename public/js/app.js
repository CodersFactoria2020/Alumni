/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\package.json: Error while parsing JSON - Unexpected token < in JSON at position 1160\n    at JSON.parse (<anonymous>)\n    at C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\config\\files\\package.js:57:20\n    at C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\config\\files\\utils.js:37:12\n    at Generator.next (<anonymous>)\n    at Function.<anonymous> (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\gensync-utils\\async.js:26:3)\n    at Generator.next (<anonymous>)\n    at evaluateSync (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\gensync\\index.js:244:28)\n    at Function.sync (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\gensync\\index.js:84:14)\n    at sync (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\gensync-utils\\async.js:66:25)\n    at sync (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\gensync\\index.js:177:19)\n    at onFirstPause (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\gensync\\index.js:204:19)\n    at Generator.next (<anonymous>)\n    at cachedFunction (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\config\\caching.js:68:46)\n    at cachedFunction.next (<anonymous>)\n    at findPackageData (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\config\\files\\package.js:33:18)\n    at findPackageData.next (<anonymous>)\n    at buildRootChain (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\config\\config-chain.js:105:92)\n    at buildRootChain.next (<anonymous>)\n    at loadPrivatePartialConfig (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\config\\partial.js:95:62)\n    at loadPrivatePartialConfig.next (<anonymous>)\n    at Function.<anonymous> (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\config\\partial.js:120:25)\n    at Generator.next (<anonymous>)\n    at evaluateSync (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\gensync\\index.js:244:28)\n    at Function.sync (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\gensync\\index.js:84:14)\n    at Object.<anonymous> (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\@babel\\core\\lib\\config\\index.js:41:61)\n    at Object.<anonymous> (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\babel-loader\\lib\\index.js:151:26)\n    at Generator.next (<anonymous>)\n    at asyncGeneratorStep (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\babel-loader\\lib\\index.js:3:103)\n    at _next (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\babel-loader\\lib\\index.js:5:194)\n    at C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\babel-loader\\lib\\index.js:5:364\n    at new Promise (<anonymous>)\n    at Object.<anonymous> (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\babel-loader\\lib\\index.js:5:97)\n    at Object.loader (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\babel-loader\\lib\\index.js:64:18)\n    at Object.<anonymous> (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\babel-loader\\lib\\index.js:59:12)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/css-loader/index.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: expected \"{\".\n   ╷\n13 │ @import \"components\";\r\n   │                     ^\n   ╵\n  C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\resources\\sass\\app.scss 13:21  root stylesheet\n    at C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\webpack\\lib\\NormalModule.js:316:20\n    at C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\loader-runner\\lib\\LoaderRunner.js:367:11\n    at C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\loader-runner\\lib\\LoaderRunner.js:233:18\n    at context.callback (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\loader-runner\\lib\\LoaderRunner.js:111:13)\n    at C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass-loader\\dist\\index.js:73:7\n    at Function.call$2 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:87584:16)\n    at _render_closure1.call$2 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:77359:12)\n    at _RootZone.runBinary$3$3 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:25587:18)\n    at _RootZone.runBinary$3 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:25591:19)\n    at _FutureListener.handleError$1 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:24041:19)\n    at _Future__propagateToListeners_handleError.call$0 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:24337:40)\n    at Object._Future__propagateToListeners (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:3497:88)\n    at _Future._completeError$2 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:24165:9)\n    at _AsyncAwaitCompleter.completeError$2 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:23557:12)\n    at Object._asyncRethrow (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:3253:17)\n    at C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:13333:20\n    at _wrapJsFunctionForAsync_closure.$protected (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:3276:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:23578:12)\n    at _awaitOnObject_closure0.call$2 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:23570:25)\n    at _RootZone.runBinary$3$3 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:25587:18)\n    at _RootZone.runBinary$3 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:25591:19)\n    at _FutureListener.handleError$1 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:24041:19)\n    at _Future__propagateToListeners_handleError.call$0 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:24337:40)\n    at Object._Future__propagateToListeners (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:3497:88)\n    at _Future._completeError$2 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:24165:9)\n    at _Future__asyncCompleteError_closure.call$0 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:24260:18)\n    at Object._microtaskLoop (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:3547:21)\n    at StaticClosure._startMicrotaskLoop (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:3553:11)\n    at _AsyncRun__scheduleImmediateJsOverride_internalCallback.call$0 (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:23475:21)\n    at invokeClosure (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:1360:26)\n    at Immediate.<anonymous> (C:\\xampp\\htdocs\\Laravel\\Nuevacarpeta\\Alumni-Frontend\\node_modules\\sass\\sass.dart.js:1381:18)\n    at processImmediate (internal/timers.js:456:21)");

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\Laravel\Nuevacarpeta\Alumni-Frontend\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\Laravel\Nuevacarpeta\Alumni-Frontend\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });