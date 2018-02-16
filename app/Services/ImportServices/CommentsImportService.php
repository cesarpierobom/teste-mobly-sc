<?php

namespace App\Services\ImportServices;

use App\Models\Comment;

class CommentsImportService
{
    public function import()
    {
        $client = new \GuzzleHttp\Client();
        try{
            $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/comments');
        }catch(\GuzzleHttp\Exception\TransferException $e){
            throw new Exception($e->getMessage());
        }
        return $this->validateResponse($response);
    }

    private function validateResponse($response){
        $body = $response->getBody();

        if(!empty($body)){
            $commentsArray = json_decode($body);
    
            if(!empty($commentsArray[0]->id)){
                return $this->saveNewRecords($commentsArray);
            }
            throw new Exception("Broken response!");
        }
        throw new Exception("Empty response!");
    }

    private function saveNewRecords($commentsArray){
        foreach ($commentsArray as $comment) {
            Comment::updateOrCreate(
                ['id'=>$comment->id],
                [
                    'post_id'=>$comment->postId
                    ,'body'=>$comment->body
                    ,'name'=>$comment->name
                    ,'id'=>$comment->id
                    ,'email'=>$comment->email
                ]
            );
        }
        return true;
    }

}