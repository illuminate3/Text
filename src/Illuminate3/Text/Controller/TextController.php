<?php

namespace Illuminate3\Text\Controller;

use Illuminate3\Form\FormBuilder;

class TextController extends \BaseController
{
	public function textarea($text)
	{
		return $text;
	}

	public function textareaConfig(FormBuilder $fb)
	{
		$fb->textarea('text')->label('Text')->required();
	}

	public function heading($heading, $text)
	{
		return sprintf('<%s>%s</%s>', $heading, $text, $heading);
	}

	public function headingConfig(FormBuilder $fb)
	{
		$fb->select('heading')->label('Heading')->choices(array('h1' => 'Biggest', 'h2' => 'Big', 'h3' => 'Medium'));
		$fb->text('text')->label('Text')->required();
	}
}

