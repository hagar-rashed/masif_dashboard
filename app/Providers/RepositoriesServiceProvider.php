<?php

namespace App\Providers;

        use App\Repositories\Sql\ServiceRepository;
        use App\Repositories\Contract\ServiceRepositoryInterface;

        use App\Repositories\Sql\TalkRepository;
        use App\Repositories\Contract\TalkRepositoryInterface;

        use App\Repositories\Sql\ScrapRepository;
        use App\Repositories\Contract\ScrapRepositoryInterface;

        use App\Repositories\Sql\AboutRepository;
        use App\Repositories\Contract\AboutRepositoryInterface;

        use App\Repositories\Sql\MailListRepository;
        use App\Repositories\Contract\MailListRepositoryInterface;

        use App\Repositories\Sql\SettingRepository;
        use App\Repositories\Contract\SettingRepositoryInterface;

        use App\Repositories\Sql\VideoRepository;
        use App\Repositories\Contract\VideoRepositoryInterface;

        use App\Repositories\Sql\ArticleRepository;
        use App\Repositories\Contract\ArticleRepositoryInterface;

        use App\Repositories\Sql\BookRepository;
        use App\Repositories\Contract\BookRepositoryInterface;

        use App\Repositories\Sql\UserRepository;
        use App\Repositories\Contract\UserRepositoryInterface;

        use App\Repositories\Sql\ContactRepository;
        use App\Repositories\Contract\ContactRepositoryInterface;
// interface


use App\Repositories\Contract\BaseRepositoryInterface;
// repository

use App\Repositories\Sql\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{

    public function register(){

        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);

        $this->app->bind(TalkRepositoryInterface::class, TalkRepository::class);

        $this->app->bind(ScrapRepositoryInterface::class, ScrapRepository::class);

        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);

        $this->app->bind(MailListRepositoryInterface::class, MailListRepository::class);

        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);

        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);

        $this->app->bind(VideoRepositoryInterface::class, VideoRepository::class);

        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);

        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);

    }

    public function boot()
    {
        //
    }

}
