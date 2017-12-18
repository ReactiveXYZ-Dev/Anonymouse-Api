<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Anonymouse. Secure. Social.</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Work+Sans" rel="stylesheet">
		<style type="text/css">
			/* Generic colors */
			.light-yellow {
				color: #F2AE00 !important;
			}
			.bg-light-yello {
				background-color: #F2AE00 !important;
			}
			.light-gray {
				color: #95989A !important;
			}
			.dark-gray {
				color: #5B5E60 !important;
			}
			.uppercase {
				text-transform: uppercase;
			}
			/* Components */
			.heading {
				font-family: 'Work Sans', sans-serif;
			}
			.menu {
				font-weight: 500;
				text-align: right;
			}
			.slogan-title {
				font-weight: 1000;
				margin-left: 10%;
				font-size: 40px;
				font-family: 'Roboto Slab', serif;
				letter-spacing: 2px;
				line-height: 1;
				width: 35%;
			}
			.slogan-subtitle {
				margin-top: 20px;
				margin-left: 10%;
				font-family: 'Work Sans', sans-serif;
				font-size: 11px;
				width: 35%;
				font-weight: 600;
			}
			.form {
				margin-left: 10%;
				width: 35%;
				margin-top: 20px;
			}
			.bottom-bordered {
				border-bottom: 1px solid #5B5E60
			}
			#signup-input {
				font-size: 12px;
			}
			#signup-btn {
				font-family: 'Work Sans', sans-serif;
				font-size: 12px;
				font-weight: 600;
			}
			#bg-image {
				position: absolute;
				width: 50%;
				float: right;
				margin-left: 50%;
				max-width: 512px;
			}
			#features {
				margin-top: 20%;
			}
			#features .columns {
				margin: 0 10% 0 10%;
			}
			#features .columns .card {
				box-shadow: none;
			}
			#features .columns .image {
				max-width: 90px;
				margin: 0 auto;
			}
			#features .columns .content {
				text-align: center;
				font-weight: 600;
				font-family: 'Work Sans', sans-serif;
				margin-top: 15px;
			}
		</style>
	</head>
	<body>
		<div id="bg-image">
			<img src="/images/app_screen.png">
		</div>
		<section class="section">
			<div class="container">
				<div class="columns">
					<div class="column">
						<h1 class="is-pulled-left heading light-yellow title is-6 uppercase">
						anonymouse
						</h1>
					</div>
					<div class="column">
						<ul class="is-pulled-right menu uppercase">
							<li><a class="light-gray" href="#">home</a></li>
							<li><a class="light-gray" href="#">about</a></li>
							<li><a class="light-gray" href="#">contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="hero is-white is-medium">
			<div class="container slogan">
				<h1 class="slogan-title dark-gray">
				See what's happening around you
				</h1>
				<h2 class="slogan-subtitle light-gray">
				Connect with your local community, meet new people, and learn about
				events happening around you. <br>
				Sign up to get an update when we launch our app!
				</h2>
				<div class="form">
					<div class="field">
						<div class="control">
							<input id="signup-input" class="input" type="text" placeholder="Email address">
						</div>
						<p style="color: red; display: none" id="message"></p>
					</div>
					<div class="field is-grouped  is-pulled-right">
						<div class="control">
							<button id="signup-btn" class="button is-link bg-light-yello uppercase">Sign up</button>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="features">
			<div class="container">
				<div class="columns">
					<div class="column">
						<div class="card">
							<div class="card-image">
								<figure class="image" style="max-width: 160px">
									<img src="/images/feature_icon1.png" alt="anonymous">
								</figure>
							</div>
							<div class="card-content">
								<div class="content light-gray">
									<p>
										No sign-up.
										<br>
										No profile.
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="column">
						<div class="card">
							<div class="card-image">
								<figure class="image">
									<img src="/images/feature_icon2.png" alt="anonymous">
								</figure>
							</div>
							<div class="card-content">
								<div class="content light-gray">
									<p>
										No tracking.
										<br>
										No snooping.
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="column">
						<div class="card">
							<div class="card-image">
								<figure class="image">
									<img src="/images/feature_icon3.png" alt="anonymous">
								</figure>
							</div>
							<div class="card-content">
								<div class="content light-gray">
									<p>
										No cost.
										<br>
										No internet needed.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer class="footer" style="padding-bottom: 3rem">
			<div class="container" style="width: 70%">
				<div class="content">
					<div class="columns">
						<div class="column">
							<ul class="is-pulled-left" style="list-style: none; text-decoration: none; line-height: 1.5; font-weight: 600; margin-top: 0; text-align: center; margin-left: 0">
								<li class="bottom-bordered"><a href="#" class="dark-gray">Learn about our technology</a></li>
								<li class="bottom-bordered"><a href="#" class="dark-gray">Press release and media</a></li>
							</ul>
						</div>
						<div class="column">
							<div class="is-pulled-right light-gray">
								<p>Copyright 2017
								<br>&copy; Anonymouse</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		// inject csrf token
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		// new signup
		$('#signup-btn').click(function(e) {
			$.ajax({
				method: "POST",
				url: "/subscribe",
				data: {
					'email': $('#signup-input').val()
				}
			}).done(function(res) {
				$('#message').text(res['message']);
			}).fail(function(res) {
				$('#message').text('Failed! Please try again later!');
			});
			$('#message').show();
		});
	</script>
	</body>
</html>