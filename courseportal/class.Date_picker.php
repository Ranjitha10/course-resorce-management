
<?php
class Date_picker
{


#From: Sandon Jurowski
#At: UW Madison Medical School
#jurowski@wisc.edu

#Here is a feature-rich, html-generating, 3-column date-picker class that:

#a) automatically selects a the correct pulldown values from a mysql record field in the "date" format of "0000-00-00".

#b) re-selects the previously or newly chosen values if the form is re-sent (as during data validation errors)

#c) lets you choose a default date, or today's date as the default

#d) lets you choose the minimum and maximum year values OR lets you choose a difference value for the minumum and for the maximum as well when populating the year pulldown


#EXAMPLE:

#<?php
#$my_form = new Date_picker;
#$my_form->print_date_pulldown("birthDate", $row["birthDate"], 0, 0, 1965, 0, 0, 1);
#

function print_date_pulldown($date_name, $date_value_row, $date_default_today = 0, $date_default_value = 0, $min_year = 0, $max_year = 0, $min_year_diff = 0, $max_year_diff = 0)
	{
		$default_min_year_diff = 80;
		$default_max_year_diff = 5;
		
		if ($min_year_diff <> 0) $min_year_diff = $default_min_year_diff;
		if ($max_year_diff <> 0) $max_year_diff = $default_max_year_diff;
		
		#if no max or min years are given, use defaults or derive from diffs if given
		$today = getdate();
		if ($min_year == 0) $min_year = $today[year] - $min_year_diff;
		if ($max_year == 0) $max_year = $today[year] + $max_year_diff;

		if ($date_value_row == "")
		{
			if ($date_default_today == 1) $date_value_row = getdate(); #use today's date as the default
			if ($date_default_value <> 0) $date_value_row = $date_default_value; #use provided date as the default
		}
		if ($date_value_row == "" and $date_default_today == 1) $date_value_row = getdate();		
		$date_year = substr($date_value_row,0,4);
		$date_month = substr($date_value_row,5,2);
		$date_day = substr($date_value_row,8,2);	

		$fill_array = array("");
		for ($i = 1;$i <= 12;$i++)
		{
			array_push($fill_array, $i);
		}
		$this->print_pulldown($date_name."_month", $date_month, $_REQUEST[$date_name.'_month'], $fill_array);
		$fill_array = array("");
		for ($i = 1;$i <= 31;$i++)
		{
			array_push($fill_array, $i);
		}
		$this->print_pulldown($date_name."_day", $date_day, $_REQUEST[$date_name.'_day'], $fill_array);
		if ($date_year < $min_year and $date_year > 0) $min_year = $date_year;
		$fill_array = array("");
		for ($i = $min_year;$i <= $max_year;$i++) array_push($fill_array, $i);
		$this->print_pulldown($date_name."_year", $date_year, $_REQUEST[$date_name.'_year'], $fill_array);	
	}


function print_pulldown($pulldown_name, $value_row, $value_chosen, $value_option_array, $value_underlying_array = "", $auto_reload = 0)
	{
		#This function will fill a pulldown list intelligently, meaning it will check to see if the form has been reloaded due to bad data (and it will auto-select the previously selected item... so it has a "memory" of sorts)
		#It also will select a value that corresponds to a saved item in a database record
		#Otherwise it will select the first, blank option, by default
	
		###########
		#PARAMETERS
		###########
	
		#1) $pulldown_name:
		#	the name of the pulldown
	
		#2) $value_row:
		#	the value of the database record's field corresponding to this pulldown (ie which one was previously selected and saved into the database)

		#3) $value_chosen:
		#	usually $_REQUEST[$pulldown_name], the value that the user chose before submitting the form... used to re-select the correct entry in case the form needs to be reloaded before the record is saved due to incorrect or missing data entry

		#4) $value_option_array:
		#	an array of text values to be added to the array of pulldown items.
		
		#5) $value_underlying_array:
		#	an array of actual values to be added to the array of pulldown items.

		#6) $auto_reload:
		# whether to reload the html page when the item is changed

		if ($value_underlying_array == "")
		{
			$value_underlying_array = $value_option_array;
		}
		
		echo "<select name='".$pulldown_name."'";

		if ($auto_reload == 1) echo " onchange='JavaScript:submit()'";

		echo ">";		
		$i = 0;
		foreach ($value_option_array as $value_option)
		{
			if ($value_underlying_array[$i] == "")
			{
				#blank option (first option is blank)
				echo '<option value="'.$value_underlying_array[$i].'"';
				if (isset($_REQUEST[$pulldown_name]) and $value_chosen == $value_underlying_array[$i])
				{echo 'selected';}
				else
				{
					if ($value_row == $value_underlying_array[$i])
					{
						echo 'selected';
					}
				}
				echo'></option>';
			}
			else
			{
				#non-blank option
				echo '<option value="'.$value_underlying_array[$i].'"';
				if ($value_chosen == $value_underlying_array[$i])
				{
					echo 'selected';
				}
				else
				{
					if ($value_row == $value_underlying_array[$i])
					{
						echo 'selected';
					}
				}
				echo'>'.$value_option.'</option>';
			}	
			$i ++;
		}
		echo "</select>";

	}

}
?>