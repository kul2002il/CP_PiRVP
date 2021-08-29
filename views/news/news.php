<?php

/* @var $this yii\web\View */
/* @var $news app\models\News */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Новости';

?>
<?php foreach ($news as $article):?>
<div class="news-article">
	<div class="container col-xxl-8 px-4">
		<div class="row flex-lg-row-reverse align-items-center py-4">
			<div class="col-10 col-sm-8 col-lg-6">
				<img src="<?= Url::to($article->idFile0->name)?>" class="d-block mx-lg-auto img-fluid"
					alt="image" width="350" height="250" loading="lazy">
			</div>
			<div class="col-lg-6">
				<h2 class="display-5 fw-bold mb-3"><?= Html::encode($article->title)?></h2>
				<p><?= Html::encode($article->content)?></p>
				<span class="text-muted"><?= Html::encode($article->datetime)?></span>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
