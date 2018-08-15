<?php
namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;

class CaptchaController extends Controller {

	public function show() {
		$builder = new CaptchaBuilder;
		$builder->build();
		$code = $builder->getPhrase();
		session()->put('captcha', $code);
		header('content/type:image/png');
		$builder->output();
	}
}
