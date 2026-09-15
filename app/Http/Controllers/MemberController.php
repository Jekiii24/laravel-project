<?php
namespace App\Http\Controllers;
class MemberController extends Controller
{
    public function index()
    {
        $members = [
            [
                'nama' => 'Andi',
                'email' => 'andi@example.com',
                'alamat' => 'Jl. Merdeka No. 1',
                'telepon' => '081234567890'
            ],
            [
                'nama' => 'Budi',
                'email' => 'budi@example.com',
                'alamat' => 'Jl. Sudirman No. 2',
                'telepon' => '081234567891'
            ],
            [
                'nama' => 'Citra',
                'email' => 'citra@example.com',
                'alamat' => 'Jl. Diponegoro No. 3',
                'telepon' => '081234567892'
            ],
            [
                'nama' => 'Dewi',
                'email' => 'dewi@example.com',
                'alamat' => 'Jl. Gatot Subroto No. 4',
                'telepon' => '081234567893'
            ],
            [
                'nama' => 'Eko',
                'email' => 'eko@example.com',
                'alamat' => 'Jl. Ahmad Yani No. 5',
                'telepon' => '081234567894'
            ]
        ];
        return view('members.index', compact('members'));
    }
}