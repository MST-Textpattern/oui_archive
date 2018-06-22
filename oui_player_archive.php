<?php

/*
 * This file is part of oui_player_archive,
 * a oui_player v2+ extension to easily embed
 * Archive.org customizable media players in Textpattern CMS.
 *
 * https://github.com/NicolasGraph/oui_player_archive
 *
 * Copyright (C) 2018 Nicolas Morand
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA..
 */

/**
 * Archive
 *
 * @package Oui\Player
 */

namespace Oui\Player {

    if (class_exists('Oui\Player\Provider')) {

        class Archive extends Provider
        {
            protected static $patterns = array(
                'unknown' => array(
                    'scheme' => '#^(http|https)://(www\.)?archive\.org/(details|embed)/([^&?/]+)$#i',
                    'id'     => '4',
                ),
            );
            protected static $src = '//archive.org/';
            protected static $glue = array('embed/', '&amp;', '&amp;');
            protected static $dims = array(
                'width'    => array(
                    'default' => '640',
                ),
                'height'   => array(
                    'default' => '480',
                ),
                'ratio'    => array(
                    'default' => '',
                ),
            );
            protected static $params = array(
                'autoplay' => array(
                    'default' => '0',
                    'valid'   => array('0', '1'),
                ),
                'playlist' => array(
                    'default' => '0',
                    'valid'   => array('0', '1'),
                ),
                'poster'   => array(
                    'default' => '',
                    'valid'   => 'url',
                ),
            );
        }
    }
}

namespace {
    function oui_archive($atts) {
        return oui_player(array_merge(array('provider' => 'archive'), $atts));
    }

    function oui_if_archive($atts, $thing) {
        return oui_if_player(array_merge(array('provider' => 'archive'), $atts), $thing);
    }
}
