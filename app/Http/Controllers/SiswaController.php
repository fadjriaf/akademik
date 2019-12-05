<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Siswa;
use PDF;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Session;
use App\Mail\AkademikEmail;
use Illuminate\Support\Facades\Mail;
use Alert;

class SiswaController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Index
    public function index()
    {
    	$siswa = DB::table('siswa')->where("deleted_at", "=", null)->paginate(7);
        
    	return view('siswa.index', ['siswa' => $siswa]);
    }

    // Send Mail
    public function kirim()
    {
        Mail::to("testing@akademik.com")->send(new AkademikEmail());
 
		return "Email has been Send!";
    }

    // Search 
    public function cari(Request $request)
	{
		$cari = $request->cari;
 
		$siswa = DB::table('siswa')
        ->where('nama', 'like', "%" . $cari . "%")
        ->orwhere('nis', 'like', "%" . $cari . "%")
		->paginate();

		return view('siswa.index',['siswa' => $siswa]);
 
	}

    // Create or Add New
    public function tambah()
    {
        return view('siswa.tambah');
    }

    // Print PDF
    public function cetak_pdf()
    {
        $siswa = Siswa::all();
        
    	$pdf = PDF::loadview('siswa.siswa_pdf',['siswa'=>$siswa]);
        // return $pdf->download('laporan-siswa.pdf');
        return $pdf->stream();
    }

    // Export Excel
    public function export_excel()
	{   
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    // Import Excel
    public function import_excel(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');
        alert()->success('Data Siswa Berhasil Diimport!', 'Success');
 
		// alihkan halaman kembali
		return redirect('/siswa');
    }


    // Store Data
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Name is Required',
            'nis.required' => 'NIS is Required',
            'alamat.required' => 'Alamat is Required',
        ]);

        DB::table('siswa')->insert([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'alamat' => $request->alamat
        ]);
        
        alert()->success('Data has been Inputed!', 'Success');
        return redirect('/siswa');
    }

    // Edit Data
    public function edit($id)
    {
        $siswa = DB::table('siswa')->where('id',$id)->get();

        return view('siswa.edit',['siswa' => $siswa]);
    }

    // Update Data
    public function update(Request $request)
    {   
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Name is Required',
            'nis.required' => 'NIS is Required',
            'alamat.required' => 'Alamat is Required',
        ]);

        DB::table('siswa')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'alamat' => $request->alamat
        ]);
        
        alert()->success('Data has been Edited!', 'Success');
        return redirect('/siswa');
    }

    // Show
    public function show($id)
    {
        //
        $siswa = Siswa::find($id);

        if(!$siswa){
            abort(404);
        }

        return view('siswa.show')->with('siswa', $siswa);
    }

    // Delete
    public function hapus($id)
    {
        // DB::table('siswa')->where('id',$id)->delete();

        $siswa = Siswa::find($id);
    	$siswa->delete();
        
        // alert()->success('Data has been moved to Trash!','Deleted');
        Session::flash('hapus','Data has been moved to Trash!');
        return redirect('/siswa');
    }

    // New Feature Soft Delete
    public function trash()
    {
        $siswa = Siswa::onlyTrashed()->get();

        return view('siswa.siswa_trash', ['siswa' => $siswa]);
    }

    // Restore
    public function kembalikan($id)
    {
        $siswa = Siswa::onlyTrashed()->where('id', $id);
        $siswa->restore();

        // alert()->success('Data has been Restored!', 'Success');
        Session::flash('sukses','Data has been Restored!');
        return redirect('/siswa/trash');
    }

    // Restore All
    public function kembalikan_semua()
    {
        $siswa = Siswa::onlyTrashed();
        $siswa->restore();
        
        alert()->success('All Data has been Restored!', 'Success');
        return redirect('/siswa/trash');
    }

    // Delete Perma
    public function hapus_permanen($id)
    {
        $siswa = Siswa::onlyTrashed()->where('id',$id);
        $siswa->forceDelete();
        
        // alert()->success('Data has been Deleted Permanentely!', 'Success');
        Session::flash('hapus','Data has been Deleted Permanently!');
        return redirect('/siswa/trash');
    }

    // Delete All Perma
    public function hapus_permanen_semua()
    {
        $siswa = Siswa::onlyTrashed();
        $siswa->forceDelete();
        
        alert()->success('All Data has been Deleted Permanently!', 'Success');
        return redirect('/siswa/trash');
    }


}
