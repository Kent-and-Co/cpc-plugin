<?php
class CpcSvgSupport {
	public function __construct() {
		//add SVG to allowed file uploads
		add_action( 'upload_mimes', array( $this, 'cpc_add_svg_to_uploads' ) );
	}

	function cpc_add_svg_to_uploads( $file_types ) {

		$new_filetypes        = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types           = array_merge( $file_types, $new_filetypes );

		return $file_types;
	}

}

$cpc_svgsupport = new CpcSvgSupport();
