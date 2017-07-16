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
     * Get the comment's body.
     *
     * @param  string $value
     * @return string
     */
    public function getBodyAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the comment's news_id.
     *
     * @param  string $value
     * @return string
     */
    public function getNewsIdAttribute($value)
    {
        return $value;
    }

    /**
     * Set the comment's body.
     *
     * @param  string $value
     * @return void
     */
    public function setBodyAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['body'] = ucfirst($value);
        }
    }

    /**
     * Set the comment's news_id.
     *
     * @param  string $value
     * @return void
     */
    public function setNewsIdAttribute($value)
    {
        if ($value !== null && is_int($value)) {
            $this->attributes['news_id'] = $value;
        }
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
     * Add a record in comments table
     *
     * @param $body
     * @param $news_id
     * @return mixed
     */
    public static function add($body, $news_id)
    {
        return Comment::create(['body' => $body, 'news_id' => $news_id]);
    }
}
