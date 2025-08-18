<?php 

class Table {
    private $db;
    private $dbName;

    public function __construct(Database $db, $dbName) {
        $this->db = $db;
        $this->dbName = $dbName;
    }

    public function render($table, $sort) {
        // table name
        $dbName = $this->dbName;

        // get column names for sql
        $selectedColumns = array_keys($table);
        $sanitizedColumns = array_map(function($col) {
           return preg_replace('/[^a-zA-Z0-9_]/', '', $col);
        }, $selectedColumns);
        $sqlColumns = implode(', ', $sanitizedColumns);

        // table content request
        $result = $this->db->query("select {$sqlColumns} from {$dbName}")->fetchAll();

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
        foreach ($table as $names) {
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