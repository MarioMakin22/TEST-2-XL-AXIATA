<?php

class IRepository
{
    private $data = [
        [
            'id' => 1,
            'name' => 'John',
            'role' => 'admin'
        ],[
            'id' => 2,
            'name' => 'Juan',
            'role' => 'devloper'
        ],[
            'id' => 3,
            'name' => 'Erik',
            'role' => 'developer'
        ],[
            'id' => 4,
            'name' => 'mario',
            'role' => 'developer'
        ],
    ];
    public $nameSearch;

    public function GetUser()
    {
        if (!empty($this->nameSearch)) {
            return $this->getData('name');
            die();
        }
        return $this->data;
    }

    public function getData($field)
    {
        foreach ($this->data as $d) {
            if ($d[$field] == $this->nameSearch) {
                return $d;
            }
        }
        return false;
    }
}


$repo = new IRepository();
$keys = array_keys($_GET);

if ($keys[0] == "name") {
    $repo->nameSearch = $_GET[$keys[0]];
}
echo json_encode($repo->GetUser());