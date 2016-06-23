<div class="container">
    <h1>Comments</h1>
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>
        <p>
            <form method="post" action="<?php echo Config::get('URL');?>comment/create">
                <label>Create new comment: </label><input type="text" name="comment_text" />
                <input type="submit" value='post' autocomplete="off"/>
            </form>
        </p>

        <?php if ($this->comment) { ?>
          <table class="comment-table">
            <thead>
              <tr>
                  <td>Id</td>
                  <td>comments</td>
                  <td>delete</td>
                  <td>edit</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach($this->comment as $key => $value) { ?>
                <tr>
                  <td><?= $value->comment_id; ?></td>
                  <td><?= htmlentities($value->comment_text); ?></td>
                  <td><a href="<?= Config::get('URL') . 'comment/delete/' . $value->comment_id; ?>">Delete</a></td>
                  <td><a href="<?= Config::get('URL') . 'comment/edit/' . $value->comment_id; ?>">edit</a></td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
          <div class="vakje" ><p>No comments yet.</p></div>
        <?php } ?>
    </div>
</div>
