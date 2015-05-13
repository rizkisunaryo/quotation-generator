<?php
function get2Decimal($number)
{
	return number_format((float)$number, 2, '.', '');
}
?>