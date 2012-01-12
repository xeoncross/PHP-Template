<?php $this->start(); ?>

	<h2>Page Title</h2>
	<p>This is the title text of the page</p>

<?php $this->end('content'); ?>

<!-- Overwrite the footer -->
<?php $this->start(); ?>
	&copy; <?php print date('Y'); ?> example-site.com
<?php $this->end('footer'); ?>

<!-- Extend the layout template -->
<?php $this->extend('layout'); ?>
