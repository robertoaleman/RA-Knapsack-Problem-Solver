<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema de la Mochila</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        textarea {
            width: 100%;
            height: 200px;
            resize: vertical;
        }
        input[type="number"] {
            width: 100px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Implementation of the Knapsack Problem solution for real-life applications</h2>
    <p>Author: Roberto Aleman,ventics.com, license AGPL</p>
    <h3><br>Knapsack Optimization Example</h3>
    <form action="procesar.php" method="post" >
        <div class="form-group">
            <label for="capacity">Indicate the capacity of the backpack (backpack can be a container, a storage, etc.):</label>
            <input type="number" id="capacity" name="capacity" min="1" step="1" required style="
    background: beige;
    padding: 0.5em;
">
        </div>

        <div class="form-group">
            <label for="items">Ítems (one line per item, format: weight,value):</label>
            <textarea id="items" name="items" placeholder="For example:
10,60
20,100
30,120" required style="
    background: beige;
    padding: 0.5em;
    border: 2px solid #333;
    height: 150px;
    width: 300px;
"></textarea>
        </div>

        <button type="submit">Calculate Solution</button>
    </form>
  <ul>Notes from Author, by Roberto Aleman,ventics.com<br/>
    <li>If you require further explanation, I can assist you based on my availability and at an hourly rate.</li>

	<li>If you need to implement this version or an advanced and/or customized version of my code in your system, I can assist you based on my availability and at an hourly rate.</li>

	<li>Please write to me and we'll discuss.</li>

	<li>Do you need advice to implement an IT project, develop an algorithm to solve a real-world problem in your business, factory, or company?
Write me right now and I'll advise you.</li></ul>
<p>Example: suppose you need to store products in several warehouses and you need to store<br/> the largest amount of products by maximizing storage according to the commercial value of the products and based on the size of each warehouse.</p>
</body>
</html>