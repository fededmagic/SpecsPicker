<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model{


    public function getId() { return $this->attributes["id"]; }

    public function setId($id) { $this->attributes["id"] = $id; }

    public function getName() { $this->attributes["name"]; }

    public function setName($name) { $this->attributes["name"] = $name; }

    public function getDesc() { return $this->attributes["desc"]; }

    public function setDesc($desc) { $this->attributes["desc"] = $desc; }

    public function getCreateAt() { return $this->attributes["createAt"]; }

    public function getUpdateAt() { return $this->attributes["updateAt"]; }
    
    public function setCreateAt($createAt) { $this->attributes["createAt"] = $createAt; }

    public function setUpdateAt($updateAt) { $this->attributes["updateAt"] = $updateAt; }
}


