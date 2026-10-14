(function () {
	'use strict';

	var tinyslider = function () {
		var el = document.querySelectorAll('.testimonial-slider');

		if (el.length > 0) {
			var slider = tns({
				container: '.testimonial-slider',
				items: 1,
				axis: "horizontal",
				controlsContainer: "#testimonial-nav",
				swipeAngle: false,
				speed: 700,
				nav: true,
				controls: true,
				autoplay: true,
				autoplayHoverPause: true,
				autoplayTimeout: 3500,
				autoplayButtonOutput: false
			});
		}
	};
	tinyslider();

	async function syncQuantity(quantityInput) {

		const row = quantityInput.closest('tr');

		const url = row.dataset.updateUrl;

		const quantity = quantityInput.value;

		const response = await fetch(url, {

			method: 'PATCH',

			headers: {
				'X-CSRF-TOKEN':
					document.querySelector('meta[name="csrf-token"]').content,

				'Content-Type': 'application/json',

				'Accept': 'application/json'
			},

			body: JSON.stringify({

				quantity: quantity

			})

		});

		const data = await response.json();

		row.querySelector('.row-total').textContent =
			'$' + Number(data.row_total).toFixed(2);

		document.getElementById('subtotal').textContent =
			'$' + Number(data.subtotal).toFixed(2);

		document.getElementById('discount').textContent =
			'$' + Number(data.discount).toFixed(2);

		document.getElementById('total').textContent =
			'$' + Number(data.total).toFixed(2);

	}


	var sitePlusMinus = function () {

		var value,
			quantity = document.getElementsByClassName('quantity-container');

		function createBindings(quantityContainer) {
			var quantityAmount = quantityContainer.getElementsByClassName('quantity-amount')[0];
			var increase = quantityContainer.getElementsByClassName('increase')[0];
			var decrease = quantityContainer.getElementsByClassName('decrease')[0];
			increase.addEventListener('click', function (e) {
				increaseValue(e, quantityAmount);
				updateRowTotal(quantityAmount);
				syncQuantity(quantityAmount);
			});
			decrease.addEventListener('click', function (e) {
				decreaseValue(e, quantityAmount);
				updateRowTotal(quantityAmount);
				syncQuantity(quantityAmount);
			});
		}

		function init() {
			for (var i = 0; i < quantity.length; i++) {
				createBindings(quantity[i]);
			}
		};
		function updateRowTotal(quantityAmount) {

			var row = quantityAmount.closest('tr');

			var price = parseFloat(
				row.querySelector('.unit-price').dataset.price
			);

			var quantity = parseInt(quantityAmount.value);

			row.querySelector('.row-total').textContent =
				'$' + (price * quantity).toFixed(2);
		}

		function increaseValue(event, quantityAmount) {
			value = parseInt(quantityAmount.value, 10);

			console.log(quantityAmount, quantityAmount.value);

			value = isNaN(value) ? 0 : value;
			value++;
			quantityAmount.value = value;
		}

		function decreaseValue(event, quantityAmount) {
			value = parseInt(quantityAmount.value, 10);

			value = isNaN(value) ? 0 : value;
			if (value > 0) value--;

			quantityAmount.value = value;
		}

		init();

	};
	// sitePlusMinus();

	// document
	// 	.getElementById('coupon-form')
	// 	.addEventListener('submit', applyCoupon);

	// async function applyCoupon(e) {

	// 	e.preventDefault();

	// 	const form = e.target;

	// 	const response = await fetch(form.action || '/cart/coupon', {

	// 		method: 'POST',

	// 		headers: {

	// 			'X-CSRF-TOKEN':
	// 				document
	// 					.querySelector('meta[name="csrf-token"]')
	// 					.content,

	// 			'Accept': 'application/json'

	// 		},

	// 		body: new FormData(form)

	// 	});

	// 	const data = await response.json();

	// 	const message = document.getElementById('coupon-message');

	// 	if (data.success) {

	// 		message.classList.remove('text-danger');
	// 		message.classList.add('text-success');

	// 		message.textContent = data.message;

	// 		document.getElementById('subtotal').textContent =
	// 			'$' + Number(data.subtotal).toFixed(2);

	// 		document.getElementById('discount').textContent =
	// 			'$' + Number(data.discount).toFixed(2);

	// 		document.getElementById('total').textContent =
	// 			'$' + Number(data.total).toFixed(2);

	// 	}
	// 	else {

	// 		message.classList.remove('text-success');
	// 		message.classList.add('text-danger');

	// 		message.textContent = data.message;

	// 	}

	// }

})()