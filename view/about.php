<div class="container row">
	<div class="col-md-5 list-group p-4">
		<?php
		$end = count($about);
		for ($i = 0; $i < $end; $i++):?>
		<label class="list-group-item"
			for="page<?=$i?>">
			<?= $about[$i]['title']?>
		</label>
		<?php endfor;?>
	</div>
	<div class="switch-widget col py-4">
		<?php
		for ($i = 0; $i < $end; $i++):?>
		<input type="radio" name="pager" id="page<?=$i?>"
		<?=isset($about[$i]['default']) && $about[$i]['default'] ? 'checked' : ''?>>
		<div>
			<h2><?= $about[$i]['title']?></h2>
			<?= $about[$i]['body']?>
		</div>
		<?php endfor;?>
	</div>
</div>