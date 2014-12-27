var currencyApp = angular.module('currencyApp', []);

// add currenciesController
currencyApp.controller('currenciesController', ['$scope', '$http',
function($scope, $http) {

	var link = "model/list.php";
	$http.get(link).success(function(response) {
		$scope.currencies = response;

		if (response.hasOwnProperty('error')) {
			$scope.success = false;
		} else {
			$scope.success = true;
		}
	});

	$scope.dollarNbr = null;

	$scope.convert = function($rate) {

		if (isNaN($scope.dollarNbr)) {
			return "";
		} else {
			return $rate * $scope.dollarNbr;
		}

	};

}]);


// add ratesController
currencyApp.controller('ratesController', ['$scope', '$http',
function($scope, $http) {

	var link = "model/rates.php?currency=" + document.getElementById("currencyName").value;
	$http.get(link).success(function(response) {
		$scope.rates = response[0];
		

		if (response.hasOwnProperty('error')) {
			$scope.success = false;
		} else {
			$scope.success = true;
		}
	});

	$scope.dollarNbr = null;

	$scope.convert = function($rate) {

		if (isNaN($scope.dollarNbr)) {
			return "";
		} else {
			return $rate * $scope.dollarNbr;
		}

	};

}]); 