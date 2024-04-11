<?php

namespace App\Http\Controllers\Admin\Forms;

use Illuminate\Http\Request;
use App\Models\ArstonDesignOne;
//use Spatie\LaravelPdf\Facades\Pdf;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use function Spatie\LaravelPdf\Support\pdf;
use mikehaertl\wkhtmlto\Pdf;


class ArstonDesingOneController extends Controller
{
    public function Index(Request $request){
        $arston = ArstonDesignOne::where('id',$request->id)->first();
       
        $filename = $arston->estate_name.'.pdf';
  
    //    return pdf('pdfs.index', ['arston' => $arston])
    //     ->format('a4')
    //     ->save($filename);
        // return pdf('pdfs.index', ['arston'=>$arston]);

        // You can pass a filename, a HTML string, an URL or an options array to the constructor
        $pdf = new Pdf('pdfs.index.blade.php');

        // On some systems you may have to set the path to the wkhtmltopdf executable
        // $pdf->binary = 'C:\...';

        if (!$pdf->saveAs('pdfs.index.blade.php')) {
            $error = $pdf->getError();
           return $error;
        }
    }
    
}
