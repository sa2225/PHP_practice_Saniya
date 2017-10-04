<?php

$obj = new main();

$date = date_create();
$tar = date_create();
$tar->setDate(2017,05,24);
$year = array("2012", "396", "300", "2000", "1100", "1089");
$toFind = "/";
$start = 0;

$obj->displayFormattedDates($date, $tar, $year);
$obj->replacechar($date);
$obj->compareDates($tar, $date);
$obj->printAllPositions($toFind, $start, $date);
$obj->countWords($date);
$obj->stringLength($date);
$obj->ASCIIValue($date);
$obj->Last2chars($date);
$obj->breakDateToArray($date);
$obj->leapYearDetector($year);

class main {

    public function __construct() {

    	echo "<h1>This is my Assignment for this week</h1> <hr>";
	} 
	
	public static function displayFormattedDates($date, $tar, $year){  
		
		echo "<b>Question 1</b><br>";
		echo "The value of \$date: ", date_format($date, 'Y-m-d'), "<br>";
		echo "The value of \$tar: ", date_format($tar, 'Y-m-d'), "<br>";
		echo "The value of \$year: ";
		print_r($year);
		echo "<br><hr>";

	}

	public static function replacechar($date){

		echo "<b>Question 2</b><br>";
		$Replace = str_replace("-", "/", date_format($date, 'Y-m-d'));

		echo "Replaced char in \$date: ";

		print_r($Replace);

		echo "<br><hr>";
	}

	public static function compareDates($tar, $date){
		
		echo "<b>Question 3</b><br>";
		$interval = date_diff($date, $tar)->format('%a');
		
		if ($interval > 0) {

			echo " Result for \$interval: ","The Future", "<br><hr>";
		
		}elseif ($interval < 0) {
		
			echo " Result for \$interval: ","The Past", "<br><hr>";
		
		}elseif ($interval== 0) {
		
			echo " Result for \$interval: ","Oops", "<br><hr>";
		
		}

	}


	public static function printAllPositions($toFind, $start, $date){

		echo "<b>Question 4</b><br>";
		echo "Positions displayed: ";

		while(strpos(date_format($date, 'Y/m/d'), $toFind, $start) !== false) {

			$pos = strpos((date_format($date, 'Y/m/d')), $toFind, $start);

			echo $pos, " ";

			$start = $pos+1;

		}
		echo "<br><hr>";

	}


	public static function countWords($date){
		echo "<b>Question 5</b><br>";
		$count = str_word_count(date_format($date, 'Y/m/d'), 0);

		echo "Number of words \$date: ";

		print_r($count);

		echo "<br><hr>";

	}


	public static function stringLength($date){
		echo "<b>Question 6</b><br>";
		echo "Length of string \$date: ", strlen(date_format($date, 'Y/m/d')), "<br><hr>";

	}


	public static function ASCIIValue($date){
		echo "<b>Question 7</b><br>";
		echo "ASCII value of the first character of the string \$date: ";

		print_r(ord(date_format($date, 'Y/m/d')));

		echo "<br><hr>";

	}


	public static function Last2chars($date){
		echo "<b>Question 8</b><br>";
		$last2chars = substr(date_format($date, 'Y/m/d'), -2);

		echo " Last two characters of \$date: ";

		print_r($last2chars);

		echo "<br><hr>";

	}

	
	public static function breakDateToArray($date){
		echo "<b>Question 9</b><br>";
		$BreakDate = explode("/", date_format($date, 'Y/m/d'));

		echo "Breaking \$date into an array and setting separation parameter: ";

		print_r($BreakDate);

		echo "<br><hr>";
	
	}

/*
. Loop through the array $year and you need to identify whether each year is a leap year. If it
is, print out “True”, otherwise, print out “False”. (36%)
A. You need to use two methods to loop through the array, which means you need to use
two different statement structures to finish this job. The first one must be foreach and
the second one could be for or while or do…while.
B. You need to use switch statement to identify whether a year is a leap year.
C. You need to delimit each result with space in one line.

*/

	public static function leapYearDetector($year){
		echo "<b>Question 10</b><br>";
		echo "Foreach method to determine leap year -- <br>";
		foreach ($year as &$leapYear) {    		
    		
    		$isLeapYear = (($leapYear % 4) == 0) && ((($leapYear % 100) != 0) || (($leapYear % 400) == 0));
			switch ($isLeapYear) {
				case '1':
					echo "[year $leapYear: True] ";
					break;
				
				default:
					echo "[year $leapYear: False] ";
					break;
			}
		}

		echo "<br>While method to determine leap year -- <br>";
		$index = 0;
		while($index<count($year)){
			$isLeapYear = (($year[$index] % 4) == 0) && ((($year[$index] % 100) != 0) || (($year[$index] % 400) == 0));
			switch ($isLeapYear) {
				case '1':
					echo "[year $year[$index]: True] ";
					break;
				
				default:
					echo "[year $year[$index]: False] ";
					break;
			}
			$index++;
		}
	}

	public function __destruct() {

	      echo "<hr></br> <h3>I'm Done</h3>";

    }
}

?>
