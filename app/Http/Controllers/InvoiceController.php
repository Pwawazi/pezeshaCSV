<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Csvdata;

class InvoiceController extends Controller
{
    public function uploadCSV(Request $request)
    {
        $fileName = time().'.'.$request->file('csv')->getClientOriginalExtension();
        $request->file('csv')->move(public_path('/uploadedCSV'), $fileName);

        $this->getCSV($fileName);

        dd('done');

    }

    public function getCSV($fileName)
    {
        if(($handle =fopen(public_path().'/uploadedCSV/'.$fileName, 'r')) != FALSE)
        {
            while( ($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $csv_data = new Csvdata();
                $csv_data->InvoiceNo = $data[0];
                $csv_data->StockCode = $data[1];
                $csv_data->Description = $data[2];
                $csv_data->Quantity = $data[3];
                $csv_data->InvoiceDate = $data[4];
                $csv_data->UnitPrice = $data[5];
                $csv_data->CustomerId = $data[6];
                $csv_data->Country = $data[7];
                $csv_data->save();
            }
        }
        fclose($handle);

        $final_data = $csv_data::all();

        return redirect()->route('upload');
    }
}
