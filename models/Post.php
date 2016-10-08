<?php

require_once __DIR__ . '/Model.php';

class Post extends Model {

    protected static $table = 'posts';

    // create function that saves the user id and assings it to user_id table

    public static function getAllPosts()
    {

        self::dbConnect();

        //Learning from the previous method, return all the matching records
        //Create select statement using prepared statements
        $query = 'SELECT * FROM ' . static::$table;

        $stmt = self::$dbc->prepare($query);
        $stmt->execute();

        //Store the resultset in a variable named $result
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        //returning the array of all the postsw
        return $results;
    }

    public static function getNumberOfPosts(){
        self::dbConnect();

        $query = "SELECT * FROM ". static::$table;
        $stmt = self::$dbc->prepare($query);
        $stmt->execute();
        $total = $stmt->rowCount();
        return $total;
    }


    //function will return the posts that have the same id as user
    public static function getPostsForUser($userId){
        self::dbConnect();

        $query = "SELECT * FROM ". static::$table . " WHERE user_id=".$userId;
        $stmt = self::$dbc->prepare($query);
        $stmt->execute();
        $total = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $total;
    }
    //function that takes the category and returns the rows that match that type
    public static function getPostsFiltered($type){
        self::dbConnect();

        $query = "SELECT * FROM ". static::$table . " WHERE category='".$type. "'";
        $stmt = self::$dbc->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;

    }

    // deletes object from db
    public static function deletePost($id)
    {
        self::dbConnect();

        $query = 'DELETE FROM ' . static::$table . ' WHERE id='. $id;

        $stmt = self::$dbc->prepare($query);
        // $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function getFilteredResults($word){
        self::dbConnect();
        $content =[];

        $query = 'SELECT * FROM ' . static::$table . " WHERE description like '%". $word ."%'";
        $stmt = self::$dbc->prepare($query);  
        $stmt->execute();
        $content []= $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = 'SELECT * FROM ' . static::$table . " WHERE name like '%". $word ."%'";
        $stmt = self::$dbc->prepare($query);  
        $stmt->execute();
        $content []= $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = 'SELECT * FROM ' . static::$table . " WHERE category like '%". $word ."%'";
        $stmt = self::$dbc->prepare($query);  
        $stmt->execute();
        $content [] = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $content;
    }

    //sort  by will be either price or date_added and type will be either DESC or ASC
    public static function sortBy($sortBy, $type){
        self::dbConnect();

        //SELECT * FROM posts ORDER BY price desc;
        $query = 'SELECT * FROM ' . static::$table . ' ORDER BY '.$sortBy.' '.$type;
        $stmt = self::$dbc->prepare($query);  
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}

?>