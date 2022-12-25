<?php 

namespace Classes;

require ('Classes/Connection.php');

class TaskOne extends Connection 
{

   /**
     * Display a category wise item.
    */
   public function index(){
      $sql = "SELECT Name,ParentcategoryId
      FROM catetory_relations 
      JOIN category ON category.Id=catetory_relations.ParentcategoryId 
      GROUP BY catetory_relations.ParentcategoryId;
      ";
      return  $this->connect->query($sql);
   }

   //parent category item count
   public function parentItemCount($parentid){
      $sql = "SELECT COUNT(item_category_relations.categoryId) as item_count FROM catetory_relations 
      JOIN category ON category.Id=catetory_relations.categoryId 
      LEFT JOIN item_category_relations ON item_category_relations.categoryId=catetory_relations.categoryId 
      WHERE ParentcategoryId=$parentid";
      return $this->connect->query($sql);
     }




}

