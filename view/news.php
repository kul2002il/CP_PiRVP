<?php foreach ($news as $article):?>
<div class="news-article">
	<div class="container col-xxl-8 px-4">
		<div class="row flex-lg-row-reverse align-items-center py-4">
			<div class="col-10 col-sm-8 col-lg-6">
				<img src="<?= $article['image']?>" class="d-block mx-lg-auto img-fluid"
					alt="image" width="350" height="250" loading="lazy">
			</div>
			<div class="col-lg-6">
				<h1 class="display-5 fw-bold mb-3"><?= $article['title']?></h1>
				<p><?= $article['text']?></p>
				<span class="text-muted"><?= $article['datetime']?></span>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>