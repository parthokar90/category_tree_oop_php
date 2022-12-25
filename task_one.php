<?php 
namespace Classes;
require ('Classes/TaskOne.php');
$task = new TaskOne;
$task_one = $task->index();
require('common/header.php'); 
?>

  <table class="table table-bordered">
      <tr>
        <th>Category Name</th>
        <th>Total Items</th>
      </tr>
     <?php foreach($task_one as $category){ ?>
        <tr>
            <td><?php echo $category['Name']; ?></td>
            <td>
              <?php foreach($task->parentItemCount($category['ParentcategoryId']) as $item ){ ?>
                  <?php echo $item['item_count']; ?>
                <?php } ?>
            </td>
        </tr>
      <?php  } ?>
  </table>
  

<?php require('common/footer.php'); ?>


