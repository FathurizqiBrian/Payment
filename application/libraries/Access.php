<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . '/xendit_sdk/autoload.php';

class Access {

	public function token(){

        $options['secret_api_key'] = "xnd_development_gECtyjUmA0p9CD4onXYCzHnASsrBCTjqJQirrJTMkrDa5p2zVE5TNzl0rbNLFO";
        
        $xenditPHPClient = new XenditClient\XenditPHPClient($options);
		return $xenditPHPClient;
	}
}