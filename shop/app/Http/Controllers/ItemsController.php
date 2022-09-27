<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Items::all();
        $subCategories = SubCategory::all();
        $categories = Category::all();
        return view('item.index', [
            'items' => $items,
            'subCategories' => $subCategories,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Items::all();
        $subCategories = SubCategory::all();
        $categories = Category::all();
        return view('item.create', [
            'items' => $items,
            'subCategories' => $subCategories,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = new Items;

        if ($request->file('photo')) {

            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $photo->move(public_path().'/item', $file);
            $items->photo = asset('/item') . '/' . $file;
        }




        $items->category_id = $request->category_id;
        $items->sub_category_id = $request->sub_category_id;
        $items->title = $request->title;
        $items->about = $request->about;
        $items->price = $request->price;
        $items->save();
        return redirect()->route('i_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        return view('item.show', ['items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        $subCategories = SubCategory::all();
        $categories = Category::all();
        return view('item.edit', [
            'items' => $items,
            'subCategories' => $subCategories,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $items)
    {
        $items->category_id = $request->category_id;
        $items->sub_category_id = $request->sub_category_id;
        $items->title = $request->title;
        $items->about = $request->about;
        $items->price = $request->price;

        if ($request->delete_photo) {
            unlink(public_path() . '/item/' . pathinfo($items->photo, PATHINFO_FILENAME) . '.' . pathinfo($items->photo, PATHINFO_EXTENSION));
            $items->photo = null;
        }
        if ($request->file('photo')) {
            if ($items->photo) {
                unlink(public_path() . '/item/' . pathinfo($items->photo, PATHINFO_FILENAME) . '.' . pathinfo($items->photo, PATHINFO_EXTENSION));
            }
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            // $Image = Image::make($photo)->pixelate(12);
            // $Image->save(public_path() . '/trucks/' . $file);
            $photo->move(public_path().'/item', $file);
            $items->photo = asset('/item') . '/' . $file;
        }

        $items->save();
        return redirect()->route('i_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $items)
    {
        if ($items->photo) {
            unlink(public_path() . '/item/' . pathinfo($items->photo, PATHINFO_FILENAME) . '.' . pathinfo($items->photo, PATHINFO_EXTENSION));
        }

        $items->delete();
        return redirect()->route('i_index');
    }


    public function subcategoryList(int $categoryId)
    {
        $subCategories = SubCategory::where('category_id', $categoryId)->orderBy('sub_category')->get();
        $html = view('item.subcategory_list')->with('subCategories', $subCategories)->render();
        return response()->json([
            'html' => $html,
        ]);
    }
}
