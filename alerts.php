<?php
// Plugin Klaza para Moodle - alert.php
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
 * Alert page script of the local_klaza plugin.
 * 
 * @package   local_klaza
 * @copyright 2022, Klaza Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/klaza/classes/form/send_alert.php');

require_login();
$context = context_system::instance();

$PAGE->set_url(new moodle_url('/local/klaza/alerts.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('alert_page_title', 'local_klaza'));

$courseid = $_GET['courseid'];
$courseURL = new moodle_url('/course/view.php?id='.$courseid);

$mform = new send_alert(null, array('courseid' => $courseid));

\local_klaza\methods::console_log($fromform = $mform->get_data());

if ($mform->is_cancelled()) {
   
    redirect($courseURL);

} 
else if ($fromform = $mform->get_data()) {

    $configs = get_config('local_klaza');
    $url = $configs->server_url . "/send_alert";

    \local_klaza\methods::send_request($url, $fromform);

    redirect($courseURL);

}


echo $OUTPUT->header();

$mform->display();

echo $OUTPUT->footer();