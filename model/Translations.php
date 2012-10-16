<?php
function tr($key,$suffix = '') {
	$translations = array(
	'January' => 'Հունվար',
	'February' => 'Փետրվար',
	'March' => 'Մարտ',
	'April' => 'Ապրիլ',
	'May' => 'Մայիս',
	'June' => 'Հունիս',
	'July' => 'Հուլիս',
	'August' => 'Օգոստոս',
	'September' => 'Սեպտեմբեր',
	'October' => 'Հոկտեմբեր',
	'November' => 'Նոյեմբեր',
	'December' => 'Դեկտեմբեր',
	'Monday' => 'Երկուշաբթի',
	'Tuesday' => 'Երեքշաբթի',
	'Wednesday' => 'Չորեքշաբթի',
	'Thursday' => 'Հինգշաբթի',
	'Friday' => 'Ուրբաթ',
	'Saturday' => 'Շաբաթ',
	'Sunday' => 'Կիրակի'
	);
	return $translations[$key].$suffix;
}

?>