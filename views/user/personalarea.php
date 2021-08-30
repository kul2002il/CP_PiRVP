<?php

/* @var $this yii\web\View */
/* @var $pagination yii\data\Pagination*/
/* @var $apparatuses app\models\Apparatus[] */

use app\widgets\Pagination;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Мои аппараты";
?>

<div class="container my-3">
	<div>
		<a class="btn btn-warning" href="?target=request">Подать заявку</a>
	</div>
</div>

<?= Pagination::widget(['pagination' => $pagination]) ?>
<?php foreach ($apparatuses as $article):?>
<div class="news-article">
	<div class="container px-4">
		<div class="row align-items-center py-4">
			<div class="col-3">
				<img src="/<?= Url::to($article->idFile0->name)?>"
					class="img-fluid"
					alt="image">
			</div>
			<div class="col">
				<h3>
					<a href="?target=apparatus" class="link-dark text-decoration-none">
						<?= Html::encode($article->name)?>
					</a>
				</h3>
				<?php if($article->lastRepair):?>
				<table>
					<?php foreach ($article->lastRepair->messages as $pin):?>
					<tr>
						<td>
							<?=Html::encode($pin->content)?>
						</td>
						<td style="width: 10em;">
							<?=Html::encode($pin->datetime)?>
						</td>
					</tr>
					<?php endforeach;?>
				</table>
				<?php else:?>
				<div>Нет ремонтов.</div>
				<a class="btn btn-warning" href="?target=request">Подать заявку</a>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<?= Pagination::widget(['pagination' => $pagination]) ?>
