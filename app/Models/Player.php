<?php
/**
 * Dice Player
 * 
 * @author Hafiz <hafiznor@gmail.com>
 * @link http://hafiznor.herokuapp.com
 * @since Dec 2016
 */

namespace App\Models;

use App\Models\Dice;

class Player extends Dice
{
	private $_players;
		
	public function __construct(Array $arrName)
	{
		$this->_players = $arrName;
	}
	
	public function roll_dice()
	{
		foreach ($this->_players as $key=>$name) {
			$n[$key] = $this->roll($key);
		}
		
		$this->_output = $n;
		
		return $n;
	}
	
	public function get_results()
	{
		return $this->process_output();
	}

}
