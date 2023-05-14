<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\User;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class Admin extends Controller
{
    public function dashboard()
    {
        $countRecords = [
            'users' => User::count(),
            'products' => Product::count(),
            'categories' => Category::count(),
            'colors' => Color::count(),
            'sizes' =>Size::count()
        ];

        return view('admin.dashboard', compact('countRecords'));
    }

    public function users(){
        $users = User::all()->sortByDesc('id');
        return view('admin.users.users', compact('users'));
    }

    public function add(){
        return view('admin.users.form');
    }

    public function create(Request $request){
        $request->validate([
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|email|unique:users|max:100',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])/',
                'confirmed',
                'max:100'
            ],
            'role' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'password.regex' => 'Your password must contain at least one special character, one lowercase letter, one uppercase letter and one digit.',
        ]);


        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('public/images', $imageName);

        $user = new UserModel();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->image = Storage::url($imagePath);
        $result = $user->save();

        if($result) {
            return redirect('admin/users')->with('success', 'You have created a user successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function update(int $id){
        $user = UserModel::where('id', $id)->first();
        return view('admin.users.form', compact('user'));
    }

    public function store(Request $request)
    {
        $user = UserModel::where('id',$request->user_id)->first();
        if(
            $request->firstname == $user->firstname &&
            $request->lastname == $user->lastname &&
            $request->email == $user->email &&
            $request->password == null &&
            $request->password_confirmation == null &&
            $request->role == $user->role &&
            $request->image == null
        )
        {
            return back()->with('success', 'Nothing changed!');
        }

        $validatedData = $request->validate([
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('users')->ignore($request->user_id, 'id')
            ],
            'password' => [
                'nullable',
                'min:8',
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])/',
                'confirmed',
                'max:100'
            ],
            'role' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'password.regex' => 'Your password must contain at least one special character, one lowercase letter, one uppercase letter and one digit.',
        ]);

        if($request->password == null){
            unset($validatedData['password']);
        }
        if($request->image == null){
            unset($validatedData['image']);
        }else {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/images', $imageName);
            $validatedData['image'] = Storage::url($imagePath);
        }

        $result = $user->update($validatedData);

        if($request->password != null){
            $user->password = Hash::make($request->password);
            $user->save();
        }

        if($result) {
            return redirect('admin/users')->with('success', 'You have updated a user successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    public function delete(Request $request)
    {
        if($request->has('user_id')){
            $user = UserModel::where('id',$request->user_id)->first();
            $result = $user->delete();
            if($result) {
                return redirect('admin/users')->with('success', 'You have deleted a user successfully');
            }else {
                return back()->with('fail', 'Something went wrong');
            }
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    public function products(){
        $products = Product::all()->sortByDesc('id');
        return view('admin.products.products', compact('products'));
    }

    public function addProduct(){
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.products.form', compact('categories', 'colors', 'sizes'));
    }

    public function createProduct(Request $request){
        $request->validate([
            'barcode' => 'required',
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'required|image|max:5048',
            'category' => 'required|exists:category,id',
            'size' => 'required|exists:size,id',
            'color' => 'required|exists:color,id',
        ]);

        $product = new Product();
        $product->barcode = $request->input('barcode');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category');
        $product->size_id = $request->input('size');
        $product->color_id = $request->input('color');

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('public/product/images', $imageName);
        $product->image = Storage::url($imagePath);

        $result = $product->save();

        if($result) {
            return redirect('admin/products')->with('success', 'You have created a product successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function updateProduct(int $id){
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.products.form', compact('product','categories', 'colors', 'sizes'));
    }

    public function storeProduct(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        if(
            $request->barcode == $product->barcode &&
            $request->name == $product->name &&
            $request->price == $product->price &&
            $request->quantity == $product->quantity &&
            $request->size == $product->size_id &&
            $request->color == $product->color_id &&
            $request->category == $product->category_id &&
            $request->image == null
        )
        {
            return back()->with('success', 'Nothing changed!');
        }

        $validatedData =   $request->validate([
            'barcode' => 'required',
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'image|max:5048',
            'category' => 'required|exists:category,id',
            'size' => 'required|exists:size,id',
            'color' => 'required|exists:color,id',
        ]);


        if($request->image == null){
            unset($validatedData['image']);
        }else {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/images', $imageName);
            $validatedData['image'] = Storage::url($imagePath);
        }

        $result = $product->update($validatedData);
        $product->category_id = $validatedData['category'];
        $product->size_id = $validatedData['size'];
        $product->color_id = $validatedData['color'];
        $product->save();

        if($result) {
            return redirect('admin/products')->with('success', 'You have updated a user successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    public function deleteProduct(Request $request)
    {
        if($request->has('product_id')){
            $product = Product::where('id',$request->product_id)->first();
            $result = $product->delete();
            if($result) {
                return redirect('admin/products')->with('success', 'You have deleted a user successfully');
            }else {
                return back()->with('fail', 'Something went wrong');
            }
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    // categories methods -----------------------------------------

    public function categories(){
        $categories = Category::all()->sortByDesc('id');
        return view('admin.categories.categories', compact('categories'));
    }

    public function addCategory(){
        $categories = Category::all()->sortByDesc('id');
        return view('admin.categories.form', compact('categories'));
    }

    public function createCategory(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $result = $category->save();

        if($result) {
            return redirect('admin/categories')->with('success', 'You have created a category successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function updateCategory(int $id){
        $category = Category::where('id', $id)->first();
        $categories = Category::whereNotIn('id', [$id])->get();
        return view('admin.categories.form', compact('category','categories'));
    }

    public function storeCategory(Request $request)
    {
        $category = Category::where('id',$request->category_id)->first();
        if(
            $request->name == $category->name &&
            $request->parent_id == $category->parent_id
        )
        {
            return back()->with('success', 'Nothing changed!');
        }

        $validatedData =   $request->validate([
            'name' => 'required',
            'parent_id' => '',
        ]);

        $result = $category->update($validatedData);
        // $category->save();

        if($result) {
            return redirect('admin/categories')->with('success', 'You have updated a category successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    public function deleteCategory (Request $request)
    {
        if($request->has('category_id')){
            $category = Category::where('id',$request->category_id)->first();
            $result = $category->delete();
            if($result) {
                return redirect('admin/categories')->with('success', 'You have deleted a user successfully');
            }else {
                return back()->with('fail', 'Something went wrong');
            }
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    //  COLOR MENAGE 


    public function colors(){
        $colors = Color::all()->sortByDesc('id');
        return view('admin.colors.colors', compact('colors'));
    }

    public function addColor(){
        return view('admin.colors.form');
    }

    public function createColor(Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $color = new Color();
        $color->name = $request->input('name');
        $color->code = $request->input('code');
        
        $result = $color->save();

        if($result) {
            return redirect('admin/colors')->with('success', 'You have created a color successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function updateColor(int $id){
        $color = Color::where('id', $id)->first();
        return view('admin.colors.form', compact('color'));
    }

    public function storeColor(Request $request)
    {
        $color = Color::where('id',$request->color_id)->first();
        if(
            $request->name == $color->name &&
            $request->code == $color->code
        )
        {
            return back()->with('success', 'Nothing changed!');
        }

        $validatedData =   $request->validate([
            'name' => 'required',
            'code' => 'required',
           
        ]);

        $result = $color->update($validatedData);
        //$color->save();

        if($result) {
            return redirect('admin/colors')->with('success', 'You have updated a user successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    public function deleteColor(Request $request)
    {
        if($request->has('color_id')){
            $color = Color::where('id',$request->color_id)->first();
            $result = $color->delete();
            if($result) {
                return redirect('admin/colors')->with('success', 'You have deleted a color successfully');
            }else {
                return back()->with('fail', 'Something went wrong');
            }
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    //SIZES 
    public function sizes(){
        $sizes = Size::all()->sortByDesc('id');
        return view('admin.sizes.sizes', compact('sizes'));
    }

    public function addSize(){
        return view('admin.sizes.form');
    }
    
    public function createSize(Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $size = new Size();
        $size->name = $request->input('name');
        $size->code = $request->input('code');
        
        $result = $size->save();

        if($result) {
            return redirect('admin/sizes')->with('success', 'You have created a size successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function updateSize(int $id){
        $size = Size::where('id', $id)->first();
        return view('admin.sizes.form', compact('size'));
    }

    public function storeSize(Request $request)
    {
        $size = Size::where('id',$request->size_id)->first();
        if(
            $request->name == $size->name &&
            $request->code == $size->code
        )
        {
            return back()->with('success', 'Nothing changed!');
        }

        $validatedData =   $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $result = $size->update($validatedData);
        //$color->save();

        if($result) {
            return redirect('admin/sizes')->with('success', 'You have updated a size successfully');
        }else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    public function deleteSize(Request $request)
    {
        if($request->has('size_id')){
            $size = Size::where('id',$request->size_id)->first();
            $result = $size->delete();
            if($result) {
                return redirect('admin/sizes')->with('success', 'You have deleted a size successfully');
            }else {
                return back()->with('fail', 'Something went wrong');
            }
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

}
