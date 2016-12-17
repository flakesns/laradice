angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Dice) {
	
	var bool_winner = false;
	$scope.param = '';
	$scope.outputs = [];
	
	$scope.loadingmain = false;


    $scope.submitRoll = function() {
    	
    	$scope.loadingmain = true;
    	
    	if ($scope.param == '') {
    		$scope.param = 1;
    		$scope.outputs = [];
    	}

        Dice.rolldice($scope.param)
            .success(function(data) {
            	
            	var round = "Round " + $scope.param + ": Output";
            	var out = data.output;
            	
            	$scope.outputs.push({'round': round, 'player1': out[0], 'player2': out[1], 'player3': out[2], 'player4': out[3]});
            	
            	var round = "Round " + $scope.param + ": Result";
            	var res = data.result;
            	
            	for (var i = 0; i < res.length; i++) {
            		if (res[i] == '') {
            			res[i] = "WINNER";
            			bool_winner = true;
            		}
            	}
            	
            	$scope.outputs.push({'round': round, 'player1': res[0], 'player2': res[1], 'player3': res[2], 'player4': res[3]});
            	
            	$scope.param = $scope.param + 1;
            	
            	if (bool_winner) {
            		alert('Yes, we have the WINNER!');
            		$scope.param = '';
            		bool_winner = false
            	}
            	
            })
            .error(function(data) {
                console.log(data);
            });
        
        $scope.loadingmain = false;
    };
    
    
});
