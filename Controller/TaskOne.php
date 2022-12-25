<?php 

namespace Controller;

require ('Controller/Connection.php');

class TaskOne extends Connection 
{

    /**
     * Display a category wise item.
     */
   public function index(){
      $sql = "SELECT Name, COUNT(*) as item_count 
      FROM category 
      JOIN item_category_relations ON item_category_relations.categoryId=category.Id 
      GROUP BY category.id
      ORDER BY COUNT(*) DESC;
      ";
      return  $this->connect->query($sql);
   }


}

