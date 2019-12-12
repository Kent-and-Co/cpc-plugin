<?php
/*
 * イベント出展者用カスタム投稿タイプ
 */

class CpcShoplist {

	public function __construct() {
		add_action( 'init', array( $this, 'cpc_register_shoplist_cpts' ) );
	}

	function cpc_register_shoplist_cpts() {
		$labels = array(
			'name'               => 'イベント出展者',
			'singular_name'      => 'イベント出展者',
			'menu_name'          => 'イベント出展者',
			'all_items'          => 'すべての出展者',
			'add_new'            => '新規追加',
			'add_new_item'       => '新規出展者追加',
			'edit'               => '編集',
			'edit_item'          => '出展者を編集',
			'new_item'           => '新規出展者',
			'view'               => '表示',
			'view_item'          => '出展者を表示',
			'search_items'       => '検索項目',
			'not_found'          => '出展者が見つかりません',
			'not_found_in_trash' => 'ゴミ箱にはありません',
			'parent'             => '親',
		);
		$args   = array(
			'labels'              => $labels,
			'description'         => 'イベント出展者情報',
			'public'              => true,
			'show_ui'             => true,
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-store',
			'has_archive'         => true,
			'show_in_menu'        => true,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'query_var'           => true,
			'supports'            => array( 'title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats' ),
		);
		register_post_type( 'shops', $args );
	}
}

$cpc_shoplist = new CpcShoplist();
