<?php
/**
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ------------------------------------------------------------------------
//	HybridAuth End Point
// ------------------------------------------------------------------------

require_once( "Hybrid/Auth.php" );
require_once( "Hybrid/Endpoint.php" );
require_once(APPPATH.'/hybridauth-master/vendor/autoload.php'); #add this new line

Hybrid_Endpoint::process();