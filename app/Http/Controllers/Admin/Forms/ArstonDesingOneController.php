<?php

namespace App\Http\Controllers\Admin\Forms;

use Illuminate\Http\Request;
use App\Models\ArstonDesignOne;
// use Spatie\LaravelPdf\Facades\Pdf;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Spatie\Browsershot\Browsershot;

use function Spatie\LaravelPdf\Support\pdf;
// use mikehaertl\wkhtmlto\Pdf;


class ArstonDesingOneController extends Controller
{
    public function Index(Request $request){
        $arston = ArstonDesignOne::where('id',$request->id)->first();
       
        $filename = $arston->estate_name.'.pdf';
  
    //    return Pdf('pdfs.index', ['arston' => $arston])
    //     ->format('a4')
    //     ->save($filename);

    //     $view = view('pdfs.index')->render();
    //     $path = public_path("pdfs");
    //     if(!File::exists($path)){
    //         File::makeDirectory($path, 0755, true);
    //     }
    //    Browsershot::html($view)->save($path.'arston.pdf');
    $pdf = Pdf::loadView('pdfs.index', ['arston'=>$arston]);
    return $pdf->download($filename);

    }
    
}
