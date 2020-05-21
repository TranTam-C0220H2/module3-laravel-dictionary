<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CDictionary extends Controller
{
    protected $dictionary;
    protected $request;

    public function __construct(Request $request)
    {
        $this->dictionary = [
            'hello' => 'Xin chào',
            'candy' => 'Kẹo',
            'dad' => 'Bố',
        ];
        $this->request = $request;
    }

    function form()
    {
        return view('dictionary');
    }

    function dictionary()
    {
        foreach ($this->dictionary as $key => $value) {
            if ($key == $this->request->englishWord) {
                $result = $value;
                return view('result',compact(['result']));
            }
        }
        $result = 'not found';
        return view('result', compact(['result']));
    }
}
