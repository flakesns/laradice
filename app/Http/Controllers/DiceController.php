<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Dice;
use App\Models\Player;


class DiceController extends Controller
{
	public $players;
	public $round;
	
    public function __construct()
    {
    	$this->players = new Player(['A', 'B', 'C', 'D']); 	
    }

    public function index()
    {
    	return view('index');
    }
    
    public function roll_dice(Request $request)
    {

    	$this->players->round = $request->round;

    	$roll_output = $this->players->roll_dice();

    	foreach ($roll_output as $key => $arr) {
    		$arrRes['output'][$key] = implode(', ', $arr);
    	}
    	
    	$results = $this->players->get_results();
    	foreach ($results as $key => $arr) {
    		$arrRes['result'][$key] = implode(', ', $arr);
    	}
    	
    	return $arrRes;    	
    }
}
