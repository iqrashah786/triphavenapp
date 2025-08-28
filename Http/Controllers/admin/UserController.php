<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
class UserController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->ajax());
             if ($request->ajax()) {
             $data = User::get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $action = '';
                    $editUrl = route('user.edit', $row->id);
                    $deleteUrl = route('user.destroy', $row->id);
                    $action .= '<a href=" ' . $editUrl  . '" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp;
                            <button data-href="' . $deleteUrl . '" class="btn btn-sm btn-danger delete_cat_button"><i class=" fas fa-trash-alt" ></i> Delete</button>';
                    return $action;
                })
                ->removeColumn('id')
                ->rawColumns([ 'action'])
                ->make(true);
        }
        return view('Admin.users.index');
    }
public function store(Request $request) {

    User::create($request->all());

    return redirect()->route('user.index');

}
    public function create() {
        $user=new User();
        return view('admin.users.create',compact('user'));
    }

    public function edit($id) {
        $user=User::find($id);
        return view('admin.users.create',compact('user'));
    }
    public function update(Request $re,$id) {
        $user=User::find($id);
        $user->update($re->all());
        return redirect()->route('user.index');
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'user not found ".'], 404);
        }
        $user->delete();
        return response()->json(['success' => 'Record deleted successfully.']);
    }
}
