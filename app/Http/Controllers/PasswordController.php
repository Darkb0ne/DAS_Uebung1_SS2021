<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PasswordController extends Controller
{
    public function generate(Request $request){

        $passwords = [];
        $length=$request->input('length');
        $amount=$request->input('amount');
        $alphabet=$request->input('alphabet');
        $alphabet_array=str_split($alphabet,1);
        
        for($i=0;$i<$amount;$i++){
            $pw = "";
            for($j=0;$j<$length;$j++){
                $pw.=$alphabet_array[rand(0,count($alphabet_array)-1)];
            }
            array_push($passwords,$pw);
        }

        return view(
            'passwordgen',
            [
                'passwords'=>$passwords,
                'length'=>$length,
                'amount'=>$amount
            ]  
        );
    }
}