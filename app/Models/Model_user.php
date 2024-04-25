<?php

namespace App\Models;
use CodeIgniter\Model;

class Model_user extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = true;

    protected $allowedFields = ['username', 'password', 'nama', 'id_role', 'status', 'created_by'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'name'      => 'required|min_length[3]',
        'price'     => 'required|numeric',
    ];

    protected $validationMessages = [
        'name'        => [
            'required' => 'Bagian Name Harus diisi',
            'min_length' => 'Minimal 3 Karakter'
        ],
        'price'        => [
            'required' => 'Bagian Price Harus diisi',
            'numeric' => 'Hanya bisa diisi dengan angka'
        ]
    ];
    protected $skipValidation  = true;

    public function reset_increment()
    {
        $sql = "ALTER TABLE user AUTO_INCREMENT=1";
        $this->db->query($sql);
    }
    
    // select all
    public function getAll(){
        //return $this->db->findAll();
    }

    // get by id
    public function get_by_id($id_user){
        $this->select('
            user.*,
            r.name as role_name
        ')
        ->join('role r', 'r.id=user.id_role', 'LEFT')
        ->where('user.id', $id_user);
        
        return $this->get()->getResult();
    }
}
