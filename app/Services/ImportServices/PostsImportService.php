<?php

namespace App\Services\ImportServices;

use App\Models\Post;

class PostsImportService
{
    public function import()
    {
        $client = new \GuzzleHttp\Client();
        try{
            $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');
        }catch(\GuzzleHttp\Exception\TransferException $e){
            throw new Exception($e->getMessage());
        }
        return $this->validateResponse($response);
    }

    private function validateResponse($response){
        $body = $response->getBody();

        if(!empty($body)){
            $postsArray = json_decode($body);
    
            if(!empty($postsArray[0]->id)){
                return $this->saveNewRecords($postsArray);
            }
            throw new Exception("Broken response!");
        }
        throw new Exception("Empty response!");
    }

    private function saveNewRecords($postsArray){
        foreach ($postsArray as $post) {
            Post::updateOrCreate(
                ['id'=>$post->id],
                [
                    'title'=>$post->title
                    ,'body'=>$post->body
                    ,'user_id'=>$post->userId
                    ,'id'=>$post->id
                ]
            );
        }
        return true;
    }

}