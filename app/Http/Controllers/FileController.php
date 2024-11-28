<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FileController extends Controller {

    public function showFile() {
        return view('file');

    }

   public function uploadFile(Request $request) {
       $role = Role::create(['name' => 'moderator']);
       $permission = Permission::create(['name' => 'upload files']);

        $request->validate([
            'file' => 'required|file|max:2048',
        ]);
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        $filePath = '/Home/matt/Documents';
        $file->move($filePath, $fileName);

        return back()->with('success', 'File Uploaded Successfully');
   }

   public function downloadFile($fileName) {
        $filePath = '/Home/matt/Documents/' . $fileName;

        if(!file_exists($filePath)) {
            abort(404, 'File not Founds');
        }
        return response()->download($filePath);
   }
}
