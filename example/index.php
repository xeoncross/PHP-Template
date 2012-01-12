<?php

require('../Template.php');

// Set the path to the templates (if using MVC this should be called "view")
Template::$path = __DIR__ . '/view/';

// Load the page template
$template = new Template('page');
$template->title('Home - Example Site');

print $template;
