<!doctype html>
<html lang="en">

<head>
	<title>Login SIRESPI</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('assets/login/css/style.css') }}">

</head>

<body>
	<section class="ftco-section ">
		<div class="container">
			<!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Resep</h2>
				</div>
			</div> -->
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<!-- <span class="fa fa-user-o"></span> -->
							<img src="{{ asset('assets/admin/img/brand/minisirespi.png') }}">
						</div>
						<!-- <h3 class="text-center mb-4">Masuk</h3> -->
						<form method="POST" action="{{ route('login') }}" class="login-form">
							@csrf
							<div class="form-group">
								<input name="email" type="text" class="form-control rounded-left" placeholder="Email" required>
							</div>
							<div class="form-group d-flex">
								<input name="password" type="password" class="form-control rounded-left" placeholder="Password" required>
							</div>
							<div class="form-group">
								<div class="w-100 text-md-right">
									<a href="{{ route('register') }}">Daftar?</a>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary rounded submit px-3">Masuk</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('assets/login/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/login/js/popper.js') }}"></script>
	<script src="{{ asset('assets/login/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/login/js/main.js') }}"></script>

</body>

</html>