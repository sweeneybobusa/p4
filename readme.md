## P4 Final Project
[Website URL](http://p4sweeneybobusa.gopagoda.com)

[GitHub URL](https://github.com/sweeneybobusa/p4)

## Synopsis

What started out as a grand idea of having step sheets, dance play lists, and a dance calendar ended up being a list of songs based off the foobooks example and a dance glossary. If I had time I would have added a few more tables and foreign keys (like for albums) but as we decided before, at some point you just have to stop.

## Highlights: 
* six tables? word, user, song, artists, tags, and a pivot table (connecting artist and tags with songs)

* authenticated user can see and edit anything. guests can see glossary and the main page/login/signup pages (I hope). Guests "should" be redirected to index as authenticated users should when going to the login or signup pages when they're already signed in. 

* I further explored Foundation and used some of it's button css -- its a bit garish but I have fun experimenting (science!) with it. 

* installed msurguy/honeypot to test user verification (ie, prevent spam user signups). No clue if it works but it's not killed it yet. 

* able to get create, edit, add, and delete working on words and tags, but haven't gotten it to work on songs, so I keep that 'till dancing 2.0

* I kind of crammed a lot of includes and auth tests in the code without commenting, I found if I tried to add white space in the code with the blade commands, it added white space in the resulting code. Sorry if it's a wall of words. 

### challenges and wish lists
* wanted to figure out how to have a tag search but was too fried to get it in for the Final -- I'm assuming it's a matter of building the query. 

* user preferences and modification and delete functions

* how to assign tags to songs

* wanted to figure out how to get ratings

* building view of user favorite songs

* a "shopping cart" for users to gather favorite songs to send to a DJ

* user photo database

* user photos

* ways to link to existing databases (ie, let get a playlist from itunes from a DJ and batch process it. 

* make table for event listings

* make table for line dances based on songs. Instructors and ratings. Djs and playlists and ratings (oh, my!)

* figure out many to many (ie, many songs can have many artists and many albums and many favored users and many... and .. and... 

* tiers of authentication

* moderation

* comments and moderation

Okay, I'm going to see if this blows up pagodabox and maybe get to sleep tonight. It was a great class, learned a lot, was definitely challenged. Thanks for help in the sessions and pass along a thank you to Susan. 

Cheers, 
Bob