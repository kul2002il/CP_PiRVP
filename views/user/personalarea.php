<?php

?>
<div class="container my-3">
	<div>
		<a class="btn btn-warning" href="?target=request">Подать заявку</a>
	</div>
</div>

<?php foreach ($apparatuses as $article):?>
<div class="news-article">
	<div class="container px-4">
		<div class="row align-items-center py-4">
			<div class="col-2">
				<img src="<?= $article['image']?>" class="d-block mx-lg-auto img-fluid"
					alt="image" loading="lazy">
			</div>
			<div class="col">
				<h3>
					<a href="?target=apparatus" class="link-dark text-decoration-none">
						<?= $article['name']?>
					</a>
				</h3>
				<!-- <div class="row row-cols-2">
					<?php foreach ($article['hist'] as $pin):?>
					<div class="col">
						<?=$pin['context']?>
					</div>
					<div class="col-3">
						<?=$pin['datetime']?>
					</div>
					<?php endforeach;?>
				</div> -->
				<table>
					<?php foreach ($article['hist'] as $pin):?>
					<tr>
						<td>
							<?=$pin['context']?>
						</td>
						<td style="width: 10em;">
							<?=$pin['datetime']?>
						</td>
					</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
