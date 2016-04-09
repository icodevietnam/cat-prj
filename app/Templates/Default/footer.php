</div>
<div class="footer">
	<div class="pull-right">
		 Greenwich <strong> University</strong>.
	</div>
	<div>
		<strong>Copyright</strong> Greenwich University Saigon &copy; 2014-2015
	</div>
</div>

</div>
</div>

<?php
Assets::js([
	Url::templatePath().'js/jquery-2.1.1.js',
	Url::templatePath().'js/bootstrap-select.js',
	Url::templatePath().'js/bootstrap-datepicker.js',
	Url::templatePath().'js/jquery.dataTables.js',
	Url::templatePath().'js/dataTables.bootstrap.js',
	Url::templatePath().'js/jquery.validate.js',
	Url::templatePath().'js/bootstrap.min.js',
	Url::templatePath().'js/plugins/metisMenu/jquery.metisMenu.js',
	Url::templatePath().'js/plugins/slimscroll/jquery.slimscroll.min.js',
	Url::templatePath().'js/inspinia.js',
	Url::templatePath().'js/plugins/pace/pace.min.js',
]);
echo $js; //place to pass data / plugable hook zone
echo $footer; //place to pass data / plugable hook zone
?>

</body>
</html>
