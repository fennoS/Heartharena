<div class="container">
    <h1></h1>

    <div class="box">
        <h2>Edit your comment</h2>

        <?php $this->renderFeedbackMessages(); ?>

        <?php if ($this->comment) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>comment/editSave">
         <label>Change text of comment: </label>
            <input type="hidden" name="comment_id" value="<?php echo htmlentities($this->comment->comment_id); ?>" />
        <input type="text" name="comment_text" value="<?php echo htmlentities($this->comment->comment_text); ?>" />
            <input type="submit" value='Change' />
            </form>
        

        <?php } else { ?>
            <p>Invalid.</p>
        <?php } ?>
    </div>
</div>
