<?php
// Plugin Klaza para Moodle - settings.php
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
 * settings for local_klaza plugin.
 * 
 * @package   local_klaza
 * @copyright 2022, Klaza Team
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

// config_plugins -> nome da tabela de configurações dos plugins no moodle

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {

    $ADMIN->add('localplugins', new admin_category('local_klaza_settings', new lang_string('pluginname', 'local_klaza')));
    $settingspage = new admin_settingpage('managelocalklaza', new lang_string('manage', 'local_klaza'));

    if ($ADMIN->fulltree) {

        $settingspage->add(new admin_setting_configtext('local_klaza/server_url', new lang_string('server_url', 'local_klaza'), new lang_string('server_url_desc', 'local_klaza'), "localhost:5000", PARAM_TEXT));
        $settingspage->add(new admin_setting_configtext('local_klaza/server_auth', new lang_string('server_auth', 'local_klaza'), new lang_string('server_auth_desc', 'local_klaza'), md5(uniqid("", true)), PARAM_TEXT));

    }

    $ADMIN->add('localplugins', $settingspage);

}