<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>РЕПРОТЭК</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
				<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
					<span class="fs-4">РEПРОТЭК</span>
				</a>
	
				<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
					<li><a href="?target=main" class="nav-link px-2 link-dark">Главная</a></li>
					<li><a href="?target=news" class="nav-link px-2 link-dark">Новости</a></li>
					<li><a href="?target=contacts" class="nav-link px-2 link-dark">Контакты</a></li>
					<li><a href="?target=about" class="nav-link px-2 link-dark">О нас</a></li>
				</ul>
	
				<div class="col-md-3 text-end">
					<button type="button" class="btn btn-outline-dark me-2">Войти</button>
					<button type="button" class="btn btn-outline-dark">Регистрация</button>
				</div>
			</div>
		</div>
	</header>
	<?php require $target;?>
	<footer>
		<div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
			<div class="col-md-4 d-flex align-items-center">
				<a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
					<svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
				</a>
				<span class="text-muted">2010—<?=date("Y")?> РЕПРОТЭК</span>
			</div>
	
			<ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
				<li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
				<li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
				<li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
			</ul>
		</div>
	</footer>
</body>
</html>