<div class="container">
	<h2 class="border-bottom border-4 my-3">Новая заявка</h2>
	<form method="post">
		<div class="row">
			<div class="col">
				<h3>Аппарат</h3>
				<select class="form-select mb-3">
					<option selected>Мой аппарат</option>
					<?php foreach ($apparatuses as $app):?>
					<option value="1"><?=$app['name']?></option>
					<?php endforeach;?>
				</select>
				
				<select class="form-select mb-3">
					<option selected>Тип</option>
					<?php foreach ($types as $app):?>
					<option value="1"><?=$app['name']?></option>
					<?php endforeach;?>
				</select>
				
				<select class="form-select mb-3">
					<option selected>Бренд</option>
					<?php foreach ($brands as $app):?>
					<option value="1"><?=$app['name']?></option>
					<?php endforeach;?>
				</select>
				
				<select class="form-select mb-3">
					<option selected>Модель</option>
					<?php foreach ($models as $app):?>
					<option value="1"><?=$app['name']?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="col">
				<h3>Поломка</h3>
				<div style="min-height: 70px;">
					<textarea
						placeholder="Описание поломки."
						class="mb-3 autogrow textarea-message"
						style="width: 100%;"></textarea>
				</div>
				<div class="input-group mb-3">
					<input type="file"
						class="form-control">
				</div>
				<input type="submit" class="btn btn-warning" name="request" value="Отправить">
			</div>
		</div>
	</form>
</div>