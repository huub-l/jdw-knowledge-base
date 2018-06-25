<?php
/**
 * Fired during plugin activation
 *
 * @link       https://jelledamen.nl
 * @since      1.0.0
 */

namespace Jdw\KnowledgeBase\Util;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @author     Jelle Damen <info@jelledamen.nl>
 */
class Activator
{
    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate(): void
    {
        // first check if knowledge base page exist
        $args_posts1 = [
            'post_type'     => 'page',
            'post_status'   => 'any',
            'name'          => 'Kennisbank',
            'post_per_page' => 1
        ];
        $get_posts = new \WP_Query($args_posts1);
        if (! $get_posts->have_posts()) {

            $arg = [
                'post_type'   => 'page',
                'post_title'  => 'Kennisbank',
                'post_status' => 'publish',
                'post_author' => get_current_user_id()
            ];
            wp_insert_post($arg);
        }
    }
}