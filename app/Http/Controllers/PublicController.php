<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Cuti;
use Carbon\Carbon;
use Auth;
use Session;
use Hash;
use Exception;
use DB;

class PublicController extends Controller
{
    public function getlogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])
        ){
            Session::put('userid', Auth::user()->id);
            return redirect()->route('dashboard');

        }
        return redirect('/')->with('error', 'Invalid Email address or Password');
    }

    public function logout(){
    	Auth::logout();
        Session::flush();
    	return redirect('/');
    }
    //ini buat show database 
    public function showDashboard() {

        $userid = Session::get('userid');
        if(!$userid) {
            return redirect()->route('login')->with('error', 'Tidak bisa masuk ke halaman Dashboard!');  
        }

        $karyawan = Karyawan::join('users', 'karyawan.userid', 'users.id')->get();
        return view('dashboard', compact('karyawan'));
    }

    public function showAbsensi() {

        $userid = Session::get('userid');
        if(!$userid) {
            return redirect()->route('login')->with('error', 'Tidak bisa masuk ke halaman Absensi!');
        }
            $absensi = Absensi::join('karyawan', 'karyawan.id', 'absensi.karyawanid')->join('users', 'users.id', 'karyawan.userid')
            ->select('users.name', 'absensi.tanggal', 'absensi.status','absensi.keterangan')
            ->get();
            //echo $absensi;
            $karyawan = Karyawan::join('users', 'karyawan.userid', 'users.id')->select('users.name', 'karyawan.id')->get();
            return view('absensi', compact('karyawan','absensi'));
    }

    public function showCuti() {

        $userid = Session::get('userid');
        if(!$userid) {
            return redirect()->route('login')->with('error', 'Tidak bisa masuk ke halaman Dashboard!');  
        }

        $karyawan = Karyawan::join('users', 'karyawan.userid', 'users.id')->select('users.name', 'karyawan.id')->get();
        $cuti = Cuti::join('karyawan', 'karyawan.id', 'cuti.karyawanid')
        ->join('users', 'users.id', 'karyawan.userid')
        ->get();
        return view('cuti', compact('karyawan','cuti'));


    }

    public function addDataKaryawan(Request $request) {
        // INI DARI FORM
        $email = $request->email;
        $nama = $request->nama;
        $nik = $request->nik;
        $tanggal_lahir = $request->tanggal_lahir;
        $alamat = $request->alamat;
        $jabatan = $request->jabatan;
        $gaji_pokok = $request->gaji_pokok;
        $tanggal_masuk = $request->tanggal_masuk;
        $tanggal_keluar = $request->tanggal_keluar;

        // ini buat add data
        $succes = false;
        DB::beginTransaction();

        try {
            
            $user = new User;
            $user->name = $nama;
            $user->email = $email;
            $user->password = Hash::make('123456');
            if($user->save()) {
                $karyawan = new Karyawan;
                $karyawan->userid = $user->id;
                $karyawan->alamat = $alamat;
                $karyawan->nomor_induk = $nik;
                $karyawan->tanggal_lahir = $tanggal_lahir;
                $karyawan->tanggal_keluar = $tanggal_keluar;
                $karyawan->tanggal_masuk = $tanggal_masuk;
                $karyawan->gaji_pokok = $gaji_pokok;
                $karyawan->jabatan = $jabatan;
                $karyawan->status = 'Aktif';
                
            } 
            if ($karyawan->save()) {
                $absensi = new Absensi;
                $absensi->karyawanid = $karyawan->id;
                $absensi->tanggal = Carbon::now();
                $absensi->status = 'Hadir';
                $absensi->keterangan = '';
                $absensi->save();
            }    
            DB::commit();
            $succes = true;

        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Problem while saving Karyawan Info: '. $e->getMessage());
        }

        if($succes) {
            return redirect()->route('dashboard')->with('info', 'Data Saved');
        } else {
             return redirect()->route('dashboard')->with('error', 'Data cannot Saved');   
        }


    }

     public function addDataCuti(Request $request) {
        // INI DARI FORM
        
        $nama = $request->nama;
        $nik = $request->nik;
        $tanggal = $request->tanggal;
        $keterangan = $request->keterangan;
        
        // ini buat add data
        $succes = false;
        DB::beginTransaction();

        try {
            
            $user = new Cuti;
            $user->karyawanid = $nama;
            $user->tanggal = $tanggal;
            $user->keterangan = $keterangan;
            $user->save();
            
          
            DB::commit();
            $succes = true;

        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Problem while saving Cuti Info: '. $e->getMessage());
        }

        if($succes) {
            return redirect()->route('cuti')->with('info', 'Data Saved');
        } else {
             return redirect()->route('cuti')->with('error', 'Data cannot Saved');   
        }


    }

     public function addDataAbsensi(Request $request) {
        // INI DARI FORM
        
        $nama = $request->nama;
        $tanggal = $request->tanggal;
        $status = $request->status;
        $keterangan = $request->keterangan;
        
        // ini buat add data
        $succes = false;
        DB::beginTransaction();

        try {
            
            $user = new Absensi;
            $user->nama = $nama;
            $user->tanggal = $tanggal;
            $user->status = $status;
            $user->keterangan = $keterangan;
            $user->save();
            
          
            DB::commit();
            $succes = true;

        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Problem while saving Absensi Info: '. $e->getMessage());
        }

        if($succes) {
            return redirect()->route('absensi')->with('info', 'Data Saved');
        } else {
             return redirect()->route('absensi')->with('error', 'Data cannot Saved');   
        }


    }

    public function showGaji() {

        $userid = Session::get('userid');
        if(!$userid) {
            return redirect()->route('login')->with('error', 'Tidak bisa masuk ke halaman Gaji!');
        }
            return view('gaji');
    }

    

    public function showUser() {

        $userid = Session::get('userid');
        if(!$userid) {
            return redirect()->route('login')->with('error', 'Tidak bisa masuk ke halaman User!');
        }
        
        $user = User::all();
        return view('user', compact('user'));
    }



}
