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
 * Form for editing global_announcement block instances.
 *
 * @package    block_global_announcement
 * @copyright  2018 Mitxel Moriana <moriana.mitxel@gmail>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_global_announcement extends block_base {
    public function init() {
        $this->title = get_config('block_global_announcement', 'title');
    }

    public function hide_header() {
        return empty($this->title);
    }

    /**
     * Hide the block if announcement setting is not enabled
     * @return bool
     * @throws dml_exception
     */
    public function is_empty() {
        return !$this->is_enabled();
    }

    /**
     * @return bool
     * @throws dml_exception
     */
    private function is_enabled() {
        return (bool) get_config('block_global_announcement', 'enabled');
    }

    /**
     * Enable admin settings page
     * @return bool
     */
    public function has_config() {
        return true;
    }

    /**
     * This block will be instanced everywhere on plugin installation, therefore it will never appear listed in
     * the "Add a block" list
     * @return array
     */
    public function applicable_formats() {
        return array('all' => true);
    }

    /**
     * Disallow any kind of block instance configuration
     * @return bool
     */
    public function user_can_edit() {
        return false;
    }

    public function get_content() {
        $this->content = new stdClass;
        $this->content->footer = '';
        $this->content->text = get_config('block_global_announcement', 'text');

        return $this->content;
    }

    /**
     * Little hack: if announcement is not enabled from the admin settings,
     * prevent the block from showing even in Edition Mode on.
     * @param $output
     * @return block_contents|null
     * @throws dml_exception
     */
    public function get_content_for_output($output) {
        if (!$this->is_enabled()) {
            return null;
        }

        return parent::get_content_for_output($output);
    }

    public function user_can_addto($moodle_page) {
        return false;
    }

    public function instance_can_be_docked() {
        return false;
    }

    public function instance_can_be_hidden() {
        return false;
    }

    public function instance_can_be_collapsed() {
        return false;
    }
}
