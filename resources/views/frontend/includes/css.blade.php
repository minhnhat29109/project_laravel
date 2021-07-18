<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-SHOP HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="/frontend/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="/frontend/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="/frontend/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="/frontend/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="/frontend/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/frontend/css/style.css" />
	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			th{
				text-align: center;
			}
			td{
				text-align: center;
			}
			div.stars {
				width: 270px;
				display: inline-block
			}

			.mt-200 {
				margin-top: 200px
			}

			input.star {
				display: none
			}

			label.star {
				float: right;
				padding: 10px;
				font-size: 36px;
				color: #4A148C;
				transition: all .2s
			}

			input.star:checked~label.star:before {
				content: '\f005';
				color: #FD4;
				transition: all .25s
			}

			input.star-5:checked~label.star:before {
				color: #FE7;
				text-shadow: 0 0 20px #952
			}

			input.star-1:checked~label.star:before {
				color: #F62
			}

			label.star:hover {
				transform: rotate(-15deg) scale(1.3)
			}

			label.star:before {
				content: '\f006';
				font-family: FontAwesome
			}
		</style>


</head>