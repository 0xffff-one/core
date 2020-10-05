<!doctype html>
<html @if ($direction) dir="{{ $direction }}" @endif
      @if ($language) lang="{{ $language }}" @endif>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
            function loadingError(e) {
                var error = document.getElementById('flarum-loading-error');
                error.innerHTML += document.getElementById('flarum-content').textContent;
                error.style.display = 'block';
                document.getElementById('flarum-loading').style.display = 'none';
                throw e;
            }
            fetch('/payload').then(r => r.json())
              .then((payload) => {
                  flarum.core.app.load(payload);
                  history.replaceState({}, '', '/');
                  document.getElementById('flarum-loading').style.display = 'none';
                  flarum.core.app.bootExtensions(flarum.extensions);
                  flarum.core.app.boot();
              })
              .catch(loadingError);
        </script>

        {!! $foot !!}
    </body>
</html>
