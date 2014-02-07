<h2>Add post</h2>

<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('required' => false));
echo $this->Form->input('body', array('rows'=>3));
echo $this->Form->end('Save Post');
