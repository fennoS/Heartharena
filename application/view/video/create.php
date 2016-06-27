<div class="container">
    <h1>Add Video's</h1>
    <div class="box">

       
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        
        <h2>Upload vid's here<h2> 
		        
        <p>

       		<img src="<?php echo Config::get('URL'); ?>pictures/uitleg.PNG">
        
          <form action="<?php echo Config::get('URL'); ?>video/create_action" method="post">
              <input type="text" name="video_title" placeholder="Type title here."> 
                <br>
                <br>
                <input type="text" name="video_url" placeholder="Post link here.">
            	<input type="submit" value="Submit video" name="submit">
          </form>
        
          
        </p>

    </div>
</div>