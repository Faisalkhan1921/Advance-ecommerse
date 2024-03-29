<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfile;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\Slider;
use App\Models\SubSubCategory;

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// admin section routes 

Route::get('/admin',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfile::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit/view',[AdminProfile::class,'ProfileEditView'])->name('edit.profile.pic');
Route::post('/store/profile_image',[AdminProfile::class,'storeprofile'])->name('store.profile_image');
Route::get('/change/password/view',[AdminProfile::class,'ChangePasswordViwe'])->name('change.password.view');
Route::post('/update/password',[AdminProfile::class,'UpdatePassword'] )->name('update.password');

//brand section

Route::get('/all/brands',[BrandController::class,'AllBrands'])->name('all.brands');
Route::post('/store/brand/data',[BrandController::class,'StoreBrand'])->name('store.brand.data');
Route::get('/edit/brand/{id}',[BrandController::class,'EditBrand'])->name('edit.brand');
Route::post('/update/brand/{id}',[BrandController::class,'UpdateBrand'])->name('update.brand');
Route::get('/delete/brand/{id}',[BrandController::class,'DeleteBrand'])->name('delete.brand');

//category portion
Route::get('/all/category',[CategoryController::class,'AllCategory'])->name('all.category');
Route::post('/store/category',[CategoryController::class,'StoreCategory'])->name('store.category');
Route::get('/edit/category/{id}',[CategoryController::class,'EditCategory'])->name('edit.category');
Route::post('/update/category/{id}',[CategoryController::class,'UpdateCategory'])->name('update.cat.data');
Route::get('/delete/category/{id}',[CategoryController::class,'DeleteCategory'])->name('delete.category');


//subcategory portion
Route::get('/all/subcategory',[SubCategoryController::class,'AllSubCat'])->name('all.subcat');
Route::post('/store/subcat',[SubCategoryController::class,'StoreSubCat'])->name('store.subcat');
Route::get('/edit/subcat/{id}',[SubCategoryController::class,'EditSubCat'])->name('edit.subcat');
Route::post('/update/subcat/{id}',[SubCategoryController::class,'UpdateSubCat'])->name('update.subcat');
Route::get('/delete/subcat/{id}',[SubCategoryController::class,'DeleteSubCat'])->name('delete.subcat');

// All Sub -> subcategory
Route::get('/all/sub_subcat',[SubSubCategoryController::class,'AllSub_SubCat'])->name('all.sub_subcat');
Route::get('/category/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);
Route::post('/store/sub/subcategory',[SubSubCategoryController::class,'StoreSubSubCategory'])->name('store.sub_subcat');
Route::get('/edit/sub/subcategory/{id}',[SubSubCategoryController::class,'EditSubSubCategory'])->name('edit.sub_subcat');
Route::post('/update/sub/subcategory/{id}',[SubSubCategoryController::class,'UpdateSubSubCategory'])->name('update.sub_subcat');
Route::get('/delete/sub/subcategory/{id}',[SubSubCategoryController::class,'DeleteSubSubCategory'])->name('delete.sub_subcat');

//All Produccts section
Route::get('/add/products',[ProductsController::class,'AddProducts'])->name('all.products');
Route::get('/category/sub_subcategory/ajax/{subcategory_id}', [ProductsController::class, 'GetSubSubCategory']);
Route::post('/store/products',[ProductsController::class,'ProductStore'])->name('products.store');
Route::get('/view/products',[ProductsController::class,'ViewProducts'])->name('manage.products');
Route::get('/edit/product/{id}',[ProductsController::class,'EditProduct'])->name('edit.products');
Route::post('/update/product/data/{id}',[ProductsController::class,'UpdateProductData'])->name('products.data.update');
Route::post('/update/product/multi_image',[ProductsController::class,'UpdateProductMultiImg'])->name('update.product_multi_image');
Route::post('/update/product/thumbnail/{id}',[ProductsController::class,'UpdateProductThumbnail'])->name('update.product_thumbnail');
Route::get('/delete/product/multi_image/{id}',[ProductsController::class,'DeleteMultiImage'])->name('product.multi_delete');
Route::get('product/inactive/{id}',[ProductsController::class,'ProductInactive'])->name('product.inactive');
Route::get('product/active/{id}',[ProductsController::class,'Productactive'])->name('product.active');
Route::get('delete/prodcut/{id}',[ProductsController::class,'DeleteProduct'])->name('delete.product');


//SLIDER SECTION 
Route::prefix('slider')->group(function(){
Route::get('manage',[SliderController::class,'IndexSlider'])->name('manage.slider');
Route::post('store',[SliderController::class,'SliderStore'])->name('slider.store');
Route::get('edit/{id}',[SliderController::class,'SliderEdit'])->name('edit.slider');
Route::post('update/{id}',[SliderController::class,'SliderUpdate'])->name('slider.update');
Route::get('delete/{id}',[SliderController::class,'SliderDelete'])->name('delete.slider');
Route::get('inactive/{id}',[SliderController::class,'SliderInactive'])->name('slider.inactive');
Route::get('active/{id}',[SliderController::class,'SliderActive'])->name('slider.active');
});


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// user section routes 
Route::get('/',[HomeController::class,'index']);
Route::get('/user/logout',[HomeController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[HomeController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/update',[HomeController::class,'UpdateProfile'])->name('user.profile.update');

Route::get('/user/change/password',[HomeController::class,'ChangePassword'])->name('user.change.password');
Route::post('/user/update/password',[HomeController::class,'PasswordUpdate'])->name('user.password.update');


