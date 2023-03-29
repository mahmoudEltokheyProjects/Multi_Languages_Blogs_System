<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
// use DataTables;
use Yajra\DataTables\DataTables;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    protected $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    // +++++++++++++++++++++++++++++++++ Show "categories" ++++++++++++++++++++++++++++++++
    public function index()
    {
        return view('dashboard.categories.index');
    }
    // +++++++++++++++++++++++++++++++++ Show "categories" in "dataTable ++++++++++++++++++++++++++++++++
    // Get "categories" and "show" them in "DataTables" table
    public function getCategoriesDatatable()
    {
        // Get "All categories"
        $data = Category::select('*')->with('parents');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row)
            {
                // if "user" has "permission" to "edit and delete" category
                if(auth()->user()->can('update', $this->setting))
                {
                return $btn = '
                        <a href ="' . Route('dashboard.category.edit', $row->id) . '" class="edit btn btn-success btn-sm">
                        <i class = "fa fa-edit"></i></a>
                        <a id="deleteBtn" data-id="'.$row->id.'" class="edit btn btn-danger btn-sm" data-toggle= "modal"
                        data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                }
                else
                {
                    return;
                }
            })
            ->addColumn('parent', function ($row) {
                return ($row->parent == 0) ? trans('words.main category') : $row->parents->translate(app()->getLocale())->title;
            })
            ->addColumn('title', function ($row) {
                return $row->translate(app()->getLocale())->title;
            })
            // ->addColumn('status', function ($row) {
            //     return $row->status == null ? __('words.notActivated') : __('words'.'.'.$row->status);
            // })
            ->rawColumns(['action', 'title', 'parent'])
            ->make(true);
    }
    // +++++++++++++++++++++++ create() method : Create "new category" +++++++++++++++++++++++
    public function create()
    {
        $this->authorize('create', $this->setting);
        $categories = Category::whereNull('parent')->orWhere('parent', 0)->get();
        return view('dashboard.categories.add', compact('categories'));
    }
    // ++++++++++++++++++ store() method : To store "new category" data in "categories" table +++++++++++++++++
    public function store(Request $request)
    {
        $this->authorize('create', $this->setting);
        // Store "All new category" data in "categories" table Except 'image' and '_token' inputfields
        $category =  Category::create($request->except('image', '_token'));
        // Check if "image" is "uploaded" or Not
        if ($request->file('image'))
        {
            // store "uploaded image" in $file
            $file = $request->file('image');
            /* Note :
                "uuid" is 36-character alphanumeric string that can be used to identify information
                UUID => Universally Unique IDentifier
            */
            // image name = 'uuid'.'original image name'
            $filename = Str::uuid() . $file->getClientOriginalName();
            // Store "uploaded image" in "public/images/" directory
            $file->move(public_path('images'), $filename);
            // image path = "images/"
            $path = 'images/' . $filename;
            // update value of "image column" with "new image value"
            $category->update(['image' => $path]);
        }
        /*  Redirect to "dashboard/categories/index.blade.php" */
        return redirect()->route('dashboard.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    // ++++++++++++++++++ edit() method : To edit "category" data  +++++++++++++++++
    public function edit(Category $category)
    {
        $this->authorize('update', $this->setting);
        // Get "All categories data" with "parent==null" or "parent==0" column in DB
        $categories = Category::whereNull('parent')->orWhere('parent', 0)->get();
        // Go To "edit page" with "category_id = $category" and "categories data = $categories"
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }
    // +++++++++++++++++++++++++++ update() method : update "category" data +++++++++++++++++++++++++++
    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $this->setting);
        // update "category" data in "categories" table Except 'image' and '_token' inputfield
        $category->update($request->except('image', '_token'));
        // +++++++++++++ Update "image" +++++++++++++++++++
        // Check if "image" is "uploaded" or Not
        if($request->file('image'))
        {
            // store "uploaded image" in $file
            $file = $request->file('image');
            /* Note :
                "uuid" is 36-character alphanumeric string that can be used to identify information
                UUID => Universally Unique IDentifier
            */
            // image name = 'uuid'.'original image name'
            $filename = Str::uuid().$file->getClientOriginalName();
            // Store "uploaded image" in "public/images/" directory [ Move image from 'tmp' to 'public/images' ]
            $file->move(public_path('images'), $filename);
            // image path = "images/"
            $path = 'images/'.$filename;
            // update value of "image column" with "new image value"
            $category->update(['image'=>$path]);
        }
        /*  Redirect to "dashboard/categories/index.blade.php" */
        return redirect()->route('dashboard.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // +++++++++++++++++++++++++++ "Delete" Category +++++++++++++++++++++++++++
    public function delete(Request $request)
    {
        $this->authorize('delete', $this->setting);
        // Check if "category id" is number
        if(is_numeric($request->id))
        {
            // if "sub_category"
            Category::where('parent', $request->id)->delete();
            // if "main category"
            Category::where('id', $request->id)->delete();
        }
        /*  Redirect to "dashboard/categories/index.blade.php" */
        return redirect()->route('dashboard.category.index');
    }
}
