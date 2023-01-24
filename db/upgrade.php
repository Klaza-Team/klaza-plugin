<?php
// Plugin Klaza para Moodle - update.php
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

function xmldb_local_klaza_upgrade($oldversion): bool {

    global $CFG, $DB;

    $dbman = $DB->get_manager(); // Loads ddl manager and xmldb classes.

    \local_klaza\methods::console_log($oldversion);

    if ($oldversion < 10012) {

        $table = new xmldb_table('klaza_global_config');
        $field = new xmldb_field('use_global');

        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }

        upgrade_plugin_savepoint(true, 10012, 'local', 'klaza');

    }

    if ($oldversion < 109) {

        // CHANGE klaza_alert

        $table_klaza_alert = new xmldb_table('klaza_alert');
        $field_creator_id = new xmldb_field('creator_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);

        if (!$dbman->field_exists($table_klaza_alert, $field_creator_id)) {
            $dbman->add_field($table_klaza_alert, $field_creator_id);        
        }

    }

    if ($oldversion < 108) {

        // ADD klaza_user_config

        $table_klaza_user_config = new xmldb_table('klaza_user_config');

        $table_klaza_user_config->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
        $table_klaza_user_config->add_field('user_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_config->add_field('name', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_config->add_field('value', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_config->add_field('type', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);

        $table_klaza_user_config->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        if (!$dbman->table_exists($table_klaza_user_config)) {
            $dbman->create_table($table_klaza_user_config);
        }
       
        // ADD klaza_user_instance_config

        $table_klaza_user_instance_config = new xmldb_table('klaza_user_inst_conf');

        $table_klaza_user_instance_config->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
        $table_klaza_user_instance_config->add_field('user_instance_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('use_global', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_create_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_edit_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_delete_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_deadline_2_days', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_deadline_1_day', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_deadline', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_send_assignment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_receive_message', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_receive_comment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_user_instance_config->add_field('notify_delete_comment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);

        $table_klaza_user_instance_config->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        if (!$dbman->table_exists($table_klaza_user_instance_config)) {
            $dbman->create_table($table_klaza_user_instance_config);
        }

        // ADD klaza_discord_instance_config

        $table_klaza_discord_instance_config = new xmldb_table('klaza_disc_inst_conf');

        $table_klaza_discord_instance_config->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
        $table_klaza_discord_instance_config->add_field('discord_instance_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('use_global', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_create_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_edit_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_delete_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_deadline_2_days', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_deadline_1_day', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_deadline', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_send_assignment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_receive_message', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_receive_comment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_instance_config->add_field('notify_delete_comment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);

        $table_klaza_discord_instance_config->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        if (!$dbman->table_exists($table_klaza_discord_instance_config)) {
            $dbman->create_table($table_klaza_discord_instance_config);
        }

        // ADD klaza_telegram_instance_config

        $table_klaza_telegram_instance_config = new xmldb_table('klaza_tele_inst_conf');

        $table_klaza_telegram_instance_config->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
        $table_klaza_telegram_instance_config->add_field('telegram_instance_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('use_global', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_create_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_edit_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_delete_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_deadline_2_days', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_deadline_1_day', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_deadline', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_send_assignment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_receive_message', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_receive_comment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_instance_config->add_field('notify_delete_comment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);

        $table_klaza_telegram_instance_config->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        if (!$dbman->table_exists($table_klaza_telegram_instance_config)) {
            $dbman->create_table($table_klaza_telegram_instance_config);
        }

        // ADD klaza_global_config

        $table_klaza_global_config = new xmldb_table('klaza_global_config');

        $table_klaza_global_config->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
        $table_klaza_global_config->add_field('user_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('use_global', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_create_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_edit_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_delete_content', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_deadline_2_days', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_deadline_1_day', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_deadline', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_send_assignment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_receive_message', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_receive_comment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);
        $table_klaza_global_config->add_field('notify_delete_comment', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);

        $table_klaza_global_config->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        if (!$dbman->table_exists($table_klaza_global_config)) {
            $dbman->create_table($table_klaza_global_config);
        }

        // ADD klaza_discord_accounts

        $table_klaza_discord_accounts = new xmldb_table('klaza_disc_accounts');

        $table_klaza_discord_accounts->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
        $table_klaza_discord_accounts->add_field('user_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_accounts->add_field('value', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);
        $table_klaza_discord_accounts->add_field('priority', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);

        $table_klaza_discord_accounts->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        if (!$dbman->table_exists($table_klaza_discord_accounts)) {
            $dbman->create_table($table_klaza_discord_accounts);
        }

        // ADD klaza_telegram_accounts

        $table_klaza_telegram_accounts = new xmldb_table('klaza_tele_accounts');

        $table_klaza_telegram_accounts->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
        $table_klaza_telegram_accounts->add_field('user_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_accounts->add_field('value', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);
        $table_klaza_telegram_accounts->add_field('priority', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);

        $table_klaza_telegram_accounts->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        if (!$dbman->table_exists($table_klaza_telegram_accounts)) {
            $dbman->create_table($table_klaza_telegram_accounts);
        }

        // ADD klaza_whatsapp_accounts

        $table_klaza_whatsapp_accounts = new xmldb_table('klaza_whats_accounts');

        $table_klaza_whatsapp_accounts->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
        $table_klaza_whatsapp_accounts->add_field('user_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table_klaza_whatsapp_accounts->add_field('value', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, null);
        $table_klaza_whatsapp_accounts->add_field('priority', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, null);

        $table_klaza_whatsapp_accounts->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);

        if (!$dbman->table_exists($table_klaza_whatsapp_accounts)) {
            $dbman->create_table($table_klaza_whatsapp_accounts);
        }

        // CHANGE klaza_discord_instance

        $table_klaza_discord_instance = new xmldb_table('klaza_discord_instance');

        $dbman->add_field($table_klaza_discord_instance, new xmldb_field('creator_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, 0));

        // CHANGE klaza_telegram_instance

        $table_klaza_telegram_instance = new xmldb_table('klaza_telegram_instance');

        $dbman->add_field($table_klaza_telegram_instance, new xmldb_field('creator_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, 0));

        upgrade_plugin_savepoint(true, 108, 'local', 'klaza');

    }

    if ($oldversion < 106) {
        
        $table = new xmldb_table('klaza_telegram_instance');
        $field = new xmldb_field('guild');

        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }

        upgrade_plugin_savepoint(true, 106, 'local', 'klaza');

    }

    // Everything has succeeded to here. Return true.
    return true;
}