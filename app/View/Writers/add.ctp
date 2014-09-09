<h1>Add Writer</h1>
<?php

echo $this->Form->create('Writer');
echo $this->Form->input('name');
echo $this->Form->input('surname');
echo $this->Form->end('Save Writer');
?>