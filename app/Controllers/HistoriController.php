<?php

		namespace App\Controllers;
		use App\Models\HistoriModel;

		class HistoriController extends BaseController
		{
			protected $transaction;

			function __construct()
			{
				helper('form');
				$this->validation = \Config\Services::validation();
				$this->transaction = new HistoriModel();
			}

			public function index()
			{
				$data['transaction'] = $this->transaction->findAll();
				return view('pages/history_view', $data);
			}

/* /* 			/* public function create()
			{
				$data = $this->request->getPost();
				// $validate = $this->validation->run($data, 'user');
				// $errors = $this->validation->getErrors();

/* 				if($data){
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
 */ 
			public function edit($id)
			{
				$data = $this->request->getPost();

				if($data){
                        $dataForm = [
                            'status'=> $this->request->getPost('status')
                        ];
                    

					$this->transaction->update($id, $dataForm);

					return redirect('history')->with('success','Data Berhasil Diubah');
				}else{
					return redirect('history')->with('failed','Data Gagal Diubah');
				}
				
			}

			/* public function delete($id)
			{
				$dataAdmin = $this->Admin->find($id);
				// unlink("public/img/".$dataAdmin['foto']);	

				$this->Admin->delete($id);

				return redirect('Admin')->with('success','Data Berhasil Dihapus');
			} */
		}