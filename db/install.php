<?php
// Plugin Klaza para Moodle - install.php
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
 * Install script for the local_klaza plugin.
 * 
 * @package   local_klaza
 * @copyright 2022, Klaza Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die;

function xmldb_local_klaza_install() {

    global $DB;

    if (!$DB->get_record('user_info_category', array('name' => 'Klaza'))) {
       
        $DB->insert_record('user_info_category', array('name' => 'Klaza', 'sortorder' => 1));

    }

    $category = $DB->get_record('user_info_category', array('name' => 'Klaza'));

    if (!$DB->get_record('user_info_field', array('shortname' => 'klaza_discord', 'categoryid' => $category->id))) {
      
        $DB->insert_record('user_info_field', array(
            'shortname'         => 'klaza_discord',
            'name'              => 'Username do Discord (incluindo o # e a tag)',
            'datatype'          => 'text',
            'description'       => '<p dir="ltr" style="text-align: left;"> Seu username dentro Discord incluindo a tag </p>',
            'descriptionformat' => 1,
            'categoryid'        => $category->id,
            'sortorder'         => 1,
            'required'          => 0,
            'locked'            => 0,
            'visible'           => 2,
            'forceunique'       => 0,
            'signup'            => 0,
            'defaultdata'       => '',
            'defaultdataformat' => 0,
            'param1'            => 30,
            'param2'            => 30,
            'param3'            => 0,
            'param4'            => '',
            'param5'            => ''
        ));

    }

    if (!$DB->get_record('user_info_field', array('shortname' => 'klaza_whatsapp', 'categoryid' => $category->id))) {

        $DB->insert_record('user_info_field', array(
            'shortname'         => 'klaza_whatsapp',
            'name'              => 'Numero do Whatsapp',
            'datatype'          => 'text',
            'description'       => '<p dir="ltr" style="text-align: left;"> Seu numero do Whatsapp </p>',
            'descriptionformat' => 1,
            'categoryid'        => $category->id,
            'sortorder'         => 1,
            'required'          => 0,
            'locked'            => 0,
            'visible'           => 2,
            'forceunique'       => 0,
            'signup'            => 0,
            'defaultdata'       => '',
            'defaultdataformat' => 0,
            'param1'            => 30,
            'param2'            => 30,
            'param3'            => 0,
            'param4'            => '',
            'param5'            => ''
        ));

    }

    if (!$DB->get_record('user_info_field', array('shortname' => 'klaza_telegram', 'categoryid' => $category->id))) {

        $DB->insert_record('user_info_field', array(
            'shortname'         => 'klaza_telegram',
            'name'              => 'Numero do Telegram',
            'datatype'          => 'text',
            'description'       => '<p dir="ltr" style="text-align: left;"> Seu numero do Telegram </p>',
            'descriptionformat' => 1,
            'categoryid'        => $category->id,
            'sortorder'         => 1,
            'required'          => 0,
            'locked'            => 0,
            'visible'           => 2,
            'forceunique'       => 0,
            'signup'            => 0,
            'defaultdata'       => '',
            'defaultdataformat' => 0,
            'param1'            => 30,
            'param2'            => 30,
            'param3'            => 0,
            'param4'            => '',
            'param5'            => ''
        ));

    }

    return true;

}