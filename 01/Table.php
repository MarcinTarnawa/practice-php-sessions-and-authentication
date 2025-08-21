<?php 

class Table {
    private $db;
    private $dbName;

    public function __construct(Database $db, $dbName) {
        $this->db = $db;
        $this->dbName = $dbName;
    }

    public function render($columns, $sort) {
        // table name
        $dbName = array_flip([$this->dbName]);

        // table content request
        $result = $this->db->select($dbName, $columns)->fetchAll();

        //check for table content
        if (empty($result)) {
            echo "<p>No data to display.</p>";
            return;
        }

        // table column names
        $fields = array_keys($result[0]);

        // table rendering
        echo '<table id="table">';
        echo "<thead><tr>";
        foreach ($columns as $names) {
            echo '<th>' . htmlspecialchars($names) . '</th>';
        }
        echo "</tr></thead><tbody>";

        //sort data
        if($sort === 'alf') {
            sort($result);
        }

        if($sort === 'desc'){
            usort($result, function($a, $b) {
            return $b['price'] <=> $a['price'];
        });}

        if($sort === 'asc'){
            usort($result, function($a, $b) {
            return $a['price'] <=> $b['price'];
        });
        }
        
        //display columns
        foreach ($result as $row) {
            echo '<tr>';
            foreach ($fields as $fieldName) {
                echo '<td>' . htmlspecialchars($row[$fieldName]) . '</td>';
            }
        }
        echo "</tbody></table>";
    }

    public function refreshView() {
        header("Location: /");
        exit();
    }
}