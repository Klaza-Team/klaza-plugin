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

    $category = add_klaza_category($DB);

    add_discord_fields($DB, $category);
    add_whatsapp_fields($DB, $category);
    add_telegram_fields($DB, $category);

    return true;

}

function add_klaza_category($DB) {

    if (!$DB->get_record('user_info_category', array('name' => 'Klaza'))) {
       
        $DB->insert_record('user_info_category', array('name' => 'Klaza', 'sortorder' => 1));

    }

    return $DB->get_record('user_info_category', array('name' => 'Klaza'));

}

function add_discord_fields($DB, $category) {

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

    if (!$DB->get_record('user_info_field', array('shortname' => 'klaza_discord_priority', 'categoryid' => $category->id))) {
      
        $DB->insert_record('user_info_field', array(
            'shortname'         => 'klaza_discord_priority',
            'name'              => 'Prioridade do Discord',
            'datatype'          => 'text',
            'description'       => '<p dir="ltr" style="text-align: left;"> Número da prioridade do Discord nas notificações. Quanto maior o número, menor a prioridade. -1 significa que o Klaza não deve notificar pelo Discord. </p>',
            'descriptionformat' => 1,
            'categoryid'        => $category->id,
            'sortorder'         => 2,
            'required'          => 0,
            'locked'            => 0,
            'visible'           => 2,
            'forceunique'       => 0,
            'signup'            => 0,
            'defaultdata'       => '0',
            'defaultdataformat' => 0,
            'param1'            => 10,
            'param2'            => 10,
            'param3'            => 0,
            'param4'            => '',
            'param5'            => ''
        ));

    }

}

function add_whatsapp_fields($DB, $category) {

    if (!$DB->get_record('user_info_field', array('shortname' => 'klaza_whatsapp', 'categoryid' => $category->id))) {

        $DB->insert_record('user_info_field', array(
            'shortname'         => 'klaza_whatsapp',
            'name'              => 'Número do Whatsapp',
            'datatype'          => 'text',
            'description'       => '<p dir="ltr" style="text-align: left;"> Seu número do Whatsapp </p>',
            'descriptionformat' => 1,
            'categoryid'        => $category->id,
            'sortorder'         => 3,
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

    if (!$DB->get_record('user_info_field', array('shortname' => 'klaza_whatsapp_priority', 'categoryid' => $category->id))) {
      
        $DB->insert_record('user_info_field', array(
            'shortname'         => 'klaza_whatsapp_priority',
            'name'              => 'Prioridade do Whatsapp',
            'datatype'          => 'text',
            'description'       => '<p dir="ltr" style="text-align: left;"> Número da prioridade do Whatsapp nas notificações. Quanto maior o número, menor a prioridade. -1 significa que o Klaza não deve notificar pelo Whatsapp. </p>',
            'descriptionformat' => 1,
            'categoryid'        => $category->id,
            'sortorder'         => 4,
            'required'          => 0,
            'locked'            => 0,
            'visible'           => 2,
            'forceunique'       => 0,
            'signup'            => 0,
            'defaultdata'       => '0',
            'defaultdataformat' => 0,
            'param1'            => 10,
            'param2'            => 10,
            'param3'            => 0,
            'param4'            => '',
            'param5'            => ''
        ));

    }

}

function add_telegram_fields($DB, $category) {

    if (!$DB->get_record('user_info_field', array('shortname' => 'klaza_telegram', 'categoryid' => $category->id))) {

        $DB->insert_record('user_info_field', array(
            'shortname'         => 'klaza_telegram',
            'name'              => 'Número do Telegram',
            'datatype'          => 'text',
            'description'       => '<p dir="ltr" style="text-align: left;"> Seu número do Telegram </p>',
            'descriptionformat' => 1,
            'categoryid'        => $category->id,
            'sortorder'         => 5,
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

    if (!$DB->get_record('user_info_field', array('shortname' => 'klaza_telegram_priority', 'categoryid' => $category->id))) {
      
        $DB->insert_record('user_info_field', array(
            'shortname'         => 'klaza_telegram_priority',
            'name'              => 'Prioridade do Telegram',
            'datatype'          => 'text',
            'description'       => '<p dir="ltr" style="text-align: left;"> Número da prioridade do Telegram nas notificações. Quanto maior o número, menor a prioridade. -1 significa que o Klaza não deve notificar pelo Telegram. </p>',
            'descriptionformat' => 1,
            'categoryid'        => $category->id,
            'sortorder'         => 6,
            'required'          => 0,
            'locked'            => 0,
            'visible'           => 2,
            'forceunique'       => 0,
            'signup'            => 0,
            'defaultdata'       => '0',
            'defaultdataformat' => 0,
            'param1'            => 10,
            'param2'            => 10,
            'param3'            => 0,
            'param4'            => '',
            'param5'            => ''
        ));

    }

}