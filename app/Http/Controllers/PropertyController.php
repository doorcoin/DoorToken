<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use App\Models\UserRole;
use App\Models\PropertyTypes;
use App\Models\Property;
use App\Models\PropertyUserMap;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'my_property',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'properties' => Property::all()
                ]
            );
        }
    }

    public function add(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {

            return view(
                'property_add',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'property_types' => PropertyTypes::all()
                ]
            );
        }
    }

    public function create(Request $request) {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {
            if($request->user()->user_role == 1) {
                $request->validate([
                    'parcel_number' => 'required|unique:property|string|max:45',
                    'address1' => 'required|string|max:45',
                    'address2' => 'nullable|string|max:45',
                    'city' => 'required|string|max:45',
                    'state' => 'required|string|max:45',
                    'zip' => 'required|string|max:45',
                    'area_lot_sf' => 'required|numeric',
                    'area_building_sf' => 'required|numeric',
                    'num_beds' => 'nullable|numeric',
                    'num_bath' => 'nullable|numeric',
                    'tax_value' => 'required|numeric',
                    'market_value' => 'required|numeric',
                    'year_built' => 'required|numeric',
                    'property_type_id' => 'required|numeric',
                    'resources' => 'required',
                ]);
            } else {
                $request->validate([
                    'parcel_number' => 'required|unique:property|string|max:45',
                    'address1' => 'required|string|max:45',
                    'address2' => 'nullable|string|max:45',
                    'city' => 'required|string|max:45',
                    'state' => 'required|string|max:45',
                    'zip' => 'required|string|max:45',
                    'property_type_id' => 'required|numeric',
                    'resources' => 'required',
                ]);
            }

            $property = new Property;
            $property->fill($request->input());

            $path = \Carbon\Carbon::now()->format(('YmdHis'));
            if($request->hasFile('resources'))
            {
                foreach($request->file('resources') as $file)
                {
                    $file->storeAs('public/documents/', $path . '.' . $file->getClientOriginalExtension());
                    $property->filename = $path . '.' . $file->getClientOriginalExtension();
                }
            }

            $property->resource_link = $path;
            $extension = $file->getClientOriginalExtension();
            $body = '';
            if($extension == 'doc' || $extension == 'docx') {
                $phpWord = \PhpOffice\PhpWord\IOFactory::createReader('Word2007')->load($file);
                if(method_exists($phpWord, 'getSections')) {
                    foreach ($phpWord->getSections() as $section) {
            
                        $body = '<p>';
                        
                        if (method_exists($section, 'getElements')) {
            
                            foreach ($section->getElements() as $e) {

                                if(get_class($e) === 'PhpOffice\PhpWord\Element\TextBreak'){
                                    $body .='<br>';
                                }else
                                if(get_class($e) === 'PhpOffice\PhpWord\Element\TextRun') {
                                    foreach($e->getElements() as $text) {
                                        $body = $body.'<span style="float:left;font-size:14px;">'.$text->getText().'</span>';
                                    }
                                }  
                                if(get_class($e) === 'PhpOffice\PhpWord\Element\Text'){
                                    $font = $e->getFontStyle();
                                    $size = $font->getSize();
                                    $bold = $font->isBold() ? 'font-weight:700;' :'';
                                    $color = $font->getColor();
                                    if($font->isItalic()){
                                    $ital = 'italic';
                                    } else {$ital = '';};
                                    $fontFamily = $font->getName();
                                    $body .='<span style="display:inline;text-align:left;font-style:'.$ital.';font-size:14px;font-family:'.$fontFamily .';'.$bold.'; color:#'.$color.';'.$line.'">';
                                    $body .=$e->getText().'</span>';
                                }
                                if(get_class($e) === 'PhpOffice\PhpWord\Element\Image'){
                                    $body .= '<div style="width:200px;height:150px; background:red;"></div>';
                                } 
                                if(get_class($e) === 'PhpOffice\PhpWord\Element\Table') {
                                    $body .= '<table border="2px">';
                                        
                                    $rows = $e->getRows();
                                        
                                    foreach($rows as $row) {
                                        $body .= '<tr>';
                                        
                                        $cells = $row->getCells();
                                        foreach($cells as $cell) {
                                        $body .= '<td style="width:'.$cell->getWidth().'">';
                                        $celements = $cell->getElements();
                                            foreach($celements as $celem) {
                                            if(get_class($celem) === 'PhpOffice\PhpWord\Element\Text') {
                                                $body .= $celem->getText();
                                            }
                                        
                                            else if(get_class($celem) === 'PhpOffice\PhpWord\Element\TextRun') {
                                            foreach($celem->getElements() as $text) {
                                            $body .= $text->getText();
                                            }  
                                            }
                                        } 
                                        $body .= '</td>';
                                        }
                                            $body .= '</tr>';
                                        }
                                            $body .= '</table>';
                                        }

                                        if (get_class($e)==='PhpOffice\PhpWord\Element\ListItem'){
                                        $list = new \PhpOffice\PhpWord\Style\ListItem();
                                        $listType .= $list->getListType();
                                        if($listType === 7) {
                                            $lts = '<ol>';
                                            $lte = '</ol>';
                                        }
                                        else if($listType === 3) {
                                            $lts = '<ul>';
                                            $lte = '</ul>';
                                        }
                                        $body .='<ul style="font-size:14px; color:black; font-family:Times-New-Roman;>';

                                        $ee = 'PhpOffice\PhpWord\Element\ListItem';

                                        $obj = $e->getTextObject();


                                            $body .='<li style="color:'.$color.';">';

                                            if(get_class($obj)==='PhpOffice\PhpWord\Element\Text'){


                                                $body .=$obj->getText();

                                            }


                                        $body .='</li>';

                                    $body .='</ul>';
                                }
                            }
                            $body .='</p>';  
                        }        
                        
                    }
                }
            }
            else if($extension == 'pdf') {
                $parser = new \Smalot\PdfParser\Parser();
                $pdf    = $parser->parseFile($file);

                $body = $pdf->getText();
            }
            $verified = false;
            if($body) {
                $address1 = $request->address1;
                $address2 = $request->address2;
                $state = $request->state;
                $city = $request->city;
                if(str_contains($body, $address1) && str_contains($body, $address1) && str_contains($body, $address1) && str_contains($body, $address1)) {
                    $verified = true;
                } else {
                    $verified = false;
                }
            }
            if($verified) {
                if ($property->save()) {

                    $property_user = new PropertyUserMap();
                    $property_user->property_id = $property->id;
                    $property_user->user_id = $request->user()->id;

                    if ($property_user->save()) {
                        return redirect()->route('property.index.view')->with('new', true);
                    }
                }
            } else {
                return redirect()->route('property.add.view')->withErrors('Property not verified');
            }

            return view(
                'property_add',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'property_types' => PropertyTypes::all(),
                ]
            );
        }
    }

}
