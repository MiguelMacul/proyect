<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('css')){
	function css($file=NULL){

		return get_instance()->config->base_url().'assets/css/'.$file;
	}
}

if ( ! function_exists('js')){
	function js($file=NULL){
		return get_instance()->config->base_url().'assets/js/'.$file;
	}
}

if ( ! function_exists('images')){
	function images($file=NULL){
		return get_instance()->config->base_url().'assets/img/'.$file;
	}
}

if ( ! function_exists('libs')){
	function libs($file=NULL){
		return get_instance()->config->base_url().'assets/libs/'.$file;
	}
}

if ( ! function_exists('fonts')){
	function fonts($file=NULL){
		return get_instance()->config->base_url().'assets/fonts/'.$file;
	}
}
// ------------------------------------------------------------------------