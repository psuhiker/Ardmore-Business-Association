<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>

    var CREATE_PAYMENT_URL = "<create_payment_url>";
    var EXECUTE_PAYMENT_URL = "<execute_payment_url>";

	paypal.Button.render({
		//env: 'production',
		env: 'sandbox',
		client: {
			sandbox: 'AfZs16798kQU4rDXQyFRZmY9GvBuNDJ0C7AXX995QVHjWg8Mf_w6B0qvewzwJpU7LfEQi2oFahpUYSSx',
			production: 'AUnaz_dsFEPObeCJ0gYcHj44iE42jy0P1Abun49VYEcxc4uNg71XVUq9O0b-14fTZw6jzcrkFRgZ10bK'
		},
		commit: true,
		style: {
			size: 'responsive',
			color: 'blue',
			shape: 'rect',
			label: 'pay',
			fundingicons: true,
			taglin: false
		},
		//funding: {
		//    allowed: [ paypal.FUNDING.CARD ],
		//},
		payment: function(data, actions) {
			return actions.payment.create({
				payment: {
					transactions: [
						{
							amount: { total: '165.00', currency: 'USD' },
							description: 'Ardmore Business Association Membership',
						}
					],
				}
			});
		},
		onAuthorize: function(data, actions) {
			return actions.payment.execute().then(function() {
				window.location = '<?php echo $redirect_url; ?>';
			});
		}
	},
	'#paypal-button');

</script>
