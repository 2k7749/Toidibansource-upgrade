<div id="paypal-button" style="width: 600px"></div>

<script>
	paypal.Button.render({
		style: {
			size: 'responsive'
		}
	});
</script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
	paypal.Button.render({
		env: '<?php echo PayPalENV; ?>',
		client: {
			<?php if (ProPayPal) { ?>
				production: '<?php echo PayPalClientId; ?>'
			<?php } else { ?>
				sandbox: '<?php echo PayPalClientId; ?>'
			<?php } ?>
		},
		payment: function(data, actions) {
			return actions.payment.create({
				transactions: [{
					amount: {
						total: '<?php echo $productPrice; ?>',
						currency: '<?php echo $currency; ?>'
					}
				}]
			});
		},
		onAuthorize: function(data, actions) {
			return actions.payment.execute()
				.then(function() {
					window.location = "<?php echo $web["url"]; ?>/invoice-paymentid" + data.paymentID + "-payer" + data.payerID + "-token" + data.paymentToken + "-pid<?php echo $productId; ?>" + "-loadout<?php echo $payloadData; ?>.html";
				});
		}
	}, '#paypal-button');
</script>