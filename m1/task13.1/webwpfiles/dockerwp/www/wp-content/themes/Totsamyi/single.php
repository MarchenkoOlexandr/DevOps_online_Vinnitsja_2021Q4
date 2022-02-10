<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="main">
	<div itemscope itemtype="http://schema.org/Article" class="container">
			<div id="sap">
			<!--noindex--><!--/noindex-->
			<?php
			$cat_id_1 = get_the_category($post->ID);				
			$GetCatNumberin =  $cat_id_1['0']->cat_ID;
			?>
			<?php
			if (in_category('Прикольные поздравления с днем рождения') ) {
				echo '<!--noindex-->

<!--/noindex-->';
		} elseif (in_category(array('Юбилей' , 'Юбилей 16 лет' , 'Юбилей 18 лет' , 'Юбилей 20 лет' , 'Юбилей 25 лет' , 'Юбилей 30 лет' , 'Юбилей 35 лет', 'Юбилей 40 лет' , 'Юбилей 45 лет' , 'Юбилей 50 лет' , 'Юбилей 55 лет' , 'Юбилей 60 лет' ) ) ) {
			echo '<!--noindex-->

				<!--/noindex-->';
			} elseif (in_category('Именные поздравления') ) {
				echo '<!--noindex-->

<!--/noindex-->';
		} elseif (in_category('Смс любимому и Sms любимой') ) {
			echo '<!--noindex-->

<!--/noindex-->';
	} elseif (in_category('Поздравления с 23 февраля') ) {
		echo '<!--noindex-->

<!--/noindex-->';
} elseif (in_category('Вітання з 23 лютого') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Поздравления с 8 марта' ) ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Привітання з 8 березня' ) ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Поздравления с днем св. Валентина') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Привітання з днем Валентина') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Поздравления с днем рождения') ) {
	echo '<noindex>

</noindex>';
}elseif (in_category('Поздравления с 1 апреля') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('С Пасхой') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('День медработника') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('День ВДВ') ) {
	echo '<!--noindex-->

	<!--/noindex-->';
}elseif (in_category('С днем юриста поздравления') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Поздравления с днем нефтянника') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('День знаний 1 сентября') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Поздравления с Новым годом') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Новорічні привітання') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Поздравления с Рождеством Христовым') ) {
	echo '<!--noindex-->

<!--/noindex-->';
}elseif (in_category('Привітання на Різдво') ) {
	echo '<!--noindex-->

<!--/noindex-->';
} elseif (in_category('Свадебные поздравления') ) {
	echo '<!--noindex-->

		<!--/noindex-->';
	}  elseif (in_category('Весільні вітання') ) {
		echo '<!--noindex-->

<!--/noindex-->';
} elseif (in_category('Пожелания спокойной ночи') ) {
	echo '<!--noindex-->

<!--/noindex-->'; 
} elseif (in_category('Доброе утро любимая Доброе утро любимый') ) {
	echo '<!--noindex-->

<!--/noindex-->'; 
} elseif (in_category('День студента') ) {
	echo '<!--noindex-->

<!--/noindex-->'; 
} elseif (in_category('Троица Святая') ) {
	echo '<!--noindex-->

<!--/noindex-->'; 
}
?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div><div class="mobi"><p align="justify"><strong>Пожелания с днем рождения</strong> на самую знаменательную дату в жизни вашего близкого человека вы с легкостью найдете на нашем сайте. Кроме того, в разных разделах вы найдете <strong>поздравления с днем рождения</strong> как для мужчин, так и для женщин. Ведь именно красивые стихи <strong>с днем рождения мужчине</strong> позволят вам дополнить тот подарок, который вы приготовили на праздник. К подарку <strong>с днем рождения женщине</strong> просто необходимы изысканные и <strong>оригинальные поздравления с днем рождения</strong> потому, что женщины как известно просто таят от красивых стихов и просто хорошо подобранных слов. </p>
			<p align="justify">Для влюбленных в своих парней девушек мы подобрали разнообразные <strong>пожелания любимому</strong> и <strong>прикольные смс любимому</strong>. Поздравить <strong>с днем рождения в стихах</strong> или прозе, подобрать из массы стихов красивые <strong>поздравления на свадьбу</strong> в стихах, а также отправить <strong>смс поздравления с днем рождения</strong> Вам поможет наш поздравительный портал. </p>
			<p align="justify">Молодым папам и мамам представлены <strong>поздравления с рождением сына</strong> или с рождением дочери. Сказать красиво <strong>доброе утро любимая</strong> или подыскать <strong>поздравления подруге</strong> поможет форма поиска сайта.</p>
			</div>
			<?php
			if (in_category('День знаний 1 сентября') ) {
				echo '<!--noindex-->

<!--/noindex-->';
		}
		?>
	</div>
	<noindex><nofollow>
		<div class="post">
			<center>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- pozdravljalka center up 336-280 -->
				<ins class="adsbygoogle"
				style="display:inline-block;width:336px;height:280px"
				data-ad-client="ca-pub-5443626689609005"
				data-ad-slot="7275082656"></ins>
				<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</center></div></nofollow></noindex>
			<noindex><nofollow><div class="post"><center>
				<form action="//3.65.220.230/rezultaty-poiska" id="cse-search-box"><div><input type="hidden" name="cx" value="partner-pub-5443626689609005:mhbawv9vu59" />    <input type="hidden" name="cof" value="FORID:11" />    <input type="hidden" name="ie" value="UTF-8" />    <input type="text" name="q" size="30" />    <input type="submit" name="sa" value="&#x041f;&#x043e;&#x0438;&#x0441;&#x043a;" />  </div></form><script type="text/javascript" src="//www.google.com/cse/brand?form=cse-search-box&amp;lang=ru"></script> 
			</center></div></nofollow></noindex>
			<div class="uzor"></div>
			<!--noindex--><center>
				<?php echo get_category_tags($GetCatNumberin); ?>
			</center><!--/noindex-->
			<div itemprop="headline" class="post"><h1 itemprop="name"><a itemprop="url" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1></div>
			<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
			<script src="//yastatic.net/share2/share.js"></script>
			<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,viber" data-url="<?php the_permalink() ?>"></div>
			<div itemprop="articleSection">Тема &gt;&gt;<?php the_category(', ') ?>&nbsp; <?php edit_post_link('Ред'); ?></div>
			<div itemprop="articleBody" id="singl"><center>
				<?php the_content(''); ?>
