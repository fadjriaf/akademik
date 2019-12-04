<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EnController extends Controller
{
    //
    public function enkripsi(){
		$encrypted = Crypt::encryptString('Coba Belajar Encrypt & Decrypt');
		$decrypted = Crypt::decryptString($encrypted);
 
		echo "Hasil Enkripsi : " . "<br/>" . $encrypted;
		echo "<br/>";
		echo "<br/>";
		echo "Hasil Dekripsi : " . "<br/>" . $decrypted;
    }
    
    public function data() {
        $parameter = [
            'nama' => 'Fadjri Alfalah',
            'pekerjaan' => 'Junior Web Dev',
        ];
        $encrypted = Crypt::encrypt($parameter);
        echo "<a href='/data/" . $encrypted . "'>Klik Here</a>";
    }

    public function proses($data) {
        $data = Crypt::decrypt($data);

        echo "Nama : " . $data['nama'];
        echo "<br/>";
        echo "Pekerjaan : " . $data['pekerjaan'];
    }
}
