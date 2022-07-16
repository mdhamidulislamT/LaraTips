<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class OtherContolller extends Controller
{
    //======= Response =======//
    public function response(Request $request)
    {
        return response("this is test res", 200)->header('Content-Type', 'text/plain');
    }

    public function response2()
    {
        return redirect()->action([ResourceController::class, 'index']);
    }

    public function redirecToGoggle()
    {
        return redirect()->away('https://www.google.com');
    }

    public function Error404()
    {
        // abort(401);
        // abort(402);
        // abort(403);
         abort(404);

        // abort(419);
        // abort(429);

        // abort(500);
        // abort(503);
    }

    public function encryption()
    {
        $token = "Laravel";
        $encryptedValue = Crypt::encryptString($token);
        echo $encryptedValue;

        echo "<br>";

        $decrypted = Crypt::decryptString($encryptedValue);
        echo $decrypted;

        echo "<br>";
        $token2 = 12345678;
        $encryptedValue2 = Crypt::encryptString($token2);
        echo $encryptedValue2;

        echo "<br>";

        $decrypted2 = Crypt::decryptString($encryptedValue2);
        echo $decrypted2;
    }

    public function hashing()
    {
        echo "<br>===== Different types of Hashing =====<br>";
        //===== 1 =====//
        $newPassword = "Laravel";
        $hashedPassword = Hash::make($newPassword);
        echo $hashedPassword;

        //===== 2 =====//
        echo "<br>";
        $newPassword2 = 12345678;
        $hashedPassword2 = Hash::make($newPassword2, [
            'rounds' => 12,
        ]);
        echo $hashedPassword2;

        //===== 3 =====//
        echo "<br>";
        $newPassword3 = 12345678;
        $hashedPassword3 = Hash::make($newPassword3, [
            'memory' => 1024,
            'time' => 2,
            'threads' => 2,
        ]);
        echo $hashedPassword3;

        echo "<br><br>=====Verifying That A Password Matches A Hash. =====<br>";
        $plainText = "Laravel";
        if (Hash::check($plainText, $hashedPassword)) {
            echo "<h3>The passwords match...</h3>";
        }else{
            echo "<h3>The passwords not match...</h3>";
        }

    }
}
