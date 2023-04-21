<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $data = [];
    public function generatePDF()
    {


        $pdf = PDF::loadView('myPDF', $this->data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
