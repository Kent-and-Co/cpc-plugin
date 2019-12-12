<?php
/*
 * 講師一覧用カスタム投稿タイプ
 */

class CpcInstructors {

	public function __construct() {
		add_action( 'init', array( $this, 'cpc_register_instructors_cpts' ) );
	}

	function cpc_register_instructors_cpts() {
		$labels = array(
			'name'               => '講師',
			'singular_name'      => '講師',
			'menu_name'          => '講師',
			'all_items'          => 'すべての講師',
			'add_new'            => '新規追加',
			'add_new_item'       => '新規講師追加',
			'edit'               => '編集',
			'edit_item'          => '講師を編集',
			'new_item'           => '新規講師',
			'view'               => '表示',
			'view_item'          => '講師を表示',
			'search_items'       => '検索項目',
			'not_found'          => '講師が見つかりません',
			'not_found_in_trash' => 'ゴミ箱にはありません',
			'parent'             => '親',
		);
		$args   = array(
			'labels'              => $labels,
			'description'         => '講師情報',
			'public'              => true,
			'show_ui'             => true,
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-businesswoman',
			'has_archive'         => true,
			'show_in_menu'        => true,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'query_var'           => true,
			'supports'            => array( 'title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats' ),
		);
		register_post_type( 'instructors', $args );
	}
}

$cpc_instructors = new CpcInstructors();
