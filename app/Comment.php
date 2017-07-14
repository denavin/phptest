<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'news_id'
    ];


    /**
     * A comment is owned by zero/one or many news
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news()
    {
        return $this->belongsTo('App\News');
    }

    /**
     * List all existent comments in a collection
     * with eloquent, this method is useless and can be used directly by Comment::all()
     * I do it here just for the example
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function list()
    {
        return Comment::all();
    }

    /**
     * Delete a comment
     * with eloquent, this method is useless and can be used directly by Comment::find($id)->delete()
     * I do it here just for the example
     *
     * @param $id
     * @return mixed
     */
    public static function deleteComment($comment_id)
    {
        return Comment::find($comment_id)->delete();
    }

    /**
     * Add a record in news table
     *
     * @param $title
     * @param $body
     * @return mixed
     */
    public static function add($body, $news_id)
    {
        return Comment::create(['body' => $body, 'news_id' => $news_id]);
    }
}
