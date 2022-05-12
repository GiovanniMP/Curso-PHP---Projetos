<?php namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model{
    
    protected $table = 'saved';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_saved','id_usuario','tipo'];

}