<meta itemprop="author" content="POZDRAVLJALKA.RU" />
<meta itemprop="datePublished" content="2018" />
<meta itemprop="dateModified" content="2018" />
<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
<meta itemprop="address" content="POZDRAVLJALKA.RU" />
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
</center></div>
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
  </br></br>
  <div class="post"><noindex><nofollow><center>	
  	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  	<!-- pozdravljalka center down 300-250 -->
  	<ins class="adsbygoogle"
  	style="display:inline-block;width:300px;height:250px"
  	data-ad-client="ca-pub-5443626689609005"
  	data-ad-slot="6954207945"></ins>
  	<script>
  		(adsbygoogle = window.adsbygoogle || []).push({});
  	</script>
  </center></nofollow></noindex> </div>
</br>
<strong>ТАКЖЕ СМОТРИ ДОБРЫЕ ПОЖЕЛАНИЯ</strong>
<?php echo kama_previous_posts_from_tax(); ?>
</br>
<noindex><nofollow><center>
</center></nofollow></noindex>
<div class="mobi">
	<p align="justify">Вам наверняка не известно, что праздновать <em>день рождения</em> стали не так давно, как кажется с первого взгляда и поэтому <em>поздравления с днем рождения</em> также стали популярны не так давно. С давних времен считалось, что рассказывать о дате своего дня рождения считалось плохой приметой из-за того, что согласно предрассудкам в этот день человек уязвим. Лишь близкие люди знали о дате рождения своего друга или родственника.</p>
	<p align="justify">У Вас скорее всего не вызывает сомнения тот факт, что День Рождения – это не только знаменательная дата, но и один из важных праздников в жизни человека, как и свадьба, юбилей, рождение детей, новогодние праздники и т.д. Именно для этих дат мы подобрали и далее будем дополнять нашу коллекцию с поздравлениями. Всем известно насколько приятно получать подарки, которые сопровождаются теплыми словами поздравлений. На нашем сайте с тестами поздравлений вы сможете подобрать соответствующие <em>свадебные поздравления</em> и <em>смс поздравления с днем рождения</em>, а также массу стихов для поздравления подруге или <em>пожелания любимому</em>. Вам скорее всего известно, что существует разница в подборе поздравления <em>с днем рождения женщине</em> или <em>с днем рождения мужчине</em>. <em>Пожелания с днем рождения</em> женщине должно содержать в своем тексте изысканные, любвеобильные и романтические нотки, а вот поздравить мужчину необходимо более прагматично и пожелать практичные вещи. </p>
	<p align="justify"><em>Поздравления на свадьбу в стихах</em> позволят вам красиво поздравить молодоженов и украсить их праздник, а возможно и немного развеселить застоявшуюся кампанию гостей.  Как известно, после свадьбы наступает не менее значимая дата - рождения сына или дочери, а может и обоих. Здесь Вам пригодятся <em>поздравления с рождением сына</em> или с рождением дочери.</p>
	<p align="justify">Одним словом масса стихов и текстов, представленных на нашем портале помогут вам найти <em>оригинальные поздравления с днем рождения</em> и подобрать слова для поздравления подруге или просто сказать доброе утро любимая. Девушки найдут здесь <em>поздравления с днем рождения парню</em> в стихах и прозе. Веселых Вам праздников.</p>
</div>
<?php endwhile;?>								
<p  class="center">Возможно вы не нашли нужного материала. Однако на нашем сайте есть множество поздравлений и пожеланий, которые помогут вам поздравить к примеру с днем рождения любимых и близких вам людей, а также поздравить их с праздниками, как с Новым годом, с 23 февраля и свадьбой, так и с 8 марта или другие поздравления любимым или любимой. Найти необходимый материал вы можете воспользовавшись поиском.</p> 
<noindex><nofollow><center><script type="text/javascript">var RNum = Math.floor(Math.random()*10000); document.write('<scr'+'ipt language="javascript" type="text/javascript" src="//n.adonweb.ru/ladycash/adv-out/?Id=23003&RNum='+RNum+'&Referer='+escape(document.referrer)+'"><'+'/scr'+'ipt>');</script></center></nofollow></noindex>
<?php else : ?>
	<h1>Нет такой темы. Начните с главной пожалуйста. Или воспользуйтесь поиском.</h1>
	<noindex><nofollow><div class="post"><center>
		<form action="//3.65.220.230/rezultaty-poiska" id="cse-search-box">  <div>    <input type="hidden" name="cx" value="partner-pub-5443626689609005:mhbawv9vu59" />    <input type="hidden" name="cof" value="FORID:11" />    <input type="hidden" name="ie" value="UTF-8" />    <input type="text" name="q" size="30" />    <input type="submit" name="sa" value="&#x041f;&#x043e;&#x0438;&#x0441;&#x043a;" />  </div></form><script type="text/javascript" src="//www.google.com/cse/brand?form=cse-search-box&amp;lang=ru"></script> 
	</center></div></nofollow></noindex>
<?php endif; ?>
</div>
</div></div>
<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
<?php get_footer(); ?>