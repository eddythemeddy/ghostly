<?php

use Postmark\PostmarkClient;

class MailHelper {

	const FROM_MAIL = 'info@ghostly.kitchen';
	const FROM_NAME = 'Ghostly';
	const API_KEY = '8365f97a-0552-467d-8e4b-6cfac21f4910';
	const EMAIL = 'info@scouty.io';

	private $logoImg = 'http://scouty.io/assets/public/img/logo-lg-blue.png';
	private $client;
	private $to = '';
	private $toName = '';
	private $subject = '';
	private $content = '';
	private $template = 'index';
	private $image = '';
	private $salutation = '';
	private $mailbody = '';
	private $cta = '';
	private $ctaLink = '';
	private $html = '';

	function __construct() {
		$this->client = new PostmarkClient(self::API_KEY);
	}

	public function send() {

		if(empty($this->to) || empty($this->toName) || empty($this->subject) || empty($this->content)) {
			return false;
		}

		$message = [
			'To' => $this->toName,
			'From' => self::EMAIL,
			'TrackOpens' => true,
			'Subject' => $this->subject,
			'TextBody' => $this->content,
			'HtmlBody' => $this->content,
			'Tag' => "New Year's Email Campaign"	    
	    ];
		
		$sendResult = $this->client->sendEmailBatch([$message]);
		return true;
	}

	public function setTo($str) {

		$this->to = $str;
	}

	public function setBody($str) {

		$this->content = $str;
	}

	public function setToName($str) {

		$this->toName = $str . '<' . $this->to . '>';
	}

	public function setSubject($str) {

		$this->subject = $str;
	}
}