angular.module('diceService', [])

.factory('Dice', function($http) {

    return {
    	
    	rolldice : function(param) {
    		
    		return $http({
                method: 'POST',
                //url: '/dice/public/',
                url: '/',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param({round:param})
            });
        },
    	
    }

});
