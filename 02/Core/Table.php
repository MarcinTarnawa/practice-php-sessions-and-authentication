<?php 

namespace Core;

class Table {
    private $db;
    private $dbName;
    private $err = [];
    private $validate;

    public function __construct(Database $db, $dbName) {
        $this->db = $db;
        $this->dbName = $dbName;
    }

    //rules for validation
    public function rules()
    {   
        return [
            'numMin' => 3,
            'numMax' => 15,
            'strMin' => 3,
            'strMax' => 255,
        ];
    }

    // method for validate inputs and get errors
    public function validateField($value, array $rules)
    {
        $this->err = [];
        foreach ($value as $key => $validate) {

        if(! Validator::stringMin($validate, $rules['strMin'])) {
            $this->err[$key][] = 'Too few characters';
        }

        if(! Validator::stringMax($validate, $rules['strMax'])) {
           $this->err[$key][] = 'Too much characters';
        }

        if($key === 'email'){
            if(!Validator::email($validate)){
                $this->err[$key][] = 'Please provide a valid emial address';
            }
        }

        if(Validator::number($validate)) {
            if(! Validator::numberMin($validate, $rules['numMin'] )) {
                $this->err[$key][] = 'Number must be higher';
            }

            if(! Validator::numberMax($validate, $rules['numMax'])) {
                $this->err[$key][] = 'Number is too high';
            }
        }}
        return $this->err;
    }

    //method for add inputs and validate
    public function addField($value, array $rules)
    {
        $isValid = empty($this->validateField($value, $rules));

        if($isValid){
            $columnName = [];
            $params = [];
            foreach ($value as $fieldName => $fieldValue) {
                if ($fieldName == 'passwordcheck') {
                    continue;
                }
                 $columnName[] = "$fieldName";
                 $dataValue[] = ":$fieldName";
                 $params[":$fieldName"] = $fieldValue;
            }
            $sql = "INSERT INTO $this->dbName (" . implode(', ', $columnName) . ") VALUES (" . implode(', ', $dataValue) . ")";
            $post = $this->db->query($sql, $params);
            $this->refreshView();}
        else { 
        return $this->err;
    }
    }

    public function refreshView() {
        header("Location: /");
        exit();
    }
}