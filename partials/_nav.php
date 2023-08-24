<header class="c-header" data-controller="nav">
	<nav class="c-nav">
		<div class="c-container c-nav__container">
			<div class="c-nav__logo">
				<a href="<?php echo get_site_url();?>">
					Elena Canciani
				</a>
			</div>
			<?php
				wp_nav_menu (
					array (
						'theme_location' => 'main-menu',
						'container' => false,
						'menu_class' => 'c-nav__links'
					)
				);
			?>
		</div>
	</nav>
	<div class="c-mobile-nav">
		<div class="c-container c-nav__container">
		<div class="c-mobile-nav__logo">
			<a href="<?php echo get_site_url();?>">
				Elena Canciani
			</a>
		</div>
		<div class="c-mobile-nav__container">
			<?php
				wp_nav_menu (
					array (
						'theme_location' => 'main-menu',
						'container' => false,
						'menu_class' => 'c-mobile-nav__links'
					)
				);
			?>
		</div>
		<div class="c-nav-toggle js-nav-toggle" data-action="click->nav#toggleNav"><div class="c-nav-toggle__container"> <span></span> <span></span><span></span></div></div>
	</div>
</header>
