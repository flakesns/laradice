<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hafiz::Dice Roller Game</title>
    
     <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
    </style>
    
    <!-- JS -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    
    <script src="js/controllers/mainCtrl.js"></script>
    <script src="js/services/diceService.js"></script>
    <script src="js/app.js"></script>
     
    
   
</head>
<body class="container" ng-app="diceApp" ng-controller="mainController"> 

<div class="container">
	     
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dice Roller Game</div>

                <div class="panel-body">
                                        
                    <form ng-submit="submitRoll()" class="form-horizontal" method="post"> 
                   
                         <div ng-view></div>
                         
                        <div class="row">
                              <div class="col-sm-12">
                                    <div class="table-responsive">
       
                                		<table class="table table-bordered table-mod">
                                			<thead>
                                				<tr>
                                					<th></th>
                                					<th>Player A</th>
                                					<th>Player B</th>
                                					<th>Player C</th>
                                					<th>Player D</th>
                                				</tr>
                                			</thead>
                                			<tbody>
                                				<tr ng-repeat="out in outputs">
													<td>{{out.round}}</td>
													<td>{{out.player1}}</td>
													<td>{{out.player2}}</td>
													<td>{{out.player3}}</td>
													<td>{{out.player4}}</td>
												</tr>												
                                			</tbody>
                                			
                                			<tr>
                                				<td colspan="5">
                                				    <p class="text-center" ng-show="loadingmain"><i class="fa fa-spinner fa-spin"></i> Please wait..processing request...</p>
                                					<button type="submit" class="btn btn-primary pull-right">
				                                        Roll Dice Now!
				                                    </button>
				                                </td>
                                			</tr>
                                		</table>
                                		
                               		</div>
                              </div>
                        </div>
                        
                        
                        <div class="row">
					         <div class="col-sm-12">
					             
					         </div>
					     </div>
					     
                        
                    
                    </form>
                                        
                </div><!-- //.panel-body -->
            </div> <!-- //.panel panel-default -->
        </div><!-- //.col-md-12 -->
    </div><!-- //.row -->
    
</div>

<footer class="footer">
      <div class="container">
        <p class="text-muted">Created with Laravel and AngularJs by <a href='http://hafiznor.herokuapp.com'>http://hafiznor.herokuapp.com</a></p>
      </div>
    </footer>

</body> 
</html>
