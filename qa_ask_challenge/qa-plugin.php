<?php
/*
	Plugin Name: Challenge
	Plugin URI: https://github.com/balab2020/q2a-challenge
	Plugin Description: Displays in a page all "open" questions (without answer and not closed)
	Plugin Version: 1.0
	Plugin Date: 2019-15-06
	Plugin Author: Balamurugan B
	Plugin Author URI: https://github.com/balab2020
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	
	
	File: qa-plugin/qa_ask_challenge/qa_ask_challenge_page.php
	Version: 1.0
	Description: Initializes the "Open Questions" plugin
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
	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}
	qa_register_plugin_module('page', 'qa_ask_challenge_page.php', 'qa_page_ask_challenge', 'Challenge');
	qa_register_plugin_phrases('qa-ask-challenge-lang-*.php', 'ask_challenge');	
/*
	Omit PHP closing tag to help avoid accidental output
*/