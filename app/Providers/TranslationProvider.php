<?php


namespace App\Providers;


use DI\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

class TranslationProvider extends Provider
{

    private Container $container;
    private Translator $translator;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function boot()
    {
        $loader = new FileLoader(new Filesystem(), resource('langs'));

        $this->translator = new Translator($loader, getConfig()->toArray()['APP']['locale']);
        $this->translator->setFallback(getConfig()->toArray()['APP']['fallback_locale']);

        $this->container->set('translator', function (){
            return $this->translator;
        });
    }
}