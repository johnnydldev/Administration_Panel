<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class SectionController extends Controller
{
    //

    function _construct(){
        $this->middleware('permission:show-section | create-section | edit-section | delete-section',['only'=>['index']]);
        $this->middleware('permission:create-section ',['only'=>['create','store']]);
        $this->middleware('permission:edit-section ',['only'=>['edit','update']]);
        $this->middleware('permission:delete-section ',['only'=>['destroy']]);
    }
    
    

    public function create()
    {
        
        return view('secciones.create');
    
    }

    public function AllSec(){
        $sections = Section::latest()->paginate(5);
        $trachSec = Section::onlyTrashed()->latest()->paginate(3);

      
        return view('secciones.index',compact('sections','trachSec'));
    }

    public function AddSec(Request $request){
        $validatedData = $request->validate([
            'section_name' => 'required|unique:sections|min:2|max:50',
            
        ],
        [
            'section_name.required' => 'Ingresa un nombre de sección valido.',
            'section_name.min' => 'Nombre de sección debe ser mayor a 3 caracteres.', 
            'section_name.max' => 'Nombre de sección debe ser menor 50 caracteres.', 
        ]);

        Section::insert([
            'section_name' => $request->section_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
 
        return Redirect()->back()->with('success','Sección Agregada correctamente.');

    }

    
    public function Edit($id){
        $sections = DB::table('sections')->where('id',$id)->first();
        return view('secciones.edit',compact('sections'));

    }


    public function Update(Request $request ,$id){
    
        $data = array();
        $data['section_name'] = $request->section_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('sections')->where('id',$id)->update($data);

        return Redirect()->route('all.section')->with('success','Sección Actualizada Correctamente.');

    }


 public function SoftDelete($id){
     $delete = Section::find($id)->delete();
     return Redirect()->back()->with('success','Sección Borrada Correctamente.');
 }


  public function Restore($id){
      $delete = Section::withTrashed()->find($id)->restore();
      return Redirect()->back()->with('success','Sección Restaurada Correctamente.');

  }

 public function Pdelete($id){
     $delete = Section::onlyTrashed()->find($id)->forceDelete();
     return Redirect()->back()->with('success','Sección Eliminada Permanentemente.');
 }

}
