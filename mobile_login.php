<?php
require_once('mobile/includes/application_top.php');
// redirect the customer to a friendly cookie-must-be-enabled page if cookies are disabled (or the session has not started)
  if ($session_started == false) {
    tep_redirect(tep_mobile_link(FILENAME_COOKIE_USAGE));
  }

  require(DIR_WS_LANGUAGES . $language . '/login.php');

  $error = false;
  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'process')) {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);

// Check if email exists
    $check_customer_query = tep_db_query("select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
    if (!tep_db_num_rows($check_customer_query)) {
      $error = true;
    } else {
      $check_customer = tep_db_fetch_array($check_customer_query);
// Check that password is good
      if (!tep_validate_password($password, $check_customer['customers_password'])) {
        $error = true;
      } else {
        if (SESSION_RECREATE == 'True') {
          tep_session_recreate();
        }

        $check_country_query = tep_db_query("select entry_country_id, entry_zone_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$check_customer['customers_id'] . "' and address_book_id = '" . (int)$check_customer['customers_default_address_id'] . "'");
        $check_country = tep_db_fetch_array($check_country_query);

        $customer_id = $check_customer['customers_id'];
        $customer_default_address_id = $check_customer['customers_default_address_id'];
        $customer_first_name = $check_customer['customers_firstname'];
        $customer_country_id = $check_country['entry_country_id'];
        $customer_zone_id = $check_country['entry_zone_id'];
        tep_session_register('customer_id');
        tep_session_register('customer_default_address_id');
        tep_session_register('customer_first_name');
        tep_session_register('customer_country_id');
        tep_session_register('customer_zone_id');

        tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_of_last_logon = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_info_id = '" . (int)$customer_id . "'");

// restore cart contents
        $cart->restore_contents();

        if (sizeof($navigation->snapshot) > 0) {
          $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
          $navigation->clear_snapshot();
          tep_redirect($origin_href);
        } else {
          tep_redirect(tep_mobile_link(FILENAME_DEFAULT));
        }
      }
    }
  }

  if ($error == true) {
    $messageStack->add('login', TEXT_LOGIN_ERROR);
  }

  $breadcrumb->add(NAVBAR_TITLE, tep_mobile_link(FILENAME_LOGIN, '', 'SSL'));

  require(DIR_MOBILE_INCLUDES . 'header.php');
  $headerTitle->write();
?>
<div id="iphone_content">
	<div id="messageStack">
	<?php
	  if ($messageStack->size('login') > 0) {
		echo $messageStack->output('login');
	  }
	?>
	</div>
	<div id="returning_cust">
		<h1><?php echo HEADING_RETURNING_CUSTOMER; ?></h1>
		<?php echo tep_draw_form('login', tep_mobile_link(FILENAME_LOGIN, 'action=process', 'SSL')); ?>
		<div>
			<label for="email" class="float"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
			<?php echo tep_draw_input_field('email_address'); ?>
		</div>
		<div style="clear:both;" ></div>
		<div>
			<label for="password" class="float"><?php echo ENTRY_PASSWORD; ?></label>
			<?php echo tep_draw_password_field('password'); ?>
		</div>
		<br />
		<?php echo tep_mobile_button(IMAGE_BUTTON_LOGIN); ?>
		<br />
		<?php echo '<a href="' . tep_mobile_link(FILENAME_MOBILE_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?>
		</form>
	</div>
 
 
                       <?php if (PERMISO_FILENAME_LOGIN_REGISTRO == 'True'){ ?>
 
	<div id="new_cust">
		<h1><?php echo HEADING_NEW_CUSTOMER; ?></h1>
		<?php echo TEXT_NEW_CUSTOMER_INTRODUCTION; ?>
		<br />
		<?php  echo tep_draw_form('login', tep_mobile_link(FILENAME_CREATE_ACCOUNT, '', 'SSL')) . tep_mobile_button(IMAGE_BUTTON_CONTINUE) . "</form>"; ?>
		</form>
  </div>
  
                                <?php } ?>
  
  <?php require(DIR_MOBILE_INCLUDES . 'footer.php'); ?>
</div>
