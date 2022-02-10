<?php
/*
Plugin Name: RSS for Yandex Turbo
Plugin URI: https://wordpress.org/plugins/rss-for-yandex-turbo/
Description: Создание RSS-ленты для сервиса Яндекс.Турбо.
Version: 1.11
Author: Flector
Author URI: https://profiles.wordpress.org/flector#content-plugins
Text Domain: rss-for-yandex-turbo
*/ 

//функция установки значений по умолчанию при активации плагина begin
function yturbo_init() {
    $yturbo_options = array(); 
    $yturbo_options['ytrssname'] = "turbo";
    $yturbo_options['ytcategory'] = "Общество";
    $yturbo_options['yttitle'] = get_bloginfo_rss('title');
    $yturbo_options['ytlink'] = get_bloginfo_rss('url');
    $yturbo_options['ytdescription'] = get_bloginfo_rss('description');
    $yturbo_options['ytlanguage'] = "ru";
    $yturbo_options['ytnumber'] = "120";
    $yturbo_options['yttype'] = "post";
    $yturbo_options['ytrazb'] = "enabled";
    $yturbo_options['ytrazbnumber'] = "40";
    $yturbo_options['ytfigcaption'] = "Отключить описания";
    $yturbo_options['ytimgauthorselect'] = "Отключить указание автора";
    $yturbo_options['ytimgauthor'] = "";
    $yturbo_options['ytauthorselect'] = "Отключить указание автора";
    $yturbo_options['ytauthor'] = "";
    $yturbo_options['ytthumbnail'] = "enabled";
    $yturbo_options['ytselectthumb'] = "medium";
    $yturbo_options['ytexcludetags'] = "disabled";
    $yturbo_options['ytexcludetagslist'] = "<div>";
    $yturbo_options['ytexcludetags2'] = "enabled";
    $yturbo_options['ytexcludetagslist2'] = "<iframe>,<script>,<ins>,<style>,<object>";
    $yturbo_options['ytexcludecontent'] = "disabled";
    $yturbo_options['ytexcludecontentlist'] = esc_textarea("<!--more-->\n<p><\/p>\n<p>&nbsp;<\/p>");

    $yturbo_options['ytad1'] = "disabled";
    $yturbo_options['ytad1mesto'] = "После заголовка записи";
    $yturbo_options['ytad1set'] = "РСЯ";
    $yturbo_options['ytad1rsa'] = "";
    $yturbo_options['ytad1fox1'] = "";
    $yturbo_options['ytad1fox2'] = "";
    $yturbo_options['ytad2'] = "disabled";
    $yturbo_options['ytad2mesto'] = "В середине записи";
    $yturbo_options['ytad2set'] = "РСЯ";
    $yturbo_options['ytad2rsa'] = "";
    $yturbo_options['ytad2fox1'] = "";
    $yturbo_options['ytad2fox2'] = "";    
    $yturbo_options['ytad3'] = "disabled";
    $yturbo_options['ytad3mesto'] = "В конце записи";
    $yturbo_options['ytad3set'] = "РСЯ";
    $yturbo_options['ytad3rsa'] = "";
    $yturbo_options['ytad3fox1'] = "";
    $yturbo_options['ytad3fox2'] = "";    
    
    $yturbo_options['ytrelated'] = "enabled";
    $yturbo_options['ytrelatednumber'] = "5";
    $yturbo_options['ytrelatedselectthumb'] = "thumbnail";
    
    $yturbo_options['ytrazmer'] = "500";
    $yturbo_options['ytremoveturbo'] = "disabled";
    
    $yturbo_options['ytcounterselect'] = "Яндекс.Метрика";
    $yturbo_options['ytmetrika'] = "";
    $yturbo_options['ytliveinternet'] = "";
    $yturbo_options['ytgoogle'] = "";
    $yturbo_options['ytmailru'] = "";
    $yturbo_options['ytrambler'] = "";
    $yturbo_options['ytmediascope'] = "";
    
    $yturbo_options['ytqueryselect'] = "Все таксономии, кроме исключенных";
    $yturbo_options['yttaxlist'] = "";
    $yturbo_options['ytaddtaxlist'] = "";

    add_option('yturbo_options', $yturbo_options);
    
    yturbo_add_feed();
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
add_action('activate_rss-for-yandex-turbo/rss-for-yandex-turbo.php', 'yturbo_init');
//функция установки значений по умолчанию при активации плагина end

//функция при деактивации плагина begin
function yturbo_on_deactivation() {
	if ( ! current_user_can('activate_plugins') ) return;
    
    //удаляем ленту плагина при деактивации плагина и обновляем пермалинки begin
    $yturbo_options = get_option('yturbo_options'); 
    if (!isset($yturbo_options['ytrssname'])) {$yturbo_options['ytrssname']="turbo";}
    global $wp_rewrite;
    if ( in_array( $yturbo_options['ytrssname'], $wp_rewrite->feeds ) ) {
       unset($wp_rewrite->feeds[array_search($yturbo_options['ytrssname'], $wp_rewrite->feeds)]);
    }
    $wp_rewrite->flush_rules();
    //удаляем ленту плагина при деактивации плагина и обновляем пермалинки end
}
register_deactivation_hook( __FILE__, 'yturbo_on_deactivation' );
//функция при деактивации плагина end

//функция при удалении плагина begin
function yturbo_on_uninstall() {
	if ( ! current_user_can('activate_plugins') ) return;
    delete_option('yturbo_options');
}
register_uninstall_hook( __FILE__, 'yturbo_on_uninstall' );
//функция при удалении плагина end

//загрузка файла локализации плагина begin
function yturbo_setup(){
    load_plugin_textdomain('rss-for-yandex-turbo');
}
add_action('init', 'yturbo_setup');
//загрузка файла локализации плагина end

//добавление ссылки "Настройки" на странице со списком плагинов begin
function yturbo_actions($links) {
	return array_merge(array('settings' => '<a href="options-general.php?page=rss-for-yandex-turbo.php">' . __('Настройки', 'rss-for-yandex-turbo') . '</a>'), $links);
}
add_filter('plugin_action_links_' . plugin_basename( __FILE__ ),'yturbo_actions');
//добавление ссылки "Настройки" на странице со списком плагинов end

//функция загрузки скриптов и стилей плагина только в админке и только на странице настроек плагина begin
function yturbo_files_admin($hook_suffix) {
	$purl = plugins_url('', __FILE__);

    if ( is_admin() && $hook_suffix == 'settings_page_rss-for-yandex-turbo' ) {
    
    wp_register_script('yturbo-lettering', $purl . '/inc/jquery.lettering.js');  
    wp_register_script('yturbo-textillate', $purl . '/inc/jquery.textillate.js');  
	wp_register_style('yturbo-animate', $purl . '/inc/animate.min.css');
    wp_register_script('yturbo-script', $purl . '/inc/yturbo-script.js', array(), '1.11');  
	
	if(!wp_script_is('jquery')) {wp_enqueue_script('jquery');}
    wp_enqueue_script('yturbo-lettering');
    wp_enqueue_script('yturbo-textillate');
    wp_enqueue_style('yturbo-animate');
    wp_enqueue_script('yturbo-script');
    
    }
}
add_action('admin_enqueue_scripts', 'yturbo_files_admin');
//функция загрузки скриптов и стилей плагина только в админке и только на странице настроек плагина end

//функция вывода страницы настроек плагина begin
function yturbo_options_page() {
$purl = plugins_url('', __FILE__);

if (isset($_POST['submit'])) {
     
//проверка безопасности при сохранении настроек плагина begin       
if ( ! wp_verify_nonce( $_POST['yturbo_nonce'], plugin_basename(__FILE__) ) || ! current_user_can('edit_posts') ) {
   wp_die(__( 'Cheatin&#8217; uh?' ));
}
//проверка безопасности при сохранении настроек плагина end
        
    //проверяем и сохраняем введенные пользователем данные begin    
    $yturbo_options = get_option('yturbo_options');
    
    if (!preg_match('/[^A-Za-z0-9]/', $_POST['ytrssname']))  {
        $yturbo_options['ytrssname'] = $_POST['ytrssname'];
        update_option('yturbo_options', $yturbo_options);
        yturbo_add_feed();
        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }
    
    $yturbo_options['ytcategory'] = sanitize_text_field($_POST['ytcategory']);
    $yturbo_options['yttitle'] = sanitize_text_field($_POST['yttitle']);
    $yturbo_options['ytlink'] = esc_url_raw($_POST['ytlink']);
    $yturbo_options['ytdescription'] = sanitize_text_field($_POST['ytdescription']);
    $yturbo_options['ytlanguage'] = sanitize_text_field($_POST['ytlanguage']);
    
    $ytnumber = sanitize_text_field($_POST['ytnumber']); 
    if (is_numeric($ytnumber)) {
        $yturbo_options['ytnumber'] = sanitize_text_field($_POST['ytnumber']);
    }
    
    if(isset($_POST['ytrazb'])){$yturbo_options['ytrazb'] = sanitize_text_field($_POST['ytrazb']);}else{$yturbo_options['ytrazb'] = 'disabled';}
    $ytrazbnumber = sanitize_text_field($_POST['ytrazbnumber']); 
    if (is_numeric($ytrazbnumber)) {
        $yturbo_options['ytrazbnumber'] = sanitize_text_field($_POST['ytrazbnumber']);
    }
    
    $yturbo_options['yttype'] = sanitize_text_field($_POST['yttype']);
    $yturbo_options['ytfigcaption'] = sanitize_text_field($_POST['ytfigcaption']);
    $yturbo_options['ytimgauthorselect'] = sanitize_text_field($_POST['ytimgauthorselect']);
    $yturbo_options['ytimgauthor'] = sanitize_text_field($_POST['ytimgauthor']);
    $yturbo_options['ytauthorselect'] = sanitize_text_field($_POST['ytauthorselect']);
    $yturbo_options['ytauthor'] = sanitize_text_field($_POST['ytauthor']);
    
    if(isset($_POST['ytthumbnail'])){$yturbo_options['ytthumbnail'] = sanitize_text_field($_POST['ytthumbnail']);}else{$yturbo_options['ytthumbnail'] = 'disabled';}
    $yturbo_options['ytselectthumb'] = sanitize_text_field($_POST['ytselectthumb']);
    
    if(isset($_POST['ytexcludetags'])){$yturbo_options['ytexcludetags'] = sanitize_text_field($_POST['ytexcludetags']);}else{$yturbo_options['ytexcludetags'] = 'disabled';}
    $yturbo_options['ytexcludetagslist'] = esc_textarea($_POST['ytexcludetagslist']);
    
    if(isset($_POST['ytexcludetags2'])){$yturbo_options['ytexcludetags2'] = sanitize_text_field($_POST['ytexcludetags2']);}else{$yturbo_options['ytexcludetags2'] = 'disabled';}
    $yturbo_options['ytexcludetagslist2'] = esc_textarea($_POST['ytexcludetagslist2']);
    
    if(isset($_POST['ytexcludecontent'])){$yturbo_options['ytexcludecontent'] = sanitize_text_field($_POST['ytexcludecontent']);}else{$yturbo_options['ytexcludecontent'] = 'disabled';}
    $yturbo_options['ytexcludecontentlist'] = addcslashes(esc_textarea($_POST['ytexcludecontentlist']), '/');
    
    if(isset($_POST['ytad1'])){$yturbo_options['ytad1'] = sanitize_text_field($_POST['ytad1']);}else{$yturbo_options['ytad1'] = 'disabled';}    
    $yturbo_options['ytad1mesto'] = sanitize_text_field($_POST['ytad1mesto']);
    $yturbo_options['ytad1set'] = sanitize_text_field($_POST['ytad1set']);
    $yturbo_options['ytad1rsa'] = sanitize_text_field($_POST['ytad1rsa']);
    $yturbo_options['ytad1fox1'] = sanitize_text_field($_POST['ytad1fox1']);
    $yturbo_options['ytad1fox2'] = sanitize_text_field($_POST['ytad1fox2']);
    if(isset($_POST['ytad1'])) {
        if($yturbo_options['ytad1set'] == "РСЯ" && !$yturbo_options['ytad1rsa']) {$yturbo_options['ytad1'] = 'disabled';}
        if($yturbo_options['ytad1set'] == "ADFOX" && (!$yturbo_options['ytad1fox1'] or !$yturbo_options['ytad1fox2'])) {$yturbo_options['ytad1'] = 'disabled';}
    }
    
    if(isset($_POST['ytad2'])){$yturbo_options['ytad2'] = sanitize_text_field($_POST['ytad2']);}else{$yturbo_options['ytad2'] = 'disabled';}
    $yturbo_options['ytad2mesto'] = sanitize_text_field($_POST['ytad2mesto']);
    $yturbo_options['ytad2set'] = sanitize_text_field($_POST['ytad2set']);
    $yturbo_options['ytad2rsa'] = sanitize_text_field($_POST['ytad2rsa']);
    $yturbo_options['ytad2fox1'] = sanitize_text_field($_POST['ytad2fox1']);
    $yturbo_options['ytad2fox2'] = sanitize_text_field($_POST['ytad2fox2']);
    if(isset($_POST['ytad2'])) {
        if($yturbo_options['ytad2set'] == "РСЯ" && !$yturbo_options['ytad2rsa']) {$yturbo_options['ytad2'] = 'disabled';}
        if($yturbo_options['ytad2set'] == "ADFOX" && (!$yturbo_options['ytad2fox1'] or !$yturbo_options['ytad2fox2'])) {$yturbo_options['ytad2'] = 'disabled';}
    }
    
    if(isset($_POST['ytad3'])){$yturbo_options['ytad3'] = sanitize_text_field($_POST['ytad3']);}else{$yturbo_options['ytad3'] = 'disabled';}
    $yturbo_options['ytad3mesto'] = sanitize_text_field($_POST['ytad3mesto']);
    $yturbo_options['ytad3set'] = sanitize_text_field($_POST['ytad3set']);
    $yturbo_options['ytad3rsa'] = sanitize_text_field($_POST['ytad3rsa']);
    $yturbo_options['ytad3fox1'] = sanitize_text_field($_POST['ytad3fox1']);
    $yturbo_options['ytad3fox2'] = sanitize_text_field($_POST['ytad3fox2']);
    if(isset($_POST['ytad3'])) {
        if($yturbo_options['ytad3set'] == "РСЯ" && !$yturbo_options['ytad3rsa']) {$yturbo_options['ytad3'] = 'disabled';}
        if($yturbo_options['ytad3set'] == "ADFOX" && (!$yturbo_options['ytad3fox1'] or !$yturbo_options['ytad3fox2'])) {$yturbo_options['ytad3'] = 'disabled';}
    }
    
    if(isset($_POST['ytrelated'])){$yturbo_options['ytrelated'] = sanitize_text_field($_POST['ytrelated']);}else{$yturbo_options['ytrelated'] = 'disabled';}
    $ytrelatednumber = sanitize_text_field($_POST['ytrelatednumber']); 
    if (is_numeric($ytrelatednumber)) {
        $yturbo_options['ytrelatednumber'] = sanitize_text_field($_POST['ytrelatednumber']);
    }
    $yturbo_options['ytrelatedselectthumb'] = sanitize_text_field($_POST['ytrelatedselectthumb']);
    
    $ytrazmer = sanitize_text_field($_POST['ytrazmer']); 
    if (is_numeric($ytrazmer)) {
        $yturbo_options['ytrazmer'] = sanitize_text_field($_POST['ytrazmer']);
    }
    
    if(isset($_POST['ytremoveturbo'])){$yturbo_options['ytremoveturbo'] = sanitize_text_field($_POST['ytremoveturbo']);}else{$yturbo_options['ytremoveturbo'] = 'disabled';}
    
    $yturbo_options['ytcounterselect'] = sanitize_text_field($_POST['ytcounterselect']);
    $yturbo_options['ytmetrika'] = sanitize_text_field($_POST['ytmetrika']);
    $yturbo_options['ytliveinternet'] = sanitize_text_field($_POST['ytliveinternet']);
    $yturbo_options['ytgoogle'] = sanitize_text_field($_POST['ytgoogle']);
    $yturbo_options['ytmailru'] = sanitize_text_field($_POST['ytmailru']);
    $yturbo_options['ytrambler'] = sanitize_text_field($_POST['ytrambler']);
    $yturbo_options['ytmediascope'] = sanitize_text_field($_POST['ytmediascope']);
    
    $yturbo_options['ytqueryselect'] = sanitize_text_field($_POST['ytqueryselect']);
    $yturbo_options['yttaxlist'] = esc_textarea($_POST['yttaxlist']);
    $yturbo_options['ytaddtaxlist'] = esc_textarea($_POST['ytaddtaxlist']);

    update_option('yturbo_options', $yturbo_options);
    //проверяем и сохраняем введенные пользователем данные end
}
//установка новых опций при обновлении плагина у пользователей begin
$yturbo_options = get_option('yturbo_options');
if (!isset($yturbo_options['ytrelated'])) {$yturbo_options['ytrelated']="disabled";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytrelatednumber'])) {$yturbo_options['ytrelatednumber']="5";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytrelatedselectthumb'])) {$yturbo_options['ytrelatedselectthumb']="medium";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytad3'])) {$yturbo_options['ytad3']="disabled";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytad3mesto'])) {$yturbo_options['ytad3mesto']="После заголовка записи";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytad3set'])) {$yturbo_options['ytad3set']="РСЯ";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytad3rsa'])) {$yturbo_options['ytad3rsa']="";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytad3fox1'])) {$yturbo_options['ytad3fox1']="";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytad3fox2'])) {$yturbo_options['ytad3fox2']="";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytrazmer'])) {$yturbo_options['ytrazmer']="500";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytremoveturbo'])) {$yturbo_options['ytremoveturbo']="disabled";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytauthorselect'])) {$yturbo_options['ytauthorselect']="Указать автора";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytcounterselect'])) {$yturbo_options['ytcounterselect']="Яндекс.Метрика";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytliveinternet'])) {$yturbo_options['ytliveinternet']="";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytgoogle'])) {$yturbo_options['ytgoogle']="";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytmailru'])) {$yturbo_options['ytmailru']="";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytrambler'])) {$yturbo_options['ytrambler']="";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytmediascope'])) {$yturbo_options['ytmediascope']="";update_option('yturbo_options', $yturbo_options);}  
if (!isset($yturbo_options['ytqueryselect'])) {$yturbo_options['ytqueryselect']="Все таксономии, кроме исключенных";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['yttaxlist'])) {$yturbo_options['yttaxlist']="";update_option('yturbo_options', $yturbo_options);}
if (!isset($yturbo_options['ytaddtaxlist'])) {$yturbo_options['ytaddtaxlist']="";update_option('yturbo_options', $yturbo_options);}      
//установка новых опций при обновлении плагина у пользователей end
$yturbo_options = get_option('yturbo_options');
?>
<?php   if (!empty($_POST) ) :
if ( ! wp_verify_nonce( $_POST['yturbo_nonce'], plugin_basename(__FILE__) ) || ! current_user_can('edit_posts') ) {
   wp_die(__( 'Cheatin&#8217; uh?' ));
}
?>
<div id="message" class="updated fade"><p><strong><?php _e('Настройки сохранены.', 'rss-for-yandex-turbo') ?></strong></p></div>
<?php endif; ?>

