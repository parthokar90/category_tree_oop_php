<?php 

namespace Classes;

require ('Classes/Connection.php');

class TaskTwo extends Connection 
{

    /**
     * Display a category wise item.
    */
   public function parentCategory(){
      $sql = "SELECT Name,ParentcategoryId
      FROM catetory_relations 
      JOIN category ON category.Id=catetory_relations.ParentcategoryId 
      GROUP BY catetory_relations.ParentcategoryId";
      return $this->connect->query($sql);
   }

   /**
     * Display a sub category wise item.
   */
   public function subCategory($parentid){
       $sql = "SELECT COUNT(item_category_relations.categoryId) as item_count,Name,ParentcategoryId,catetory_relations.categoryId FROM catetory_relations JOIN category ON category.Id=catetory_relations.categoryId LEFT JOIN item_category_relations ON item_category_relations.categoryId=catetory_relations.categoryId WHERE ParentcategoryId=$parentid GROUP BY catetory_relations.categoryId ORDER BY COUNT(item_category_relations.categoryId) DESC";
       return $this->connect->query($sql);
    }

   /**
     * Display parent category item count.
    */
   public function parentItemCount($parentid){
    $sql = "SELECT COUNT(item_category_relations.categoryId) as item_count FROM catetory_relations 
    JOIN category ON category.Id=catetory_relations.categoryId 
    LEFT JOIN item_category_relations ON item_category_relations.categoryId=catetory_relations.categoryId 
    WHERE ParentcategoryId=$parentid";
    return $this->connect->query($sql);
   }

}

