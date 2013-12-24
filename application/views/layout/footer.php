</div><!-- container -->

<?php
	$this->prependJsFiles('jquery.ui.core.js');
	$this->prependJsFiles('jquery.ui.widget.js');
	$this->prependJsFiles('jquery.ui.datepicker.js');
	$this->appendJsFiles('tabs.js');
	$this->appendJsFiles('main.js');
  	$this->includeJsFiles();
?>
</body>
</html>