<div class="wrap">
<h2><?php _e('Настройки плагина &#171;Яндекс.Турбо&#187;', 'rss-for-yandex-turbo'); ?></h2>

<div class="metabox-holder" id="poststuff">
<div class="meta-box-sortables">

<div class="postbox">

    <h3 style="border-bottom: 1px solid #EEE;background: #f7f7f7;"><span class="tcode"><?php _e("Вам нравится этот плагин ?", 'rss-for-yandex-turbo'); ?></span></h3>
    <div class="inside" style="display: block;margin-right: 12px;">
        <img src="<?php echo $purl . '/img/icon_coffee.png'; ?>" title="<?php _e("Купить мне чашку кофе :)", 'rss-for-yandex-turbo'); ?>" style=" margin: 5px; float:left;" />
		
        <p><?php _e("Привет, меня зовут <strong>Flector</strong>.", 'rss-for-yandex-turbo'); ?></p>
        <p><?php _e("Я потратил много времени на разработку этого плагина.", 'rss-for-yandex-turbo'); ?> <br />
		<?php _e("Поэтому не откажусь от небольшого пожертвования :)", 'rss-for-yandex-turbo'); ?></p>
      <iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/donate.xml?account=41001443750704&quickpay=donate&payment-type-choice=on&mobile-payment-type-choice=on&default-sum=200&targets=%D0%9D%D0%B0+%D1%80%D0%B0%D0%B7%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%BA%D1%83+WordPress-%D0%BF%D0%BB%D0%B0%D0%B3%D0%B8%D0%BD%D0%BE%D0%B2.&project-name=&project-site=&button-text=05&successURL=" width="508" height="64"></iframe>
      
      <p><?php _e("Или вы можете заказать у меня услуги по WordPress, от мелких правок до создания полноценного сайта.", 'rss-for-yandex-turbo'); ?><br />
        <?php _e("Быстро, качественно и дешево. Прайс-лист смотрите по адресу <a target='new' href='https://www.wpuslugi.ru/?from=yturbo-plugin'>https://www.wpuslugi.ru/</a>.", 'rss-for-yandex-turbo'); ?></p>
        <div style="clear:both;"></div>
    </div>
</div>

<form action="" method="post">

