<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('archivos.create');
    }
    
    public function AllFiles()
    {
        $files = File::latest()->paginate(5);
        return view('archivos.index', compact('files'));
    }

    public function StoreFiles(Request $request)
    {
        $validatedData = $request->validate(
            [
                'file_name' => 'required|unique:files|min:4',
                'period' => 'required|min:10',
                'year_info' => 'required',
                'type_file' => 'required|mimes:jpg,jpeg,png,doc,docx,xls,xlsm,xlsx,pdf|max:20480',
            ],
            [
                'file_name.required' => 'Ingresa un nombre valido.',
                'file_name.min' => 'El nombre debe tener al menos 4 letras.',
                'period.required' => 'Ingresa un periodo valido, debe ser letras.',
                'period.min' => 'El periodo debe tener al menos 10 letras.',
                'year_info.required' => 'Ingresa un año valido, deben ser numeros.',
                'type_file.required' => 'Archivo no seleccionado, debe seleccionar un archivo',
                'type_file.mimes' => 'Las extensiones de archivos validas son: jpg, jpeg, png, doc, docx, xls, xlsx, pdf',
                'type_file.max' => 'El archivo no debe pesar mas de 20mb',
            ],
        );

        $type_file = $request->file('type_file');

        $name_gen = hexdec(uniqid());
        $file_ext = strtolower($type_file->getClientOriginalExtension());
        $file_name = $name_gen.'.'.$file_ext;
        $up_location = 'files/archivos/';
        $last_file = $up_location.$file_name;
        $type_file->move($up_location, $file_name);

       /*  $name_gen = hexdec(uniqid()).'.'.$type_file->getClientOriginalExtension();
        Image::make($type_file)->save('files/archivos/'.$name_gen); */
        

       // $last_file = 'files/archivos/'.$name_gen;

        File::insert([
            'file_name' => $request->file_name,
            'period' => $request->period,
            'year_info' => $request->year_info,
            'type_file' => $last_file,
            'created_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return Redirect()->back()->with('success','Archivo Agregado correctamente.');
    }

    public function Edit($id)
    {
        $files = File::find($id);
        return view('archivos.edit', compact('files'));
    }

    public function Update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'file_name' => 'required|min:4',
                'period' => 'required|min:10',
                'year_info' => 'required',
            ],
            [
                'file_name.required' => 'Ingresa un nombre valido.',
                'file_name.min' => 'El nombre debe tener al menos 4 letras.',
                'period.required' => 'Ingresa un periodo valido, debe ser letras.',
                'period.min' => 'El periodo debe tener al menos 10 letras.',
                'year_info.required' => 'Ingresa un año valido, deben ser numeros.',
                'type_file.required' => 'Archivo no seleccionado, debe seleccionar un archivo',
                'type_file.mimes' => 'Las extensiones de archivos validas son: jpg, jpeg, png, doc, docx, xls, xlsx, pdf',
                'type_file.max' => 'El archivo no debe pesar mas de 20mb',
            ],
        );

        $old_file = $request->old_file;

        $type_file = $request->file('type_file');

        if ($type_file) {
            $name_gen = hexdec(uniqid());
            $file_ext = strtolower($type_file->getClientOriginalExtension());
            $file_name = $name_gen . '.' . $file_ext;
            $up_location = 'files/archivos/';
            $last_file = $up_location . $file_name;
            $type_file->move($up_location, $file_name);

            unlink($old_file);
            File::find($id)->update([
                'file_name' => $request->file_name,
                'period' => $request->period,
                'year_info' => $request->year_info,
                'type_file' => $last_file,
                'updated_at' => Carbon::now(),
                'user_id' => Auth::user()->id,
            ]);

            return Redirect()->back()->with('success','Archivo Actualizado correctamente.');
        } else {
            File::find($id)->update([
                'file_name' => $request->file_name,
                'period' => $request->period,
                'year_info' => $request->year_info,
                'updated_at' => Carbon::now(),
                'user_id' => Auth::user()->id,
            ]);
            return Redirect()->back()->with('success','Archivo Actualizado correctamente.');
        }
    }

    public function Delete($id)
    {
        $file = File::find($id);
        $old_file = $file->type_file;
        unlink($old_file);

        File::find($id)->delete();
        return Redirect()->back()->with('success','Archivo Eliminado correctamente.');
    }

    //// This is for Multi Image All Methods
    /*
    public function Multpic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }

    public function StoreImg(Request $request)
    {
        $image = $request->file('image');

        foreach ($image as $multi_img) {
            $name_gen = hexdec(uniqid()) . '.' . $multi_img->getClientOriginalExtension();
            Image::make($multi_img)
                ->resize(300, 300)
                ->save('image/multi/' . $name_gen);

            $last_img = 'image/multi/' . $name_gen;

            Multipic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
        } // end of the foreach

        return Redirect()
            ->back()
            ->with('success', 'Brand Inserted Successfully');
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()
            ->route('login')
            ->with('success', 'User Logout');
    }
 */


}
