<?php
// Plugin Klaza para Moodle - events.php
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
 * Event handlers for the local_klaza plugin.
 * 
 * @package   local_klaza
 * @copyright 2022, Klaza Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

$observers = array(

    array(
        'eventname'   => '\core\event\course_module_created',
        'callback'    => '\local_klaza\methods::send_event_request',
    ),

    array(
        'eventname'   => '\core\event\course_module_updated',
        'callback'    => '\local_klaza\methods::send_event_request',
    ),

    array(
        'eventname'   => '\core\event\course_module_deleted',
        'callback'    => '\local_klaza\methods::send_event_request',
    ),

    // array(
    //     'eventname'   => '\core\event\course_module_viewed',
    //     'callback'    => '\local_klaza\methods::send_event_request',
    // ),



    array(
        'eventname'   => '\mod_chat\event\message_sent',
        'callback'    => '\local_klaza\methods::send_event_request',
    ),



    array(
        'eventname'   => '\assignsubmission_file\event\submission_updated',
        'callback'    => '\local_klaza\methods::send_event_request',
    ),

    array(
        'eventname'   => '\assignsubmission_onlinetext\event\assessable_uploaded',
        'callback'    => '\local_klaza\methods::send_event_request',
    ),


    
    array(
        'eventname'   => '\mod_quiz\event\attempt_submitted',
        'callback'    => '\local_klaza\methods::send_event_request',
    ),



    array(
        'eventname'   => '\core\event\comment_created',
        'callback'    => '\local_klaza\methods::send_event_request',
    ),

    array(
        'eventname'   => 'core\event\comment_deleted',
        'callback'    => '\local_klaza\methods::send_event_request',
    ),

);