<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Registrasi extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'iduser';
    protected $fillable = [
        'nama_user', 'password_user', 'email', 'telp_user', 'alamat_user', 'token', 'is_verif',
    ];

    public function saveToDB(Request $request)
    {
        $token = Str::random(12);

        $user = new User();
        $user->nama_user = $request->input('nama_user');
        $user->password_user = $request->input('password_user');
        $user->email = $request->input('email');
        $user->telp_user = $request->input('telp_user');
        $user->alamat_user = $request->input('alamat_user');
        $user->token = $token;
        $user->is_verif = 0;
        $user->save();

        $this->sendMail($token, $request->input('email'));
    }

    public function sendMail($token, $email)
    {
        try {
            Mail::send([], [], function ($message) use ($token, $email) {
                $message->from('no-reply@ianggaprayogaa.com', 'Angga Prayoga');
                $message->to($email);
                $message->subject("Verifikasi Email");
                $message->html("Selamat Pagi, <br> Berikut Link verifikasi email <a href='http://127.0.0.1:8000/Verif/".$token."'>Klik Disini</a>", 'text/html');
            });

            echo "Email Terkirim";
        } catch (\Exception $e) {
            echo "Email gagal terkirim: " . $e->getMessage();
        }
    }

    public function verifikasiEmail($token)
    {
        $user = User::where('token', $token)->first();
        if ($user) {
            $user->is_verif = 1;
            $user->save();
            echo "Update berhasil!";
        } else {
            echo "Update gagal";
        }
    }
}