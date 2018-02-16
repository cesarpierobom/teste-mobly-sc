<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post as Post;
use App\Services\ImportServices\PostsImportService;

class PostsImportController extends Controller
{
    public function requestNewImport()
    {
        try{
            $api = new PostsImportService();

            $result = $api->import();
            
            return response()->json([
                'message' => 'Registros importados com sucesso'
            ], 201);
        }catch(Exception $e){
            return response()->json([
                'erro' => $e->getMessage()
            ], 500);
        }
    }
}
