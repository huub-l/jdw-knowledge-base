<?php

declare(strict_types=1);


/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://jelledamen.nl
 * @since      1.0.0
 *
 * @package    Jdw_Testimonials
 * @subpackage Jdw_Testimonials/public
 */

namespace Jdw\KnowledgeBase\Controller;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Jdw-Testimonials
 * @subpackage Testimonials/src/Controller/FrontController
 * @author     Jelle Damen <info@jelledamen.nl>
 */
class FrontController
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    // Yoast breadcrumb fix
    public function my_wpseo_breadcrumb_links(string $links): string
    {
        if (is_single()) {
            $cpt_object = get_post_type_object(get_post_type());
            if (!$cpt_object->_builtin) {
                $landing_page = get_page_by_path($cpt_object->rewrite['slug']);
                array_splice($links, -1, 0, [
                    [
                        'id' => $landing_page->ID
                    ]
                ]);
            }
        }
        return $links;
    }

}