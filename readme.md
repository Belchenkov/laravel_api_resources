## Laravel 5.7 API Using Resources

Get all articles (get method)
>  http://127.0.0.1/api/articles

Get single article (get method)
> http://127.0.0.1:8002/api/article/id

Create article (post method, headers: ["Content-Type":"application/json"], params: {title, body})
> http://127.0.0.1:8002/api/article

Update article (put method, headers: ["Content-Type":"application/json"], params: {id, title, body})
> http://127.0.0.1:8002/api/article

Delete single article (delete method)
> http://127.0.0.1:8002/api/article/id