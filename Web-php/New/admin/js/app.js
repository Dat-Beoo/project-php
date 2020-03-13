var app = angular.module('app',[]);

app.controller('MainCtrl',function($scope,$http){
	$http.get('http://localhost:88/New/admin/api/product.php')
	.them(function(res){
	$scope.products = res.data;
});
	$scope.show_pro = function(p){
		$scope.view = p;
		$('#modal-pro').modal('show');

	}
});