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

require_once QA_INCLUDE_DIR . 'qa-db.php';

use Q2A\Database\DbConnection;

class qa_ask_challenge_db {

    private $db;

    /*constructor support*/
    public function __construct() {
        create_table_if_not_exists();
    }

    public function qa_ask_challenge_db() {
        create_table_if_not_exists();
    }
    /*constructor support*/

    function qa_ask_challenge_db_table_definitions()
    {
        require_once QA_INCLUDE_DIR . 'db/maxima.php';
        require_once QA_INCLUDE_DIR . 'app/users.php';
        return  $this->qa_db_create_table_sql("challenges", array(
                'postid' => 'INT UNSIGNED NOT NULL',
                'challenged_to' => 'VARCHAR(' . QA_DB_MAX_EMAIL_LENGTH . ') NOT NULL',
                'accepted' => 'TINYINT UNSIGNED NOT NULL DEFAULT 0',
                'accepted_on' => 'DATETIME',
                'KEY postid (postid)',
                'CONSTRAINT ^challenge_post_ibfk_1 FOREIGN KEY (postid) REFERENCES ^posts(postid)',
            );
        );
    }

    function qa_db_create_table_sql($rawname, $definition)
    {
        $querycols = '';
        foreach ($definition as $colname => $coldef)
            if (isset($coldef))
                $querycols .= (strlen($querycols) ? ', ' : '') . (is_int($colname) ? $coldef : ($colname . ' ' . $coldef));

        return 'CREATE TABLE ^' . $rawname . ' (' . $querycols . ') ENGINE=InnoDB CHARSET=utf8';
    }

    public function create_table_if_not_exists(){
        $db = new DbConnection();
        $tblNamePrefixed = $db.addTablePrefix('challenges')
        if (!isset($tblNamePrefixed)){
            $db.query($this->qa_ask_challenge_db_table_definitions());
        }
	    /*
	    CREATE TABLE `q2a`.`qa_challenge` (
  `postid` INT UNSIGNED NULL,
  `accepter_email` VARCHAR(250) NOT NULL,
  `accepted` TINYINT NULL DEFAULT 0,
  `accepted_on` DATE NULL,
  INDEX `fk_challenge_post_postid_idx` (`postid` ASC) VISIBLE,
  CONSTRAINT `fk_challenge_post_postid`
    FOREIGN KEY (`postid`)
    REFERENCES `q2a`.`qa_posts` (`postid`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
COMMENT = 'challenge table which maps question post as challenge';

	    */
    }

    public function create_challenge(){}
}
