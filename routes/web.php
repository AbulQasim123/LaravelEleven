<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminExample;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\{
    PostController,
    FrontHomeController,
    DragDropController,
    RoleController,
    CKEditorController,
    CategoryController,
    AjaxFormController,
    jqueryAutoComplete,
    MessageController,
    VacancyCRUDController,
    CurrencyController,
    UserController,
    UploadPreviewController,
    AdminController,
    DynamicAddRemoveFieldController,
    AnchorController,
    MyUploadController,
    BlogController,
    CommentController,
    TaskController,
    ContactController,
    SearchAutComplete,
    HomeController,
    MovieController,
    CountryController,
    StudentController,
    CustomerController,
    ImageController,
    JsonDataController,
    NewsController,
    OrderController,
    HelloController,
    VedioController,
    ExcelImportController
};
use App\Models\Anchor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('/test', [PostController::class, 'index'])
    ->middleware('is_admin:admin')->name('test');

Route::resource('students', StudentController::class);
Route::resource('contacts', ContactController::class);
Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('admins', AdminController::class);
Route::resource('roles', RoleController::class);
Route::resource('customers', CustomerController::class);
Route::resource('orders', OrderController::class);
Route::resource('countries', CountryController::class);
Route::resource('anchors', AnchorController::class);
Route::resource('news', NewsController::class);
Route::resource('images', ImageController::class);
Route::resource('blogs', BlogController::class);
Route::resource('videos', VedioController::class);
Route::resource('comments', CommentController::class);
Route::resource('jsondatas', JsonDataController::class);

Route::get('test-macro', function () {
    return Response::something(Anchor::get(['name', 'email']));
});

Route::get('request-method', function (Request $request) {
    dd($request->method());
});

// Laravel Collections
Route::get('collection', function (Request $request) {
    /* How to filter null values from the array in Laravel */
    $collection = collect(['AbulQsim', 'Salman', null]);
    $array = $collection->map(fn ($item) => Str::upper($item))->reject(fn ($item) => empty($item))->toArray();
    // $array = $collection->map(function ($value) {
    //     return Str::upper($value);
    // })->reject(function ($name) {
    //     return empty($name);
    // })->toArray();
    // dd($array);

    /* How to calculate average value in laravel */
    $collection = collect(['ten' => 10, 'twenty' => 20, 'thirty' => 30, 'forty' => 40]);
    $average = $collection->avg();
    // dd($average);

    /* How to create array in batch sizes in laravel */
    $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
    // $batches = $collection->chunk(5);
    // dd($batches->toArray());
    // dd($batches->all());

    /* How to flattern multi-dimensional to single array in laravel */
    $colleciton = collect([
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9],
    ]);
    $collapsed = $colleciton->collapse();
    // dd($collapsed->toArray());
    // dd($collapsed->all());

    /* How to combine two array with key/value pair in laravel */
    $collection = collect(['name', 'age', 'gender']);
    $combined = $collection->combine(['AbulQasim', 21, 'male']);
    // dd($combined->toArray());
    // dd($combined->all());

    /* How to check if value in array meet given criteria in laravel */

    $colleciton = collect([1, 2, 3, 4, 5]);
    $moreThanFive = $colleciton->contains(function ($value, $key) {
        return $value > 5;
    });
    // dd($moreThanFive);

    $colleciton = collect([
        ['product' => 'Desk', 'price' => 100],
        ['product' => 'Chair', 'price' => 300],
        ['product' => 'Sofa', 'price' => 1000],
        ['product' => 'Almirah', 'price' => 1000],
    ]);
    $product = $colleciton->contains('product', 'Sofa');
    // dd($product);

    /* How to perform multiple operations on laravel */
    $employees = collect([
        ['email' => 'abulqasim@gmail.com', 'position' => 'Full-Stack Developer'],
        ['email' => 'talib@gmail.com', 'position' => 'Full-Stack Developer'],
        ['email' => 'anurag.com', 'position' => 'Designer'],
        ['email' => 'uttam@gmail.com', 'position' => 'Designer'],
    ]);

    $duplicate = $employees->duplicates('position')->map(function ($value) {
        return Str::upper($value);
    })->all();

    // dd($duplicate);

    /* How to concatenate two arrays in laravel */
    $collection = collect(['AbulQasim']);
    $concatenated = $collection->concat(['Salman'])->concat(['Anurag'])->concat(['Uttam']);
    // dd($concatenated->toArray());

    /* How to count array in laravel */
    $collection = collect(['AbulQasim', 'Salman', 'Anurag', 'Uttam']);
    $count = $collection->count();
    // dd($count);

    /* How to get different values from array in laravel */
    $colleciton = collect(['AbulQasim', 'Salman', 'Anurag', 'Uttam']);
    $different = $colleciton->diff(['Anurag', 'Uttam']);
    // dd($different->toArray());

    /* how to filter array in laravel */
    $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
    $filtered = $collection->filter(function (int $value, int $key) {
        return $value > 5;
    });
    // dd($filtered->all());

    /* How to get first value from array in laravel */
    $collection = collect([
        ['name' => 'Regena', 'age' => null],
        ['name' => 'Linda', 'age' => 14],
        ['name' => 'Diego', 'age' => 23],
        ['name' => 'Linda', 'age' => 84],
    ]);
    // dd($collection->firstWhere('name', 'Linda'));

    /* How to flatten array in laravel */
    $collection = collect([
        ['name' => 'Qasim'],
        ['school' => 'BholaNath'],
        ['age' => 28]
    ]);

    $flattened = $collection->flatMap(function (array $values) {
        return array_map('strtoupper', $values);
    });
    // dd($flattened);

    /* How to flatten array in laravel */
    $collection = collect([
        'name' => 'AbulQasim',
        'languages' => [
            'PHP', 'LARAVEL', 'JAVASCRIPT', 'MYSQL'
        ]
    ]);

    $flattened = $collection->flatten();
    // dd($flattened);

    // How to flatten array in laravel depth
    $collection = collect([
        'Apple' => [
            [
                'name' => 'iPhone 6S',
                'brand' => 'Apple'
            ],
        ],
        'Samsung' => [
            [
                'name' => 'Galaxy S7',
                'brand' => 'Samsung'
            ],
        ],
    ]);
    $products = $collection->flatten(1);
    // dd($products->values()->all());

    /* How to flip array in laravel */
    $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
    $flipped = $collection->flip();
    // dd($flipped->all());

    /* How to forget array in laravel */
    $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
    $flipped = $collection->forget('framework');
    dd($flipped->all());
});

