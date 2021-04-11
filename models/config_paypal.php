<?php
define('ProPayPal', 0);
if (ProPayPal) {
	define("PayPalClientId", "*********************");
	define("PayPalSecret", "*********************");
	define("PayPalBaseUrl", "https://api-m.sandbox.paypal.com/v2/");
	define("PayPalENV", "production");
} else {
	define("PayPalClientId", "Aa-QlPKpVT0mp3nTLBWK9m-yZUUTTsb_lvjVyVR4JCixupekGzohuvnqsu8cwZ7um3NCGKt15T9TJ_Cf");
	define("PayPalSecret", "EJ2WF2RNJO407y9eDMGFpx7NWuUgrOtDfYKkt1Whow-T3448zeWg39blCNYvP1K4IgL8SFlrtlCvsc0u");
	define("PayPalBaseUrl", "https://api-m.sandbox.paypal.com/v2/");
	define("PayPalENV", "sandbox");
}
