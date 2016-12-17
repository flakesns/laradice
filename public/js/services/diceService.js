angular.module('diceService', [])

.factory('Dice', function($http) {

    return {
    	
    	rolldice : function(param) {
    		
    		myurl = window.location;
    		alert(myurl)
    		
    		return $http({
                method: 'POST',
                //url: '/dice/public/',
                url: myurl,
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param({round:param})
            });
        },
    	
    }

});
