<?php

/**
 * Copyright (C) 2017 Benjamin Heisig
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Benjamin Heisig <https://benjamin.heisig.name/>
 * @copyright Copyright (C) 2017 Benjamin Heisig
 * @license http://www.gnu.org/licenses/agpl-3.0 GNU Affero General Public License (AGPL)
 * @link https://github.com/bheisig/check_mk-web-api
 */

namespace bheisig\checkmkwebapi;

/**
 * Changes
 */
class Change extends Request {

    /**
     * Activate changes for specific sites
     *
     * @param string[] $sites List of sites
     * @param bool $allowForeignChanges Optional activate changes made by other users; defaults to false ("no")
     *
     * @return array Results for every site
     *
     * @throws \Exception on error
     */
    public function activate(array $sites, $allowForeignChanges = false) {
        $result = $this->api->request(
            'activate_changes',
            [
                'sites' => $sites,
                'allow_foreign_changes' => $allowForeignChanges ? '1' : '0'
            ]
        );

        if (!array_key_exists('sites', $result) ||
            !is_array($result['sites']) ||
            count($result['sites']) !== count($sites)) {
            throw new \Exception('Invalid server response');
        }

        return $result['sites'];
    }

    /**
     * Activate changes for all sites
     *
     * @param bool $allowForeignChanges Optional activate changes made by other users; defaults to false ("no")
     *
     * @return array Results for every site
     *
     * @throws \Exception on error
     */
    public function activateEverywhere($allowForeignChanges = false) {
//        $sites = (new Site($this->api))->getAll();

        // @todo Implement me!
    }

}