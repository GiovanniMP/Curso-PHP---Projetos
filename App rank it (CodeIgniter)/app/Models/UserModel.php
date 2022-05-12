<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'email', 'senha'];

    protected $validationRules = [
        'nome' => 'required|min_length[3]|alpha_space',
        'email' => 'required|min_length[7]|valid_email|is_unique[usuarios.email]',
        'senha' => 'required|min_length[6]'
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo nome é obrigatório',
            'min_length' => 'O campo nome requer pelo menos 3 caracteres',
            'alpha_space' => 'O campo nome não aceita numeros'
        ],
        'email' => [
            'required' => 'O campo email é obrigatório',
            'min_length' => 'O campo email requer pelo menos 7 caracteres',
            'valid-email' => 'O email não é válido',
            'is_unique' => 'Este email já foi utilizado'
        ],
        'senha' => [
            'required' => 'O campo senha é obrigatório',
            'min_length' => 'O campo senha requer pelo menos 6 caracteres'
        ]
    ];
}