<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //Using MySQL
    public function updatePostMySQL($title, $description )
    {
        $id = 51;
        $query = "UPDATE posts SET title = ?, description = ? WHERE id = ?";
        DB::statement($query, [$title, $description, $id]);
        $query = "SELECT * FROM posts WHERE id = ?";
        $post = DB::select($query, [$id]);
        return dd($post);
    }

    public function deletePostMySQL()
    {
        $id = 51;
        $query = "DELETE FROM posts WHERE id = ?";
        DB::statement($query, [$id]);
        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function getPostMySQL()
    {
        $id = 51;
        $query = "SELECT * FROM posts WHERE id = ?";
        $post = DB::select($query, [$id]);
        return dd($post);
    }

    
    //Using PDO
    public function updatePostPDO( $title, $description )
    {
        $id = 51;
        $pdo = DB::connection()->getPdo();
        $statement = $pdo->prepare("UPDATE posts SET title = ?, description = ? WHERE id = ?");
        $statement->execute([$title, $description, $id]);
        return response()->json(['message' => 'Post title and description have been changed to "'.$title.'" and "'.$description.'"']);
    }

    public function deletePostPDO()
    {
        $id = 51;
        $pdo = DB::connection()->getPdo();
        $statement = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $statement->execute([$id]);
        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function getPostPDO()
    {
        $id = 51;
        $pdo = DB::connection()->getPdo();
        $statement = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $statement->execute([$id]);
        $post = $statement->fetch(PDO::FETCH_ASSOC);

        return response()->json($post);
    }
}
