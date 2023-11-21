<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Milon\Barcode\DNS1D;

class barCodeController extends Controller
{
    public function generateBarcode(Request $request)
    {
        $text = $request->input('text');

        if (!empty($text)) {
            $barcode = new DNS1D();
            $barcode->setStorPath(public_path('barcodes'));

            $barcodePNG = $barcode->getBarcodePNG($text, 'C128');

            $image = Image::make($barcodePNG);

            $webpFilePath = public_path('barcodes/') . $text . '.webp';
            $image->save($webpFilePath, 100, 'webp');

            return response()->file($webpFilePath);
        } else {
            return redirect()->back()->with('error', 'Proszę wprowadzić tekst do zakodowania.');
        }
    }
}
