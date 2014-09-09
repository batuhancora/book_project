<h1>Publishers</h1>
   <p><?php echo $this->Html->link('Add Publisher', array('action' => 'add'), array('class'=>'btn btn-default')); ?></p>

<table class = "table table-striped">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($publishers as $publisher): ?>
    <tr>
        <td><?php echo $publisher['Publisher']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $publisher['Publisher']['name'],
                    array('action' => 'view', $publisher['Publisher']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $publisher['Publisher']['id'])
                );
            ?>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $publisher['Publisher']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>