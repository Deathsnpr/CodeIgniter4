<?php

		namespace App\Controllers;
		use App\Models\AdminModel;

		class AdminController extends BaseController
		{
			protected $Admin;

			function __construct()
			{
				helper('form');
				$this->validation = \Config\Services::validation();
				$this->Admin = new AdminModel();
			}

			public function index()
			{
				$data['Admins'] = $this->Admin->findAll();
				return view('pages/Admin_view', $data);
			}

			public function create()
			{
				$data = $this->request->getPost();
				// $validate = $this->validation->run($data, 'user');
				// $errors = $this->validation->getErrors();

				if($data){
					$dataForm = [ 
						'username' => $this->request->getPost('user'),
						'password' => md5($this->request->getPost('password')),
						'role' => $this->request->getPost('role'),
						'email' => $this->request->getPost('email')
					];
			
					$this->Admin->insert($dataForm); 
			
					return redirect('Admin')->with('success','Data Berhasil Ditambah');
				}else{
					return redirect('Admin')->with('failed','Data Gagal Ditambah');
				}    
			}

			public function edit($id)
			{
				$data = $this->request->getPost();

				if($data){
                    if ($data['kunci'] == true) {
                        $dataForm = [
                            'is_active'=> $this->request->getPost('is_active')
                        ];
                    } else {
                        $dataForm = [
                            'username' => $this->request->getPost('user'),
                            'password' => md5($this->request->getPost('password')),
                            'role' => $this->request->getPost('role'),
                            'email' => $this->request->getPost('email')
                        ];
                    }

					$this->Admin->update($id, $dataForm);

					return redirect('admin')->with('success','Data Berhasil Diubah');
				}else{
					return redirect('admin')->with('failed','Data Gagal Diubah');
				}
				
			}

			public function delete($id)
			{
				$dataAdmin = $this->Admin->find($id);
				// unlink("public/img/".$dataAdmin['foto']);	

				$this->Admin->delete($id);

				return redirect('Admin')->with('success','Data Berhasil Dihapus');
			}
		}