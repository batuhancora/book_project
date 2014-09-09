<h1>Books</h1>
   <p><?php echo $this->Html->link('Add Book', array('action' => 'add'), array('class'=>'btn btn-default')); ?></p>

<table class = "table table-striped">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Writer</th>
        <th>Publisher</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($books as $book): ?>
    <tr>
        <td><?php echo $book['Book']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $book['Book']['name'],
                    array('action' => 'view', $book['Book']['id'])
                );
            ?>
        </td>
        <!--BURAYA BAK-->
        <td>
            <?php
                echo $this->Html->link(
                    $book['Writer']['name'],
                    array('action' => 'view', $book['Book']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Html->link(
                    $book['Publisher']['name'],
                    array('action' => 'view', $book['Book']['id'])
                );
            ?>
        </td>
        <!--BURAYA KADAR-->
        <td>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $book['Book']['id'])
                );
            ?>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $book['Book']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>