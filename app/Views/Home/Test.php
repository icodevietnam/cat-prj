<?php if(Session::get('user')[0] == null ) { ?>
	<h4>You do not have permission for do the exams</h4>
<?php } 
	else {
?>
<div class="container">

	<br/>
	<h5 class="col s3">Please do your test:( Total: <?= $total ?> points)</h5>
	<p style="border-bottom: 1px dotted black; ">From : <?= $from ?> - To : <?= $to ?></p>
	<div class="row">
		<div class="grey lighten-2 col s12">
			<?php 
				$i=1;
				foreach ($listId as $key => $value) { 
			?>
				<div class="question-wrapper">
					<strong>Question <?php echo($i++); ?>:<?= $value->name ?> (Points : <?= $value->point ?> )</strong> 
					<p><?= $value->description ?></p>
					<?php
						if(strpos($value->audio, 'Do not') === false)
						{
					?>
					<audio controls>
					<source src="<?= $value->audio ?>" type="audio/mpeg">
					</audio>
					<?php
						}
					?>
				</div>
				<div style="border-bottom: 1px dotted black;" id="question-<?= $value->id ?>" class="answer-wrapper" >
					<input type="text" class="hidden questions form-control" name="questions" value="<?= $value->id ?>" />
				</div>
			<?php
				}
			?>
		</div>
	</div>
</div>

<?php  
	}
?>