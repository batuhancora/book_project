<h1>Writers</h1>
   <p><?php echo $this->Html->link('Add Writer', array('action' => 'add'), array('class'=>'btn btn-default')); ?></p>

<table class = "table table-striped">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($writers as $writer): ?>
    <tr>
        <td><?php echo $writer['Writer']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $writer['Writer']['name'],
                    array('action' => 'view', $writer['Writer']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $this->Html->link($writer['Writer']['surname'],
            array('controller' => 'writers', 'action' => 'view', $writer['Writer']['id'])); ?>
        </td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $writer['Writer']['id'])
                );
            ?>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $writer['Writer']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>