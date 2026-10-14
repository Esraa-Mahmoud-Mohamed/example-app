<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Bootstrap CSS -->
	<link href="{{ asset('enduser') }}/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="{{ asset('enduser') }}/css/tiny-slider.css" rel="stylesheet">
	<link href="{{ asset('enduser') }}/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

	<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
</head>

<body>

	<!-- Start Header/Navigation -->
	<x-end-user.navbar />
	<!-- End Header/Navigation -->

	{{ $content }}


	<!-- Start Footer Section -->
	<x-end-user.footer-section />
	<!-- End Footer Section -->


	<script src="{{ asset('enduser') }}/js/bootstrap.bundle.min.js"></script>
	<script src="{{ asset('enduser') }}/js/tiny-slider.js"></script>
	<script src="{{ asset('enduser') }}/js/custom.js"></script>

	<script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

	<script src="{{ asset('enduser') }}/js/cart.js"></script>


</body>

</html>