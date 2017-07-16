<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body'
    ];

    /**
     * A news can have many comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the News title.
     *
     * @param  string $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the News body.
     *
     * @param  string $value
     * @return string
     */
    public function getBodyAttribute($value)
    {
        return nl2br($value);
    }

    /**
     * Set the News title.
     *
     * @param  string $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['title'] = ucfirst($value);
        }
    }

    /**
     * Set the News body.
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
     * List all existent news in a collection
     * with eloquent, this method is useless and can be used directly by News::all()
     * I do it here just for the example
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function list()
    {
        return News::all();
    }

    /**
     * Delete a news with the linked comments
     *
     * @param $id
     * @return mixed
     */
    public static function deleteNewsWithComments($news_id)
    {
        Comment::where('news_id', $news_id)->delete();
        return News::find($news_id)->delete();
    }

    /**
     * Add a record in news table
     *
     * @param $title
     * @param $body
     * @return mixed
     */
    public static function add($title, $body)
    {
        return News::create(['title' => $title, 'body' => $body]);
    }

}
