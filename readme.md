# PHP test

## 1. Installation

  - create an empty database named "phptest" on your MySQL server
  - import the dbdump.sql in the "phptest" database
  - put your MySQL server credentials in the constructor of DB class
  - you can test the demo script in your shell: "php index.php"

## 2. Expectations

This simple application works, but with very old-style monolithic codebase, so do anything you want with it, to make it:

  - easier to work with
  - more maintainable

## 3. Methods

#### Comment
List all existent comments:
- Comment::all() (if you want to use eloquent)
- Comment::list()

Delete a comment:
- Comment::find($comment_id)->delete() (if you want to use eloquent)
- Comment::deleteComment($comment_id)

Add a record in comments table:
- Comment::create(['body' => '', 'news_id' => '']) (if you want to use eloquent)
- Comment::add($body, $news_id)

#### News
List all existent news:
- News::all() (if you want to use eloquent)
- News::list()

Delete a news with the linked comments:
- News::deleteNewsWithComments($news_id)

Add a record in news table:
- News::create(['title' => '', 'body' => '']); (if you want to use eloquent)
- News::add($title, $body)


