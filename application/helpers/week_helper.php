<?php

/**
 * Generate a coloured dot for the given week
 *
 */
function week_dot($week, $size = 'md')
{
	$col = $week->bgcol;
	$col = str_replace('#', '', $col);
	$col = '#' . $col;

	$out = "<span class='dot dot-week dot-size-{$size}' style='background-color:{$col}'></span>";
	return $out;
}


/**
 * Generate CSS for a timetable week.
 *
 * @param $week DB row object for week entry.
 * @return string Raw CSS to place inside <style> tag.
 *
 */
function week_calendar_css($week)
{
	$CI =& get_instance();

	$css = '';

	$template = $CI->load->view('css/session-calendar.css', [], TRUE);
	$CI->load->library('parser');
	$CI->load->helper('colour');

	$vars = [
		'week_id' => $week->week_id,
		'fg_col' => $week->fgcol,
		'bg_col' => $week->bgcol,
		'range_bg' => colour_tint($week->bgcol, .1),
		'range_fg' => colour_shade($week->bgcol, .60),
	];

	return $CI->parser->parse_string($template, $vars, TRUE) . "\n";
}