// Mobile Validation
// Route::get('hello-email', function (Request $request) {
//     //first solution
//     $this->validate($request, [
//         'phone' => 'required|digits:10'
//     ]);

//     //second solution
//     $this->validate($request, [
//         'phone' => 'required|numeric|between:9,11'
//     ]);

//     //  third solution
//     $this->validate($request, [
//         'phone' => 'required|min:10|numeric'
//     ]);

//     //fourth solution
//     $this->validate($request, [
//         'phone' => 'required|regex:/(01)[0-9]{9}/'
//     ]);

//     //fifth solution
//     $this->validate($request, [
//         'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
//     ]);
// });


// Laravel 11
Route::get('hello-email', [HelloController::class, 'sendHelloMail']);
Route::get('/import', [ExcelImportController::class, 'showForm']);
Route::post('/import', [ExcelImportController::class, 'import'])->name('import');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//users routes
Route::middleware(['auth', 'access-level:user'])->group(function () {
    Route::get('/welocme', [HomeController::class, 'index'])->name('welcome');
});

// admin routes
Route::middleware(['auth', 'access-level:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
});

// Frontend routes
Route::get('image', [FrontHomeController::class, 'image']);
Route::post('store', [FrontHomeController::class, 'store']);
Route::get("ck-form", [CKEditorController::class, "index"]);

Route::get('form', [SearchAutComplete::class, 'index']);
Route::get('search-autocomplete', [SearchAutComplete::class, 'searchAutocomplete']);
Route::get('input-form', [jqueryAutoComplete::class, 'index']);
Route::get('search-autocomplete', [jqueryAutoComplete::class, 'searchAutocomplete']);

// Movie routes
Route::get('/movies-list', [MovieController::class, 'index']);
Route::get('/cart-list', [MovieController::class, 'movieCart']);
Route::post('add-to-cart', [MovieController::class, 'addMovieToCart'])->name('add-movie-to-shopping-cart');
Route::delete('/delete-cart-item', [MovieController::class, 'deleteItem'])->name('delete.cart.item');

// Task routes
Route::get('tasks', [TaskController::class, 'index']);
Route::get('taskEdit/{id}/', [TaskController::class, 'edit']);
Route::post('taskStore', [TaskController::class, 'store']);
Route::get('taskDelete/{id}', [TaskController::class, 'destroy']);

// Vacancy routes
Route::get('vacancies', [VacancyCRUDController::class, 'index']);
Route::get('add-vacancy', [VacancyCRUDController::class, 'create']);
Route::post('save-vacancy', [VacancyCRUDController::class, 'store']);
Route::get('edit/{id}', [VacancyCRUDController::class, 'edit']);
Route::post('update', [VacancyCRUDController::class, 'update']);
Route::get('delete/{id}', [VacancyCRUDController::class, 'destroy']);

// Drag and drop routes
Route::get('drag-drop-form', [DragDropController::class, 'form']);
Route::post('uploadFiles', [DragDropController::class, 'uploadFiles']);

// Image upload preview routes
Route::get('preview-images', [UploadPreviewController::class, 'previewImages']);
Route::post('uploads', [UploadPreviewController::class, 'uploadMultipleImages']);

// My Upload routes
Route::get('my-form', [MyUploadController::class, 'index']);
Route::post('upload-image', [MyUploadController::class, 'multipleUpload']);

// Ajax Form routes
Route::get('form', [AjaxFormController::class, 'index']);
Route::post('save', [AjaxFormController::class, 'store']);

// Ajax Category routes
Route::get('cat', [CategoryController::class, 'index']);
Route::post('subcat', [CategoryController::class, 'subCat'])->name('subcat');

// Dynamic add remove routes
Route::get('add-remove-multiple-input-fields', [DynamicAddRemoveFieldController::class, 'index']);
Route::post('add-remove-multiple-input-fields', [DynamicAddRemoveFieldController::class, 'store']);

// Currency routes
Route::get('currency', [CurrencyController::class, 'index']);
Route::post('currency', [CurrencyController::class, 'exchangeCurrency']);

// Sweet Alert routes
Route::get('/success', [MessageController::class, 'success']);
Route::get('/warning', [MessageController::class, 'warning']);
Route::get('/error', [MessageController::class, 'error']);
