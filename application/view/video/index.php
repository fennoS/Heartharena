<div class="container">
    <h1>Home</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

		<?php if ($this->videos) { 
		foreach($this->videos as $video) { ?>
      
		<div class="video">
            <h2><?php echo $video->video_title ?></h2>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video->video_url ?>" frameborder="0" allowfullscreen></iframe>

            <br>

			<li <?php if (View::checkForActiveController($filename, "delete")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>video/delete/<?php echo $video->video_id ?>">Delete Video</a>
                <i class="fa fa-trash-o" aria-hidden="true"></i><br><br>
            
            <li <?php if (View::checkForActiveController($filename, "edit")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>video/edit/<?php echo $video->video_id ?>">Edit Title</a>
                <i class="fa fa-pencil" aria-hidden="true"></i><br>
            <br>
            </div>
            </li>
            <hr>
        
		<?php } 
		} else { ?>

    	<div>No videos yet. Create some!</div>

    	<?php } ?> 
        <div class="lol">Wij zijn niet verantwoordelijk voor verlies/misbruik van persoonlijke gegevens</div>
    </div>
</div>
