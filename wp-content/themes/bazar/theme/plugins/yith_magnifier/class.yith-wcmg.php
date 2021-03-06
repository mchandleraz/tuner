<?php
/**
 * Main class
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Magnifier
 * @version 1.0.0
 */

if ( !defined( 'YITH_WCMG' ) ) { exit; } // Exit if accessed directly

if( !class_exists( 'YITH_WCMG' ) ) {    
    /**
     * WooCommerce Magnifier
     *
     * @since 1.0.0
     */
    class YITH_WCMG {
        /**
         * Plugin version
         *
         * @var string
         * @since 1.0.0
         */
        public $version = '1.0.0';

		/**
		 * Constructor
		 * 
		 * @return mixed|YITH_WCMG_Admin|YITH_WCMG_Frontend
		 * @since 1.0.0
		 */
		public function __construct() {
			load_plugin_textdomain( 'yit', false, YITH_WCMG_DIR . 'languages/' ); 
			
			// actions
			add_action( 'init', array( $this, 'init' ) );
			
			if( is_admin() ) {
				return new YITH_WCMG_Admin();
			} else {
				return new YITH_WCMG_Frontend();
			}
		}     
		
		
		/**
		 * Init method:
		 *  - default options
		 * 
		 * @access public
		 * @since 1.0.0
		 */
		public function init() {
			$this->_image_sizes();   
		}        
		
		
		/**
		 * Add image sizes
		 *
		 * Init images
		 *
		 * @access protected
		 * @return void
		 * @since 1.0.0
		 */
		protected function _image_sizes() {
			$width  = get_option('woocommerce_magnifier_image_width');
			$height = get_option('woocommerce_magnifier_image_height');
			$crop   = get_option('woocommerce_magnifier_image_crop');
			
			add_image_size( 'shop_magnifier', $width, $height, $crop );
		}
		
	}
}