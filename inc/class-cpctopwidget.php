<?php
class CpcTopWidget extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'cpc_topwidget',
			'CPC トップ新着',
			array( 'description' => '「CPCトップページ専用 新着記事表示ウィジェット」' )
		);

		add_action(
			'widgets_init',
			function() {
				register_widget( 'CpcTopWidget' );
			}
		);
	}

	public function widget( $args, $instance ) {
		//タイトル名を取得
		$title_new = apply_filters( 'widget_title_new', $instance['title_new'] );
		//表示数を取得
		$entry_count = apply_filters( 'widget_entry_count', $instance['entry_count'] );
		//表示数をグローバル変数に格納
		global $g_entry_count;
		$g_entry_count = 5;//表示数が設定されていない時は5にする
		if ( $args->entry_count ) {//表示数が設定されているときは表示数をグローバル変数に代入
			$g_entry_count = $args->entry_count;
		}
		?>
		<?php //classにwidgetと一意となるクラス名を追加する ?>
		<div id="cpc-top-widget" class="widget widget_cpc_top_widget">
			<h2 class="has-text-align-center">
			<?php

			if ( ! $title_new ) {
				$title_new = '新着記事';
			}

			$title_new = apply_filters( 'cpc_top_widget_title', $title_new );
			echo $title_new;

			?>
			</h2>
			<?php
			//表示用の処理を書くところだけどテンプレートファイル側に書く
			// テンプレートファイルの場所
			$template_dir = plugin_dir_path( __DIR__ ) . 'templates/';

				// 探すべきファイル名
				$file_name = 'cpc-top-widget.php';

			if ( isset( $file_name ) ) {
				// テーマ（子 → 親）のファイルを先に探す
				$theme_file = locate_template( $file_name );
			}
			if ( isset( $theme_file ) && $theme_file ) {
				$template = $theme_file;
			} elseif ( isset( $file_name ) && $file_name ) {
				$template = $template_dir . $file_name;
			}

			require_once( $template );
			?>
		</div><!-- /#cpc-top-widget -->
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['title_new']   = strip_tags( $new_instance['title_new'] );
		$instance['entry_count'] = strip_tags( $new_instance['entry_count'] );
		return $instance;
	}

	function form( $instance ) {
		$title_new   = esc_attr( $instance['title_new'] );
		$entry_count = esc_attr( $instance['entry_count'] );
		?>
		<?php //タイトル入力フォーム ?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title_new' ); ?>">
			<?php _e( '新着エントリーのタイトル' ); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title_new' ); ?>" name="<?php echo $this->get_field_name( 'title_new' ); ?>" type="text" value="<?php echo $title_new; ?>" />
		</p>
			<?php //表示数入力フォーム ?>
		<p>
		<label for="<?php echo $this->get_field_id( 'entry_count' ); ?>">
			<?php _e( '表示数（半角数字）' ); ?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'entry_count' ); ?>" name="<?php echo $this->get_field_name( 'entry_count' ); ?>" type="text" value="<?php echo $entry_count; ?>" />
		</p>
			<?php
	}

}

$cpc_topwidget = new CpcTopWidget();
