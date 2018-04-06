<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Setting page for global_announcement block
 *
 * @package    block_global_announcement
 * @copyright  2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $label = new lang_string('settingenable_label', 'block_global_announcement');
    $description = new lang_string('settingenable_description', 'block_global_announcement');
    $default = 0;
    $settings->add(new admin_setting_configcheckbox('block_global_announcement/enabled', $label, $description, $default));

    $label = new lang_string('settingtitle_label', 'block_global_announcement');
    $description = new lang_string('settingtitle_description', 'block_global_announcement');
    $default = new lang_string('settingtitle_default', 'block_global_announcement');
    $settings->add(new admin_setting_configtext('block_global_announcement/title', $label, $description, $default, PARAM_TEXT));

    $label = new lang_string('settingtext_label', 'block_global_announcement');
    $description = new lang_string('settingtext_description', 'block_global_announcement');
    $default = new lang_string('settingtext_default', 'block_global_announcement');
    $settings->add(new admin_setting_configtext('block_global_announcement/text', $label, $description, $default, PARAM_TEXT));
}
