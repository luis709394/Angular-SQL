<?php

class Controller {

	public function invoke() {

		// first see if a currency has been requested
		if (!isset($_GET['currency'])) {

			include 'view/currencylistView.php';

		} else {
			// show the requested currency
			include 'view/viewcurrency.php';
			// add a link back to the homepage
			echo '<a href="index.php">Home</a>';
		}

	}

}
