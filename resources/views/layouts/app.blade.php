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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-theme-classic"/>



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

<script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>
<script>
    // const { autocomplete } = window['@algolia/autocomplete-js'];
    import algoliasearch from 'algoliasearch/lite';
    import { autocomplete, getAlgoliaResults } from '@algolia/autocomplete-js';

    import '@algolia/autocomplete-theme-classic';

    const searchClient = algoliasearch(
        '{{ config('scout.algolia.id') }}',
        '{{ config('scout.algolia.secret') }}'
    );

    autocomplete({
        container: '#autocomplete',
        placeholder: 'Search for products',
        getSources({ query }) {
            return [
                {
                    sourceId: 'products',
                    getItems() {
                        return getAlgoliaResults({
                            searchClient,
                            queries: [
                                {
                                    indexName: 'products-index',
                                    query,
                                    params: {
                                        hitsPerPage: 10,
                                    },
                                },
                            ],
                        });
                    },
                    // ...
                },
            ];
        },
    });
</script>


</body>
</html>
