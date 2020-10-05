<?php

/*
 * 针对 PWA 的魔改
 */

namespace Flarum\Forum\Content;

use Flarum\Api\Client;
use Flarum\Frontend\Document;
use Flarum\Http\UrlGenerator;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Psr\Http\Message\ServerRequestInterface as Request;

class AppShell
{
    /**
     * @var Client
     */
    protected $api;

    /**
     * @var Factory
     */
    protected $view;

    /**
     * @var SettingsRepositoryInterface
     */
    protected $settings;

    /**
     * @var UrlGenerator
     */
    protected $url;

    /**
     * @param Client $api
     * @param Factory $view
     * @param SettingsRepositoryInterface $settings
     * @param UrlGenerator $url
     */
    public function __construct(Client $api, Factory $view, SettingsRepositoryInterface $settings, UrlGenerator $url)
    {
        $this->api = $api;
        $this->view = $view;
        $this->settings = $settings;
        $this->url = $url;
    }

    public function __invoke(Document $document, Request $request)
    {
        $defaultRoute = $this->settings->get('default_route');
        $document->appView = "flarum::frontend.app-shell";
        $document->canonicalUrl = $defaultRoute === '/all' ? $this->url->to('forum')->base() : $request->getUri()->withQuery('');

        return $document;
    }
}
