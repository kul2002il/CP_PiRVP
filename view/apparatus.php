<div class="container py-3">
	<h2>
		<?= $apparatus['name']?>
	</h2>
</div>

<div class="container">
	<div class="row">
		<div class="col-4 my-2 py-2">
			<img alt="Изображение аппарата" class="img-fluid" src="<?=$apparatus['image']?>">
			<div class="border-bottom border-4"><?=$apparatus['status']?></div>
			<div>
				<a href="">Файлы</a>
			</div>
			<div>
				<a href="">История</a>
			</div>
		</div>
		<div class="col">
			<?php foreach ($histori as $pin):?>
			<div class="my-3 d-flex">
				<?php
				$myMess = $pin["sender"] === $user["id"];
				$spaceLeft = '';
				$spaceRight = '<dir class="flex-grow-1 m-0"></dir>';
				if($myMess){
					$spaceLeft = $spaceRight;
					$spaceRight = '';
				}
				?>
				<?=$spaceLeft?>
				<div class="bubble-message">
					<div>
						<?=$pin['context']?>
					</div>
					<div class="text-muted">
						<?=$pin['datetime']?>
					</div>
				</div>
				<?=$spaceRight?>
			</div>
			<?php endforeach;?>
			
			<form method="post" class="form-message border-top">
				<div class="d-flex align-items-end">
					<div class="btn">
						<img class="button-message" alt="paperclip" src="static/img/paperclip.svg">
					</div>
					<textarea class="flex-grow-1 autogrow textarea-message" autofocus></textarea>
					<button class="btn">
						<img class="button-message" alt="send" src="static/img/send.svg">
					</button>
				</div>
			</form>
		</div>
	</div>
</div>