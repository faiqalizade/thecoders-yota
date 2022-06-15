<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Core\View;
use App\Models\Comment;
use App\Models\Customer;

class MainController extends Controller
{
    public function index()
    {
        $comments = Comment::getCommentTree();

        return View::make('home', [
            'comments' => $comments
        ]);
    }

    public function show()
    {
        return View::make('auth.login');
    }


    public function store()
    {
        $comment = new Comment();
        $comment->username = request()->username;
        $comment->text = htmlspecialchars(request()->username);
        $comment->created_at = date("Y-m-d H:i:s");
        $comment->parent_id = request()->parentId ?? 0;
        $comment->save();

        return [
            'success' => true,
            'item' => $comment
        ];
    }

    public function delete($id)
    {
        $comment = Comment::load($id);
        if ($comment->id == 0) {
            http_response_code(404);
            return [
                'success' => false
            ];
        }

        $comment->delete();
        return [
            'success' => true,
        ];
    }

    public function update($id)
    {
        $comment = Comment::load($id);

        if ($comment->id == 0) {
            http_response_code(404);
            return [
                'success' => false
            ];
        }


        $comment->username = request()->username;
        $comment->text = htmlspecialchars(request()->comment);
        $comment->save();

        return [
            'success' => true,
            'item' => $comment
        ];
    }
}
