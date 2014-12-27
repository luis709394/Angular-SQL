<html>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="view/scripts.js"></script>
	</head>

	<body>

		<!---Angular code-------------------------------------------------------------------->
		<div ng-app="currencyApp" ng-controller="ratesController">
            <input type="hidden" value="<?php echo $_GET['currency']; ?>" id="currencyName">
			<div ng-show="success">
				<table>
					<tr><td>Currency:  <?php echo $_GET['currency']; ?></tr>
					<tr><td>Cash Rate: {{ rates.cash }}</td></tr>
					<tr><td>Exchange Rate: {{ rates.exchange }}</td></tr>
					<tr><td>Difference between Two Rates: {{ (rates.cash - rates.exchange).toFixed(2) }}</td></tr>
				</table>
			</div>

			<div ng-hide="success">
				{{ rates.error }}
			</div>


	</body>
</html>
