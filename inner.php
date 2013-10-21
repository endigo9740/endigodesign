	<a name="projectDetails"><!-- anchor --></a>
	<div id="innerHeader">
		<section class="cell">
			<hgroup>
				<h2><?php echo $title; ?></h2>
				<h3><span><?php echo $type; ?></span></h3>
			</hgroup>
			<a href="<?php echo $url; ?>" id="viewLive" class="button" target="_blank">View Live</a>
		</section>
	</div>
	<div id="innerBody">
		<section class="cell">
			<?php
				if(isset($setMobile)){
					echo '<ul id="setMobile">'.$setMobile.'</ul>';
				}
			?>
			<article><?php echo $description; ?></article>
			<?php
				if(isset($setDesktop)){
					echo '<ul id="setDesktop">'.$setDesktop.'</ul>';
				}
			?>
			<a href="#projectDetails" id="returnTop"><span>Back to Top</span></a>
		</section>
	</div>
	