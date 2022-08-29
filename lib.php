<?php
// Plugin Klaza para Moodle - lib.php
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
 * lib script of the local_klaza plugin.
 * 
 * @package   local_klaza
 * @copyright 2022, Klaza Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

function local_klaza_extend_navigation_course($parentnode, $course, $context) {

    global $CFG;

    \local_klaza\methods::console_log($parentnode);
    \local_klaza\methods::console_log($course);
    \local_klaza\methods::console_log($context);

    $parentnode->add(
        get_string('alert_button', 'local_klaza'),
        new moodle_url('/local/klaza/alerts.php?courseid='.$course->id),
        navigation_node::TYPE_SETTING,
        null,
        "local_example_item"
    );

}