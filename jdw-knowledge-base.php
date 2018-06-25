<?php

declare(strict_types=1);

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jelledamen.nl
 * @since             1.0.0
 * @package           Jdw_Knowledge_Base
 *
 * @wordpress-plugin
 * Plugin Name:       JDW Knowledge Base
 * Plugin URI:        https://jelledamen.nl
 * Description:       Een plugin voor het schrijven van kennisbank artikelen.
 * Version:           2.0.0
 * Author:            Jelle Damen
 * Author URI:        https://jelledamen.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jdw-knowledge-base
 * Domain Path:       /languages
 */

namespace Jdw\KnowledgeBase;

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// If plugin isn't loaded from Composer we need to add the plugin autoloader
if (!class_exists('KnowledgeBase')) {

    // Get a reference to the PSR-4 autoloader function that can be used to add the plugin namespace
    $autoloader = require_once(plugin_dir_path(__FILE__) . 'autoload.php');

    // Use the autoload function to setup the class mapping
    $autoloader('Jdw\\KnowledgeBase', __DIR__ . '/src/');
}

/**
 * The code that runs during plugin activation.
 * This action is documented in \Util\Activator.php
 */
function activate_jdw_knowledge_base()
{
    Util\Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in \Util\Deactivator.php
 */
function deactivate_jdw_knowledge_base()
{
    Util\Deactivator::deactivate();
}

register_activation_hook(__FILE__, __NAMESPACE__ .'\\activate_jdw_knowledge_base');
register_deactivation_hook(__FILE__, __NAMESPACE__ . '\\deactivate_jdw_knowledge_base');

// run plugin
function run_jdw_knowledge_base_plugin()
{
    $plugin = new KnowledgeBase();
    $plugin->run();
}

run_jdw_knowledge_base_plugin();