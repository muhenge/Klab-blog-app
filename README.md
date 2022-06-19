# Klab Blog app

> In this assignment, we are going to create a small platform where authors can write and publish articles just like [hackernoon](https://hackernoon.com/),The objective of this project is to master laravel eloquent ORM, building relationships between database tables, and the use of middleware.

## Assignment

Build an application, that allows a user with an account to create articles and publish them, all necessary data must be stored in the database, hint: there is no limitation of database to use, as long as is a relational database like MySql or PostgreSQL.

### User has

- User name
- email

```
  username is required
```

### Article has

- title
- content

  ```
  title
    - is required
    - is <= 75 caracter

  ```
       Content
      - Is required


## Models and relationships

- A user can create many articles, there is no limitation.
- An article can be published by one user.

## Pages to create and UI

- Home page for user Sign up/log in
- User articles list
- User article page
> N.B: Although the front-end is not our main purpose, it must be signficant any library or vanilla css as you want, but not spending to much time on it

## App auth

- Authenticated Users can view all articles,
- Authenticated Users can visit other users' articles

- An unauthenticated user can only visit the home page

- An unauthenticated user attempting to another page is redirected to the home page with an alert.





