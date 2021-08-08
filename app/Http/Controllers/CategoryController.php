<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\EditRequest;
class CategoryController extends Controller
{

    public function index()
    {
        $item=Category::get();
        return view("category.index")->withItem($item);
        //$items = Category::all();
        //$items = Category::where('id','>',1)->get();
        $items = Category::paginate(3);

        //$items = Category::orderBy('name')->take(3)->get();
        //$items = Category::orderBy('name')->skip(3)->take(3)->get();
        //$items = Category::orderBy('name')->skip(3)->take(1)->first();
        //$items = Category::where('id','>',2000)->first();

        //$items = \DB::table('categories')->where('id','>',20)->select('id as xid','name')->get();
        //$items = \DB::table('categories')->where('id','>',20)->selectRaw('id as xid, name')->get();
        //$items = \DB::table('categories')->whereIn('id',[1,3])->selectRaw('id as xid, name')->get();
        //$items = \DB::table('categories')->whereNotIn('id',[1,3])->selectRaw('id as xid, name')->get();

       // $items = Category::whereRaw('(id > ? and id<5) or id=1',2)->get();
        //$items = Category::where('id','>',3)->orWhere('id',1)->get();
       // return $items ;
       // dd($items);
        return view("category.index")->withItems($items);
    }

    public function create()
    {
        return view("category.create");
    }


    public function store(CreateRequest $request)
    {
       // category::create($request->all());
        /*$request->validate([
            'name' => 'required|max:50|unique:categories'
        ]);*/
        if(!$request->active){
            $request['active'] = '0';
        }
        Category::create($request->all());
        return redirect(route('category.index'))->with('msg','Category Created Successfully');

    }


    public function show($id)
    {  
        $item = Category::find($id);
        if(!$item){
            return redirect(route('category.index'))->with("msg","Invalid Category ID");
        }
        return view("category.show")->with('item',$item);
    }


    public function edit($id)
    {
        $item = Category::find($id);
        if(!$item){
            return redirect(route('category.index'))->with("msg","Invalid Category ID");
        }
        return view("category.edit")->with('item',$item);
    }

    public function update(EditRequest $request, $id)
    {
        /*$request->validate([
            'name' => 'required|max:50|unique:categories,name,'.$id
        ]);*/
        if(!$request->active){
            $request['active'] = '0';
        }
        $item = Category::find($id);
        $item->update($request->all());
        return redirect(route('category.index'))->with("msg","Category Updated Successfully");
    }

    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemDB=category::find($id);
        $itemDB->delete();
        $item = Category::find($id);
        if($item){
            $item->delete();
            session()->flash("msg","Category Deleted successfully");
        }
        return redirect(route('category.index'));
    }
}
