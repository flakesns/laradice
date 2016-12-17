<?php
/**
 * Dice Roller Game
 * 
 * @author Hafiz <hafiznor@gmail.com>
 * @link http://hafiznor.herokuapp.com
 * @since Dec 2016
 */

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Array_;

class Dice
{
	public $position = 1;
	public $no_of_dice = 6;
	public $round = 1;
	public $bool_winner = 0;
	protected $_output;
	private $_temp;
	const KEY_DICE_TOTAL = "dice_total_";
	
	public function __construct(){}
	
	/**
	 * Generate dice numbering
	 */
    public function roll($key)
    {    	
    	$dice_total = $this->_get_number_of_dice(self::KEY_DICE_TOTAL . $key);
    	
    	for ($i = 0; $i < $dice_total; $i++)
    	{
    		$n[] = mt_rand(1, 6);
    	}
    	
    	$this->_output[$key] = $n;
    	
    	    	
    	return $n;
    }
    
    /**
     * Generate the results by processing the output base on following criteria:
     * - All dice with number 6 on top side will be removed from their dice cup.
     * - All dice with number 1 on top side will be passed to player on his right hand 
     * (the right most player will pass the dice to left most player)
     */
    public function process_output()
    {

    	foreach ($this->_output as $key => $arrNumber) {
    		
    		#remove the dice number 6
    		$arrNumber = $this->_remove_dice($arrNumber, [6]);
    		
    		if (in_array(1, $arrNumber)) {
    			
    			#move the dice 1(s) to the next player
    			$move = $this->_move_dice_to_next($key, $arrNumber);
    			
    			#remove the dice number 1
    			$arrNumber = $this->_remove_dice($arrNumber, [1]);
    		}

    		$this->_output[$key] = $arrNumber;
    	}
    	
    	foreach ($this->_output as $key=>$arrNumber) {
    		
    		if (isset($this->_temp[$key])) {
    			$arrNumber = array_merge($arrNumber, $this->_temp[$key]);
    			$this->_output[$key] = $arrNumber;
    		}
    		
    		$cnt = count($arrNumber);
    		Cache::put(self::KEY_DICE_TOTAL . $key, $cnt, 20);
    		
    		if ($cnt == 0) {
    			$this->bool_winner = 1;
    		}
    	}
    	
    	if ($this->bool_winner) {
    		$this->clear_cache();
    	}
    	
    	return $this->_output;
    }
    
    private function _remove_dice(Array $arrNumber, Array $arrCond)
    {
    	return array_diff($arrNumber, $arrCond);
    }
    
    /**
     * All dice with number 1 on top side will be passed to player on his right hand
     * (the right most player will pass the dice to left most player)
     */
    private function _move_dice_to_next(int $key, Array $arrNumber)
    {
    	$next_key = $key + 1;
    	 
    	if ($this->_is_last_position($key)) {
    		$next_key = 0;
    	}

    	$keys = array_keys($arrNumber, 1);
    	 
    	foreach ($keys as $nkey) {
    		$arr[] = $arrNumber[$nkey];
    	}

    	$this->_temp[$next_key] = $arr;
    }
    
    private function _get_number_of_dice($key)
    {
    	if (Cache::has($key) && $this->round != 1) {
    		return Cache::get($key);
    	}
    	
    	$dice_numb = $this->no_of_dice;
    	
    	return $dice_numb;
    }
    
    private function _is_last_position($key)
    {
    	$max = max(array_keys($this->_output));
    	
    	if ($key === $max) {
    		return true;
    	}
    	
    	return false;
    }
    
    protected function clear_cache()
    {
    	if (is_array($this->_output)) {
	    	foreach ($this->_output as $key=>$arr) {
	    		Cache::forget(self::KEY_DICE_TOTAL . $key);
	    	}
    	}
    }
    

}
