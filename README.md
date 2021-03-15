<h1>The Completed API Test</h1>

<h2 style="text-decoration: underline"> Below are the endpoints </h2>

<h3>Categories endpoint </h3>

<h4>Get all categories</h4>
<label>Method: GET || http://localhost:8000/api/categories</label>

<h4>Post category</h4>
<label>Method: POST || http://localhost:8000/api/categories || field_name {name:required}</label>

<p>Update category</p>
<label>Method: PUT || http://localhost:8000/api/categories/id || parameter {id:required} || field_name {name}</label>

<p>Delete category</p>
<label>Method: DELETE || http://localhost:8000/api/categories/id || parameter {id:required}</label>

<hr>

<h3>Items endpoint </h3>

Get all items with it's category objects
<label>Method: GET || http://localhost:8000/api/items</label>

<p>Post item</p>
<label>Method: POST || http://localhost:8000/api/items || field_name {category_id:required, title:required, price:required, description:required}</label>

<p>Update item</p>
<label>Method: PUT || http://localhost:8000/api/items/id || parameter {id:required} || field_name {category_id, title, price, description} any of the fields will update the item</label>

<p>Delete item</p>
<label>Method: DELETE || http://localhost:8000/api/items/id || parameter {id:required}</label>
