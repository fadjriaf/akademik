<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class EnController extends Controller
{
    // Enkripsi
    public function enkripsi(){
		$encrypted = Crypt::encryptString('Coba Belajar Encrypt & Decrypt');
		$decrypted = Crypt::decryptString($encrypted);
 
		echo "Hasil Enkripsi : " . "<br/>" . $encrypted;
		echo "<br/>";
		echo "<br/>";
		echo "Hasil Dekripsi : " . "<br/>" . $decrypted;
    }
    
    // Url Enkripsi
    public function data() {
        $parameter = [
            'nama' => 'Fadjri Alfalah',
            'pekerjaan' => 'Junior Web Dev',
        ];
        $encrypted = Crypt::encrypt($parameter);
        echo "<a href='/data/" . $encrypted . "'>Klik Here</a>";
    }

    // Proses Url Enkripsi
    public function proses($data) {
        $data = Crypt::decrypt($data);

        echo "Nama : " . $data['nama'];
        echo "<br/>";
        echo "Pekerjaan : " . $data['pekerjaan'];
    }

    // Hash Password
    public function hash(){
        $hash_mypass = Hash::make('admin1234');
		echo $hash_mypass;
	}
}
