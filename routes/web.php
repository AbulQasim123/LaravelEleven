<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminExample;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\{
    PostController,
    RoleController,
    UserController,
    AdminController,
    AnchorController,
    BlogController,
    CommentController,
    ContactController,
    CountryController,
    StudentController,
    CustomerController,
    ImageController,
    JsonDataController,
    NewsController,
    OrderController,
    VedioController
};
use App\Models\Anchor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('index');
});

Route::get('/test', [PostController::class, 'index'])
    ->middleware('is_admin:asdmin')->name('test');

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
