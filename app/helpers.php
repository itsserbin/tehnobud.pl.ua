<?php

use App\Services\Localization\LocalizationHandle;
use JetBrains\PhpStorm\ExpectedValues;

if ( ! function_exists('changeLang')){
    /**
     * Function returns a link to the current page with the transferred language label
     *
     * @param string $lang
     *
     * @return string Link
     */
    function changeLang(
        #[ExpectedValues(LocalizationHandle::LANGUAGES)] string $lang
    ): string {
        
        if ( ! in_array($lang, LocalizationHandle::LANGUAGES, true)){
            abort(404);
        }
        
        $segment     = collect(Request::segments())->last();
        $defaultLang = LocalizationHandle::DEFAULT_LANGUAGE;
        $route       = Request::route();
        
        if ($route && $route->getName() === 'index'){
            return $defaultLang === $lang ? '/' : "/$lang";
        }
        
        return $defaultLang === $lang ? "/$segment" : "/$lang/$segment";
    }
}

if ( ! function_exists('localUrl')){
    /**
     * Function returns the passed link with the current language label
     *
     * @param string $url
     *
     * @return string link
     */
    function localUrl(string $url): string
    {
        
        $currentLocal = app()->getLocale();
        $defaultLang  = LocalizationHandle::DEFAULT_LANGUAGE;
        $url          = trim($url, '/');
        
        return $defaultLang === $currentLocal
            ? url("/$url")
            : url(
                "/$currentLocal/$url"
            );
    }
}

if ( ! function_exists('checkCurrentUrl')){
    /**
     *
     * @param string $url
     *
     * @return string|null
     */
    function checkCurrentUrl(string $url): ?string
    {
        
        $segment = collect(Request::segments())->last();
        if ($url !== '/'){
            $url = trim($url, '/');
        }

        if (
            ($url === '/')
            && ($segment === null
                || in_array(
                    $segment,
                    LocalizationHandle::LANGUAGES,
                    true
                ))
        ){
            return 'active';
        }
        
        return $url === $segment ? 'active' : null;
    }
}

if ( ! function_exists('checkCurrentLang')){
    /**
     * @param string $lang
     *
     * @return string
     */
    function checkCurrentLang(
        #[ExpectedValues(LocalizationHandle::LANGUAGES)] string $lang
    ): string {
        
        return App::getLocale() === $lang ? 'btn-dark'
            : 'btn-outline-secondary';
    }
}

if ( ! function_exists('isCurrentLang')){
    /**
     * @param string $lang
     *
     * @return bool
     */
    function isCurrentLang(
        #[ExpectedValues(LocalizationHandle::LANGUAGES)] string $lang
    ): bool {
        
        return App::getLocale() === $lang;
    }
}