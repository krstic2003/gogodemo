<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<META HTTP-EQUIV="Cache-Control" CONTENT="max-age=0">
		<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
		<META http-equiv="expires" content="0">
		<META HTTP-EQUIV="Expires" CONTENT="Tue, 01 Jan 1980 1:00:00 GMT">
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<title>GoGoBook</title>
		<!-- build:css styles/main.css -->
		<link rel="stylesheet" href="Strut/app/components/bootstrap/css/bootstrap.css"></link>
		<link rel="stylesheet" href="Strut/app/components/bootstrap/css/bootstrap-responsive.css"></link>
		<link rel="stylesheet" href="Strut/app/styles/custom-pixie.css"></link>
		<link href='Strut/app/preview_export/css/web-fonts.css' rel='stylesheet' type='text/css'></link>
		<link href='Strut/app/components/etch/etch.css' rel='stylesheet' type='text/css'></link>
		<link href='Strut/app/components/spectrum/spectrum.css' rel='stylesheet' type='text/css'></link>
		<link rel="stylesheet" type="text/css" href="Strut/app/styles/close-btn.css" />
		<link rel="stylesheet" type="text/css" href="Strut/app/styles/main.css" />
		<link rel="stylesheet" href="Strut/app/preview_export/css/themes/default-reset.css"></link>
		<!-- endbuild -->

		<!-- can't build this in due to font imports -->
		<link rel="stylesheet" href="Strut/app/preview_export/reveal/css/theme/default.css"></link>

		<link rel="stylesheet" type="text/css" href="Strut/app/styles/built.css"></link>
		<script type="text/javascript" src="Strut/app/preview_export/download_assist/swfobject.js"></script>
		<script src="{{ asset('js/app.js') }}"></script>

	</head>
	<body class="bg-default">
		<div class="header-main pixie-header">
			<!-- Logo -->
			<div class="shrink-0 flex items-center">
				<a href="#">
					<img src="../img/logo.png" alt="" width="270" height="59">
				</a>
			</div>
			<div class="head-but"><div class="blef">{{ $book->format }}</div> <div class="brig">{{ $book->cover }}<br>{{ $book->pages }} strana</div></div> 
    <div class="head-but head-but-wh">{{ $book->price }} <span>RSD</span></div>
			<div class="login-nav pixie-head-nav">
				<a class="head-but btn" href="#">SA??UVAJ</a> <a class="head-but btn" href="#">POGLEDAJ</a> <a class="head-but btn grn" href="#">PORU??I</a>
			</div>
		
		</div>
		<!--[IF IE]>
			<div class="container">
			<div class="alert alert-success">
				Internet Explorer does not support the 3-D transitions required by <strong>Strut</strong>.
				<br/>
				<br/>
				<strong>Strut</strong> currenly only works in <a href="http://www.mozilla.org/en-US/firefox/new/">Firefox</a>, <a href="https://www.google.com/intl/en/chrome/browser/">Chrome</a> and <a href="http://support.apple.com/kb/DL1531">Safari</a>.
				<br/>
				We do hope to support IE 10 sometime in the future.
				<br/><br/>
				Sorry for the inconvenience.
			</div>
			</div>
		<![endif]-->
		<script>
		window.isOptimized = false;
		if (!Function.prototype.bind) {
		  Function.prototype.bind = function (oThis) {
		    if (typeof this !== "function") {
		      // closest thing possible to the ECMAScript 5 internal IsCallable function
		      throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
		    }

		    var aArgs = Array.prototype.slice.call(arguments, 1), 
		        fToBind = this, 
		        fNOP = function () {},
		        fBound = function () {
		          return fToBind.apply(this instanceof fNOP && oThis
		                                 ? this
		                                 : oThis,
		                               aArgs.concat(Array.prototype.slice.call(arguments)));
		        };

		    fNOP.prototype = this.prototype;
		    fBound.prototype = new fNOP();

		    return fBound;
		  };
		}

		if (!Array.prototype.some) {
		  Array.prototype.some = function(fun /*, thisp */) {
		    'use strict';

		    if (this == null) {
		      throw new TypeError();
		    }

		    var thisp, i,
		        t = Object(this),
		        len = t.length >>> 0;
		    if (typeof fun !== 'function') {
		      throw new TypeError();
		    }

		    thisp = arguments[1];
		    for (i = 0; i < len; i++) {
		      if (i in t && fun.call(thisp, t[i], i, t)) {
		        return true;
		      }
		    }

		    return false;
		  };
		}

		if (!Array.prototype.forEach) {
		    Array.prototype.forEach = function (fn, scope) {
		        'use strict';
		        var i, len;
		        for (i = 0, len = this.length; i < len; ++i) {
		            if (i in this) {
		                fn.call(scope, this[i], i, this);
		            }
		        }
		    };
		}

		var head = document.getElementsByTagName('head')[0];
		function appendScript(src) {
			var s = document.createElement("script");
    		s.type = "text/javascript";
    		s.src = src;
    		head.appendChild(s);
		}

		if (window.location.href.indexOf("preview=true") == -1) {
			window.dlSupported = 'download' in document.createElement('a');
			window.hasFlash = swfobject.hasFlashPlayerVersion(9);
			if (!dlSupported && window.hasFlash) {
				appendScript('preview_export/download_assist/downloadify.min.js');
			}
		}
		</script>
		<!-- build:js scripts/amd-app.js -->
    	<script type="text/javascript" data-main="scripts/main" src="Strut/app/scripts/libs/require.js"></script>
		<!-- endbuild -->
		<div id="modals">
		</div>
		<script>
			jQuery(document).ready(function($){

		        $(".slideEditor").addClass("krle");
		        $(".operatingTable .slideContainer").append("<div class='slide-left'>aaaa</div><div class='slide-right'>bbb</div>");
		        
		        //console.log(pixie.tools.import);
		        //console.log(pixie.tools.objects.getAll());
		    });
		</script>
	</body>
</html>
