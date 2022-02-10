	<?php get_header(); ?>	
	<?php get_sidebar(); ?>
	<div class="main">
		<div itemscope itemtype="http://schema.org/Article" class="container">
			<div class="pgs"></div>
			<div id="sap">
				<noindex><nofollow><div class="post"><center>
					<form action="//3.65.220.230/rezultaty-poiska" id="cse-search-box">
						<div>
							<input type="hidden" name="cx" value="partner-pub-5443626689609005:mhbawv9vu59" />
							<input type="hidden" name="cof" value="FORID:10" />
							<input type="hidden" name="ie" value="UTF-8" />
							<input type="text" name="q" size="30" />
							<input type="submit" name="sa" value="&#x041f;&#x043e;&#x0438;&#x0441;&#x043a;" />
						</div>
					</form>
					<script type="text/javascript" src="//www.google.com.ua/coop/cse/brand?form=cse-search-box&amp;lang=ru"></script>
				</center>
				<br/><br/><div class="postrec"></div>
				<?php if (is_page('Поздравления с днем пограничника')) { 
					echo '<!--noindex-->

<!--/noindex-->';
			} else if (is_page('Поздравления с днем работников морского и речного флота')) { 
				echo '<!--noindex-->

<!--/noindex-->';
		} else if (is_page('С днем ГАИ поздравления ГИБДД')) { 
			echo '<!--noindex-->

<!--/noindex-->';
	} else if (is_page('С днем торговли поздравления и с днем работников ЖКХ')) { 
		echo '<!--noindex-->

<!--/noindex-->';
}else if (is_page('Поздравления с днем шахтера в стихах')) { 
	echo '<!--noindex-->

<!--/noindex-->';
}else if (is_page('Поздравления с днем танкиста')) { 
	echo '<!--noindex-->

<!--/noindex-->';
}
?>
<?php if (is_front_page()) { 
	echo '<!--noindex-->

<!--/noindex-->';
} else { 
	echo '<div class="mobi"><center><!--noindex-->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- pozdravljalka center up 336-280 -->
	<ins class="adsbygoogle"
	style="display:inline-block;width:336px;height:280px"
	data-ad-client="ca-pub-5443626689609005"
	data-ad-slot="7275082656"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	<!--/noindex--></div>
	<!--noindex-->

<!--/noindex-->
</center>';
}
?>
</div></nofollow></noindex>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div itemprop="headline" class="post"><h1 itemprop="name"><a itemprop="url" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1></div>
		<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,viber" data-url="<?php the_permalink() ?>"></div>
		<div><?php edit_post_link('Редактировать'); ?></div>
		<div itemprop="articleBody">
			<?php the_content('<p class="serif">Читать поздравления &raquo;</p>'); ?>
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
			<div class="postrec"><?php if (is_page('Открытки с Новым годом')) { 
				echo '<!--noindex-->
				<a itemprop="url" href="//monetti.ru/click/42469"><img height="60" width="468" src="//monetti.ru/view/42469" alt="Поздравления с Новым Годом" /></a>  
				<!--/noindex-->';
			}
			?></div></div>
			<?php wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<noindex><nofollow>
				<div><?php if (is_front_page()) { 
					echo 'Подберите красивое поздравление или отправьте открытку на мобильный и сделайте приятный сюрприз дорогому человеку.
					<!--noindex--><center><iframe src="https://monetti.ru/view/46493?url=&linkType=0" frameborder="0" marginheight="0" marginwidth="0" width="240" height="400"></iframe><center><!--/noindex-->';
					$args = array(
						'numberposts' => 1,
						'post_status' => 'publish',
					); 

					$result = wp_get_recent_posts($args);
					echo '<strong>СЕГОДНЯ ДОБАВЛЕНЫ ДОБРЫЕ ПОЖЕЛАНИЯ:</strong><br />';
					foreach( $result as $p ){ 
						?>
						<a itemprop="url" href="<?php echo get_permalink($p['ID']) ?>"><?php echo $p['post_title'] ?></a><br /><?php echo $p['post_content'] ?><br />    
						<?php 
					} 
				} else { 
					echo '';
				}
				?>
			</div>
			<noindex><center>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- pozdravljalka center down 300-250 -->
				<ins class="adsbygoogle"
				style="display:inline-block;width:300px;height:250px"
				data-ad-client="ca-pub-5443626689609005"
				data-ad-slot="6954207945"></ins>
				<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</noindex></center> 
		</nofollow></noindex>
	<?php endwhile; ?>
<?php else : ?>
	<h2 align="center">Не найдено</h2>			
<?php endif; ?>
</div>
</div></div>
<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
<?php get_footer(); ?>