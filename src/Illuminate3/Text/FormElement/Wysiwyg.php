<?php

namespace Illuminate3\Text\FormElement;

use Illuminate3\Form\Element\Hidden;

class Wysiwyg extends Hidden
{
    protected $view = 'text::element.wysiwyg';

    protected $attributes = array(
        'class' => 'wysiwyg'
    );

}