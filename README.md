# Building-a-hashtag-system-using-jQuery-and-PHP
Project on a hashtag system built using jQuery and PHP

### Author
[Sa Aaron](https://twitter.com/SaAaron6)

### Requirements
HTML 5, CSS, Bootstrap 5, jQuery, PHP, MySQL

## Features
- Add hashtags into the database
- See posts containing hashtags
- Search hashtags
- See all hashtags

### Installation
- Extract downloaded zip file and move to `htdocs` folder
- Import `hashtags_db.sql` into phpMyAdmin
- Run `localhost/[project's name]` in browser and enjoy! :)

### FAQ
- How does the script works?
The script insert new hashtag(s) into the database, create a trending list with 5 hashtags, select all posts containing hashtag, shows list of all hashtags in the database & search for hashtags using keywords.

- How does the trending hashtags list work?
Selects 5 recent hashtags not older than 7 days in descending order.

- Why does the trending hashtags list shuffles when I create a new post?
This happens because the script updates the `created_on` row for hashtag(s) that already exist (in the database) and it shuffles the list since it selects 5 recent hashtags not older than 7 days using `created_on` row of the hashtag(s) in descending order.

- Can I modify the trending hashtags query from the source code?
Yes you can, go to `assets/includes/live_trending_hashtags.php` & `assets/includes/trending_hashtags.php` and you will be able to modify the query.

- What happens after 7 days if no hashtag(s) was created/used in a post/added into the database
There will be no hashtag(s) in the trending hashtags list.
