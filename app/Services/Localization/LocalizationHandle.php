<?php

namespace App\Services\Localization;

use App;
use Illuminate\Http\Request;

/**
 * Class LocalizationHandle
 *
 * @package App\Services\Localization
 */
class LocalizationHandle
{

    /**
     * @var string
     */
    private string $defaultLanguage;


    /**
     * @var array<string>
     */
    private array $languages;


    /**
     * @var array<string>
     */
    public const LANGUAGES = [
        'ru',
        'ua'
    ];

    public const DEFAULT_LANGUAGE = 'ua';

    /**
     * LocalizationHandle constructor.
     */
    public function __construct()
    {
        $this->defaultLanguage = self::DEFAULT_LANGUAGE;
        $this->languages = self::LANGUAGES;
    }

    /**
     *  Set local App and check local
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function setLocal(Request $request): void
    {
        $segment = $request->segment(1);

        $this->checker($request);

        if ($segment && in_array($segment, $this->languages, true)) {
            App::setLocale($segment);
        } else {
            App::setLocale($this->defaultLanguage);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    private function checker(Request $request): void
    {
        $segments = $request->segments();

        if ((count($segments) === 1)
            && (strlen($segments[0]) === 2
                && !in_array($segments[0], $this->languages, true))) {
            abort(404);
        }
    }

}
