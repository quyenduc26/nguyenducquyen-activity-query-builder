<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //Using MYSQL
    public function updatePostMySQL($title, $description )
    {
        $id = 51;
        $query = "UPDATE posts SET title = ?, description = ? WHERE id = ?";
        DB::statement($query, [$title, $description, $id]);
        return response()->json(['message' => 'Post updated successfully']);
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
        return response()->json($post);
    }

    //Using PDO
    public function updatePostUsingPDO( $title, $description )
    {
        $id = 51;
        $pdo = DB::connection()->getPdo();
        $statement = $pdo->prepare("UPDATE posts SET title = ?, description = ? WHERE id = ?");
        $statement->execute([$title, $description, $id]);
        return response()->json(['message' => 'Post updated successfully']);
    }

    public function deletePostUsingPDO()
    {
        $id = 51;
        $pdo = DB::connection()->getPdo();
        $statement = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $statement->execute([$id]);
        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function getPostUsingPDO()
    {
        $id = 51;
        $pdo = DB::connection()->getPdo();
        $statement = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $statement->execute([$id]);
        $post = $statement->fetch(PDO::FETCH_ASSOC);

        return response()->json($post);
    }
}
