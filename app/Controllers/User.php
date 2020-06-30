<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
	//display form sigin
	public function sigin()
	{
		return view('auths/login');
	}
	//display form sigup
	public function sigup()
	{
		return view('auths/register');
	}
	
	//check login form
	public function login()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|validateUser[email,password]'
			];
			$error = [
				'password' => [
					'validateUser' => 'password not match!'
				]
			];
			$email = $this->request->getVar('email');
			if(!$this->validate($rules,$error)){
				$data['message'] = $this->validator;
			}else{
				$model = new UserModel();
				$user = $model->where('email',$email)->first();
							 
				$this->setUserSession($user);
				$session = session();
				$session->setFlashdata('success','successful Register');
				return redirect()->to('/pizza');
			}

		}
		return view('auths/login',$data);
	}

	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'address' => $user['address'],
			'password' => $user['password'],
			'email' => $user['email'],
			'role' => $user['role']
		];

		session()->set($data);
		return true;
	}	
	// check register 
	public function register()
	{
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == "post"){
			$rules = [
				'email'=>'required|valid_email',
				'password'=>'required',
				'address'=>'required',
			];
			 if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
				return view('auths/register',$data);
				
			
			}else{
				$userModel = new UserModel();
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$address = $this->request->getVar('address');
				$role = $this->request->getVar('checkUser');
				$userData = [ 
					'email'=>$email ,
					'password'=>$password ,
					'address'=>$address ,
					'role'=>$role,
					
				];
				$userModel->registerUser($userData);
				$session = session();
				$session->setFlashdata('success','successful Register');
				return redirect()->to('/login');
			}
		}

	}
	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
	//--------------------------------------------------------------------
}
