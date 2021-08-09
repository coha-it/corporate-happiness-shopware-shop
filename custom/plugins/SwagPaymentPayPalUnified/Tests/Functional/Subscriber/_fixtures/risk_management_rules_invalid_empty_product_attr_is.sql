INSERT INTO `swag_payment_paypal_unified_settings_general` (`id`, `shop_id`, `active`, `client_id`, `client_secret`, `sandbox`, `show_sidebar_logo`, `brand_name`, `landing_page_type`, `send_order_number`, `order_number_prefix`, `use_in_context`, `log_level`, `display_errors`, `advertise_returns`, `use_smart_payment_buttons`, `merchant_location`, `submit_cart`) VALUES
(1,	1,	1,	'Foo',	'Bar',	1,	0,	'',	'Login',	0,	'',	1,	0,	0,	0,	0,	'germany',	1);

SET @paypalpamentid = (SELECT `id` FROM s_core_paymentmeans WHERE `name`='SwagPaymentPayPalUnified');

INSERT INTO `s_core_rulesets` (`id`, `paymentID`, `rule1`, `value1`, `rule2`, `value2`)
VALUES (80, @paypalpamentid, 'ATTRIS', '', '', '');

UPDATE s_articles_attributes
SET attr1 = 2
WHERE id = 429;

