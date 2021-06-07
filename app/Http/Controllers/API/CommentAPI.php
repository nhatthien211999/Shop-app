<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Comment;
class CommentAPI extends Controller
{
    public function createComment(Request $request)
    {
        //dd($request["productID"]);
        $cmt= Comment::create([
            'product_id'=>$request["productID"],
            'comment_id' =>$request["parent"],
           'user_id'=>$request["userID"],
           'comment'=>$request["content"],
        ]);

        $cmt->save();
        $res=$cmt->isClean();
        return response()->json(array("res"=>$res),200);


    }




}
