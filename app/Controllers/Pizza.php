<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizza extends BaseController
{

	//list all pizza
	public function listPizza(){
		$pizzaModel = new PizzaModel();
		$data['pizzas'] = $pizzaModel->findAll();
		return view('index',$data);
	}
	//create pizza
	public function createPizza(){
		$data = [];
		if($this->request->getMethod() == "post"){
			helper(['form']);
			$rules = [
				'name'=>'required',
				'price'=>'required|min_length[1]|max_length[50]',
				'ingredient'=>'required',
				
			];	
			 if($this->validate($rules)){
				$pizzaModel = new PizzaModel();
				$pizzaName = $this->request->getVar('name');
				$pizzaPrice = $this->request->getVar('price')."$";
				$pizzaIngredient = $this->request->getVar('ingredient');
				$pizzaData = array(
					'name'=>$pizzaName,
					'price'=>$pizzaPrice,
					'ingredient'=>$pizzaIngredient
				);
				$pizzaModel->createPizza($pizzaData);
				return redirect()->to('/pizza');

			}else{
				$data['validation'] = $this->validator;
				return view('/index',$data);
			}
		}
	}
	//delete pizza
	public function deletePizza($id){
		$pizzaModel = new PizzaModel();
		$pizzaModel->delete($id);
		return redirect()->to('/pizza');
	}
	//pass value to form update
	public function updateForm($id){
		$pizzaModel = new PizzaModel();
		$data['pizza'] = $pizzaModel->find($id);
		return view('index',$data);
	}
	//update pizza
	public function updatePizza(){
		$data = [];
		if($this->request->getMethod() == "post"){
			helper(['form']);
			$rules = [
				'name'=>'required',
				'price'=>'required|min_length[1]|max_length[50]',
				'ingredient'=>'required',
			];
			 if($this->validate($rules)){
				$pizzaModel = new PizzaModel();
				$id = $this->request->getVar('id');
				$id = $pizzaModel->where('id')->first();
				$pizzaName = $this->request->getVar('name');
				$pizzaPrice = $this->request->getVar('price')."$";
				$pizzaIngredient = $this->request->getVar('ingredient');
				$pizzaData = array(
					'name'=>$pizzaName,
					'price'=>$pizzaPrice,
					'ingredient'=>$pizzaIngredient
				);
				$pizzaModel->update($id,$pizzaData);
				return redirect()->to('/pizza');
			}else{
				$data['validation'] = $this->validator;
				return view('/index',$data);
			}
		}
}
	//--------------------------------------------------------------------
}
