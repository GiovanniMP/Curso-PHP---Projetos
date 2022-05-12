<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ContentModel;
use Exception;

class User extends BaseController
{
    public function index()
    {
        echo view('navbarView');

        $url = 'https://api.themoviedb.org/3/movie/top_rated?api_key=a32c9a02a8435c269af011076f7356ba&language=pt-BR&page=1';

        $json = file_get_contents($url);
        $obj = json_decode($json);

        $total_pages = $obj->total_pages;

        $url_single = 'https://api.themoviedb.org/3/movie/top_rated?api_key=a32c9a02a8435c269af011076f7356ba&language=pt-BR&page=';
        
        $cat = 'Filme';
        $json_single = file_get_contents($url_single);
        $obj_single = json_decode($json_single);
        $img_url = 'https://image.tmdb.org/t/p/original';

        $data['obj'] = $obj_single->results;
        $data['img'] = $img_url;
        $data['categoria'] = $cat;
        
        echo view('addToCollectionView', $data);
    }

    public function search(){
        $busca = $this->request->getPost('busca');
        $data['busca'] = $busca;
        $busca = str_replace(' ', '%20', $busca);
        $busca_tipo = $this->request->getPost('selectmenu');
        $cat1 = "Filme";
        $cat2 = 'Série';

        if($busca_tipo == 1){
            $url = 'https://api.themoviedb.org/3/search/movie?api_key=a32c9a02a8435c269af011076f7356ba&language=pt-BR&query=&page=1&include_adult=false';
            $busca = substr_replace($url, $busca, 104, 0);
            $json_busca = file_get_contents($busca);
            $obj_busca = json_decode($json_busca);
            $img_url = 'https://image.tmdb.org/t/p/original';
            $data['buscaFilme'] = $obj_busca->results;
            $data['img'] = $img_url;
            $data['tipo'] = $busca_tipo;
            $data['categoria'] = $cat1;
        
        }elseif($busca_tipo == 2){
            $url = 'https://api.themoviedb.org/3/search/tv?api_key=a32c9a02a8435c269af011076f7356ba&language=pt-BR&query=&page=1&include_adult=false';
            $busca = substr_replace($url, $busca, 101, 0);
            $json_busca = file_get_contents($busca);
            $obj_busca = json_decode($json_busca);
            $img_url = 'https://image.tmdb.org/t/p/original';
            $data['buscaSerie'] = $obj_busca->results;
            $data['img'] = $img_url;
            $data['tipo'] = $busca_tipo;
            $data['categoria'] = $cat2;
        }

        echo view('navbarView');
        echo view('resultadosView', $data);

    }

    public function profile(){
        $user = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userinfo = $user->find($loggedUserID);
        $data['userinfo'] = $userinfo;

        $db = \Config\Database::connect();

        $builder = $db->table('saved');
        $builder->select('id_saved');
        $builder->select('tipo');
        $builder->join('usuarios', 'saved.id_usuario = usuarios.id', 'left');
        $builder->where('id_usuario' , $userinfo['id']);
        $builder->where('tipo', 1);
        $movies = $builder->countAllResults();
        $data['nummovies'] = $movies;

        $builder = $db->table('saved');
        $builder->select('id_saved');
        $builder->select('tipo');
        $builder->join('usuarios', 'saved.id_usuario = usuarios.id', 'left');
        $builder->where('id_usuario' , $userinfo['id']);
        $builder->where('tipo', 2);
        $series = $builder->countAllResults();
        $data['numseries'] = $series;

        $builder = $db->table('saved');
        $builder->select('id_saved');
        $builder->select('tipo');
        $builder->join('usuarios', 'saved.id_usuario = usuarios.id', 'left');
        $builder->where('id_usuario' , $userinfo['id']);
        $builder->orderBy('saved.id', 'DESC');
        $builder->limit(4);
        $last = $builder->get()->getResultObject();

        $data['last'] = $last;
        $img_url = 'https://image.tmdb.org/t/p/original';
        $url_movie = 'https://api.themoviedb.org/3/movie/?api_key=a32c9a02a8435c269af011076f7356ba&language=pt-BR';
        $url_serie = 'https://api.themoviedb.org/3/tv/?api_key=a32c9a02a8435c269af011076f7356ba&language=pt-BR';
        $data['imgurl'] =$img_url;
        $data['urlmovie'] = $url_movie;
        $data['urlserie'] = $url_serie; 

        echo view('navbarView');
        echo view('userProfileView', $data);
    }

    public function save(){
        $user = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userinfo = $user->find($loggedUserID);
        
        $saved = new ContentModel();
        $data = [
            'id_saved' => $this->request->getPost('id'),
            'id_usuario' => $userinfo['id'],
            'tipo' => $this->request->getPost('type')
        ];
            
        
        $query = $saved->insert($data);
        if(!$query){
            session()->setFlashdata('fail', 'Ocorreu um erro!');
            return redirect()->to('User')->withInput();
        }else{
            session()->setFlashdata('success', 'Salvo com sucesso!');
            return redirect()->to('User')->withInput();
        }
    }

    public function collection(){
        $user = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userinfo = $user->find($loggedUserID);

        $db = \Config\Database::connect();

        $builder = $db->table('saved');
        $builder->select('id_saved');
        $builder->select('tipo');
        $builder->join('usuarios', 'saved.id_usuario = usuarios.id', 'left');
        $builder->where('id_usuario' , $userinfo['id']);
        $result = $builder->get()->getResultObject();

        $img_url = 'https://image.tmdb.org/t/p/original';
        $url_movie = 'https://api.themoviedb.org/3/movie/?api_key=a32c9a02a8435c269af011076f7356ba&language=pt-BR';
        $url_serie = 'https://api.themoviedb.org/3/tv/?api_key=a32c9a02a8435c269af011076f7356ba&language=pt-BR';

        $data['url_serie'] = $url_serie;
        $data['url_movie'] = $url_movie;
        $data['result'] = $result;
        $data['img'] = $img_url;

        echo view('navbarView');
        echo view('userCollectionView', $data);
    }

    public function editprofile(){
        
    }
}
