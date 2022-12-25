<?php 
namespace Classes;
require('common/header.php'); 
require ('Classes/TaskTwo.php');
$category = new TaskTwo;
$parentCat = $category->parentCategory();
?>


<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);  
}



.active {
  display: block;
}
</style>


<ul id="myUL">
  <?php foreach($parentCat as $cat) { ?>  
  <li>

   <!-- parent category name with item count -->
    <span class="caret">
        <?php echo $cat['Name']; ?>
              <?php foreach($category->parentItemCount($cat['ParentcategoryId']) as $item ){ ?>
                  (<?php echo $item['item_count']; ?>)
              <?php } ?>
    </span>

    <!-- sub category with item count -->
    <ul class="nested">
      <?php foreach($category->subCategory($cat['ParentcategoryId']) as $sub){ ?>  
           <li><?php echo $sub['Name']; ?>(<?php echo $sub['item_count']; ?>)</li>
      <?php } ?>
    </ul>

    <?php } ?>

  </li>
</ul>
<script>
var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}
</script>

<?php require('common/footer.php'); ?>


