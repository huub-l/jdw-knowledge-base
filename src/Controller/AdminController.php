<?php

declare(strict_types=1);

namespace Jdw\KnowledgeBase\Controller;

class AdminController
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
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function new_cpt_jdw_knowledge_base(): void
    {
        $labels = [
            'name'               => __('Knowledge Base'),
            'singular_name'      => __('Knowledge Base'),
            'menu_name'          => __('Knowledge Base'),
            'name_admin_bar'     => __('Knowledge Base'),
            'add_new'            => __('New Page'),
            'add_new_item'       => __('Add New Page'),
            'new_item'           => __('New Page'),
            'edit_item'          => __('Edit Page'),
            'view_item'          => __('View Page'),
            'all_items'          => __('All Pages'),
            'search_items'       => __('Search Knowledge Base Page'),
            'not_found'          => __('Not Found'),
            'not_found_in_trash' => __('Not found in Trash')
        ];

        $args = [
            'labels'              => $labels,
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'query_var'           => true,
            'rewrite'             => ['slug' => __('knowledge-base'), 'with_front' => false],
            'capability_type'     => 'page',
            'hierarchical'        => false,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-admin-post',
            'exclude_from_search' => false,
            'show_in_nav_menus'   => true,
            'supports'            => ['title', 'editor', 'thumbnail', 'page-attributes'],
            'has_archive'         => false
        ];

        register_post_type(strtolower('jdw-knowledge-base'), $args);
        flush_rewrite_rules(true);
    }
}