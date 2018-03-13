<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Post\PostInterface;
use App\Repository\Post\PostRepository;
use App\Repository\Post\Post_DetailInterface;
use App\Repository\Post\Post_DetailRepository;
use App\Repository\Categories\CategoriesInterface;
use App\Repository\Categories\CategoriesRepository;
use App\Repository\Categories\Categories_DetailInterface;
use App\Repository\Categories\Categories_DetailRepository;
use App\Repository\Color\ColorInterface;
use App\Repository\Color\ColorRepository;
use App\Repository\Color\Color_DetailInterface;
use App\Repository\Color\Color_DetailRepository;
use App\Repository\Order\OrderInterface;
use App\Repository\Order\OrderRepository;
use App\Repository\Order\Order_DetailInterface;
use App\Repository\Order\Order_DetailRepository;
use App\Repository\Comment\CommentInterface;
use App\Repository\Comment\CommentRepository;
use App\Repository\Customer\CustomerInterface;
use App\Repository\Customer\CustomerRepository;
use App\Repository\Lang\LangInterface;
use App\Repository\Lang\LangRepository;
use App\Repository\Images\ImagesInterface;
use App\Repository\Images\ImagesRepository;
use App\Repository\Slide\SlideInterface;
use App\Repository\Slide\SlideRepository;
use App\Repository\Slide\Slide_DetailInterface;
use App\Repository\Slide\Slide_DetailRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostInterface::class,PostRepository::class);
        $this->app->singleton(Post_DetailInterface::class,Post_DetailRepository::class);
        $this->app->singleton(CategoriesInterface::class,CategoriesRepository::class);
        $this->app->singleton(Categories_DetailInterface::class,Categories_DetailRepository::class);
        $this->app->singleton(ColorInterface::class,ColorRepository::class);
        $this->app->singleton(Color_DetailInterface::class,Color_DetailRepository::class);
        $this->app->singleton(OrderInterface::class,OrderRepository::class);
        $this->app->singleton(Order_DetailInterface::class,Order_DetailRepository::class);
        $this->app->singleton(CommentInterface::class,CommentRepository::class);
        $this->app->singleton(CustomerInterface::class,CustomerRepository::class);
        $this->app->singleton(LangInterface::class,LangRepository::class);
        $this->app->singleton(ImagesInterface::class,ImagesRepository::class);
        $this->app->singleton(SlideInterface::class,SlideRepository::class);
        $this->app->singleton(Slide_DetailInterface::class,Slide_DetailRepository::class);
    }
}
