<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="main">
<div itemscope itemtype="http://schema.org/Article" class="container">
<div class="pgs"></div>
<div id="sap">
<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<div itemprop="headline" class="post"><h1>&#8216;<?php single_cat_title(); ?>&#8217;&#8217;</h1></div>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<div itemprop="headline" class="post"><h2 >Коллекция поздравлений &#8216;<?php single_tag_title(); ?>&#8217;</h2></div>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<div itemprop="headline" class="post"><h2>Коллекция поздравлений <?php the_time('F jS, Y'); ?></h2></div>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<div itemprop="headline" class="post"><h2>Коллекция поздравлений <?php the_time('F, Y'); ?></h2></div>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<div itemprop="headline" class="post"><h2>Коллекция поздравлений <?php the_time('Y'); ?></h2></div>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<div itemprop="headline" class="post"><h2>Коллекция поздравлений </h2></div>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<div itemprop="headline" class="post"><h2>Коллекция поздравлений</h2></div>
<h3 class="pagetitle">Коллекция поздравлений</h3>
<?php } ?>
<noindex><nofollow><div class="post"><center>
<form action="//3.65.220.230/rezultaty-poiska" id="cse-search-box"><div><input type="hidden" name="cx" value="partner-pub-5443626689609005:mhbawv9vu59" /><input type="hidden" name="cof" value="FORID:11" /><input type="hidden" name="ie" value="UTF-8" /><input type="text" name="q" size="30" /><input type="submit" name="sa" value="&#x041f;&#x043e;&#x0438;&#x0441;&#x043a;" /></div></form><script type="text/javascript" src="//www.google.com/cse/brand?form=cse-search-box&amp;lang=ru"></script></center></div></nofollow>
</noindex>
<div><?php include(TEMPLATEPATH."/pagenavi.php"); ?></div>
<div class="archrec">
<?php
$current_category = single_cat_title('', false);
list($num1, $num2, $num3, $num4) = explode(" ", $current_category);
if( is_tag() and $num1=="Юбилей"){ echo '<!--noindex-->

<!--/noindex-->';}
if( is_tag() and $num3=="рождения"){ echo '<!--noindex-->
<!--/noindex-->';}
$cat_id_1 = get_the_category($post->ID);
$GetCatNumberin =$cat_id_1['0']->cat_ID;
$i=single_cat_title("", false); 
if (is_tag() and $num1=="свадебные" or $i=="Свадебные поздравления" ) 
{ echo "<p align=\"justify\"><strong>Свадебные поздравления</strong>, которые мы подобрали в этой рубрике позволят Вам красиво поздравить с днем свадьбы молодоженов или произнести <i>поздравления на свадьбу</i> в момент дарения подарков. Ведь не секрет, что важен не только подарок, но также важна та речь, которую вы произнесете в момент его вручения. <strong>Поздравления на свадьбу</strong>, представленные на страницах сборника помогут вам красиво оформить этот момент и вручить подарок торжественно и со вкусом, так сказать. выбирайте любые из представленных текстов, будь то в прозе или в стихах. Главное, чтобы любое <strong>поздравление на свадьбу</strong> было сказано от всей души.</p>"; 
echo '<!--noindex-->

<!--/noindex-->'; } 
if ($i=="Юбилей" || $i=="Юбилей 16 лет" || $i=="Юбилей 18 лет" || $i=="Юбилей 20 лет" || $i=="Юбилей 25 лет" || $i=="Юбилей 30 лет" || $i=="Юбилей 35 лет" || $i=="Юбилей 40 лет" || $i=="Юбилей 45 лет" || $i=="Юбилей 50 лет" || $i=="Юбилей 55 лет" || $i=="Юбилей 60 лет") 
{ echo "<p align=\"justify\"><strong>Поздравления на юбилей</strong>, которые собраны в этой рубрике помогут Вам красиво и главное от всей души поздравить Ваших близких. Особенно приятно будет вашим знакомым не только получить от Вас подарок, но и услышать сопроводительное <i>поздравление на юбилей</i>.</p><p align=\"justify\"><strong>С юбилеем стихи</strong> или обычные трогательные поздравления в прозе всегда будут оценены юбилярами, если они произнесены искренне и с уважением. Надеемся, что какое-нибудь наше <i>поздравление с юбилеем</i> понравится вам и вы сможете его использовать для того, чтобы выразить все свои чувства по отношению к виновнику торжества и показать насколько вы им дорожите.</p>";
echo '<!--noindex-->

<!--/noindex-->'; }
if ($i=="Поздравления с днем рождения мужчине") 
{ echo '<!--noindex-->

<!--/noindex-->';
echo "<div class=\"mobi\"><p align=\"justify\">Красивые и очень трогательные <strong>поздравления с днем рождения мужчине</strong> вы сможете подыскать в этой рубрике нашего сайта. Все представленные вашему вниманию <i>поздравления с днем рождения мужчине</i> мы подбирали со множества открытых и доступных источников, компоновали их в подборки и выложили здесь. Надеемся, что представленные стихи мужчине с днем рождения понравятся вам и помогут вам красиво поздравить близкого или родного человека. Особенно актуальными будут эти поздравления с днем рождения, если вы подготовили красивый подарок, а вот придумать нужные стихи не можете. Веселого вам праздника и хорошего настроения желаем вам от всей души. Вы также можете воспользоваться голосовыми поздравлениями мужчине с днем рождения и отправить их на мобильный телефон. Аудиопоздравления с днем рождения мужчине будут актуальны в том случае, если вы не имеет возможности лично поздравить папу, брата. дедушку, парня или коллегу по работе.</p></div>";}
if ($i=="Поздравления с днем рождения женщине") 
{ echo '<!--noindex-->

<!--/noindex-->';
echo "<div class=\"mobi\"><p align=\"justify\">Только самые душевные стихи и добрые пожелания в прозе будут оценены прекрасной половиной человечества. Не секрет для любого мужчины, что женщины любят ушами и потому только лучшие <strong>поздравления с днем рождения женщине</strong> мы собрали в этой коллекции. У нас вы сможете найти то поздравление в прозе для женщины, которое она оценит должным образом. Ну а если вы прочитаете ей <strong>поздравления с днем рождения женщине красивые стихами</strong>, то скорее всего получите все 100 баллов по сто бальной шкале оценки. Подберите неторопливо <strong>слова поздравления с днем рождения женщине</strong> и ваши старания будут не напрасны. Не забывайте, что от вашей искренности зависит успех сего мероприятия и возможно ваша судьба. Ведь женщины существа непредсказуемые и очень злопамятны :).</p></div>";}
if ($i=="Привітання з днем народження"){ 
echo "<div class=\"mobi\"><p align=\"justify\"><strong>Побажання з днем народження</strong> на саму знаменну дату в житті вашої близької людини ви з легкістю знайдете на нашому сайті. Крім того, у різних розділах ви знайдете <strong>поздоровлення з днем народження</strong> як для чоловіків, так і для жінок. Адже саме гарні вірші <strong>з днем народження чоловікові </strong> дозволять вам доповнити той подарунок, який ви приготували на свято. До подарунка <strong>з днем народження жінці</strong> просто необхідні вишукані і <strong>оригінальні привітання з днем народження</strong> тому, що жінки як відомо просто приховують від красивих віршів і просто добре підібраних слів. </p>
<p align=\"justify\">Молодим татам і мамам представлені <strong>поздоровлення з народженням сина</strong> або з народженням дочки. Сказати красиво <strong>добрий ранок кохана</strong> або підшукати <strong>вітання подрузі</strong> допоможе форма пошуку сайту.</p>
<p align=\"justify\">Для закоханих у своїх хлопців дівчат ми підібрали різноманітні <strong>побажання улюбленому</strong> та <strong>прикольні смс коханій</strong>. Привітати <strong>з днем народження у віршах</strong> чи прозі, підібрати з маси віршів красиві <strong>привітання на весілля</strong> у віршах, а також відправити смс <strong>поздоровлення з днем народження</strong> Вам допоможе наш вітальний портал. </p></div>";}
if ($i=="Прикольные поздравления с днем рождения") 
{ echo '<!--noindex-->

<!--/noindex-->';}
if ($i=="Поздравления с днем рождения") {
echo '<!--noindex-->

<!--/noindex-->'; }
if ( is_tag() and $num1=="Именные" or $i=="Именные поздравления") 
{echo '<!--noindex-->

<!--/noindex-->'; }
if ( is_tag() and $num1=="извинения" or $i=="Смс любимому и Sms любимой") 
{echo '<!--noindex-->

<!--/noindex-->'; } 
if ($i=="Поздравления с 23 февраля" || $i=="Вітання з 23 лютого") {
echo '<!--noindex-->

<!--/noindex-->'; } 
if ($i=="Поздравления с 8 марта" || $i=="Привітання з 8 березня") 
{ echo '<!--noindex-->

<!--/noindex-->'; } 
if ($i=="Поздравления с днем св. Валентина") {
echo '<!--noindex-->

<!--/noindex-->'; }
if ($i=="Привітання з днем Валентина") {
echo '<!--noindex-->

<!--/noindex-->';}
if ($i=="Поздравления с 1 апреля") 
{echo '<!--noindex-->

<!--/noindex-->';}
if ($i=="С Пасхой") {
echo '<!--noindex-->

<!--/noindex-->';}
if ( is_tag() and $num2=="медсестре" or $i=="День медработника") {
echo '<!--noindex-->

<!--/noindex-->';}
if ($i=="День ВДВ") {
	echo '<!--noindex-->

<!--/noindex-->';}
if ($i=="Поздравления с днем нефтянника") {
echo '<!--noindex-->

<!--/noindex-->';}
if ( is_tag() and $num1=="скучаю" or $i=="Доброе утро любимая Доброе утро любимый") {
echo '<!--noindex-->

<!--/noindex-->'; }
if ( is_tag() and $num2=="выздоровления" or$i=="Пожелания"){
echo '<!--noindex-->

<!--/noindex-->';} 
if ($i=="Пожелания спокойной ночи") {
echo '<!--noindex-->

<!--/noindex-->'; } 
if ($i=="День знаний 1 сентября") {
echo '<!--noindex-->

<!--/noindex-->';}
if ($i=="Поздравления с Новым годом" or $i=="Новорічні привітання"){
echo '<!--noindex-->

<!--/noindex-->';}
if ($i=="Поздравления с Рождеством Христовым" or $i=="Привітання на Різдво") {
echo '<!--noindex-->

<!--/noindex-->';
}if ($i=="Весільні вітання") {
echo '<!--noindex-->

<!--/noindex-->';} 
if ($i=="С днем юриста поздравления") {
echo '<!--noindex-->

<!--/noindex-->';} 
if ($i=="Троица Святая") {
echo '<!--noindex-->

<!--/noindex-->';} 
if ($i=="День студента") {
echo '<!--noindex-->

<!--/noindex-->';}
?></div>
<!--noindex--><center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- pozdravljalka center up 336-280 -->
<ins class="adsbygoogle"
style="display:inline-block;width:336px;height:280px"
data-ad-client="ca-pub-5443626689609005"
data-ad-slot="7275082656"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php echo get_category_tags($GetCatNumberin); ?>
</center><!--/noindex-->
<?php while (have_posts()) : the_post(); ?>
<div class="uzor"></div>
<div itemprop="headline" class="post"><h2 itemprop="name"><a itemprop="url" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2></div>
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,viber" data-url="<?php the_permalink() ?>"></div>
<div itemprop="articleSection">Тема &gt;&gt;<?php the_category(', ') ?>&nbsp;<?php edit_post_link('Ред.'); ?></div>
<div itemprop="articleBody" id="postcat">
<center><?php the_content(''); ?></center></div>
<button type="button" class="btn" data-clipboard-action="copy" data-clipboard-target="#singl1">Скопировать</button>
<script>
var cb = new Clipboard('.btn'); // класс кнопки
cb.on('success', function(e){
// уведомление, можно настроить своё
// alert("Скопировано в буфер обмена");
// выделение скопированного текста на 2 секунды
window.setTimeout(function(){e.clearSelection();}, 2000);
});
</script>
<p align="right"><a itemprop="url" href="<?php the_permalink() ?>">Читать поздравления полностью &raquo;</a></p>
<meta itemprop="author" content="POZDRAVLJALKA.RU" />
<meta itemprop="datePublished" content="2018" />
<meta itemprop="dateModified" content="2018" />
<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
<meta itemprop="address" content="3.65.220.230" />
<meta itemprop="telephone" content="POZDRAVLJALKA.RU" />
<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
<link itemprop="contentUrl" href="http://3.65.220.230/logos.png" />
<link itemprop="url" href="http://3.65.220.230/logos.png" />
</div>
<meta itemprop="name" content="POZDRAVLJALKA.RU" />
</div>
<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
<link itemprop="contentUrl" href="http://3.65.220.230/logos.png" />
<link itemprop="url" href="http://3.65.220.230/logos.png" />
</div>
<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="http://3.65.220.230/logos.png"/>
<?php endwhile; ?>
<div><?php include(TEMPLATEPATH."/pagenavi.php"); ?></div>
<noindex><nofollow><center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- pozdravljalka center down 300-250 -->
<ins class="adsbygoogle"
style="display:inline-block;width:300px;height:250px"
data-ad-client="ca-pub-5443626689609005"
data-ad-slot="6954207945"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center></nofollow></noindex>
<?php echo kama_previous_posts_from_tax(); ?>
<div class="mobi"><p align="justify">По прикметам святкувати <em>день народження</em> вважалося поганою прикметою, тому і <em><a href="http://3.65.220.230/privitannya-z-dnem-narodzhennya" title="поздоровлення з днем народження" target="_blank">поздоровлення з днем народження</a></em> не були такими популярними як зараз. На теперішній час в нашому збірнику масса віршованих поздоровлень на будь-який смак і для самих вимогливих відвідувачів.</p>
<p align="justify">В той час коли двое закоханих вірішили стати подружжям вам знадобляться <em><a href="http://3.65.220.230/vesilni-vitannya" title="весільні поздоровлення" target="_blank">весільні поздоровлення</a></em>. Саме для цього свята варто підготувати гарні подарунки та привітати молодят. Тому що незабаром вам доведеться готувати <em>смс поздоровлення з днем народження</em> сина або донці і готувати нові подарунки. А от якщо дівчина ще не отримала пропозицію, тоді <em>побажання коханому</em> будуть доречними, тому що привітати чоловіка з різними святами є гарною звичкою. Чоловіки ж не повинні забувати що жінки полюбляють компліменти і тому <em>з днем народження жінці</em> у віршах привітання будуть не менш зайвими. В той день коли ваш коханий святкує момент свого приходу на світ цей вам будуть потрібні <em>з днем народження чоловікові</em> вітання. <em>Побажання з днем народження</em> ніколи не втрачають своєї актуальності і багато відвідувачів перебувають в стану пошуку гарних текстів для поздоровлень.</p></div>
<?php else : ?>
<h2 class="center">Поздравления и пожелания - Привітання та побажання</h2>
<div class="post_text"><p>Возможно на нашем сайте "Поздравления и пожедания - Побажання та привітання" вы не нашли нужного материала. Однако на нашем сайте есть множество поздравлений и пожеланий, которые помогут вам поздравить к примеру с днем рождения любимых и близких вам людей, а также поздравить их с праздниками, как с Новым годом, с 23 февраля и свадьбой, так и с 8 марта или другие поздравления любимым или любимой. Найти необходимый материал вы можете воспользовавшись поиском</p>
<noindex><nofollow><div class="post_text"><center>
<form action="//3.65.220.230/rezultaty-poiska" id="cse-search-box"><div><input type="hidden" name="cx" value="partner-pub-5443626689609005:mhbawv9vu59" /><input type="hidden" name="cof" value="FORID:11" /><input type="hidden" name="ie" value="UTF-8" /><input type="text" name="q" size="30" /><input type="submit" name="sa" value="&#x041f;&#x043e;&#x0438;&#x0441;&#x043a;" /></div></form><script type="text/javascript" src="//www.google.com/cse/brand?form=cse-search-box&amp;lang=ru"></script> 
</center></div></nofollow></noindex>
<h3>Ничего не нашлось. Воспользуйтесь поиском или начните с главной.</h3>
</div>
<?php endif; ?>
</div></div></div>
<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
<noindex><nofollow></nofollow></noindex>
<?php get_footer(); ?>