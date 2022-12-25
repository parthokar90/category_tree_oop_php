<?php 
namespace Controller;
require ('Controller/TaskOne.php');
$task = new TaskOne;
$task_one = $task->index();
require('common/header.php'); 
?>

  <table class="table table-bordered">
      <tr>
        <th>Category Name</th>
        <th>Total Items</th>
      </tr>
     <?php foreach($task_one as $task){ ?>
        <tr>
            <td><?php echo $task['Name']; ?></td>
            <td><?php echo $task['item_count']; ?></td>
        </tr>
      <?php  } ?>
  </table>
  

<?php require('common/footer.php'); ?>


