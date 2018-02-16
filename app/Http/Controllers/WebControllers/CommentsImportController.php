<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment as Comment;
use App\Services\ImportServices\CommentsImportService;

class CommentsImportController extends Controller
{
    public function requestNewImport()
    {
        try{
            $api = new CommentsImportService();

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
