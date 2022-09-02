<?php

// Plugin Klaza para Moodle - methods.php
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
 * Class for generic functions of the local_klaza plugin.
 * 
 * @package   local_klaza
 * @copyright 2022, Klaza Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

namespace local_klaza;

class methods {

    public static function get_event_infos($event) {
        
        return array( 
            'eventname' => $event->eventname,
            'objectid' => $event->objectid,
            'crud' => $event->crud,
            'contextlevel' => $event->contextlevel,
            'contextid' => $event->contextid,
            'userid' => $event->userid,
            'courseid' => $event->courseid,
            'relateduserid' => $event->relateduserid,
            'action' => $event->action,
            'target' => $event->target,
            'other' => $event->other,
        );

    }

    public static function send_request($url, $data) {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'KlazaKey: ' . get_config('local_klaza')->server_auth));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;

    }

    public static function console_log($data) {
        echo '<script>';
        echo 'console.log('. json_encode($data) .')';
        echo '</script>';
    }

    public static function get_event_name($event) {
        return $event->target."_".$event->action;
    }

    public static function send_event_request($event) {

        $configs = get_config('local_klaza');
        $data = methods::get_event_infos($event);
        $eventname = methods::get_event_name($event);
        $url = $configs->server_url . '/event/' . $eventname;

        methods::send_request($url, $data);

    }

}
