<?php
// Plugin Klaza para Moodle - send_alert.php
// Copyright (C) 2022 Klaza Team

// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Send alert class of the local_klaza plugin.
 * 
 * @package   local_klaza
 * @copyright 2022, Klaza Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");

class send_alert extends moodleform {

    //Add elements to form
    public function definition() {

        global $DB;
       
        $mform = $this->_form;

        $course = $DB->get_record('course', array('id' => $this->_customdata['courseid']));

        $mform->addElement('static', 'description', get_string('alert_static', 'local_klaza') . $course->fullname);

        $mform->addElement('textarea', 'alert_text', get_string('alert_text', 'local_klaza'), 'wrap="virtual" rows="5" cols="50"');
        $mform->setType('alert_text', PARAM_NOTAGS);

        $buttonarray=array();

        $buttonarray[] = $mform->createElement('submit', 'submit', get_string('savechanges'));
        $buttonarray[] = $mform->createElement('reset', 'reset', get_string('revert'));
        $buttonarray[] = $mform->createElement('cancel');
        
        $mform->addGroup($buttonarray, 'buttonar', '', ' ', false);
 
    }

    
    function validation($data, $files) {
        return array();
    }

}
