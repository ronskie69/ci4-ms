<?php

namespace App\Controllers\People;

use App\Controllers\BaseController;
use App\Models\People\PeopleModel;
use CodeIgniter\Debug\Exceptions;
use CodeIgniter\Entity\Cast\StringCast;
use CodeIgniter\HTTP\ResponseInterface;

class PeopleController extends BaseController
{
    public function index()
    {
        $people = new PeopleModel();
        $data['people'] = $people->findAll();
        return view('people/people', $data);
    }

    public function addPerson() {
        
        $fname = $this->cap($this->request->getVar('fname'));
        $lname = $this->cap($this->request->getVar('lname'));

        $post_data = [
            'fname'    => $fname,
            'lname'    => $lname,
            'age'      => $this->request->getVar('age'),
            'address'  => $this->request->getVar('address'),
            'gender'   => $this->request->getVar('gender'),
            'salary'   => number_format($this->request->getVar('salary'), 2), 
        ];

        $people = new PeopleModel();

        if($people->save($post_data))
        {
            return redirect()->to('/people')->with('success', $fname.' '.$lname.' is added to the database.');
        } else {
            return redirect()->to('/people')->with('error', 'Failed to add new person.');

        }

    }

    public function deletePerson($id){
        $people = new PeopleModel();

        if($people->where('p_id', $id)->delete()){
            return redirect()->to('/people')->with('success', 'Successfully deleted a data.');
        } else {
            return redirect()->to('/people')->with('error', 'Failed to delete data.');
        }
    }

    public function cap($str) {
        return ucwords(strtolower($str));
    }
}
