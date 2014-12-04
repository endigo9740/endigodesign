(function(){

	// Define App Module
	var endigoApp = angular.module('endigoApp', ['ngRoute']); // , 'ngAnimate', 'hmTouchEvents'

	// App Config (routes)
	endigoApp.config(['$routeProvider', function($routeProvider){ // , $locationProvider
		$routeProvider
			.when('/', {
				templateUrl: 'app/views/home.html',
				controller: 'homeController'
			})
			.when('/project/:id', {
				templateUrl: 'app/views/project.html',
				controller: 'projectController'
			})
			.otherwise( { redirectTo: "/" });
		// $locationProvider.html5Mode(true);
	}]);

	// === Controllers ===

	// Controller - Home
	endigoApp.controller('homeController', ['$scope', '$http', function($scope, $http){

		// Get JSON Data
		$http.get('app/projects.json').success(function(data){ $scope.projects = data.projects; });

	}]);

	// Controller - Project
	endigoApp.controller('projectController', ['$scope', '$route', '$http', function($scope, $route, $http){

		// Get Project ID
		$scope.$route = $route;
		$scope.projectID = $route.current.params.id;

		// Get JSON Data
		$http.get('app/projects.json').success(function(data){
			$scope.projects = data.projects;
			$scope.project = $scope.projects[$scope.projectID];
		});

	}]);

})();