<?php

use App\Http\Controllers\ClassRegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('q1', function() {
    return '<pre>
        select code, AVG(govt_debt / gdp_per_capita) as average_government_debt
        from countries
        where code in (
            select code
            from countries
            where code NOT IN (
                select code
                from countries
                where year in (year(now()) - 1, year(now()) - 2, year(now()) - 3, year(now()) - 4)
                and gdp_per_capita < 40000
            ) group by code
        ) group by code
        order by average_government_debt desc limit 3
        </pre>';
});

Route::get('q2', function() {
    return '<pre>
        class Man
        {
            private $mouth = \'closed\';
        
            private function openMouth() {
                $this->mouth = \'open\';
            }
        
            private function closeMouth() {
                $this->mouth = \'closed\';
            }
            
            public function requestOpenMouth($requester) {
                if ($requester == \'doctor\') {
                    $this->openMouth();
                }
            }
        
            public function requestCloseMouth($requester) {
                if ($requester == \'doctor\') {
                    $this->closeMouth();
                }
            }
        }
    </pre>';
});

Route::resource('registration', ClassRegistrationController::class);

