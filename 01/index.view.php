<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin: 10px; }
        label { margin-right: 10px; }
        table { padding: 8px; border-radius: 4px; border: 1px solid #ccc;}
        select, button, input { padding: 8px; border-radius: 4px; border: 1px solid #ccc; }
        button, input { background-color: #007bff; color: white; cursor: pointer; }
        button:hover, input:hover { background-color: #0056b3; }
        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }
        tr:nth-child(even) {
        background-color: #e7ddddff;}
    </style>
</head>
<body>
    <form action="" method="get">
        <select name="sort" id="sort">
            <option value="desc" <?= isSelected('desc', $sort); ?>>Od najwyższej</option>
            <option value="asc" <?= isSelected('asc', $sort); ?>>Od najniższej</option>
            <option value="alf" <?= isSelected('alf', $sort); ?>>Alfabetycznie</option>
        </select>
        <input type="submit" value="Wybierz">
    </form>
</body>
</html>