<?php
/*
	"Ask Challenge" plugin for Question2Answer
	
	File: qa-plugin/qa_ask_challenge/qa_ask_challenge_page.php
	Version: 1.0
	Description: Displays in a page all "open" questions (without
	answer and not closed). Works like the "Unanswered" page but
	excludes all closed questions. This plugin shows the questions
	that need to be answered by someone - unanswered and not closed.
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	More about this license: http://www.question2answer.org/license.php
*/
class qa_page_ask_challenge {
	
	function suggest_requests() // for display in admin interface
	{	
		return array(
			array(
				'title' => 'Challenge',
				'request' => 'ask-challenge',
				'nav' => 'M', // 'M'=main, 'F'=footer, 'B'=before main, 'O'=opposite main, null=none
			),
		);
	}
	
	function match_request($request)
	{
		if ($request=='ask-challenge')
			return true;
		return false;
	}
	
	function process_request($request)
	{
		//	Get list of unanswered open questions
		$userid=qa_get_logged_in_userid();
		$start=qa_get_start();		
		//	Prepare and return the content for the theme
		$questions_found_title= qa_lang_html('ask_challenge/ask_chellenge_title');
		$qa_content = "<h1> Hello ".$questions_found_title." </h1>";
		return $qa_content;
	}
}
/*
	Omit PHP closing tag to help avoid accidental output
*/