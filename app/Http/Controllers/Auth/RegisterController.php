<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Admin; 
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Membuat user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],  // status bisa 'mahasiswa', 'dosen', atau 'admin'
        ]);
    
        // Menambahkan data ke tabel mahasiswa jika statusnya 'mahasiswa'
        if ($data['status'] == 'mahasiswa') {
            Mahasiswa::create([
                'nim' => $data['nim'],
                'nama' => $data['name'],
                'program_studi' => $data['program_studi'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    
        // Menambahkan data ke tabel dosen jika statusnya 'dosen'
        elseif ($data['status'] == 'dosen') {
            Dosen::create([
                'nip' => $data['nip'],
                'nama' => $data['name'],
                'fakultas' => $data['fakultas'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    
        // Menambahkan data ke tabel admin jika statusnya 'admin'
        elseif ($data['status'] == 'admin') {
            Admin::create([
                'nama' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    
        return $user;
    }
}
