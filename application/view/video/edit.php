<div class="container">
    <h1>Edit Title</h1>

    <div class="box">
        <h2>Edit Title</h2>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <?php if ($this->video) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>video/editSave">
                <label>Edit video: </label>
               
                <input type="hidden" name="video_id" value="<?php echo htmlentities($this->video->video_id); ?>" />
                <input type="text" name="video_url" value="<?php echo htmlentities($this->video->video_url); ?>" />
                <input type="text" name="video_title" value="<?php echo htmlentities($this->video->video_title); ?>" />
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This note does not exist.</p>
        <?php } ?>
    </div>
</div>
