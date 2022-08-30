<?php
// Plugin Klaza para Moodle - uninstall.php
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
 * Uninstall script for the local_klaza plugin.
 * 
 * @package   local_klaza
 * @copyright 2022, Klaza Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die;

function local_klaza_uninstall() {

    global $DB;

    $category = $DB->get_record('user_info_category', array('name' => 'Klaza'));

    if ($category) {
      
        $DB->delete_records('user_info_field', array('shortname' => 'klaza_discord'));
        $DB->delete_records('user_info_field', array('shortname' => 'klaza_discord_priority'));

        $DB->delete_records('user_info_field', array('shortname' => 'klaza_whatsapp'));
        $DB->delete_records('user_info_field', array('shortname' => 'klaza_whatsapp_priority'));

        $DB->delete_records('user_info_field', array('shortname' => 'klaza_telegram'));
        $DB->delete_records('user_info_field', array('shortname' => 'klaza_telegram_priority'));

        $DB->delete_records('user_info_category', array('name' => 'Klaza'));

    }

    return true;

}