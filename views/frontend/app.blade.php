<!doctype html>
<html @if ($direction) dir="{{ $direction }}" @endif
      @if ($language) lang="{{ $language }}" @endif>
    <head>
        <meta charset="utf-8">
        <title>{{ $title }}</title>
        <link rel="dns-prefetch" href="//static.0xffff.one"/>
        <link rel="dns-prefetch" href="//0xffff-1251477793.file.myqcloud.com"/>
        <link rel="dns-prefetch" href="//0xffff-cdn.iscnu.net"/>
        <link rel="dns-prefetch" href="//cdn.jsdelivr.net"/>
        <link rel="manifest" href="/manifest.json">
        {!! $head !!}
    </head>

    <body>
        {!! $layout !!}

        <div id="modal"></div>
        <div id="alerts"></div>

        <script>
            document.getElementById('flarum-loading').style.display = 'block';
            var flarum = {extensions: {}};
        </script>

        {!! $js !!}

        <script>
            function loadingError() {
                var error = document.getElementById('flarum-loading-error');
                error.innerHTML += document.getElementById('flarum-content').textContent;
                error.style.display = 'block';
                throw e;
            }
            try {
                flarum.core.app.load(@json($payload));
            } catch (e) {
                loadingError(e);
            }
            setTimeout(function () {
                document.getElementById('flarum-loading').style.display = 'none';
                try {
                    flarum.core.app.bootExtensions(flarum.extensions);
                    flarum.core.app.boot();
                } catch (e) {
                    loadingError(e);
                }
            }, 0);
        </script>

        {!! $foot !!}
    </body>
</html>
