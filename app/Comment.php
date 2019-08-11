<?php

namespace ARTICLES;

use ARTICLES\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['article_id', 'user_id', 'grade', 'comment_message', 'image'];

    public function user(){
        return $this->hasOne('\ARTICLES\User', 'id', 'user_id');
    }

    public function article(){
        return $this->belongsTo('\ARTICLE\Article', 'id', 'article_id');
    }

    public static function addComment($request){
        
        $comment = new Comment();
        $comment->fill($request->post());
        
        if( array_key_exists('user_id', $request->post()) === false ){

            $validator = Validator::make($request->post(), [
                'article_id' => ['required', 'integer'],
                'is_registered' => ['required', Rule::in([0]) ],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'grade' => ['required', Rule::in([1, 2, 3, 4, 5])],
                'comment_message' => ['string', 'max:500', 'nullable'],
            ],[
                'name.required' => 'Please, enter your name.',
                'email.required' => 'Please, provide your email.',
                'email.unique' => 'You commented the article already as guest. Please, register or login.',
                'grade.required' => 'Please, give your grade.',
                'comment_message.max' => 'Max length of message is 500 symbols.',
            ]);

            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }

            $guest = User::create([
                'is_registered' => $request->post()['is_registered'],
                'name' => $request->post()['name'],
                'email' => $request->post()['email'],
            ]);
            
            $comment->user_id = $guest->id;
            
        }
        else{
            $validator = Validator::make($request->post(), [
                'article_id' => ['required', 'integer'],
                'user_id' => ['required', 'integer'],
                'grade' => ['required', Rule::in([1, 2, 3, 4, 5])],
                'comment_message' => ['string', 'max:500', 'nullable'],
                'image' => ['image'],
            ],[
                'grade.required' => 'Please, give your grade.',
                'comment_message.max' => 'Max length of message is 500 symbols.',
            ]);

            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
        }

        if ( $request->hasFile('image') === true ){
            $file = $request->file('image');
            Storage::disk('public')->put('images/users/'. $comment->user->name . '/comments//' . $file->getClientOriginalName(), fopen($file->getRealPath(), 'r+'));
            $comment->image = $file->getClientOriginalName();
        }
        
        $comment->save();
        return $article_id = $comment->article_id;
    }
}
