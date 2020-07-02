<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
	//display form sigin
	public function siginForm()
	{
		return view('auths/login');
	}
	//display form sigup
	public function sigupForm()
	{
		return view('auths/register');
	}

	//compare email and password user before login
	public function loginAccount()
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
					'validateUser' => 'Your eamil and password is not match!'
				]
			];
			if(!$this->validate($rules,$error)){
				$sessionError = session();
                $validation = $this->validator;
                $sessionError->setFlashdata('error', $validation);
				return view('auths/login');
			}else{
				$model = new UserModel();
				$email = $this->request->getVar('email');
				$user = $model->where('email',$email)->first();
				$this->setUserSession($user);
				$sessionSuccess = session();
                $sessionSuccess->setFlashdata('success','Login successfull!');
			}

		}
		return redirect()->to('/pizza');
	}
// get value from database
	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'address' => $user['address'],
			'password' => $user['password'],
			'email' => $user['email'],
			'role' => $user['role']
		];
		// set session 
		session()->set($data);
		return true;
	}	
	// insert register user information to database
	public function registerAccount()
	{
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == "post"){
			$rules = [
				'email'=>'required|valid_email',
				'password'=>'required',
				'address'=>'required',
			];
			// validate user information when user register form
			 if(!$this->validate($rules)){
				$sessionError = session();
                $validation = $this->validator;
                $sessionError->setFlashdata('error', $validation);
				return view('auths/register');

			}else{
				$userModel = new UserModel();
				// get value from input form
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$address = $this->request->getVar('address');
				$role = $this->request->getVar('checkUser');
				if($role == 1){
					$role = "manager";
				}else{
					$role = "normal";
				}
				$userData = [ 
					'email'=>$email ,
					'password'=>$password ,
					'address'=>$address ,
					'role'=>$role,
					
				];
				$userModel->registerUser($userData);
				$session = session();
				// sett session on register form when successfull register
				$session->setFlashdata('success','Successful Register!');
				return redirect()->to('/login');
			}
		}

	}
	//--------------------------------------------------------------------
}
