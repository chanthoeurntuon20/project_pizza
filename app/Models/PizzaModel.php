<?php namespace App\Models;

use CodeIgniter\Model;

class PizzaModel extends Model
{
    protected $table      = 'pizza';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['name','ingredient','price'];

    public function createPizza($pizzaInfo){
        $this->insert([
            'name'=>$pizzaInfo['name'],
            'ingredient'=>$pizzaInfo['ingredient'],
            'price'=>$pizzaInfo['price'],
        ]);
    }
    
}
