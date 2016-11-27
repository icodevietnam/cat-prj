<div class="container">
	<img class="col-md-12" src="<?= Url::imagePath().'engban.jpg' ?>" />
	<div class="row">
		<h4><?= $title ?></h4>
	    <hr style="color:silver;" />
	</div>
	<div class="row">
		<?php foreach ($lessions as $lession) { ?>
			<div class="col-md-6">
				<h5><?= $lession->title ?></h5>
				<img class="col-md-12" src="<?= $lession->img ?>" />
				<br/>
				<p><strong>Description:</strong> <?= $lession->description ?></p>
				<button onclick="loadLession(<?= $lession->id ?>);" class="btn btn-info btn-lg" type="button">Watch Lession</button>
			</div>
		<?php }?>
	</div>
</div>

<div id="loadLession" class="lg-modal modal" >
	<div class="row" style="padding: 20px;">
		<h5 class="title"></h5>
		<br/>
		<div class="content"></div>
		<iframe class="video" width="100%" height="600px" src="" frameborder="0" allowfullscreen></iframe>
	</div>
</div>


<?php
Assets::js([
	Url::templateHomePath().'js/page/lession.js'
]);
?>