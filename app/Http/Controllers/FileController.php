<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class FileController extends Controller {

    public function showFile() {
        return view('file');

    }

   public function uploadFile(Request $request) {
       $role = Role::create(['name' => 'moderator']);
       $permission = Permission::create(['name' => 'upload files', 'show files']);
       $role->syncPermissions($permission);



        $request->validate([
            'file' => 'required|file|max:2048',
        ]);
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

      $filePath = 'Documents';
      $file->storeAs($filePath, $fileName, 'local');

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
