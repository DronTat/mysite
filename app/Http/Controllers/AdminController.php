<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;
use Nayjest\Grids\ObjectDataRow;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $query = (new File())->newQuery();
        $grid = new Grid((new GridConfig)
            ->setDataProvider(new EloquentDataProvider($query))
            ->setPageSize(20)
            ->setColumns([
                (new FieldConfig('id'))->setSortable(true)->addFilter((new FilterConfig)->setOperator(FilterConfig::OPERATOR_LIKE)),
                (new FieldConfig('email'))->setSortable(true)->addFilter((new FilterConfig)->setOperator(FilterConfig::OPERATOR_LIKE)),
                (new FieldConfig('file_name'))->setSortable(true)->addFilter((new FilterConfig)->setOperator(FilterConfig::OPERATOR_LIKE)),
                (new FieldConfig('commit'))->setSortable(true)->addFilter((new FilterConfig)->setOperator(FilterConfig::OPERATOR_LIKE)),
                (new FieldConfig('button'))->setCallback(function ($val, ObjectDataRow $row) {
                    $file = $row->getSrc();
                    $icon = "<button class='btn btn-info admin-view' data-mytitle='{$file->email}' href='/admin/update?id=$file->id'>Просмотр</button>&nbsp;";
                    $delete = "<button type='button' value='{$file->id}' class='btn btn-danger admin-delete'>Удалить</button>";
                    return $icon . $delete;
                })
            ]));
        return view('admin/index', compact('grid'));
    }

    public function update(Request $request){
        $id = $request->input('id');
        $modelFile = DB::table('files')->where('id',$id)->first();
        return view('admin/form', ['email' => $modelFile->email, 'commit' => $modelFile->commit, 'id' => $modelFile->id]);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $email = DB::table('files')->where('id',$id);
        if ($email->delete()){
            $arr['code'] = 'success';
            echo json_encode($arr);
        }
    }

    public function save(Request $request){
        $id = $request->input('id');
        $commit = $request->input('commit');
        $email = DB::table('files')->where('id', $id);
        if ($email->update(['commit' => $commit])){
            $arr['code'] = 'success';
            echo json_encode($arr);
        }
    }
}
