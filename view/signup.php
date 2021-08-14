<div class="container p-4">

<h1 class="h3 mb-3 fw-normal w-3">Регистрация</h1>

<form method="post">
	<div class="row">
		<div class="col">
	
			<div class="form-floating py-2">
				<input type="email" class="form-control" id="nameLast" placeholder="name@example.com">
				<label for="nameLast">Фамилия</label>
			</div>
	
			<div class="form-floating py-2">
				<input type="email" class="form-control" id="nameFirst" placeholder="name@example.com">
				<label for="nameFirst">Имя</label>
			</div>
	
			<div class="form-floating py-2">
				<input type="email" class="form-control" id="nameMidle" placeholder="name@example.com">
				<label for="nameMidle">Отчество</label>
			</div>
	
			<div class="form-floating py-2">
				<input type="email" class="form-control" id="email" placeholder="name@example.com">
				<label for="email">Email</label>
			</div>
			
			<div class="form-floating py-2">
				<input type="password" class="form-control" id="password" placeholder="Password">
				<label for="password">Пароль</label>
			</div>
			
			<div class="form-floating py-2">
				<input type="password" class="form-control" id="repeatePassword" placeholder="Password">
				<label for="repeatePassword">Повторение пароля</label>
			</div>
			<input class="w-100 btn btn-lg btn-primary" type="submit" name="signup" value="Зарегистрироваться">
		</div>
		<div class="col">
			<div class="border border-2 rounded py-2">
				Пароль
				<ul>
					<li>Должен содержать не менее восьми символов.</li>
					<li>Состоит из заглавных и прописных символов
						латинского (A-Z, a-z) алфавита.</li>
					<li>Содержит в себе цифры</li>
					<li>Содержит спецсимволы</li>
					<li>Не является последовательностью клавишь на клавиатуре (asdfghjkl).</li>
				</ul>
			</div>
		</div>
	</div>
</form>

</div>
