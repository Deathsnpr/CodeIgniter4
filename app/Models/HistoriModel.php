<?php namespace App\Models;

		use CodeIgniter\Model;

		class HistoriModel extends Model
		{
			protected $table = 'transaksi'; 
			protected $primaryKey = 'id';
			protected $allowedFields = [
				'created_date','username','total_harga','ongkir','status'
			];  
		}