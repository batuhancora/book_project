<h1>Edit Publisher</h1>
<?php

echo $this->Form->create('Publisher');
echo $this->Form->input('name');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Publisher');

?>