<?php 

	if (isset($_POST['action']) && $_POST['action'] == 'connect' && !isset($_POST['hnypt']) ) {
		$return = sj_process_form($_POST['connect']);
	}


	get_header(); 
?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="page-connect page-opening">
			<div class="container">
				<div class="box layout-table">
					<img src="<?php bloginfo('template_directory') ?>/assets/images/watermark.png" height="106" width="106" alt="The Standard | James Island" class="watermark">
					<div class="information col-1 layout-td">
						<h2>get in touch</h2>
						<div class="phones layout-table">
							<div class="row layout-td">
								<p>888.781.7508 / 904.844.3835</p>
								<p class="label">call / text</p>
							</div>
						</div>
						<div class="row">
							<p>9-6 M-F, 10-5 Sat, 1-5 Sun</p>
							<p class="label">office hours</p>
						</div>
						<div class="row">
							<p>215 Promenade Vista St., charleston, sc 29412</p>
							<p class="label">delivery and mail</p>
						</div>
						<div class="row">
							<p><a href="mailto:TheStandard.Gre@lead2lease.com">thestandard@greystar.com</a></p>
							<p class="label">email</p>
						</div>
					</div>
					<div class="col-2 layout-td">
						<h2>socialize</h2>
						<div class="social">
							<!-- <a href="<?php the_field('twitter') ?>" class="ir twitter">Twitter</a> -->
							<a href="<?php the_field('facebook') ?>" target="_blank" class="ir facebook">Facebook</a>
							<!-- <a href="<?php the_field('instagram') ?>" class="ir instagram">Instagram</a> -->
						</div>
						<div class="managed-by">
							<h5>professionally managed by</h5>
							<img src="<?php bloginfo('template_directory') ?>/assets/images/logo-greystar.png" height="24" width="104" alt="">
						</div>
						<div class="portal">
							<a href="https://property.onesite.realpage.com/welcomehome?siteid=3603334" target="_blank" class="button">resident portal</a>
						</div>
					</div>
				</div>
				<div class="box">
					<form method="post" class="contact-form">
						<h2>Inquire</h2>
						<div class="layout-table">
							<div class="contact-form col col-1 layout-td">
								<input type="text" name="connect[name]" class="text" id="contact-name">
								<label for="contact-name">name</label>
								<?php if (isset($return) && isset($return['errors']) && isset($return['errors']['name'])): ?>
									<p class="error"><?php echo $return['errors']['name'] ?></p>
								<?php endif ?>
							</div>
							<div class="contact-form col col-2 layout-td">
								<input type="text" name="connect[email]" class="text" id="contact-email">
								<label for="contact-email">email</label>
								<?php if ( isset($return) && isset($return['errors']) && isset($return['errors']['email'])): ?>
									<p class="error"><?php echo $return['errors']['email'] ?></p>
								<?php endif ?>
							</div>
						</div>
						<textarea name="connect[message]" cols="30" rows="10" class="text textarea" placeholder="message"></textarea>
						<?php if (isset($return) && isset($return['errors']) && isset($return['errors']['message'])): ?>
							<p class="error error-textarea"><?php echo $return['errors']['message'] ?></p>
						<?php endif ?>
						<input type="submit" value="submit" class="button submit">

						<input type="hidden" value="connect" name="action">
						<input type="hidden" value=":)" name="hnypt" id="hnypt">
					</form>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>