<div class="row">
	<div class="col-md-12">
	<?php
	use backend\themes\metronic\widgets\MetronicBreadcrumbs;
	echo MetronicBreadcrumbs::widget([
	    'links' => [
	        [
	            'label' => 'Post Category',
	            'url' => ['post-category/view', 'id' => 10],
	        ],
	        ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]],
	        'Edit',
	    ],
	]);
	?>
	</div>
</div>