<div class="postbox">

    <h3 style="border-bottom: 1px solid #EEE;background: #f7f7f7;"><span class="tcode"><?php _e("Настройки", 'rss-for-yandex-turbo'); ?></span></h3>
    <div class="inside" style="display: block;">

        <table class="form-table">
        
        <?php yturbo_count_feeds();  ?>
        
          <?php if ( get_option('permalink_structure') ) {
            $kor = get_bloginfo("url") .'/feed/' . '<strong>' . $yturbo_options['ytrssname'] . '</strong>/';
         } else {
            $kor = get_bloginfo("url") .'/?feed=' . '<strong>' . $yturbo_options['ytrssname']. '</strong>';
         } ?>
         
            <tr>
                <th><?php _e("Имя RSS-ленты:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytrssname" size="40" value="<?php echo $yturbo_options['ytrssname']; ?>" />
                    <br /><small><?php _e("Текущий URL RSS-ленты:", "rss-for-yandex-turbo"); ?> <tt><?php echo $kor; ?></tt><br />
                    <?php _e("Только буквы и цифры, не меняйте без необходимости.", "rss-for-yandex-turbo"); ?>
                    </small><div style="margin-bottom:20px;"></div>
                </td>
            </tr>
            <tr>
                <th><?php _e("Заголовок:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="yttitle" size="40" value="<?php echo stripslashes($yturbo_options['yttitle']); ?>" />
                    <br /><small><?php _e("Название издания.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr>
                <th><?php _e("Ссылка:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytlink" size="40" value="<?php echo stripslashes($yturbo_options['ytlink']); ?>" />
                    <br /><small><?php _e("Адрес сайта издания.", "rss-for-yandex-turbo"); ?> </small>
               </td>
            </tr>
            <tr>
                <th><?php _e("Описание:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytdescription" size="40" value="<?php echo stripslashes($yturbo_options['ytdescription']); ?>" />
                    <br /><small><?php _e("Описание издания.", "rss-for-yandex-turbo"); ?> </small>
               </td>
            </tr>
            <tr>
                <th><?php _e("Язык:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytlanguage" size="2" value="<?php echo stripslashes($yturbo_options['ytlanguage']); ?>" />
                    <br /><small><?php _e("Язык статей издания в стандарте <a target='new' href='https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%B4%D1%8B_%D1%8F%D0%B7%D1%8B%D0%BA%D0%BE%D0%B2'>ISO 639-1</a> (Россия - <strong>ru</strong>, Украина - <strong>uk</strong> и т.д.)", "rss-for-yandex-turbo"); ?> </small>
                    <div  style="margin-bottom:30px;"></div>
               </td>
            </tr>
           <tr>
                <th><?php _e("Количество записей:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytnumber" size="2" value="<?php echo stripslashes($yturbo_options['ytnumber']); ?>" />
                    <br /><small><?php _e("Общее количество записей в RSS (обязательно прочтите про <a target='new' href='https://yandex.ru/support/webmaster/turbo/feed.html#quota'>ограничения</a> Яндекса)", "rss-for-yandex-turbo"); ?> <br />
                    </small>
               </td>
            </tr>
            <tr class="razb">
                <th><?php _e("Разбитие RSS-ленты:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytrazb"><input type="checkbox" value="enabled" name="ytrazb" id="ytrazb" <?php if ($yturbo_options['ytrazb'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Включить разбитие RSS-ленты", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("Плагин будет генерировать несколько RSS-лент с указанным числом записей в каждой.", "rss-for-yandex-turbo"); ?> <br />
                    <?php _e("Включите эту опцию, если RSS-лента слишком долго генерируется или если она превышает <a target='new' href='https://yandex.ru/support/webmaster/turbo/feed.html#quota'>ограничения</a>, установленные Яндексом.", "rss-for-yandex-turbo"); ?><br />
                    <?php _e("Общее число RSS-лент не должно быть больше 10 штук (это максимум RSS-лент, который можно добавить в Яндекс.Вебмастере).", "rss-for-yandex-turbo"); ?> <br />
                    <?php _e("Пример: при установленном общем числе записей в RSS в 500 - разбивать ленту меньше, чем по 50 записей бессмысленно.", "rss-for-yandex-turbo"); ?> <br />
                    
                    </small>
                </td>
            </tr>
            <tr class="ytrazbnumbertr" style="display:none;">
                <th><?php _e("Делить RSS-ленту по:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytrazbnumber" size="22" value="<?php echo stripslashes($yturbo_options['ytrazbnumber']); ?>" />
                    <br /><small><?php _e("Укажите число записей, по которому лента будет делиться.", "rss-for-yandex-turbo"); ?><br />
                    <?php _e("Для получения ссылок на ваши RSS-ленты сохраните настройки плагина.", "rss-for-yandex-turbo"); ?><br />
                    <?php _e("Важно: разбитие не будет работать, если на вашем сайте нет необходимого числа записей.", "rss-for-yandex-turbo"); ?> <br />
               </td>
            </tr>
           <tr>
                <th><?php _e("Типы записей:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="yttype" size="20" value="<?php echo stripslashes($yturbo_options['yttype']); ?>" />
                    <br /><small><?php _e("Типы записей в ленте через запятую (<strong>post</strong> - записи, <strong>page</strong> - страницы и т.д.).<br />У произвольных типов записей должно быть поле <strong>post_content</strong>!", "rss-for-yandex-turbo"); ?> </small>
               </td>
            </tr>
            <tr>
                <th><?php _e("Автор записей:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <select name="ytauthorselect" id="ytauthorselect" style="width: 250px;">
                        <option value="Автор записи" <?php if ($yturbo_options['ytauthorselect'] == 'Автор записи') echo "selected='selected'" ?>><?php _e("Автор записи", "rss-for-yandex-turbo"); ?></option>
                        <option value="Указать автора" <?php if ($yturbo_options['ytauthorselect'] == 'Указать автора') echo "selected='selected'" ?>><?php _e("Указать автора", "rss-for-yandex-turbo"); ?></option>
                        <option value="Отключить указание автора" <?php if ($yturbo_options['ytauthorselect'] == 'Отключить указание автора') echo "selected='selected'" ?>><?php _e("Отключить указание автора", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Автор записей (RSS-тег <tt>&lt;author></tt> - для сервиса Яндекс.Турбо данный тег не является обязательным). ", "rss-for-yandex-turbo"); ?> <br />
                    </small>
               </td>
            </tr>
            <tr id="ownname2" style="display:none;">
                <th><?php _e("Автор записей:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytauthor" size="20" value="<?php echo stripslashes($yturbo_options['ytauthor']); ?>" />
                    <br /><small><?php _e("Произвольное имя автора записей (если не заполнено, то будет использовано имя автора записи).", "rss-for-yandex-turbo"); ?> </small>
               </td>
            </tr>
            <tr>
                <th><?php _e("Описания изображений:", 'rss-for-yandex-turbo') ?></th>
                <td>
                     <select name="ytfigcaption" id="capalt" style="width: 250px;">
                        <option value="Использовать alt по возможности" <?php if ($yturbo_options['ytfigcaption'] == 'Использовать alt по возможности') echo "selected='selected'" ?>><?php _e("Использовать alt по возможности", "rss-for-yandex-turbo"); ?></option>
                        <option value="Использовать название записи" <?php if ($yturbo_options['ytfigcaption'] == 'Использовать название записи') echo "selected='selected'" ?>><?php _e("Использовать название записи", "rss-for-yandex-turbo"); ?></option>
                        <option value="Отключить описания" <?php if ($yturbo_options['ytfigcaption'] == 'Отключить описания') echo "selected='selected'" ?>><?php _e("Отключить описания", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Разметка \"описания\" для изображений (<tt>&lt;figcaption>Описание&lt;/figcaption></tt>).", "rss-for-yandex-turbo"); ?> <br />
                    <span id="altimg"><?php _e("В случае отсутствия у изображения alt-атрибута для описания изображения будет использовано название записи.", "rss-for-yandex-turbo"); ?> </span></small>
                </td>
            </tr>
            <tr>
                <th><?php _e("Автор изображений:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <select name="ytimgauthorselect" id="imgselect" style="width: 250px;">
                        <option value="Автор записи" <?php if ($yturbo_options['ytimgauthorselect'] == 'Автор записи') echo "selected='selected'" ?>><?php _e("Автор записи", "rss-for-yandex-turbo"); ?></option>
                        <option value="Указать автора" <?php if ($yturbo_options['ytimgauthorselect'] == 'Указать автора') echo "selected='selected'" ?>><?php _e("Указать автора", "rss-for-yandex-turbo"); ?></option>
                        <option value="Отключить указание автора" <?php if ($yturbo_options['ytimgauthorselect'] == 'Отключить указание автора') echo "selected='selected'" ?>><?php _e("Отключить указание автора", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Разметка \"автора\" для изображений (<tt>&lt;span class=\"copyright\">Автор&lt;/span></tt>).", "rss-for-yandex-turbo"); ?> <br />
                    </small>
               </td>
            </tr>
            <tr id="ownname" style="display:none;">
                <th><?php _e("Автор изображений:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytimgauthor" size="20" value="<?php echo stripslashes($yturbo_options['ytimgauthor']); ?>" />
                    <br /><small><?php _e("Автор изображений (если не заполнено, то будет использовано имя автора записи).", "rss-for-yandex-turbo"); ?> </small>
               </td>
            </tr>
            <tr>
                <th><?php _e("Тематика записей по умолчанию:", 'rss-for-yandex-turbo') ?></th>
                <td>
                     <select name="ytcategory" style="width: 250px;">
                        <option value="Происшествия" <?php if ($yturbo_options['ytcategory'] == 'Происшествия') echo "selected='selected'" ?>><?php _e("Происшествия", "rss-for-yandex-turbo"); ?></option>
                        <option value="Политика" <?php if ($yturbo_options['ytcategory'] == 'Политика') echo "selected='selected'" ?>><?php _e("Политика", "rss-for-yandex-turbo"); ?></option>
                        <option value="Война" <?php if ($yturbo_options['ytcategory'] == 'Война') echo "selected='selected'" ?>><?php _e("Война", "rss-for-yandex-turbo"); ?></option>
                        <option value="Общество" <?php if ($yturbo_options['ytcategory'] == 'Общество') echo "selected='selected'" ?>><?php _e("Общество", "rss-for-yandex-turbo"); ?></option>
                        <option value="Экономика" <?php if ($yturbo_options['ytcategory'] == 'Экономика') echo "selected='selected'" ?>><?php _e("Экономика", "rss-for-yandex-turbo"); ?></option>
                        <option value="Спорт" <?php if ($yturbo_options['ytcategory'] == 'Спорт') echo "selected='selected'" ?>><?php _e("Спорт", "rss-for-yandex-turbo"); ?></option>
                        <option value="Технологии" <?php if ($yturbo_options['ytcategory'] == 'Технологии') echo "selected='selected'" ?>><?php _e("Технологии", "rss-for-yandex-turbo"); ?></option>
                        <option value="Наука" <?php if ($yturbo_options['ytcategory'] == 'Наука') echo "selected='selected'" ?>><?php _e("Наука", "rss-for-yandex-turbo"); ?></option>
                        <option value="Игры" <?php if ($yturbo_options['ytcategory'] == 'Игры') echo "selected='selected'" ?>><?php _e("Игры", "rss-for-yandex-turbo"); ?></option>
                        <option value="Музыка" <?php if ($yturbo_options['ytcategory'] == 'Музыка') echo "selected='selected'" ?>><?php _e("Музыка", "rss-for-yandex-turbo"); ?></option>
                        <option value="Литература" <?php if ($yturbo_options['ytcategory'] == 'Литература') echo "selected='selected'" ?>><?php _e("Литература", "rss-for-yandex-turbo"); ?></option>
                        <option value="Кино" <?php if ($yturbo_options['ytcategory'] == 'Кино') echo "selected='selected'" ?>><?php _e("Кино", "rss-for-yandex-turbo"); ?></option>
                        <option value="Культура" <?php if ($yturbo_options['ytcategory'] == 'Культура') echo "selected='selected'" ?>><?php _e("Культура", "rss-for-yandex-turbo"); ?></option>
                        <option value="Мода" <?php if ($yturbo_options['ytcategory'] == 'Мода') echo "selected='selected'" ?>><?php _e("Мода", "rss-for-yandex-turbo"); ?></option>
                        <option value="Знаменитости" <?php if ($yturbo_options['ytcategory'] == 'Знаменитости') echo "selected='selected'" ?>><?php _e("Знаменитости", "rss-for-yandex-turbo"); ?></option>
                        <option value="Психология" <?php if ($yturbo_options['ytcategory'] == 'Психология') echo "selected='selected'" ?>><?php _e("Психология", "rss-for-yandex-turbo"); ?></option>
                        <option value="Здоровье" <?php if ($yturbo_options['ytcategory'] == 'Здоровье') echo "selected='selected'" ?>><?php _e("Здоровье", "rss-for-yandex-turbo"); ?></option>
                        <option value="Авто" <?php if ($yturbo_options['ytcategory'] == 'Авто') echo "selected='selected'" ?>><?php _e("Авто", "rss-for-yandex-turbo"); ?></option>
                        <option value="Дом" <?php if ($yturbo_options['ytcategory'] == 'Дом') echo "selected='selected'" ?>><?php _e("Дом", "rss-for-yandex-turbo"); ?></option>
                        <option value="Хобби" <?php if ($yturbo_options['ytcategory'] == 'Хобби') echo "selected='selected'" ?>><?php _e("Хобби", "rss-for-yandex-turbo"); ?></option>
                        <option value="Еда" <?php if ($yturbo_options['ytcategory'] == 'Еда') echo "selected='selected'" ?>><?php _e("Еда", "rss-for-yandex-turbo"); ?></option>
                        <option value="Дизайн" <?php if ($yturbo_options['ytcategory'] == 'Дизайн') echo "selected='selected'" ?>><?php _e("Дизайн", "rss-for-yandex-turbo"); ?></option>
                        <option value="Фотографии" <?php if ($yturbo_options['ytcategory'] == 'Фотографии') echo "selected='selected'" ?>><?php _e("Фотографии", "rss-for-yandex-turbo"); ?></option>
                        <option value="Юмор" <?php if ($yturbo_options['ytcategory'] == 'Юмор') echo "selected='selected'" ?>><?php _e("Юмор", "rss-for-yandex-turbo"); ?></option>
                        <option value="Природа" <?php if ($yturbo_options['ytcategory'] == 'Природа') echo "selected='selected'" ?>><?php _e("Природа", "rss-for-yandex-turbo"); ?></option>
                        <option value="Путешествия" <?php if ($yturbo_options['ytcategory'] == 'Путешествия') echo "selected='selected'" ?>><?php _e("Путешествия", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Тематика по умолчанию (если при публикации записи не задана конкретная тематика, то будет использована тематика по умолчанию).", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input type="submit" name="submit" class="button button-primary" value="<?php _e('Сохранить настройки &raquo;', 'rss-for-yandex-turbo'); ?>" />
                </td>
            </tr> 
        </table>
    </div>
</div>

<div class="postbox">
    <h3 style="border-bottom: 1px solid #EEE;background: #f7f7f7;"><span class="tcode"><?php _e('Реклама и счетчики', 'rss-for-yandex-turbo'); ?></span></h3>
	  <div class="inside" style="padding-bottom:15px;display: block;">
     
        <table class="form-table">
        
            <tr class="counters">
                <th><?php _e("Счетчики:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <select name="ytcounterselect" id="ytcounterselect" style="width: 250px;">
                        <option value="Яндекс.Метрика" <?php if ($yturbo_options['ytcounterselect'] == 'Яндекс.Метрика') echo "selected='selected'" ?>><?php _e("Яндекс.Метрика", "rss-for-yandex-turbo"); ?></option>
                        <option value="LiveInternet" <?php if ($yturbo_options['ytcounterselect'] == 'LiveInternet') echo "selected='selected'" ?>><?php _e("LiveInternet", "rss-for-yandex-turbo"); ?></option>
                        <option value="Google Analytics" <?php if ($yturbo_options['ytcounterselect'] == 'Google Analytics') echo "selected='selected'" ?>><?php _e("Google Analytics", "rss-for-yandex-turbo"); ?></option>
                        <option value="Рейтинг Mail.RU" <?php if ($yturbo_options['ytcounterselect'] == 'Рейтинг Mail.RU') echo "selected='selected'" ?>><?php _e("Рейтинг Mail.RU", "rss-for-yandex-turbo"); ?></option>
                        <option value="Rambler Топ-100" <?php if ($yturbo_options['ytcounterselect'] == 'Rambler Топ-100') echo "selected='selected'" ?>><?php _e("Rambler Топ-100", "rss-for-yandex-turbo"); ?></option>
                        <option value="Mediascope (TNS)" <?php if ($yturbo_options['ytcounterselect'] == 'Mediascope (TNS)') echo "selected='selected'" ?>><?php _e("Mediascope (TNS)", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Выберите нужный счетчик и укажите его идентификатор. <br /> В ленте будут использованы все указанные вами счетчики.", "rss-for-yandex-turbo"); ?> <br />
                    </small>
               </td>
            </tr>
            <tr class="metrika" style="display:none;">
                <th><?php _e("Яндекс.Метрика:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytmetrika" size="22" value="<?php echo stripslashes($yturbo_options['ytmetrika']); ?>" />
                    <br /><small><?php _e("Укажите <strong>ID</strong> счетчика Яндекс.Метрики (например: <tt>33382498</tt>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-counter-id.html'>как узнать ID счетчика</a>).", "rss-for-yandex-turbo"); ?> </small>
                    <?php if ($yturbo_options['ytad1'] == 'enabled') echo '<div style="margin-top:30px"></div>'; ?>
               </td>
            </tr>
            <tr class="liveinternet" style="display:none;">
                <th><?php _e("LiveInternet:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytliveinternet" size="22" value="<?php echo stripslashes($yturbo_options['ytliveinternet']); ?>" />
                    <br /><small><?php _e("Укажите <strong>ID</strong> счетчика LiveInternet (например: <tt>site.ru</tt>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-counter-id.html'>как узнать ID счетчика</a>).", "rss-for-yandex-turbo"); ?> </small>
                    <?php if ($yturbo_options['ytad1'] == 'enabled') echo '<div style="margin-top:30px"></div>'; ?>
               </td>
            </tr>
            <tr class="google" style="display:none;">
                <th><?php _e("Google Analytics:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytgoogle" size="22" value="<?php echo stripslashes($yturbo_options['ytgoogle']); ?>" />
                    <br /><small><?php _e("Укажите <strong>ID</strong> счетчика Google Analytics (например: <tt>UA-12340005-6</tt>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-counter-id.html'>как узнать ID счетчика</a>).", "rss-for-yandex-turbo"); ?> </small>
                    <?php if ($yturbo_options['ytad1'] == 'enabled') echo '<div style="margin-top:30px"></div>'; ?>
               </td>
            </tr>
            <tr class="mailru" style="display:none;">
                <th><?php _e("Рейтинг Mail.RU:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytmailru" size="22" value="<?php echo stripslashes($yturbo_options['ytmailru']); ?>" />
                    <br /><small><?php _e("Укажите <strong>ID</strong> счетчика Рейтинг Mail.RU (например: <tt>123456</tt>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-counter-id.html'>как узнать ID счетчика</a>).", "rss-for-yandex-turbo"); ?> </small>
                    <?php if ($yturbo_options['ytad1'] == 'enabled') echo '<div style="margin-top:30px"></div>'; ?>
               </td>
            </tr>
            <tr class="rambler" style="display:none;">
                <th><?php _e("Rambler Топ-100:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytrambler" size="22" value="<?php echo stripslashes($yturbo_options['ytrambler']); ?>" />
                    <br /><small><?php _e("Укажите <strong>ID</strong> счетчика Rambler Топ-100 (например: <tt>4505046</tt>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-counter-id.html'>как узнать ID счетчика</a>).", "rss-for-yandex-turbo"); ?> </small>
                    <?php if ($yturbo_options['ytad1'] == 'enabled') echo '<div style="margin-top:30px"></div>'; ?>
               </td>
            </tr>
            <tr class="mediascope" style="display:none;">
                <th><?php _e("Mediascope (TNS):", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytmediascope" size="22" value="<?php echo stripslashes($yturbo_options['ytmediascope']); ?>" />
                    <br /><small><?php _e("Укажите идентификатор <strong>tmsec</strong> счетчика Mediascope (TNS) (<a target='new' href='https://yandex.ru/support/webmaster/turbo/find-counter-id.html'>как узнать ID счетчика</a>).", "rss-for-yandex-turbo"); ?> </small>
                    <?php if ($yturbo_options['ytad1'] == 'enabled') echo '<div style="margin-top:30px"></div>'; ?>
               </td>
            </tr>
            <tr class="myturbo">
                <th><?php _e("Блок рекламы #1:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytad1"><input type="checkbox" value="enabled" name="ytad1" id="ytad1" <?php if ($yturbo_options['ytad1'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Включить первый блок рекламы", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("Будет включен блок рекламы на turbo-страницах в выбранном вами месте.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="myturbo block1" style="display:none;">
                <th><?php _e("Место блока рекламы #1:", 'rss-for-yandex-turbo') ?></th>
                <td>
                     <select name="ytad1mesto" style="width: 200px;">
                        <option value="После заголовка записи" <?php if ($yturbo_options['ytad1mesto'] == 'После заголовка записи') echo "selected='selected'" ?>><?php _e("После заголовка записи", "rss-for-yandex-turbo"); ?></option>
                        <option value="В середине записи" <?php if ($yturbo_options['ytad1mesto'] == 'В середине записи') echo "selected='selected'" ?>><?php _e("В середине записи", "rss-for-yandex-turbo"); ?></option>
                        <option value="В конце записи" <?php if ($yturbo_options['ytad1mesto'] == 'В конце записи') echo "selected='selected'" ?>><?php _e("В конце записи", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Место размещения блока рекламы #1 в записи.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="myturbo block1" style="display:none;">
                <th><?php _e("Рекламная сеть блока рекламы #1:", 'rss-for-yandex-turbo') ?></th>
                <td>
                     <select name="ytad1set" id="ytad1set" style="width: 200px;">
                        <option value="РСЯ" <?php if ($yturbo_options['ytad1set'] == 'РСЯ') echo "selected='selected'" ?>><?php _e("РСЯ", "rss-for-yandex-turbo"); ?></option>
                        <option value="ADFOX" <?php if ($yturbo_options['ytad1set'] == 'ADFOX') echo "selected='selected'" ?>><?php _e("ADFOX", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Рекламная сеть блока рекламы #1.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="myturbo trrsa block1" style="display:none;">
                <th><?php _e("РСЯ идентификатор:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytad1rsa" size="22" value="<?php echo stripslashes($yturbo_options['ytad1rsa']); ?>" />
                    <br /><small><?php _e("Укажите идентификатор блока РСЯ (например, <strong>RA-123456-7</strong>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-ad-block.html'>как его узнать</a>)</small>.", "rss-for-yandex-turbo"); ?>
                    <div style="margin-top:30px;"></div>
               </td>
            </tr>
            <tr class="myturbo trfox1 block1" style="display:none;">
                <th><?php _e("ADFOX OwnerId:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytad1fox1" size="22" value="<?php echo stripslashes($yturbo_options['ytad1fox1']); ?>" />
                    <br /><small><?php _e("Укажите ownerId блока ADFOX (например, <strong>123456</strong>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-ad-block.html'>как его узнать</a>)</small>.", "rss-for-yandex-turbo"); ?>
               </td>
            </tr>
            <tr class="myturbo trfox2 block1" style="display:none;">
                <th><?php _e("ADFOX идентификатор:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytad1fox2" size="22" value="<?php echo stripslashes($yturbo_options['ytad1fox2']); ?>" />
                    <br /><small><?php _e("Укажите идентификатор контейнера ADFOX (например, <strong>adfox</strong>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-ad-block.html'>как его узнать</a>)</small>.", "rss-for-yandex-turbo"); ?>
                    <div style="margin-top:30px;"></div>
               </td>
            </tr>
            <tr class="myturbo">
                <th><?php _e("Блок рекламы #2:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytad2"><input type="checkbox" value="enabled" name="ytad2" id="ytad2" <?php if ($yturbo_options['ytad2'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Включить второй блок рекламы", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("Будет включен блок рекламы на turbo-страницах в выбранном вами месте.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="myturbo block2" style="display:none;">
                <th><?php _e("Место блока рекламы #2:", 'rss-for-yandex-turbo') ?></th>
                <td>
                     <select name="ytad2mesto" style="width: 200px;">
                        <option value="После заголовка записи" <?php if ($yturbo_options['ytad2mesto'] == 'После заголовка записи') echo "selected='selected'" ?>><?php _e("После заголовка записи", "rss-for-yandex-turbo"); ?></option>
                        <option value="В середине записи" <?php if ($yturbo_options['ytad2mesto'] == 'В середине записи') echo "selected='selected'" ?>><?php _e("В середине записи", "rss-for-yandex-turbo"); ?></option>
                        <option value="В конце записи" <?php if ($yturbo_options['ytad2mesto'] == 'В конце записи') echo "selected='selected'" ?>><?php _e("В конце записи", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Место размещения блока рекламы #2 в записи.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="myturbo block2" style="display:none;">
                <th><?php _e("Рекламная сеть блока рекламы #2:", 'rss-for-yandex-turbo') ?></th>
                <td>
                     <select name="ytad2set" id="ytad2set" style="width: 200px;">
                        <option value="РСЯ" <?php if ($yturbo_options['ytad2set'] == 'РСЯ') echo "selected='selected'" ?>><?php _e("РСЯ", "rss-for-yandex-turbo"); ?></option>
                        <option value="ADFOX" <?php if ($yturbo_options['ytad2set'] == 'ADFOX') echo "selected='selected'" ?>><?php _e("ADFOX", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Рекламная сеть блока рекламы #2.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="myturbo trrsa2 block2" style="display:none;">
                <th><?php _e("РСЯ идентификатор:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytad2rsa" size="22" value="<?php echo stripslashes($yturbo_options['ytad2rsa']); ?>" />
                    <br /><small><?php _e("Укажите идентификатор блока РСЯ (например, <strong>RA-123456-7</strong>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-ad-block.html'>как его узнать</a>)</small>.", "rss-for-yandex-turbo"); ?>
                    <div style="margin-top:30px;"></div>
               </td>
            </tr>
            <tr class="myturbo trfox12 block2" style="display:none;">
                <th><?php _e("ADFOX OwnerId:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytad2fox1" size="22" value="<?php echo stripslashes($yturbo_options['ytad2fox1']); ?>" />
                    <br /><small><?php _e("Укажите ownerId блока ADFOX (например, <strong>123456</strong>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-ad-block.html'>как его узнать</a>)</small>.", "rss-for-yandex-turbo"); ?>
               </td>
            </tr>
            <tr class="myturbo trfox22 block2" style="display:none;">
                <th><?php _e("ADFOX идентификатор:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytad2fox2" size="22" value="<?php echo stripslashes($yturbo_options['ytad2fox2']); ?>" />
                    <br /><small><?php _e("Укажите идентификатор контейнера ADFOX (например, <strong>adfox</strong>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-ad-block.html'>как его узнать</a>)</small>.", "rss-for-yandex-turbo"); ?>
                    <div style="margin-top:30px;"></div>
               </td>
            </tr>
            <tr class="myturbo">
                <th><?php _e("Блок рекламы #3:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytad3"><input type="checkbox" value="enabled" name="ytad3" id="ytad3" <?php if ($yturbo_options['ytad3'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Включить третий блок рекламы", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("Будет включен блок рекламы на turbo-страницах в выбранном вами месте.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="myturbo block3" style="display:none;">
                <th><?php _e("Место блока рекламы #3:", 'rss-for-yandex-turbo') ?></th>
                <td>
                     <select name="ytad3mesto" style="width: 200px;">
                        <option value="После заголовка записи" <?php if ($yturbo_options['ytad3mesto'] == 'После заголовка записи') echo "selected='selected'" ?>><?php _e("После заголовка записи", "rss-for-yandex-turbo"); ?></option>
                        <option value="В середине записи" <?php if ($yturbo_options['ytad3mesto'] == 'В середине записи') echo "selected='selected'" ?>><?php _e("В середине записи", "rss-for-yandex-turbo"); ?></option>
                        <option value="В конце записи" <?php if ($yturbo_options['ytad3mesto'] == 'В конце записи') echo "selected='selected'" ?>><?php _e("В конце записи", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Место размещения блока рекламы #3 в записи.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="myturbo block3" style="display:none;">
                <th><?php _e("Рекламная сеть блока рекламы #3:", 'rss-for-yandex-turbo') ?></th>
                <td>
                     <select name="ytad3set" id="ytad3set" style="width: 200px;">
                        <option value="РСЯ" <?php if ($yturbo_options['ytad3set'] == 'РСЯ') echo "selected='selected'" ?>><?php _e("РСЯ", "rss-for-yandex-turbo"); ?></option>
                        <option value="ADFOX" <?php if ($yturbo_options['ytad3set'] == 'ADFOX') echo "selected='selected'" ?>><?php _e("ADFOX", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Рекламная сеть блока рекламы #3.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="myturbo trrsa3 block3" style="display:none;">
                <th><?php _e("РСЯ идентификатор:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytad3rsa" size="22" value="<?php echo stripslashes($yturbo_options['ytad3rsa']); ?>" />
                    <br /><small><?php _e("Укажите идентификатор блока РСЯ (например, <strong>RA-123456-7</strong>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-ad-block.html'>как его узнать</a>)</small>.", "rss-for-yandex-turbo"); ?>
                    <div style="margin-top:30px;"></div>
               </td>
            </tr>
            <tr class="myturbo trfox13 block3" style="display:none;">
                <th><?php _e("ADFOX OwnerId:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytad3fox1" size="22" value="<?php echo stripslashes($yturbo_options['ytad3fox1']); ?>" />
                    <br /><small><?php _e("Укажите ownerId блока ADFOX (например, <strong>123456</strong>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-ad-block.html'>как его узнать</a>)</small>.", "rss-for-yandex-turbo"); ?>
               </td>
            </tr>
            <tr class="myturbo trfox23 block3" style="display:none;">
                <th><?php _e("ADFOX идентификатор:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytad3fox2" size="22" value="<?php echo stripslashes($yturbo_options['ytad3fox2']); ?>" />
                    <br /><small><?php _e("Укажите идентификатор контейнера ADFOX (например, <strong>adfox</strong>, <a target='new' href='https://yandex.ru/support/webmaster/turbo/find-ad-block.html'>как его узнать</a>)</small>.", "rss-for-yandex-turbo"); ?>
                    <div style="margin-top:30px;"></div>
               </td>
            </tr>
            <tr class="myturbo">
                <th><?php _e("Минимальный размер записи:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytrazmer" size="2" value="<?php echo stripslashes($yturbo_options['ytrazmer']); ?>" />
                    <br /><small><?php _e("Укажите минимальное количество символов записи для добавления рекламы.", "rss-for-yandex-turbo"); ?> <br/>
                    <?php _e("Данная опция используется только при вставке рекламы в <strong>середину</strong> записи.", "rss-for-yandex-turbo"); ?><br/>
                    <?php _e("Учитывается только текст контента записи (html-разметка не считается).", "rss-for-yandex-turbo"); ?>
                    </small>
               </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input type="submit" name="submit" class="button button-primary" value="<?php _e('Сохранить настройки &raquo;', 'rss-for-yandex-turbo'); ?>" />
                </td>
            </tr>
            
        </table>
    </div>
</div>

<div class="postbox">
    <h3 style="border-bottom: 1px solid #EEE;background: #f7f7f7;"><span class="tcode"><?php _e('Продвинутые настройки', 'rss-for-yandex-turbo'); ?></span></h3>
	  <div class="inside" style="padding-bottom:15px;display: block;">
     
        <table class="form-table">
        
        <p><?php _e("В данной секции находятся продвинутые настройки. <br />Пожалуйста, будьте внимательны в этом разделе!", "rss-for-yandex-turbo"); ?> </p>
        
            <tr class="ytqueryselect">
                <th><?php _e("Включить в RSS:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <select name="ytqueryselect" id="ytqueryselect" style="width: 280px;">
                        <option value="Все таксономии, кроме исключенных" <?php if ($yturbo_options['ytqueryselect'] == 'Все таксономии, кроме исключенных') echo "selected='selected'" ?>><?php _e("Все таксономии, кроме исключенных", "rss-for-yandex-turbo"); ?></option>
                        <option value="Только указанные таксономии" <?php if ($yturbo_options['ytqueryselect'] == 'Только указанные таксономии') echo "selected='selected'" ?>><?php _e("Только указанные таксономии", "rss-for-yandex-turbo"); ?></option>
                    </select>
                    <br /><small><?php _e("Внимание! Будьте осторожны с этой настройкой!", "rss-for-yandex-turbo"); ?> <br />
                    <span id="includespan"><?php _e("Обязательно установите ниже таксономии для включения в ленту - иначе лента будет пустая.", "rss-for-yandex-turbo"); ?> <br /></span>
                    <span id="excludespan"><?php _e("По умолчанию в ленту попадают записи всех таксономий, кроме указанных ниже.", "rss-for-yandex-turbo"); ?> <br /></span>
                    </small>
               </td>
            </tr> 
            <tr class="yttaxlisttr">
                <th><?php _e("Таксономии для исключения:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <textarea rows="3" cols="60" name="yttaxlist" id="yttaxlist"><?php echo stripslashes($yturbo_options['yttaxlist']); ?></textarea>
                    <br /><small><?php _e("Используемый формат: <strong>taxonomy_name:id1,id2,id3</strong>", "rss-for-yandex-turbo"); ?> <br />
                    <?php _e("Пример: <code>category:1,2,4</code> - записи рубрик с ID равным 1, 2 и 4 будут <strong style='color:red;'>исключены</strong> из RSS-ленты.", "rss-for-yandex-turbo"); ?><br />
                    <?php _e("Каждая новая таксономия должна начинаться с новой строки.", "rss-for-yandex-turbo"); ?><br />
                    <?php _e("Стандартные таксономии WordPress: рубрика: <code>category</code>, метка: <code>post_tag</code>.", "rss-for-yandex-turbo"); ?>
                    </small>
                </td>
            </tr>
            <tr class="ytaddtaxlisttr">
                <th><?php _e("Таксономии для добавления:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <textarea rows="3" cols="60" name="ytaddtaxlist" id="ytaddtaxlist"><?php echo stripslashes($yturbo_options['ytaddtaxlist']); ?></textarea>
                    <br /><small><?php _e("Используемый формат: <strong>taxonomy_name:id1,id2,id3</strong>", "rss-for-yandex-turbo"); ?> <br />
                    <?php _e("Пример: <code>category:1,2,4</code> - записи рубрик с ID равным 1, 2 и 4 будут <strong style='color:red;'>добавлены</strong> в RSS-ленту.", "rss-for-yandex-turbo"); ?><br />
                    <?php _e("Каждая новая таксономия должна начинаться с новой строки.", "rss-for-yandex-turbo"); ?><br />
                    <?php _e("Стандартные таксономии WordPress: рубрика: <code>category</code>, метка: <code>post_tag</code>.", "rss-for-yandex-turbo"); ?>
                    </small>
                </td>
            </tr> 
            <tr class="ytthumbnailtr">
                <th><?php _e("Миниатюра в RSS:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytthumbnail"><input type="checkbox" value="enabled" name="ytthumbnail" id="ytthumbnail" <?php if ($yturbo_options['ytthumbnail'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Добавить миниатюру к заголовку записи", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("В заголовок записи в RSS (тег <tt>&lt;header></tt>) будет добавлена миниатюра записи (изображение записи).", "rss-for-yandex-turbo"); ?> 
                    </small>
                </td>
            </tr>
            <tr class="ytselectthumbtr" style="display:none;">
                <th><?php _e("Размер миниатюры в RSS:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <select name="ytselectthumb" style="width: 250px;">
                        <?php $image_sizes = get_intermediate_image_sizes(); ?>
                        <?php foreach ($image_sizes as $size_name): ?>
                            <option value="<?php echo $size_name ?>" <?php if ($yturbo_options['ytselectthumb'] == $size_name) echo "selected='selected'" ?>><?php echo $size_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br /><small><?php _e("Выберите нужный размер миниатюры (в списке находятся все зарегистрированные на сайте размеры миниатюр). ", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="ytrelatedtr">
                <th><?php _e("Похожие записи:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytrelated"><input type="checkbox" value="enabled" name="ytrelated" id="ytrelated" <?php if ($yturbo_options['ytrelated'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Выводить в RSS блок похожих записей", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("В RSS-ленту будет добавлен блок похожих записей (тег <tt>&lt;yandex:related></tt>).", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="ytrelatedchildtr" style="display:none;">
                <th><?php _e("Количество похожих записей:", "rss-for-yandex-turbo") ?></th>
                <td>
                    <input type="text" name="ytrelatednumber" size="2" value="<?php echo stripslashes($yturbo_options['ytrelatednumber']); ?>" />
                    <br /><small><?php _e("Укажите число записей в блоке похожих записей.", "rss-for-yandex-turbo"); ?> <br >
                    <?php _e("Список похожих записей будет формироваться случайным образом из записей рубрики текущей записи.", "rss-for-yandex-turbo"); ?></small>
               </td>
            </tr>
            <tr class="ytrelatedchildtr" style="display:none;">
                <th><?php _e("Миниатюра для похожих записей:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <select name="ytrelatedselectthumb" style="width: 250px;">
                        <?php $image_sizes = get_intermediate_image_sizes(); ?>
                        <?php foreach ($image_sizes as $size_name): ?>
                            <option value="<?php echo $size_name ?>" <?php if ($yturbo_options['ytrelatedselectthumb'] == $size_name) echo "selected='selected'"; ?>><?php echo $size_name ?></option>
                        <?php endforeach; ?>
                            <option value="Не использовать" <?php if ($yturbo_options['ytrelatedselectthumb'] == 'Не использовать') echo "selected='selected'"; ?>><?php echo 'Не использовать'; ?></option>
                    </select>
                    <br /><small><?php _e("Выберите нужный размер миниатюры (в списке находятся все зарегистрированные на сайте размеры миниатюр). ", "rss-for-yandex-turbo"); ?> <br /><?php _e("Вывод миниатюр для похожих записей можно отключить.", "rss-for-yandex-turbo"); ?>
                    </small>
                </td>
            </tr>
            <tr class="ytexcludetagstr">
                <th><?php _e("Фильтр тегов (без контента):", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytexcludetags"><input type="checkbox" value="enabled" name="ytexcludetags" id="ytexcludetags" <?php if ($yturbo_options['ytexcludetags'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Удалить указанные html-теги", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("Из контента записей будут удалены все указанные html-теги (<strong>сам контент этих тегов останется</strong>).", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="ytexcludetagslisttr">
                <th><?php _e("Теги для удаления:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <textarea rows="3" cols="60" name="ytexcludetagslist" id="ytexcludetagslist"><?php echo stripslashes($yturbo_options['ytexcludetagslist']); ?></textarea>
                    <br /><small><?php _e("Список удаляемых html-тегов через запятую.", "rss-for-yandex-turbo"); ?> <br />
                    <?php _e("Указывать классы, идентификаторы и прочее не требуется.", "rss-for-yandex-turbo"); ?> <br />
                    <?php _e("Самозакрывающиеся теги вроде <tt>&lt;img src=\"...\" /></tt> и <tt>&lt;br /></tt> удалить нельзя.", "rss-for-yandex-turbo"); ?><br />
                    </small>
                </td>
            </tr>
            <tr class="ytexcludetags2tr">
                <th><?php _e("Фильтр тегов (с контентом):", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytexcludetags2"><input type="checkbox" value="enabled" name="ytexcludetags2" id="ytexcludetags2" <?php if ($yturbo_options['ytexcludetags2'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Удалить указанные html-теги", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("Из контента записей будут удалены все указанные html-теги (<strong>включая сам контент этих тегов</strong>).", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="ytexcludetagslist2tr">
                <th><?php _e("Теги для удаления:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <textarea rows="3" cols="60" name="ytexcludetagslist2" id="ytexcludetagslist2"><?php echo stripslashes($yturbo_options['ytexcludetagslist2']); ?></textarea>
                    <br /><small><?php _e("Список удаляемых html-тегов через запятую.", "rss-for-yandex-turbo"); ?> <br />
                    <?php _e("Указывать классы, идентификаторы и прочее не требуется.", "rss-for-yandex-turbo"); ?> <br />
                    <?php _e("Самозакрывающиеся теги вроде <tt>&lt;img src=\"...\" /></tt> и <tt>&lt;br /></tt> удалить нельзя.", "rss-for-yandex-turbo"); ?><br />
                    </small>
                </td>
            </tr>
            <tr class="ytexcludecontenttr">
                <th><?php _e("Контент для удаления:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytexcludecontent"><input type="checkbox" value="enabled" name="ytexcludecontent" id="ytexcludecontent" <?php if ($yturbo_options['ytexcludecontent'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Удалить указанный контент из RSS", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("Точные вхождения указанного контента будут удалены из записей в RSS-ленте.", "rss-for-yandex-turbo"); ?> </small>
                </td>
            </tr>
            <tr class="ytexcludecontentlisttr">
                <th><?php _e("Список удаляемого контента:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <textarea rows="5" cols="60" name="ytexcludecontentlist" id="ytexcludecontentlist"><?php echo stripcslashes($yturbo_options['ytexcludecontentlist']); ?></textarea>
                    <br /><small><?php _e("Каждый новый шаблон для удаления должен начинаться с новой строки.", "rss-for-yandex-turbo"); ?> <br />
                    </small>
                </td>
            </tr>
            <tr>
                <th><?php _e("Отключение Турбо:", 'rss-for-yandex-turbo') ?></th>
                <td>
                    <label for="ytremoveturbo"><input type="checkbox" value="enabled" name="ytremoveturbo" id="ytremoveturbo" <?php if ($yturbo_options['ytremoveturbo'] == 'enabled') echo "checked='checked'"; ?> /><?php _e("Отключить turbo-страницы", "rss-for-yandex-turbo"); ?></label>
                    <br /><small><?php _e("Эта опция добавит в RSS-ленту атрибут <tt>turbo=\"false\"</tt> к тегу <tt>&lt;item></tt>.", "rss-for-yandex-turbo"); ?> <br />
                    <?php _e("Это единственный способ заставить Яндекс отключить turbo-страницы для вашего сайта.", "rss-for-yandex-turbo"); ?><br />
                    <?php _e("Простое удаление плагина не поможет - необходимо, чтобы бот Яндекса \"съел\" ленту с <tt>turbo=\"false\"</tt>.", "rss-for-yandex-turbo"); ?>
                    </small>
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input type="submit" name="submit" class="button button-primary" value="<?php _e('Сохранить настройки &raquo;', 'rss-for-yandex-turbo'); ?>" />
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="postbox">
    <h3 style="border-bottom: 1px solid #EEE;background: #f7f7f7;"><span class="tcode"><?php _e('О плагине', 'rss-for-yandex-turbo'); ?></span></h3>
	  <div class="inside" style="padding-bottom:15px;display: block;">
     
      <p><?php _e('Если вам нравится мой плагин, то, пожалуйста, поставьте ему <a target="new" href="https://wordpress.org/plugins/rss-for-yandex-turbo/"><strong>5 звезд</strong></a> в репозитории.', 'rss-for-yandex-turbo'); ?></p>
      <p style="margin-top:20px;margin-bottom:10px;"><?php _e('Возможно, что вам также будут интересны другие мои плагины:', 'rss-for-yandex-turbo'); ?></p>
      
      <div class="about">
        <ul>
            <li style="list-style-type: square;margin: 0px 0px 3px 35px;"><a class="yt" target="new" href="https://ru.wordpress.org/plugins/rss-for-yandex-zen/">RSS for Yandex Zen</a> - <?php _e('cоздание RSS-ленты для сервиса Яндекс.Дзен.', 'rss-for-yandex-turbo'); ?></li>
            <li style="list-style-type: square;margin: 0px 0px 3px 35px;"><a class="yt" target="new" href="https://ru.wordpress.org/plugins/cool-tag-cloud/">Cool Tag Cloud</a> - <?php _e('простое, но очень красивое облако меток.', 'rss-for-yandex-turbo'); ?> </li>
            <li style="list-style-type: square;margin: 0px 0px 3px 35px;"><a class="yt" target="new" href="https://ru.wordpress.org/plugins/bbspoiler/">BBSpoiler</a> - <?php _e('плагин позволит вам спрятать текст под тегами [spoiler]текст[/spoiler].', 'rss-for-yandex-turbo'); ?></li>
            <li style="list-style-type: square;margin: 0px 0px 3px 35px;"><a class="yt" target="new" href="https://ru.wordpress.org/plugins/easy-textillate/">Easy Textillate</a> - <?php _e('плагин очень красиво анимирует текст (шорткодами в записях и виджетах или PHP-кодом в файлах темы).', 'rss-for-yandex-turbo'); ?> </li>
            <li style="list-style-type: square;margin: 0px 0px 3px 35px;"><a class="yt" target="new" href="https://ru.wordpress.org/plugins/cool-image-share/">Cool Image Share</a> - <?php _e('плагин добавляет иконки социальных сетей на каждое изображение в ваших записях.', 'rss-for-yandex-turbo'); ?> </li>
            <li style="list-style-type: square;margin: 0px 0px 3px 35px;"><a class="yt" target="new" href="https://ru.wordpress.org/plugins/today-yesterday-dates/">Today-Yesterday Dates</a> - <?php _e('относительные даты для записей за сегодня и вчера.', 'rss-for-yandex-turbo'); ?> </li>
            </ul>
      </div>     
    </div>
</div>
<?php wp_nonce_field( plugin_basename(__FILE__), 'yturbo_nonce'); ?>
</form>
</div>
</div>
<?php 
}
//функция вывода страницы настроек плагина end

//функция добавления ссылки на страницу настроек плагина в раздел "Настройки" begin
function yturbo_menu() {
	add_options_page('Яндекс.Турбо', 'Яндекс.Турбо', 'manage_options', 'rss-for-yandex-turbo.php', 'yturbo_options_page');
}
add_action('admin_menu', 'yturbo_menu');
//функция добавления ссылки на страницу настроек плагина в раздел "Настройки" end

//подключение стилей на странице настроек плагина begin
function yturbo_admin_print_scripts() {
    $post_permalink = $_SERVER["REQUEST_URI"];
    if(strpos($post_permalink, 'rss-for-yandex-turbo.php') == true) : ?>
        <style>
        tt {padding: 1px 5px 1px;margin: 0 1px;background: #eaeaea;background: rgba(0,0,0,.07);font-size: 13px;font-family: Consolas,Monaco,monospace;unicode-bidi: embed;}
        </style>
    <?php endif; ?>
<?php }    
add_action('admin_head', 'yturbo_admin_print_scripts');
//подключение стилей на странице настроек плагина end

//создаем метабокс begin
function yturbo_meta_box(){
    $yturbo_options = get_option('yturbo_options');  
    $yttype = $yturbo_options['yttype']; 
    $yttype = explode(",", $yttype);
    add_meta_box('yturbo_meta_box', 'Яндекс.Турбо', 'yturbo_callback', $yttype, 'normal' , 'high');
}
add_action( 'add_meta_boxes', 'yturbo_meta_box' );
//создаем метабокс end

//сохраняем метабокс begin
function yturbo_save_metabox($post_id){ 
    global $post;
    
    if ( ! isset( $_POST['yturbo_meta_nonce'] ) ) 
        return $post_id;
 
    if ( ! wp_verify_nonce($_POST['yturbo_meta_nonce'], plugin_basename(__FILE__) ) )
		return $post_id;
    
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
    
    if(isset($_POST["ytcategory"])){
        $ytcategory = sanitize_text_field($_POST['ytcategory']);
        update_post_meta($post->ID, 'ytcategory_meta_value', $ytcategory);
    }
       
    if(isset($_POST["ytrssenabled"])){
        $ytrssenabled = 'yes';
        update_post_meta($post->ID, 'ytrssenabled_meta_value', $ytrssenabled);
    } else {
        $ytrssenabled = 'no';
        update_post_meta($post->ID, 'ytrssenabled_meta_value', $ytrssenabled);
    }   

    if(isset($_POST["ytad1meta"])){
        $ytad1meta = 'disabled';
        update_post_meta($post->ID, 'ytad1meta', $ytad1meta);
    } else {
        $ytad1meta = 'enabled';
        update_post_meta($post->ID, 'ytad1meta', $ytad1meta);
    }    
    if(isset($_POST["ytad2meta"])){
        $ytad2meta = 'disabled';
        update_post_meta($post->ID, 'ytad2meta', $ytad2meta);
    } else {
        $ytad2meta = 'enabled';
        update_post_meta($post->ID, 'ytad2meta', $ytad2meta);
    } 
    if(isset($_POST["ytad3meta"])){
        $ytad3meta = 'disabled';
        update_post_meta($post->ID, 'ytad3meta', $ytad3meta);
    } else {
        $ytad3meta = 'enabled';
        update_post_meta($post->ID, 'ytad3meta', $ytad3meta);
    } 
}
add_action('save_post', 'yturbo_save_metabox');
//сохраняем метабокс end

//выводим метабокс begin
function yturbo_callback(){
    global $post;
	wp_nonce_field( plugin_basename(__FILE__), 'yturbo_meta_nonce' );
    
    $yturbo_options = get_option('yturbo_options');
    
    $ytad1meta = get_post_meta($post->ID, 'ytad1meta', true); 
    if (!$ytad1meta) {$ytad1meta = $yturbo_options['ytad1'];} 
    
    $ytad2meta = get_post_meta($post->ID, 'ytad2meta', true); 
    if (!$ytad2meta) {$ytad2meta = $yturbo_options['ytad2'];} 
    
    $ytad3meta = get_post_meta($post->ID, 'ytad3meta', true); 
    if (!$ytad3meta) {$ytad3meta = $yturbo_options['ytad3'];} 
    
    $ytcategory = get_post_meta($post->ID, 'ytcategory_meta_value', true); 
    if (!$ytcategory) {$ytcategory = $yturbo_options['ytcategory'];} 

    $ytrssenabled = get_post_meta($post->ID, 'ytrssenabled_meta_value', true); 
    if (!$ytrssenabled) {$ytrssenabled = "no";}   
    ?>   
    
     <p><strong><?php _e("Тематика:", "rss-for-yandex-turbo"); ?></strong>
     <select name="ytcategory">
        <option value="Происшествия" <?php if ($ytcategory == 'Происшествия') echo "selected='selected'" ?>><?php _e("Происшествия", "rss-for-yandex-turbo"); ?></option>
        <option value="Политика" <?php if ($ytcategory == 'Политика') echo "selected='selected'" ?>><?php _e("Политика", "rss-for-yandex-turbo"); ?></option>
        <option value="Война" <?php if ($ytcategory == 'Война') echo "selected='selected'" ?>><?php _e("Война", "rss-for-yandex-turbo"); ?></option>
        <option value="Общество" <?php if ($ytcategory == 'Общество') echo "selected='selected'" ?>><?php _e("Общество", "rss-for-yandex-turbo"); ?></option>
        <option value="Экономика" <?php if ($ytcategory == 'Экономика') echo "selected='selected'" ?>><?php _e("Экономика", "rss-for-yandex-turbo"); ?></option>
        <option value="Спорт" <?php if ($ytcategory == 'Спорт') echo "selected='selected'" ?>><?php _e("Спорт", "rss-for-yandex-turbo"); ?></option>
        <option value="Технологии" <?php if ($ytcategory == 'Технологии') echo "selected='selected'" ?>><?php _e("Технологии", "rss-for-yandex-turbo"); ?></option>
        <option value="Наука" <?php if ($ytcategory == 'Наука') echo "selected='selected'" ?>><?php _e("Наука", "rss-for-yandex-turbo"); ?></option>
        <option value="Игры" <?php if ($ytcategory == 'Игры') echo "selected='selected'" ?>><?php _e("Игры", "rss-for-yandex-turbo"); ?></option>
        <option value="Музыка" <?php if ($ytcategory == 'Музыка') echo "selected='selected'" ?>><?php _e("Музыка", "rss-for-yandex-turbo"); ?></option>
        <option value="Литература" <?php if ($ytcategory == 'Литература') echo "selected='selected'" ?>><?php _e("Литература", "rss-for-yandex-turbo"); ?></option>
        <option value="Кино" <?php if ($ytcategory == 'Кино') echo "selected='selected'" ?>><?php _e("Кино", "rss-for-yandex-turbo"); ?></option>
        <option value="Культура" <?php if ($ytcategory == 'Культура') echo "selected='selected'" ?>><?php _e("Культура", "rss-for-yandex-turbo"); ?></option>
        <option value="Мода" <?php if ($ytcategory == 'Мода') echo "selected='selected'" ?>><?php _e("Мода", "rss-for-yandex-turbo"); ?></option>
        <option value="Знаменитости" <?php if ($ytcategory == 'Знаменитости') echo "selected='selected'" ?>><?php _e("Знаменитости", "rss-for-yandex-turbo"); ?></option>
        <option value="Психология" <?php if ($ytcategory == 'Психология') echo "selected='selected'" ?>><?php _e("Психология", "rss-for-yandex-turbo"); ?></option>
        <option value="Здоровье" <?php if ($ytcategory == 'Здоровье') echo "selected='selected'" ?>><?php _e("Здоровье", "rss-for-yandex-turbo"); ?></option>
        <option value="Авто" <?php if ($ytcategory == 'Авто') echo "selected='selected'" ?>><?php _e("Авто", "rss-for-yandex-turbo"); ?></option>
        <option value="Дом" <?php if ($ytcategory == 'Дом') echo "selected='selected'" ?>><?php _e("Дом", "rss-for-yandex-turbo"); ?></option>
        <option value="Хобби" <?php if ($ytcategory == 'Хобби') echo "selected='selected'" ?>><?php _e("Хобби", "rss-for-yandex-turbo"); ?></option>
        <option value="Еда" <?php if ($ytcategory == 'Еда') echo "selected='selected'" ?>><?php _e("Еда", "rss-for-yandex-turbo"); ?></option>
        <option value="Дизайн" <?php if ($ytcategory == 'Дизайн') echo "selected='selected'" ?>><?php _e("Дизайн", "rss-for-yandex-turbo"); ?></option>
        <option value="Фотографии" <?php if ($ytcategory == 'Фотографии') echo "selected='selected'" ?>><?php _e("Фотографии", "rss-for-yandex-turbo"); ?></option>
        <option value="Юмор" <?php if ($ytcategory == 'Юмор') echo "selected='selected'" ?>><?php _e("Юмор", "rss-for-yandex-turbo"); ?></option>
        <option value="Природа" <?php if ($ytcategory == 'Природа') echo "selected='selected'" ?>><?php _e("Природа", "rss-for-yandex-turbo"); ?></option>
        <option value="Путешествия" <?php if ($ytcategory == 'Путешествия') echo "selected='selected'" ?>><?php _e("Путешествия", "rss-for-yandex-turbo"); ?></option>
    </select>
    </p>
    
    <p style="margin:5px!important;">
    
    <label for="ytrssenabled"><input type="checkbox" value="enabled" name="ytrssenabled" id="ytrssenabled" <?php if ($ytrssenabled == 'yes') echo "checked='checked'"; ?> /><?php _e("Исключить эту запись из RSS", "rss-for-yandex-turbo"); ?></label>
    </p>
    
    <p style="margin:5px!important;margin-top:10px!important;">
    
    <?php if ($yturbo_options['ytad1'] == 'enabled') { ?>
        <label for="ytad1meta"><input type="checkbox" value="disabled" name="ytad1meta" id="ytad1meta" <?php if ($ytad1meta == 'disabled') echo "checked='checked'"; ?> /><?php _e("Отключить блок рекламы #1 для этой записи", "rss-for-yandex-turbo"); ?></label><br />
    <?php } ?>    
    <?php if ($yturbo_options['ytad2'] == 'enabled') { ?>
        <label for="ytad2meta"><input type="checkbox" value="disabled" name="ytad2meta" id="ytad2meta" <?php if ($ytad2meta == 'disabled') echo "checked='checked'"; ?> /><?php _e("Отключить блок рекламы #2 для этой записи", "rss-for-yandex-turbo"); ?></label><br />
    <?php } ?> 
    <?php if ($yturbo_options['ytad3'] == 'enabled') { ?>
        <label for="ytad3meta"><input type="checkbox" value="disabled" name="ytad3meta" id="ytad3meta" <?php if ($ytad3meta == 'disabled') echo "checked='checked'"; ?> /><?php _e("Отключить блок рекламы #3 для этой записи", "rss-for-yandex-turbo"); ?></label><br />
    <?php } ?> 
    </p>
    
<?php }
//выводим метабокс end

//добавляем новую rss-ленту begin
function yturbo_add_feed(){
    $yturbo_options = get_option('yturbo_options'); 
    if (!isset($yturbo_options['ytrssname'])) {$yturbo_options['ytrssname']="turbo";update_option('yturbo_options', $yturbo_options);}
    add_feed($yturbo_options['ytrssname'], 'yturbo_feed_template');
}
add_action('init', 'yturbo_add_feed');
//добавляем новую rss-ленту end

//шаблон для RSS-ленты Яндекс.Турбо begin
function yturbo_feed_template(){
$yturbo_options = get_option('yturbo_options');  

$yttitle = $yturbo_options['yttitle'];
$ytlink = $yturbo_options['ytlink'];
$ytdescription = $yturbo_options['ytdescription'];
$ytlanguage = $yturbo_options['ytlanguage']; 
$ytnumber = $yturbo_options['ytnumber']; 
$ytrazb = $yturbo_options['ytrazb'];
$ytrazbnumber = $yturbo_options['ytrazbnumber'];
$yttype = $yturbo_options['yttype']; 
$yttype = explode(",", $yttype);
$ytfigcaption = $yturbo_options['ytfigcaption']; 
$ytimgauthorselect = $yturbo_options['ytimgauthorselect']; 
$ytimgauthor = $yturbo_options['ytimgauthor']; 
$ytauthorselect = $yturbo_options['ytauthorselect']; 
$ytauthor = $yturbo_options['ytauthor'];
$ytthumbnail = $yturbo_options['ytthumbnail']; 
$ytselectthumb = $yturbo_options['ytselectthumb']; 

$ytexcludetags = $yturbo_options['ytexcludetags']; 
$ytexcludetagslist = html_entity_decode($yturbo_options['ytexcludetagslist']); 
$ytexcludetags2 = $yturbo_options['ytexcludetags2']; 
$ytexcludetagslist2 = html_entity_decode($yturbo_options['ytexcludetagslist2']); 
$ytexcludecontent = $yturbo_options['ytexcludecontent']; 
$ytexcludecontentlist = html_entity_decode($yturbo_options['ytexcludecontentlist']);
$tax_query = array();

$ytad1 = $yturbo_options['ytad1'];
$ytad1mesto = $yturbo_options['ytad1mesto'];
$ytad1set = $yturbo_options['ytad1set'];
$ytad1rsa = $yturbo_options['ytad1rsa'];
$ytad1fox1 = $yturbo_options['ytad1fox1'];
$ytad1fox2 = $yturbo_options['ytad1fox2'];
$ytad2 = $yturbo_options['ytad2'];
$ytad2mesto = $yturbo_options['ytad2mesto'];
$ytad2set = $yturbo_options['ytad2set'];
$ytad2rsa = $yturbo_options['ytad2rsa'];
$ytad2fox1 = $yturbo_options['ytad2fox1'];
$ytad2fox2 = $yturbo_options['ytad2fox2'];
$ytad3 = $yturbo_options['ytad3'];
$ytad3mesto = $yturbo_options['ytad3mesto'];
$ytad3set = $yturbo_options['ytad3set'];
$ytad3rsa = $yturbo_options['ytad3rsa'];
$ytad3fox1 = $yturbo_options['ytad3fox1'];
$ytad3fox2 = $yturbo_options['ytad3fox2'];
    
$ytrelated = $yturbo_options['ytrelated'];
$ytrelatednumber = $yturbo_options['ytrelatednumber'];
$ytrelatedselectthumb = $yturbo_options['ytrelatedselectthumb'];  
$ytremoveturbo = $yturbo_options['ytremoveturbo'];  

$ytmetrika = $yturbo_options['ytmetrika'];
$ytliveinternet = $yturbo_options['ytliveinternet'];
$ytgoogle = $yturbo_options['ytgoogle'];
$ytmailru = $yturbo_options['ytmailru'];
$ytrambler = $yturbo_options['ytrambler'];
$ytmediascope = $yturbo_options['ytmediascope'];

$ytqueryselect = $yturbo_options['ytqueryselect'];
$yttaxlist = $yturbo_options['yttaxlist']; 
$ytaddtaxlist = $yturbo_options['ytaddtaxlist']; 

if ($ytqueryselect=='Все таксономии, кроме исключенных' && $yttaxlist) {
    $textAr = explode("\n", trim($yttaxlist));
    $textAr = array_filter($textAr, 'trim');
    $tax_query = array( 'relation' => 'AND' );
    foreach ($textAr as $line) {
        $tax = explode(":", $line);
        $taxterm = explode(",", $tax[1]);
        $tax_query[] = array(
            'taxonomy' => $tax[0],
            'field'    => 'id',
            'terms'    => $taxterm,
            'operator' => 'NOT IN',
        );
    } 
}    
if (!$ytaddtaxlist) {$ytaddtaxlist = 'category:10000000';}
if ($ytqueryselect=='Только указанные таксономии' && $ytaddtaxlist) {
    $textAr = explode("\n", trim($ytaddtaxlist));
    $textAr = array_filter($textAr, 'trim');
    $tax_query = array( 'relation' => 'OR' );
    foreach ($textAr as $line) {
        $tax = explode(":", $line);
        $taxterm = explode(",", $tax[1]);
        $tax_query[] = array(
            'taxonomy' => $tax[0],
            'field'    => 'id',
            'terms'    => $taxterm,
            'operator' => 'IN',
        );
    } 
}    

if ($ytrazb == 'enabled' && $ytrazbnumber) {
    if (isset($_GET['paged'])) {
        $paged = $_GET['paged'];
    } else {
        $paged = 0;
    }    
    $offset = $ytrazbnumber * ($paged - 1);
    if ($paged == 0) { 
        $paged = 1;
        $offset = 0;
    }    
    $temp = ceil($ytnumber / $ytrazbnumber);
    if ($paged > $temp) {echo 'Не хватает записей для этой ленты, измените настройки плагина.'; return;}
    $perpage = $ytrazbnumber * $paged;
} else {
    $offset = 0;
    $ytrazbnumber = $ytnumber;
}    

$args = array('offset'=> $offset,'ignore_sticky_posts' => 1, 'post_type' => $yttype, 'post_status' => 'publish', 'posts_per_page' => $ytrazbnumber,'tax_query' => $tax_query,
'meta_query' => array('relation' => 'OR', array('key' => 'ytrssenabled_meta_value', 'compare' => 'NOT EXISTS',),
array('key' => 'ytrssenabled_meta_value', 'value' => 'yes', 'compare' => '!=',),));
$query = new WP_Query( $args );

header('Content-Type: ' . feed_content_type('rss2') . '; charset=' . get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
do_action( 'rss_tag_pre', 'rss2' );
?>
<rss
    xmlns:yandex="http://news.yandex.ru"
    xmlns:media="http://search.yahoo.com/mrss/"
    xmlns:turbo="http://turbo.yandex.ru"
    version="2.0"<?php do_action('rss2_ns'); ?>>
<channel>
    <title><?php echo $yttitle; ?></title>
    <link><?php echo $ytlink; ?></link>
    <description><?php echo $ytdescription; ?></description>
    <?php if ($ytmetrika) { ?><yandex:analytics id="<?php echo $ytmetrika; ?>" type="Yandex"></yandex:analytics><?php echo PHP_EOL; ?><?php } ?>
    <?php if ($ytliveinternet) { ?><yandex:analytics type="LiveInternet"></yandex:analytics><?php echo PHP_EOL; ?><?php } ?>
    <?php if ($ytgoogle) { ?><yandex:analytics id="<?php echo $ytgoogle; ?>" type="Google"></yandex:analytics><?php echo PHP_EOL; ?><?php } ?>
    <?php if ($ytmailru) { ?><yandex:analytics id="<?php echo $ytmailru; ?>" type="MailRu"></yandex:analytics><?php echo PHP_EOL; ?><?php } ?>
    <?php if ($ytrambler) { ?><yandex:analytics id="<?php echo $ytrambler; ?>" type="Rambler"></yandex:analytics><?php echo PHP_EOL; ?><?php } ?>
    <?php if ($ytmediascope) { ?><yandex:analytics id="<?php echo $ytmediascope; ?>" type="Mediascope"></yandex:analytics><?php echo PHP_EOL; ?><?php } ?>
    <?php if ($ytad1 == 'enabled') { ?>
        <?php if ($ytad1set == 'РСЯ') { ?>
            <yandex:adNetwork type="Yandex" id="<?php echo $ytad1rsa; ?>" turbo-ad-id="first_ad_place"></yandex:adNetwork>
        <?php } ?>
        <?php if ($ytad1set == 'ADFOX') { ?>
            <yandex:adNetwork type="AdFox" turbo-ad-id="first_ad_place">
                <![CDATA[
                    <div id="<?php echo $ytad1fox2; ?>"></div>
                    <script>
                    window.Ya.adfoxCode.create({
                        ownerId: <?php echo $ytad1fox1; ?>,
                        containerId: '<?php echo $ytad1fox2; ?>',
                        params: {
                            pp: 'g',
                            ps: 'cmic',
                            p2: 'fqem'
                        }
                    });
                    </script>
               ]]>
            </yandex:adNetwork>
        <?php } ?>
    <?php } ?>
    <?php if ($ytad2 == 'enabled') { ?>
        <?php if ($ytad2set == 'РСЯ') { ?>
            <yandex:adNetwork type="Yandex" id="<?php echo $ytad2rsa; ?>" turbo-ad-id="second_ad_place"></yandex:adNetwork>
        <?php } ?>
        <?php if ($ytad2set == 'ADFOX') { ?>
            <yandex:adNetwork type="AdFox" turbo-ad-id="second_ad_place">
                <![CDATA[
                    <div id="<?php echo $ytad2fox2; ?>"></div>
                    <script>
                    window.Ya.adfoxCode.create({
                        ownerId: <?php echo $ytad2fox1; ?>,
                        containerId: '<?php echo $ytad2fox2; ?>',
                        params: {
                            pp: 'g',
                            ps: 'cmic',
                            p2: 'fqem'
                        }
                    });
                    </script>
               ]]>
            </yandex:adNetwork>
        <?php } ?>
    <?php } ?>
    <?php if ($ytad3 == 'enabled') { ?>
        <?php if ($ytad3set == 'РСЯ') { ?>
            <yandex:adNetwork type="Yandex" id="<?php echo $ytad3rsa; ?>" turbo-ad-id="third_ad_place"></yandex:adNetwork>
        <?php } ?>
        <?php if ($ytad3set == 'ADFOX') { ?>
            <yandex:adNetwork type="AdFox" turbo-ad-id="third_ad_place">
                <![CDATA[
                    <div id="<?php echo $ytad3fox2; ?>"></div>
                    <script>
                    window.Ya.adfoxCode.create({
                        ownerId: <?php echo $ytad3fox1; ?>,
                        containerId: '<?php echo $ytad3fox2; ?>',
                        params: {
                            pp: 'g',
                            ps: 'cmic',
                            p2: 'fqem'
                        }
                    });
                    </script>
               ]]>
            </yandex:adNetwork>
        <?php } ?>
    <?php } ?>
    <language><?php echo $ytlanguage; ?></language>
    <generator>RSS for Yandex Turbo v1.11 (https://wordpress.org/plugins/rss-for-yandex-turbo/)</generator>
    <?php while($query->have_posts()) : $query->the_post(); ?>
    <?php if ($ytremoveturbo != 'enabled') { ?>
    <item turbo="true">
    <?php } else { ?>
    <item turbo="false">
    <?php } ?>
        <title><?php the_title_rss(); ?></title>
        <link><?php the_permalink_rss(); ?></link>
        <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
        <?php if ($ytauthorselect != "Отключить указание автора") { ?> 
        <?php if ($ytauthor && $ytauthorselect != "Автор записи") { 
            echo '<author>'.$ytauthor.'</author>'.PHP_EOL;
        } else {
            echo '<author>'.get_the_author().'</author>'.PHP_EOL;
        } } ?>
        <?php if($ytimgauthorselect == 'Указать автора' && !$ytimgauthor){$ytimgauthor = get_the_author();} ?>
        <?php if($ytimgauthorselect == 'Автор записи'){$ytimgauthor = get_the_author();} ?>
        <?php $ytcategory = get_post_meta(get_the_ID(), 'ytcategory_meta_value', true); ?>
        <?php if ($ytcategory) { echo '<category>'.$ytcategory.'</category>'.PHP_EOL; }
        else {echo '<category>'.$yturbo_options['ytcategory'].'</category>'.PHP_EOL;} ?>
        <turbo:content><![CDATA[
       	<?php 
		$content = yturbo_the_content_feed();
        
        if ($ytexcludetags != 'disabled' && $ytexcludetagslist) {
            $content = yturbo_strip_tags_without_content($content, $ytexcludetagslist);
        }
        if ($ytexcludetags2 != 'disabled' && $ytexcludetagslist2) {
            $content = yturbo_strip_tags_with_content($content, $ytexcludetagslist2, true);
        }      
        
        //удаляем все unicode-символы (как невалидные в rss)
        $content = preg_replace('/[\x00-\x1F\x7F]/u', '', $content); 
        
        //удаляем все атрибуты тега img кроме alt и src
        $content = yturbo_strip_attributes($content,array('alt','src'));
        
        $content = wpautop($content);
        
        //удаляем разметку движка при использовании шорткода с подписью [caption] (в html4 темах)
        //и заменяем alt у тега img на текст подписи, установленной в редакторе
        $pattern = "/<div id=\"attachment(.*?)>(.*?)<img(.*?)alt=\"(.*?)\"(.*?) \/>(.*?)<\/p>\n<p class=\"wp-caption-text\">(.*?)<\/p>\n<\/div>/i";
        $replacement = '$2<img$3alt="$7"$5 />$6';
        $content = preg_replace($pattern, $replacement, $content);
        //удаляем ошметки шорткода [caption], если тег <div> удаляется в настройках плагина
        $pattern = "/<p class=\"wp-caption-text\">(.*?)<\/p>/i";
        $replacement = '';
        $content = preg_replace($pattern, $replacement, $content);
        
        //удаляем разметку движка при использовании шорткода с подписью [caption] (в html5 темах)
        //и заменяем alt у тега img на текст подписи, установленной в редакторе
        $pattern = "/<figure id=\"attachment(.*?)>(.*?)<img(.*?)alt=\"(.*?)\"(.*?) \/>(.*?)<figcaption class=\"wp-caption-text\">(.*?)<\/figcaption><\/figure>/i";
        $replacement = '$2<img$3alt="$7"$5 />$6';
        $content = preg_replace($pattern, $replacement, $content);
        
        //удаляем <figure>, если они изначально присутствуют в контенте записи
        $pattern = "/<figure(.*?)>(.*?)<img(.*?)>(.*?)<\/figure>/i";
        $replacement = '<img$3>';
        $content = preg_replace($pattern, $replacement, $content);
        
        //удаление тегов <p> у отдельно стоящих изображений
        $pattern = "/<p><img(.*?)\" \/><\/p>/i";
        $replacement = '<img$1" />';
        $content = preg_replace($pattern, $replacement, $content);
        
        //удаление тегов <p> у отдельно стоящих изображений, обернутых ссылкой
        $pattern = "/<p><a(.*?)><img(.*?)\" \/><\/a><\/p>/i";
        $replacement = '<a$1><img$2" /></a>';
        $content = preg_replace($pattern, $replacement, $content);
        
        //добавляем alt если его вообще нет в теге img
        $pattern = "/<img(?!([^>]*\b)alt=)([^>]*?)>/i";
        $replacement = '<img alt="'. get_the_title_rss() .'"$1$2>';
        $content = preg_replace( $pattern, $replacement, $content );
        
        //устанавливаем alt равным названию записи, если он пустой
        $pattern = "/<img alt=\"\" (.*?) \/>/i";
        $replacement = '<img alt="'.get_the_title_rss().'" $1 />';
        $content = preg_replace($pattern, $replacement, $content);
             
        $copyrighttext = '<span class="copyright">'. $ytimgauthor .'</span>';
        if ($ytimgauthorselect == 'Отключить указание автора') {$copyrighttext = '';}
        $figcaptionopen = '<figcaption>'; $figcaptionclose = '</figcaption>'; 
        if ($ytfigcaption == "Отключить описания" && $ytimgauthorselect == 'Отключить указание автора') {
            $figcaptionopen = '';  $figcaptionclose = ''; 
        }    
       
        //обрабатываем img теги и оборачиваем их тегами figure 
       
        if ($ytfigcaption == "Использовать alt по возможности") {
             //оборачиваем img тегом figure и прописываем ему описание и авторство
             $pattern = "/<img alt=\"(.*?)\" src=\"(.*?)\" \/>/i";
             $replacement = '<figure><img src="$2" />'.$figcaptionopen.'$1'.$copyrighttext.$figcaptionclose.'</figure>';
             $content = preg_replace($pattern, $replacement, $content); 
        } 
        if ($ytfigcaption == "Использовать название записи") {
             //оборачиваем img тегом figure и прописываем ему описание и авторство 
             $pattern = "/<img alt=\"(.*?)\" src=\"(.*?)\" \/>/i";
             $replacement = '<figure><img src="$2" />'.$figcaptionopen.get_the_title_rss() .$copyrighttext.$figcaptionclose.'</figure>';
             $content = preg_replace($pattern, $replacement, $content);
        }  
        if ($ytfigcaption == "Отключить описания") {
             //оборачиваем img тегом figure и прописываем ему описание и авторство 
             $pattern = "/<img alt=\"(.*?)\" src=\"(.*?)\" \/>/i";
             $replacement = '<figure><img src="$2" />'.$figcaptionopen.$copyrighttext.$figcaptionclose.'</figure>';
             $content = preg_replace($pattern, $replacement, $content);
        } 
        
        //удаляем картинки из контента, если их больше 30 уникальных (ограничение яндекс.турбо)
        if (preg_match_all("/<figure><img(.*?)>(.*?)<\/figure>/i", $content, $res)) {
            $i = 0; 
            if ($ytrelated=="enabled" && $ytrelatednumber) $i = $ytrelatednumber;
            if ($ytthumbnail=="enabled" && has_post_thumbnail(get_the_ID())) $i++;    
            $final = array();
            foreach ($res[0] as $r) {
                if (! in_array($r, $final)) {$i++;}
                if ($i > 30 && ! in_array($r, $final)) {
                    $content = str_replace($r, '', $content);
                }
                if (! in_array($r, $final)) {$final[] = $r;} 
            }    
        }
       
        if ($ytexcludecontent!='disabled' && $ytexcludecontentlist) {
            $textAr = explode("\n", trim($ytexcludecontentlist));
            $textAr = array_filter($textAr, 'trim');
            foreach ($textAr as $line) {
                $line = trim($line);
                $content = preg_replace('/'.$line.'/i','', $content);
            }    
        }   
        $ytad1meta = get_post_meta(get_the_ID(), 'ytad1meta', true); 
        $ytad2meta = get_post_meta(get_the_ID(), 'ytad2meta', true); 
        $ytad3meta = get_post_meta(get_the_ID(), 'ytad3meta', true);         
		?>
        <header>
            <?php if ( $ytthumbnail=="enabled" && has_post_thumbnail(get_the_ID()) ) {   
            echo '<figure><img src="'. strtok(get_the_post_thumbnail_url(get_the_ID(),$ytselectthumb), '?') .'" /></figure>'.PHP_EOL;} ?>
        <h1><?php the_title_rss(); ?></h1>
        </header>
        <?php if ($ytad1 == 'enabled' && $ytad1mesto == 'После заголовка записи' && $ytad1meta != 'disabled') { ?>
            <figure data-turbo-ad-id="first_ad_place"></figure>
        <?php } ?>
        <?php if ($ytad2 == 'enabled' && $ytad2mesto == 'После заголовка записи' && $ytad2meta != 'disabled') { ?>
            <figure data-turbo-ad-id="second_ad_place"></figure>
        <?php } ?>
        <?php if ($ytad3 == 'enabled' && $ytad3mesto == 'После заголовка записи' && $ytad3meta != 'disabled') { ?>
            <figure data-turbo-ad-id="third_ad_place"></figure>
        <?php } ?>
        <?php echo PHP_EOL.yturbo_add_advert($content); ?>
        <?php if ($ytad1 == 'enabled' && $ytad1mesto == 'В конце записи' && $ytad1meta != 'disabled') { ?>
            <figure data-turbo-ad-id="first_ad_place"></figure>
        <?php } ?>
        <?php if ($ytad2 == 'enabled' && $ytad2mesto == 'В конце записи' && $ytad2meta != 'disabled') { ?>
            <figure data-turbo-ad-id="second_ad_place"></figure>
        <?php } ?>
        <?php if ($ytad3 == 'enabled' && $ytad3mesto == 'В конце записи' && $ytad3meta != 'disabled') { ?>
            <figure data-turbo-ad-id="third_ad_place"></figure>
        <?php } ?>
		]]></turbo:content>
        <?php 
        if ( $ytrelated=="enabled"  ) {   
            
            $cats = array();
            foreach (get_the_category(get_the_ID()) as $c) {
                $cat = get_category($c);
                array_push($cats, $cat->cat_ID);
            }
            $cur_post_id = array();
            array_push($cur_post_id, get_the_ID());

            $args = array('post__not_in' => $cur_post_id, 'cat' => $cats,'orderby' => 'rand','ignore_sticky_posts' => 1, 'post_type' => $yttype, 'post_status' => 'publish', 'posts_per_page' => $ytrelatednumber,'tax_query' => $tax_query,'meta_query' => array('relation' => 'OR', array('key' => 'ytrssenabled_meta_value', 'compare' => 'NOT EXISTS',),array('key' => 'ytrssenabled_meta_value', 'value' => 'yes', 'compare' => '!=',),));
            $related = new WP_Query( $args );
            
            if (!$related->have_posts()) {
                $args = array('post__not_in' => $cur_post_id, 'orderby' => 'rand','ignore_sticky_posts' => 1, 'post_type' => $yttype, 'post_status' => 'publish', 'posts_per_page' => $ytrelatednumber,'tax_query' => $tax_query,'meta_query' => array('relation' => 'OR', array('key' => 'ytrssenabled_meta_value', 'compare' => 'NOT EXISTS',),array('key' => 'ytrssenabled_meta_value', 'value' => 'yes', 'compare' => '!=',),));
                $related = new WP_Query( $args );
            }    

            if ($related->have_posts()) {echo '<yandex:related>'.PHP_EOL;}
            while ($related->have_posts()) : $related->the_post();
                $thumburl = '';
                if ($ytrelatedselectthumb != "Не использовать" && has_post_thumbnail(get_the_ID()) ) {
                    $thumburl = ' img="' . strtok(get_the_post_thumbnail_url(get_the_ID(),$ytrelatedselectthumb), '?') . '"';
                }    
                $rlink = htmlspecialchars(get_the_permalink());
                $rtitle = get_the_title_rss();
                if ($ytrelatedselectthumb != "Не использовать") {
                    echo '<link url="'.$rlink.'"'.$thumburl.'>'.$rtitle.'</link>'.PHP_EOL;
                } else {
                    echo '<link url="'.$rlink.'">'.$rtitle.'</link>'.PHP_EOL;
                }
            
            endwhile;
            if ($related->have_posts()) {echo '</yandex:related>'.PHP_EOL;}
            wp_reset_query($related);
        } ?>
        <?php rss_enclosure(); ?>
    </item>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
</channel>
</rss>
<?php }
//шаблон для RSS-ленты Яндекс.Турбо end

//установка правильного content type для ленты плагина begin
function yturbo_feed_content_type( $content_type, $type ) {
    $yturbo_options = get_option('yturbo_options'); 
    if (!isset($yturbo_options['ytrssname'])) {$yturbo_options['ytrssname']="turbo";update_option('yturbo_options', $yturbo_options);}
    if( $yturbo_options['ytrssname'] == $type ) {
        $content_type = 'application/rss+xml';
    }
    return $content_type;
}
add_filter( 'feed_content_type', 'yturbo_feed_content_type', 10, 2 );
//установка правильного content type для ленты плагина end

//функция формирования content в rss begin
function yturbo_the_content_feed() {
    $content = apply_filters('the_content', get_post_field('post_content', get_the_ID()));
    $content = do_shortcode($content);
    $content = apply_filters('yturbo_the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
    $content = apply_filters('wp_staticize_emoji', $content);
    $content = apply_filters('_oembed_filter_feed_content', $content);
    return $content;
}
//функция формирования content в rss end

//функция удаления тегов вместе с их контентом begin 
function yturbo_strip_tags_with_content($text, $tags = '', $invert = FALSE) {
    preg_match_all( '/<(.+?)[\s]*\/?[\s]*>/si', trim( $tags ), $tags_array );
	$tags_array = array_unique( $tags_array[1] );

	$regex = '';

	if ( count( $tags_array ) > 0 ) {
		if ( ! $invert ) {
			$regex = '@<(?!(?:' . implode( '|', $tags_array ) . ')\b)(\w+)\b[^>]*?(>((?!<\1\b).)*?<\/\1|\/)>@si';
			$text  = preg_replace( $regex, '', $text );
		} else {
			$regex = '@<(' . implode( '|', $tags_array ) . ')\b[^>]*?(>((?!<\1\b).)*?<\/\1|\/)>@si';
			$text  = preg_replace( $regex, '', $text );
		}
	} elseif ( ! $invert ) {
		$regex = '@<(\w+)\b[^>]*?(>((?!<\1\b).)*?<\/\1|\/)>@si';
		$text  = preg_replace( $regex, '', $text );
	}

	if ( $regex && preg_match( $regex, $text ) ) {
		$text = yturbo_strip_tags_with_content( $text, $tags, $invert );
	}

	return $text;
} 
//функция удаления тегов вместе с их контентом end

//функция удаления тегов без их контента begin 
function yturbo_strip_tags_without_content($text, $tags = '') {

    preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
    $tags = array_unique($tags[1]);
   
    if(is_array($tags) AND count($tags) > 0) {
        foreach($tags as $tag)  {
            $text = preg_replace("/<\\/?" . $tag . "(.|\\s)*?>/", '', $text);
        }
    }
    return $text;
} 
//функция удаления тегов без их контента end

//функция принудительной установки header-тега X-Robots-Tag (решение проблемы с SEO-плагинами) begin
function yturbo_index_follow_rss() {
    $yturbo_options = get_option('yturbo_options'); 
    if (!isset($yturbo_options['ytrssname'])) {$yturbo_options['ytrssname']="turbo";update_option('yturbo_options', $yturbo_options);}
    if ( is_feed( $yturbo_options['ytrssname'] ) ) {
        header( 'X-Robots-Tag: index, follow', true );
        header( 'HTTP/1.1 200 OK', true );
    }
}
add_action( 'template_redirect', 'yturbo_index_follow_rss', 999999 );
//функция принудительной установки header-тега X-Robots-Tag (решение проблемы с SEO-плагинами) end

//функция подсчета количества rss-лент и их вывод на странице настроек плагина begin
function yturbo_count_feeds() {
$yturbo_options = get_option('yturbo_options');  

$ytnumber = $yturbo_options['ytnumber']; 
$ytrazb = $yturbo_options['ytrazb'];
$ytrazbnumber = $yturbo_options['ytrazbnumber'];
$yttype = $yturbo_options['yttype']; 
$yttype = explode(",", $yttype);

$tax_query = array();

$ytqueryselect = $yturbo_options['ytqueryselect'];
$yttaxlist = $yturbo_options['yttaxlist']; 
$ytaddtaxlist = $yturbo_options['ytaddtaxlist']; 

if ($ytqueryselect=='Все таксономии, кроме исключенных' && $yttaxlist) {
    $textAr = explode("\n", trim($yttaxlist));
    $textAr = array_filter($textAr, 'trim');
    $tax_query = array( 'relation' => 'AND' );
    foreach ($textAr as $line) {
        $tax = explode(":", $line);
        $taxterm = explode(",", $tax[1]);
        $tax_query[] = array(
            'taxonomy' => $tax[0],
            'field'    => 'id',
            'terms'    => $taxterm,
            'operator' => 'NOT IN',
        );
    } 
}    
if (!$ytaddtaxlist) {$ytaddtaxlist = 'category:10000000';}
if ($ytqueryselect=='Только указанные таксономии' && $ytaddtaxlist) {
    $textAr = explode("\n", trim($ytaddtaxlist));
    $textAr = array_filter($textAr, 'trim');
    $tax_query = array( 'relation' => 'OR' );
    foreach ($textAr as $line) {
        $tax = explode(":", $line);
        $taxterm = explode(",", $tax[1]);
        $tax_query[] = array(
            'taxonomy' => $tax[0],
            'field'    => 'id',
            'terms'    => $taxterm,
            'operator' => 'IN',
        );
    } 
}    

if ($ytnumber > 1000) :
if ($ytrazb == 'enabled') {
$paged = 2;
echo '<p>Вы установили слишком большое общее количество записей в RSS (больше 1000 записей),<br /> 
поэтому чтобы не нагружать базу данных фактическая проверка существования разбитых RSS-лент <br />
не осуществлялась. Проверяйте наличие записей в RSS-лентах самостоятельно.</p>
<p>Всего у вас ' . yturbo_russian_number(ceil($ytnumber / $ytrazbnumber), array(' RSS-лента', ' RSS-ленты', ' RSS-лент')) . ' (в каждой по '.yturbo_russian_number($ytrazbnumber, array(' запись', ' записи', ' записей')). '):</p>';   
echo '<ul>';
if ( get_option('permalink_structure') ) {
    echo '<li>1. <a target="new" href="'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/">'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/</a></li>';
} else {
    echo '<li>1. <a target="new" href="'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'">'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'</a></li>'; 
}
while ($paged <= ceil($ytnumber / $ytrazbnumber) ) {

    if ( get_option('permalink_structure') ) {
            echo '<li>'.$paged.'. <a target="new" href="'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/?paged='.$paged.'">'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/?paged='.$paged.'</a></li>';
        } else {
            echo '<li>'.$paged.'. <a target="new" href="'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'&paged='.$x.'">'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'&paged='.$paged.'</a></li>'; 
        }
    $paged++;
    
    if ($paged == 13) {
        echo '<li>....</li>';
        echo '<p>Слишком много RSS-лент, остальные ленты были скрыты.</p>';
        break; 
    }  
}
echo '</ul>';
} else {
    echo '<p>Всего у вас 1 RSS-лента '  . ' (в ней '.yturbo_russian_number($ytnumber, array(' запись', ' записи', ' записей')). '):</p>';   
echo '<ul>';
if ( get_option('permalink_structure') ) {
    echo '<li>1. <a target="new" href="'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/">'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/</a></li>';
} else {
    echo '<li>1. <a target="new" href="'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'">'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'</a></li>'; 
}
}    
else :

$args = array('ignore_sticky_posts' => 1, 'post_type' => $yttype, 'post_status' => 'publish', 'posts_per_page' => $ytnumber,'tax_query' => $tax_query,
'meta_query' => array('relation' => 'OR', array('key' => 'ytrssenabled_meta_value', 'compare' => 'NOT EXISTS',),
array('key' => 'ytrssenabled_meta_value', 'value' => 'yes', 'compare' => '!=',),));
$query = new WP_Query( $args );

if ($query->post_count < $ytnumber) $ytnumber = $query->post_count;
 
if ($ytrazb == 'enabled' && (ceil($query->post_count / $ytrazbnumber) > 1)) {
    echo '<p>Всего у вас ' . yturbo_russian_number(ceil($query->post_count / $ytrazbnumber), array(' RSS-лента', ' RSS-ленты', ' RSS-лент')) . ' (в каждой по '.yturbo_russian_number($ytrazbnumber, array(' запись', ' записи', ' записей')). '):</p>';   
} else {
    echo '<p>Всего у вас 1 RSS-лента '. ' (в ней '.yturbo_russian_number($ytnumber, array(' запись', ' записи', ' записей')). '):</p>';   
}    

echo '<ul style="margin-bottom: 20px;">';
if ( get_option('permalink_structure') ) {
    echo '<li>1. <a target="new" href="'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/">'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/</a></li>';
} else {
    echo '<li>1. <a target="new" href="'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'">'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'</a></li>'; 
}

if ($ytrazb == 'enabled' && (ceil($query->post_count / $ytrazbnumber) > 1)) {
    for ($x=1; $x++<ceil($query->post_count / $ytrazbnumber);) {
        if ( get_option('permalink_structure') ) {
            echo '<li>'.$x.'. <a target="new" href="'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/?paged='.$x.'">'.get_bloginfo("url").'/feed/'.$yturbo_options['ytrssname'].'/?paged='.$x.'</a></li>';
        } else {
            echo '<li>'.$x.'. <a target="new" href="'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'&paged='.$x.'">'.get_bloginfo("url").'/?feed='.$yturbo_options['ytrssname'].'&paged='.$x.'</a></li>'; 
        }
    if ($x == 12) {
        echo '<li>....</li>';
        echo '<p>Слишком много RSS-лент, остальные ленты были скрыты.</p>';
        break; 
    }    
    }
}

echo '</ul>';

endif;
}    
//функция подсчета количества rss-лент и их вывод на странице настроек плагина end

//функция склонения слов после числа begin
function yturbo_russian_number($number, $titles) {  
    $cases = array (2, 0, 1, 1, 1, 2);  
    return $number . " " . $titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
}  
//функция склонения слов после числа end

//функция добавления рекламы в середину записи begin
function yturbo_add_advert( $content ){
    
    $yturbo_options = get_option('yturbo_options');  
    $ytrazmer = $yturbo_options['ytrazmer'];
    $ytad1 = $yturbo_options['ytad1'];
    $ytad1mesto = $yturbo_options['ytad1mesto'];
    $ytad2 = $yturbo_options['ytad2'];
    $ytad2mesto = $yturbo_options['ytad2mesto'];
    $ytad3 = $yturbo_options['ytad3'];
    $ytad3mesto = $yturbo_options['ytad3mesto'];
    
    $tempcontent = $content;
    $tempcontent = strip_tags($tempcontent);
    $tempcontent = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $tempcontent);

    $num = ceil(mb_strlen($tempcontent) / 2);
    $temp = ceil(mb_strlen($tempcontent) / 10);
    $num = $num - $temp;
    
    global $post;
    $ytad1meta = get_post_meta($post->ID, 'ytad1meta', true); 
    $ytad2meta = get_post_meta($post->ID, 'ytad2meta', true); 
    $ytad3meta = get_post_meta($post->ID, 'ytad3meta', true);       

    if (mb_strlen($tempcontent) < (int)$ytrazmer) {return $content;}
    if ( $ytad1mesto != 'В середине записи' && $ytad2mesto != 'В середине записи' && $ytad3mesto != 'В середине записи') {return $content;}
    
    if ($ytad1 == 'enabled' && $ytad1mesto == 'В середине записи' && $ytad1meta != 'disabled') {
        $ads = PHP_EOL.'<figure data-turbo-ad-id="first_ad_place"></figure>';
    }
    elseif ($ytad2 == 'enabled' && $ytad2mesto == 'В середине записи' && $ytad2meta != 'disabled') {
        $ads = PHP_EOL.'<figure data-turbo-ad-id="second_ad_place"></figure>';
    }    
	elseif ($ytad3 == 'enabled' && $ytad3mesto == 'В середине записи' && $ytad3meta != 'disabled') {
        $ads = PHP_EOL.'<figure data-turbo-ad-id="third_ad_place"></figure>';
    } 
    else {
        return $content;
    }

	return preg_replace('~[^^]{'. $num .'}.*?(?:\r?\n\r?\n|</p>|</figure>|</ul>|</pre>|</table>)~su', "\${0}$ads", trim( $content ), 1);
}
//функция добавления рекламы в середину записи end

//функция удаления всех атрибутов тега img кроме указанных begin
function yturbo_strip_attributes($s, $allowedattr = array()) {
  if (preg_match_all("/<img[^>]*\\s([^>]*)\\/*>/msiU", $s, $res, PREG_SET_ORDER)) {
   foreach ($res as $r) {
     $tag = $r[0];
     $attrs = array();
     preg_match_all("/\\s.*=(['\"]).*\\1/msiU", " " . $r[1], $split, PREG_SET_ORDER);
     foreach ($split as $spl) {
      $attrs[] = $spl[0];
     }
     $newattrs = array();
     foreach ($attrs as $a) {
      $tmp = explode("=", $a);
      if (trim($a) != "" && (!isset($tmp[1]) || (trim($tmp[0]) != "" && !in_array(strtolower(trim($tmp[0])), $allowedattr)))) {

      } else {
          $newattrs[] = $a;
      }
     }
    
     //сортировка чтобы alt был раньше src   
     sort($newattrs);
     reset($newattrs);
     
     $attrs = implode(" ", $newattrs);
     $rpl = str_replace($r[1], $attrs, $tag);
     //заменяем одинарные кавычки на двойные
     $rpl = str_replace("'", "\"", $rpl);   
     //добавляем закрывающий символ / если он отсутствует
     $rpl = str_replace("\">", "\" />", $rpl);
     //добавляем пробел перед закрывающим символом /
     $rpl = str_replace("\"/>", "\" />", $rpl);
     //удаляем двойные пробелы
     $rpl = str_replace("  ", " ", $rpl);
     
     $s = str_replace($tag, $rpl, $s);
   }
  } 

  return $s;
}
//функция удаления всех атрибутов тега img кроме указанных end
