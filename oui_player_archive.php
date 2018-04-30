<?php

/*
 * This file is part of oui_player,
 * an extendable plugin to easily embed
 * customizable players in Textpattern CMS.
 *
 * https://github.com/NicolasGraph/oui_player
 *
 * Copyright (C) 2016-2017 Nicolas Morand
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT
 * OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
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

        global $event;

        if (txpinterface === 'admin' && ($event === 'prefs' || $event === 'plugin_prefs.oui_player_archive')) {
            Archive::getInstance();
        }
    }
}
