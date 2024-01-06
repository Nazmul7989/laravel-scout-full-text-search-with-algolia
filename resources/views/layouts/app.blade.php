<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.22.0/dist/algoliasearch-lite.umd.js" integrity="sha256-/2SlAlnMUV7xVQfSkUQTMUG3m2LPXAzbS8I+xybYKwA=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.63.0/dist/instantsearch.production.min.js" integrity="sha256-tP2geWC/2cT8rjeVSRumDQXTieBNjUyZjvON1HzWqso=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@8.1.0/themes/satellite-min.css" integrity="sha256-p/rGN4RGy6EDumyxF9t7LKxWGg6/MZfGhJM/asKkqvA=" crossorigin="anonymous">



</head>
<body>

@include('layouts.partials.header')

<!-- Section-->
@yield('content')

@include('layouts.partials.footer')

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>

<script>
    const searchClient = algoliasearch('{{ config('scout.algolia.id') }}', '{{ config('scout.algolia.secret') }}');

    const search = instantsearch({
        indexName: 'products_index',
        searchClient,
    });

    search.addWidgets([
        instantsearch.widgets.searchBox({
            container: '#searchbox',
        }),

        instantsearch.widgets.hits({
            container: '#hits',
            templates: {
                item(hit, { html, components }) {
                    return html`
                    <h2>
                      ${hit.__hitIndex}:
                      ${components.Highlight({ attribute: 'title', hit })}
                    </h2>
                    <p>${hit.description}</p>
                  `;
                },
            },

        }),

        instantsearch.widgets.configure({
            hitsPerPage: 5,
        }),
        instantsearch.widgets.pagination({
            container: '#pagination',
        }),

    ]);

    search.start();

</script>


</body>
</html>
