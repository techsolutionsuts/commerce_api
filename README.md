<h1>The Completed API Test</h1>

<p style="text-decoration: underline"> Below are the endpoints </p>

<h3>Categories endpoint </h3>

Get all categories
<label>Method: GET || http://localhost:8000/api/categories</label>

Post category
<label>Method: POST || http://localhost:8000/api/categories || field_name {name:required}</label>

Update category
<label>Method: PUT || http://localhost:8000/api/categories/id || parameter {id} || field_name {name}</label>

Delete category
<label>Method: DELETE || http://localhost:8000/api/categories/id || parameter {id}</label>

<hr>

<h3>Items endpoint </h3>

Get all items with it's category objects
<label>Method: GET || http://localhost:8000/api/items</label>

Post item
<label>Method: POST || http://localhost:8000/api/items || field_name {category_id:required, title:required, price:required, description:required}</label>

Update item
<label>Method: PUT || http://localhost:8000/api/items/id || parameter {id} || field_name {category_id, title, price, description} any of the fields will update the item</label>

Delete item
<label>Method: DELETE || http://localhost:8000/api/items/id || parameter {id}</label>
