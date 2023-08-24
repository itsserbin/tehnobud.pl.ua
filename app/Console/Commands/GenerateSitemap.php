<?php

namespace App\Console\Commands;

use App\ReadModels\Building;
use App\ReadModels\LiveBlog;
use App\Services\Localization\LocalizationHandle;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    
    private const URLS
        = [
            'contact',
            'about-us',
            'service',
        ];
    
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';
    
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $sitemap = SitemapGenerator::create(config('app.url'))
            ->getSitemap();
        
        foreach (self::URLS as $url)
        {
            foreach (LocalizationHandle::LANGUAGES as $language)
            {
                if ($language === LocalizationHandle::DEFAULT_LANGUAGE)
                {
                    $urlSite = ($language . '/' . $url);
                } else
                {
                    $urlSite = $url;
                }
                
                $sitemap->add(
                    Url::create($urlSite)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );
            }
        }
        
        $this->building($sitemap);
        $this->liveBlogs($sitemap);
        
        $sitemap
            ->writeToFile(public_path('sitemap.xml'));
        
        return 0;
    }
    
    
    public function building(Sitemap $sitemap): void
    {
        Building::chunk(
            200,
            function (Collection $buildings) use ($sitemap) {
                foreach ($buildings as $building)
                {
                    /* @var  Building $building */
                    foreach (LocalizationHandle::LANGUAGES as $language)
                    {
                        if ($language === LocalizationHandle::DEFAULT_LANGUAGE)
                        {
                            $url = $building->getTranslation('slug', $language);
                        } else
                        {
                            $url = $language . '/' . $building->getTranslation(
                                    'slug',
                                    $language
                                );
                        }
                        
                        $sitemap->add(
                            Url::create($url)
                                ->setLastModificationDate(
                                    $building->updated_at ??
                                    $building->created_at
                                )
                                ->setChangeFrequency(
                                    Url::CHANGE_FREQUENCY_WEEKLY
                                )
                        );
                    }
                }
            }
        );
    }
    
    private function liveBlogs(Sitemap $sitemap): void
    {
        LiveBlog::with('building')
            ->chunk(
                200,
                static function (Collection $liveBlogs) use ($sitemap) {
                    /** @var LiveBlog $liveBlog */
                    foreach ($liveBlogs as $liveBlog)
                    {
                        foreach (LocalizationHandle::LANGUAGES as $language)
                        {
                            $url = $liveBlog->building->getTranslation(
                                    'slug',
                                    $language
                                ) .
                                   '/news/' .
                                   $liveBlog->getTranslation('slug', $language);
                            
                            if ($language
                                !== LocalizationHandle::DEFAULT_LANGUAGE)
                            {
                                $url = $language . '/' . $url;
                            }
                            
                            $sitemap->add(
                                Url::create($url)
                                    ->setLastModificationDate(
                                        $liveBlog->updated_at ??
                                        $liveBlog->created_at
                                    )
                                    ->setChangeFrequency(
                                        Url::CHANGE_FREQUENCY_WEEKLY
                                    )
                            );
                        }
                    }
                }
            );
    }
    
}
