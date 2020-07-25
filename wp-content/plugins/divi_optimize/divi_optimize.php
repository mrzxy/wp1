<?php
/*
Plugin Name:DIVI Optmize
Plugin URI: 专注于DIVI主题种文化进行优化的WordPress插件
Description: DIVI Optmize是一款可以让Elegantthemes主体显示微软雅黑字体的插件，修复了主体字体小大不一的问题，并且对主题的一些内容进行了一些优化，加快了加载速度。
Version: 1.0
Author: 刘荣焕
Author URI: http://liuronghuan.com/
License: A "Slug" license name e.g. GPL2
*/
//修改WordPress前台字体
function efont() {
    echo "<style>html,h1, h2, h3, h4, h5, h6, body, input, textarea, select{font-family:'PingFangSC-Regular','Microsoft YaHei','微软雅黑', Arial, sans-serif !important;}</style>";
}
add_action( 'wp_head', 'efont' );
//移除默认的DNS PREFETCHING属性
function wpso_remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'wpso_remove_dns_prefetch', 10, 2 );
//禁用REST API/移除wp-json链接
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
//修订版本
remove_action('post_updated', 'wp_save_post_revision',10,1);
//默认编辑器增强
function wpso_more_buttons($buttons) {
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'styleselect';
	$buttons[] = 'backcolor';
	$buttons[] = 'underline';
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'wp_page';
	$buttons[] = 'cut';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	$buttons[] = 'cleanup';
	$buttons[] = 'charmap';
	$buttons[] = 'undo';
	return $buttons;
}
add_filter("mce_buttons_3", "wpso_more_buttons");
//移除EMJO表情
if(!function_exists('wpso_emjo')){
    function wpso_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'wpso_disable_emojis_tinymce' );
    }
    add_action( 'init', 'wpso_disable_emojis' );

    function wpso_disable_emojis_tinymce( $plugins ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
    }
}
//移除Wordpress默认加载文件的版本号
function wpso_remove_script_version( $src ){
    $parts = explode( '?', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', 'wpso_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'wpso_remove_script_version', 15, 1 );

function cedaro_dequeue_jquery_migrate( $scripts ) {
    if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
        $jquery_dependencies = $scripts->registered['jquery']->deps;
        $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
    }
}
add_action( 'wp_default_scripts', 'cedaro_dequeue_jquery_migrate' );
//移除EMBED
function disable_embeds_init() {
global $wp;
$wp->public_query_vars = array_diff( $wp->public_query_vars, array(
'embed',
) );
remove_action( 'rest_api_init', 'wp_oembed_register_route' );
add_filter( 'embed_oembed_discover', '__return_false' );
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );
add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
add_action( 'init', 'disable_embeds_init', 9999 );
function disable_embeds_tiny_mce_plugin( $plugins ) {
return array_diff( $plugins, array( 'wpembed' ) );
}
function disable_embeds_rewrites( $rules ) {
foreach ( $rules as $rule => $rewrite ) {
if ( false !== strpos( $rewrite, 'embed=true' ) ) {
unset( $rules[ $rule ] );
}
}
return $rules;
}
function disable_embeds_remove_rewrite_rules() {
add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'disable_embeds_remove_rewrite_rules' );
function disable_embeds_flush_rewrite_rules() {
remove_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'disable_embeds_flush_rewrite_rules' );
//自定义结束
function themetuts_remove_open_sans_from_wp_core() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    wp_enqueue_style('open-sans','');
}
add_action( 'init', 'themetuts_remove_open_sans_from_wp_core' );

function themetuts_get_ssl_avatar($avatar) {
   $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
   return $avatar;
}
add_filter('get_avatar', 'themetuts_get_ssl_avatar');
add_filter('use_block_editor_for_post', '__return_false');
?>