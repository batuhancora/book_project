<h1>Add Book</h1>
<?php

echo $this->Form->create('Book');
echo $this->Form->input('name');
echo $this->Form->input('writer_id');
echo $this->Form->input('publisher_id');
echo $this->Form->end('Save Writer');
?>