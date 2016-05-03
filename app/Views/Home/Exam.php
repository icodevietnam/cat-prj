<div style="height: 300px;" class="container">

	<br/>
	<h4>Please choose the exams levels:</h4>
	<div class="row">
		<?php 
				foreach ($levels as $key => $value) { 
		?>
			<a style="margin-right: 10px;" class="col s2 btn btn-large teal waves-effect waves-light darken-3" ><?= $value->name ?></a>
		<?php
			}
		?>
	</div>
</div>