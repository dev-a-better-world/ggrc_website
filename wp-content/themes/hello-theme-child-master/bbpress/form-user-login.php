<?php

/**
 * User Login Form
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<style>
	.bbp-submit-wrapper{
		width:100%
	}

	.forminator-ui#forminator-module-1346.forminator-design--default .forminator-input{
		background: rgba(255, 255, 255, 0.75);
		border: 1px solid #ACB4BD;
		box-sizing: border-box;
		border-radius: 10px;
	}

	.forminator-ui#forminator-module-1346.forminator-design--default .forminator-button-submit{
		background: #FFFFFF !important;
		border: 5px solid #0B4F6D;
		box-sizing: border-box;
		border-radius: 50px;
		display:block;
		margin:auto !important;
		padding: 15px 20px;
		position: relative;
		font-size: 20px !important;
		color: #0B4F6D !important;
		font-family: 'Arvo' !important;
	} 
</style>


<button class="trigger ggrc-btn-blue-md">Click here to login!</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
		<img src="<?php echo site_url( '/wp-content/uploads/2022/01/logo-32x32.png', null ) ?>" class="center-element">
        <h2 class="align-center">Log In</h2>

        <?php echo do_shortcode('[forminator_form id="1346"]'); ?>

        <div class="align-center">
	        <a href="<?php echo get_site_url(null, '/user-register', null); ?>">Register here</a>
	    </div>

	</div>
</div>

<script>

	const modal = document.querySelector(".modal");
	const trigger = document.querySelector(".trigger");
	const closeButton = document.querySelector(".close-button");

	function toggleModal() {
		modal.classList.toggle("show-modal");
	}

	function windowOnLoad(event) {
		if (event.target === modal) {
			toggleModal();
		}
	}
	
	window.addEventListener("load", toggleModal);
	closeButton.addEventListener("click", toggleModal);
	window.addEventListener("load", windowOnLoad);
	trigger.addEventListener("click", toggleModal);

</script>

