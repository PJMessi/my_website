<?php

Route::get("/", "FrontendController@show_frontend_main")->name("show_frontend_main");
Route::post("/subscribe", "FrontendController@save_subscriber")->name("save_subscriber");
Route::get("/portfolio/{id}", "FrontendController@show_portfolio_detail")->name("show_portfolio_detail");

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {

        Route::get("/", "Backend\DashboardController@show_backend_dashboard")->name("show_backend_dashboard");
        Route::put("/edit", "Backend\DashboardController@edit_user")->name("edit_user");
        Route::delete("/delete/{id}", "Backend\DashboardController@delete_user")->name("delete_user");

        Route::prefix('main')->group(function () {
            Route::get("/", "Backend\MainController@show_backend_main")->name("show_backend_main");
            Route::post("/add", "Backend\MainController@add_backend_main")->name("add_backend_main");
            Route::delete("/delete/{id}", "Backend\MainController@delete_backend_main")->name("delete_backend_main");
            Route::put("/edit/{id}", "Backend\MainController@edit_backend_main")->name("edit_backend_main");
        });

        Route::prefix('about')->group(function () {
            Route::get("/", "Backend\AboutController@show_backend_about")->name("show_backend_about");
            Route::post("/add", "Backend\AboutController@add_backend_about")->name("add_backend_about");
            Route::delete("/delete/{id}", "Backend\AboutController@delete_backend_about")->name("delete_backend_about");
            Route::put("/edit/{id}", "Backend\AboutController@edit_backend_about")->name("edit_backend_about");

            Route::prefix('items')->group(function () {
                Route::get("/", "Backend\AboutController@show_backend_aitem")->name("show_backend_aitem");
                Route::post("/add", "Backend\AboutController@add_backend_aitem")->name("add_backend_aitem");
                Route::delete("/delete/{id}", "Backend\AboutController@delete_backend_aitem")->name("delete_backend_aitem");
                Route::put("/edit/{id}", "Backend\AboutController@edit_backend_aitem")->name("edit_backend_aitem");
            });
        });

        Route::prefix('fact')->group(function () {
            Route::get("/", "Backend\FactController@show_backend_fact")->name("show_backend_fact");
            Route::post("/add", "Backend\FactController@add_backend_fact")->name("add_backend_fact");
            Route::delete("/delete/{id}", "Backend\FactController@delete_backend_fact")->name("delete_backend_fact");
            Route::put("/edit/{id}", "Backend\FactController@edit_backend_fact")->name("edit_backend_fact");

            Route::prefix('items')->group(function () {
                Route::get("/", "Backend\FactController@show_backend_fitem")->name("show_backend_fitem");
                Route::post("/add", "Backend\FactController@add_backend_fitem")->name("add_backend_fitem");
                Route::delete("/delete/{id}", "Backend\FactController@delete_backend_fitem")->name("delete_backend_fitem");
                Route::put("/edit/{id}", "Backend\FactController@edit_backend_fitem")->name("edit_backend_fitem");
            });
        });

        Route::prefix('resume')->group(function () {
            Route::get("/", "Backend\ResumeController@show_backend_resume")->name("show_backend_resume");
            Route::post("/add", "Backend\ResumeController@add_backend_resume")->name("add_backend_resume");
            Route::delete("/delete/{id}", "Backend\ResumeController@delete_backend_resume")->name("delete_backend_resume");
            Route::put("/edit/{id}", "Backend\ResumeController@edit_backend_resume")->name("edit_backend_resume");

            Route::prefix('items')->group(function () {
                Route::get("/", "Backend\ResumeController@show_backend_ritem")->name("show_backend_ritem");
                Route::post("/add", "Backend\ResumeController@add_backend_ritem")->name("add_backend_ritem");
                Route::delete("/delete/{id}", "Backend\ResumeController@delete_backend_ritem")->name("delete_backend_ritem");
                Route::put("/edit/{id}", "Backend\ResumeController@edit_backend_ritem")->name("edit_backend_ritem");
            });
        });

        Route::prefix('skill')->group(function () {
            Route::get("/", "Backend\SkillController@show_backend_skill")->name("show_backend_skill");
            Route::post("/add", "Backend\SkillController@add_backend_skill")->name("add_backend_skill");
            Route::delete("/delete/{id}", "Backend\SkillController@delete_backend_skill")->name("delete_backend_skill");
            Route::put("/edit/{id}", "Backend\SkillController@edit_backend_skill")->name("edit_backend_skill");

            Route::prefix('items')->group(function () {
                Route::get("/", "Backend\SkillController@show_backend_sitem")->name("show_backend_sitem");
                Route::post("/add", "Backend\SkillController@add_backend_sitem")->name("add_backend_sitem");
                Route::delete("/delete/{id}", "Backend\SkillController@delete_backend_sitem")->name("delete_backend_sitem");
                Route::put("/edit/{id}", "Backend\SkillController@edit_backend_sitem")->name("edit_backend_sitem");
            });        
        });

        Route::prefix('project')->group(function () {
            Route::get("/", "Backend\ProjectController@show_backend_pitem")->name("show_backend_pitem");
            Route::post("/add", "Backend\ProjectController@add_backend_pitem")->name("add_backend_pitem");
            Route::delete("/delete/{id}", "Backend\ProjectController@delete_backend_pitem")->name("delete_backend_pitem");
            Route::put("/edit/{id}", "Backend\ProjectController@edit_backend_pitem")->name("edit_backend_pitem");
        });

        Route::prefix('testmonial')->group(function () {
            Route::get("/", "Backend\TestmonialController@show_backend_testmonial")->name("show_backend_testmonial");
            Route::post("/add", "Backend\TestmonialController@add_backend_testmonial")->name("add_backend_testmonial");
            Route::delete("/delete/{id}", "Backend\TestmonialController@delete_backend_testmonial")->name("delete_backend_testmonial");
            Route::put("/edit/{id}", "Backend\TestmonialController@edit_backend_testmonial")->name("edit_backend_testmonial");

            Route::prefix('items')->group(function () {
                Route::get("/", "Backend\TestmonialController@show_backend_titem")->name("show_backend_titem");
                Route::delete("/delete/{id}", "Backend\TestmonialController@delete_backend_titem")->name("delete_backend_titem");
                Route::put("/edit/{id}", "Backend\TestmonialController@edit_backend_titem")->name("edit_backend_titem");
            });
        });

        Route::prefix('contact')->group(function () {
            Route::get("/", "Backend\ContactController@show_backend_contact")->name("show_backend_contact");
            Route::post("/add", "Backend\ContactController@add_backend_contact")->name("add_backend_contact");
            Route::delete("/delete/{id}", "Backend\ContactController@delete_backend_contact")->name("delete_backend_contact");
            Route::put("/edit/{id}", "Backend\ContactController@edit_backend_contact")->name("edit_backend_contact");
        });

        Route::prefix('miscellaneous')->group(function () {
            Route::get("/", "Backend\MiscellaneousController@show_backend_miscellaneous")->name("show_backend_miscellaneous");
            Route::post("/add", "Backend\MiscellaneousController@add_backend_miscellaneous")->name("add_backend_miscellaneous");
            Route::delete("/delete/{id}", "Backend\MiscellaneousController@delete_backend_miscellaneous")->name("delete_backend_miscellaneous");
            Route::put("/edit/{id}", "Backend\MiscellaneousController@edit_backend_miscellaneous")->name("edit_backend_miscellaneous");
        });
        
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
