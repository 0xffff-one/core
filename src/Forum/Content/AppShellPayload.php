<?php

/*
 * 针对 PWA 的魔改
 */

namespace Flarum\Forum\Content;

use Flarum\Frontend\Document;

class AppShellPayload
{
    public function __invoke(Document $document)
    {
        $document->appView = "flarum::frontend.app-shell-payload";
        return $document;
    }
}
