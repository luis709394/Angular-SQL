<html>
<head>
	
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="view/scripts.js"></script>
	
</head>

<body>
	<h1>Concurrency Converter</h1>
	<h2>Note: There numbers are all fake. Don't rely on them for real life</h2>
	<h2>Please enter the amount of  U.S. dollar to be converted to different currencies</h2>
<!--- code that runs on AngularJS-------------------------------------------------------------------->
<div ng-app="currencyApp" ng-controller="currenciesController"> 
Amount in U.S. dollar: <input type="text" ng-model="dollarNbr"><br>

<div ng-show="success">
<table>
  <tr ng-repeat="currency in currencies  | filter:q | orderBy:'name'">
  	<td><a ng-href="index.php?currency={{ currency.name }}"> {{ currency.name }}: </a></td>
    <td>{{ convert(currency.rate) }}</td>
  </tr>
</table>
</div>

<div ng-hide="success">
	{{ currencies.error }}
</div>


<p><input type="search" ng-model="q" placeholder="filter currencies..."></p>
</div>








</body>
</html>
