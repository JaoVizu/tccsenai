//VARIAVEL RECEBENDO O NG APP
var app = angular.module("admin", ["ngRoute"]);

app.config(function($routeProvider){

	//rota para categoria
	$routeProvider.when("/categoria",{
		templateUrl: 'categoria.php'
	});

	$routeProvider.when("/users",{
		templateUrl: 'users.php'
	});

	$routeProvider.when("/products",{
		templateUrl: 'products.php'
	});

	$routeProvider.when("/vendas",{
		templateUrl: 'relvendas.php'
	});

	$routeProvider.when("/encomendas",{
		templateUrl: 'encomendas.php'
	});



});