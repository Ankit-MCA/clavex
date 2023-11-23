<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // Add validation rules based on your requirements
            'name' => 'required|unique:products|max:255',
            'company' => 'required|max:255',
            'category' => 'required|in:House Hold,Beauty,Food',
            'skuno' => 'required|unique:products|max:255',
            'batch_no' => 'required|unique:products|max:255',
            'size' => 'required|in:Small,Medium,Large',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'stock_status' => 'required|in:In Stock,Out of Stock',
        ]);

        // Process the form data and store the product
        $product = new Product($request->all());
        
        // Handle image upload
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('images/products');
        //     $product->image = $imagePath;
        // }

        // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $product->image = $name;
                $destinationPath = public_path('assets/images');
                $image->move($destinationPath, $name);
            }

            // Save the product
            $product->save();
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    
    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            // Add validation rules based on your requirements
            'name' => 'required|unique:products,name,' . $id . '|max:255',
            'company' => 'required|max:255',
            'category' => 'required|in:House Hold,Beauty,Food',
            'skuno' => 'required|unique:products,skuno,' . $id . '|max:255',
            'batch_no' => 'required|unique:products,batch_no,' . $id . '|max:255',
            'size' => 'required|in:Small,Medium,Large',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'stock_status' => 'required|in:In Stock,Out of Stock',
        ]);

        // Update the product data
        $product->fill($request->all());

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
