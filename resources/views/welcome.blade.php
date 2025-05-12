<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Documentación de API en Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after,
        ::before {
            --tw-content: ''
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b,
        strong {
            font-weight: bolder
        }

        code,
        kbd,
        pre,
        samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1em
        }

        small {
            font-size: 80%
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0
        }

        button,
        select {
            text-transform: none
        }

        [type=button],
        [type=reset],
        [type=submit],
        button {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none
        }

        :-moz-focusring {
            outline: auto
        }

        :-moz-ui-invalid {
            box-shadow: none
        }

        progress {
            vertical-align: baseline
        }

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        blockquote,
        dd,
        dl,
        figure,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        p,
        pre {
            margin: 0
        }

        fieldset {
            margin: 0;
            padding: 0
        }

        legend {
            padding: 0
        }

        menu,
        ol,
        ul {
            list-style: none;
            margin: 0;
            padding: 0
        }

        textarea {
            resize: vertical
        }

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            color: #9ca3af
        }

        [role=button],
        button {
            cursor: pointer
        }

        :disabled {
            cursor: default
        }

        audio,
        canvas,
        embed,
        iframe,
        img,
        object,
        svg,
        video {
            display: block;
            vertical-align: middle
        }

        img,
        video {
            max-width: 100%;
            height: auto
        }

        [hidden] {
            display: none
        }

        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::-webkit-backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .relative {
            position: relative
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .mx-6 {
            margin-left: 1.5rem;
            margin-right: 1.5rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-16 {
            margin-top: 4rem
        }

        .mt-6 {
            margin-top: 1.5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .mr-1 {
            margin-right: 0.25rem
        }

        .flex {
            display: flex
        }

        .inline-flex {
            display: inline-flex
        }

        .grid {
            display: grid
        }

        .h-16 {
            height: 4rem
        }

        .h-7 {
            height: 1.75rem
        }

        .h-6 {
            height: 1.5rem
        }

        .h-5 {
            height: 1.25rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .w-auto {
            width: auto
        }

        .w-16 {
            width: 4rem
        }

        .w-7 {
            width: 1.75rem
        }

        .w-6 {
            width: 1.5rem
        }

        .w-5 {
            width: 1.25rem
        }

        .max-w-7xl {
            max-width: 80rem
        }

        .shrink-0 {
            flex-shrink: 0
        }

        .scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .gap-6 {
            gap: 1.5rem
        }

        .gap-4 {
            gap: 1rem
        }

        .self-center {
            align-self: center
        }

        .rounded-lg {
            border-radius: 0.5rem
        }

        .rounded-full {
            border-radius: 9999px
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-red-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(254 242 242 / var(--tw-bg-opacity))
        }

        .bg-dots-darker {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
        }

        .from-gray-700\/50 {
            --tw-gradient-from: rgb(55 65 81 / 0.5);
            --tw-gradient-to: rgb(55 65 81 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
        }

        .via-transparent {
            --tw-gradient-to: rgb(0 0 0 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), transparent, var(--tw-gradient-to)
        }

        .bg-center {
            background-position: center
        }

        .stroke-red-500 {
            stroke: #ef4444
        }

        .stroke-gray-400 {
            stroke: #9ca3af
        }

        .p-6 {
            padding: 1.5rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }

        .font-semibold {
            font-weight: 600
        }

        .leading-relaxed {
            line-height: 1.625
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .underline {
            -webkit-text-decoration-line: underline;
            text-decoration-line: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .shadow-gray-500\/20 {
            --tw-shadow-color: rgb(107 114 128 / 0.2);
            --tw-shadow: var(--tw-shadow-colored)
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms
        }

        .selection\:bg-red-500 *::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white *::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:bg-red-500::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .focus\:rounded-sm:focus {
            border-radius: 0.125rem
        }

        .focus\:outline:focus {
            outline-style: solid
        }

        .focus\:outline-2:focus {
            outline-width: 2px
        }

        .focus\:outline-red-500:focus {
            outline-color: #ef4444
        }

        .group:hover .group-hover\:stroke-gray-600 {
            stroke: #4b5563
        }

        .z-10 {
            z-index: 10
        }

        @media (prefers-reduced-motion: no-preference) {
            .motion-safe\:hover\:scale-\[1\.01\]:hover {
                --tw-scale-x: 1.01;
                --tw-scale-y: 1.01;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-800\/50 {
                background-color: rgb(31 41 55 / 0.5)
            }

            .dark\:bg-red-800\/20 {
                background-color: rgb(153 27 27 / 0.2)
            }

            .dark\:bg-dots-lighter {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")
            }

            .dark\:bg-gradient-to-bl {
                background-image: linear-gradient(to bottom left, var(--tw-gradient-stops))
            }

            .dark\:stroke-gray-600 {
                stroke: #4b5563
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:shadow-none {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .dark\:ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .dark\:ring-inset {
                --tw-ring-inset: inset
            }

            .dark\:ring-white\/5 {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .dark\:hover\:text-white:hover {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .group:hover .dark\:group-hover\:stroke-gray-400 {
                stroke: #9ca3af
            }
        }

        @media (min-width: 640px) {
            .sm\:fixed {
                position: fixed
            }

            .sm\:top-0 {
                top: 0px
            }

            .sm\:right-0 {
                right: 0px
            }

            .sm\:ml-0 {
                margin-left: 0px
            }

            .sm\:flex {
                display: flex
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-center {
                justify-content: center
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:gap-8 {
                gap: 2rem
            }

            .lg\:p-8 {
                padding: 2rem
            }
        }

        body {
            font-family: Arial, sans-serif;
        }

        h1,
        h2,
        h3 {
            color: #2c3e50;
        }

        .endpoint {
            border: 1px solid #bdc3c7;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .endpoint h3 {
            margin-top: 0;
        }

        .endpoint pre {
            background-color: #ecf0f1;
            padding: 10px;
            border-radius: 5px;
            overflow: auto;
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

    <div class="max-w-7xl mx-auto p-6 lg:p-12">

        <div class="mt-16">
            <div  class="grid grid-cols-12 md:grid-cols-12 gap-6 lg:gap-8">

                <h1><strong>Documentación de API en Laravel</strong></h1>
                <p>Es una API desarrollada en Laravel para la gestión basica de inventarios. Permite la administración de productos, categorías y usuarios, con funcionalidades como autenticación, autorización basada en roles, mediante endpoints Rest Ful. Está diseñada para ser modular y escalable</p>

                <h2><strong>Endpoints Disponibles:</strong></h2>

                <h3><strong>Auth</strong></h3>

                <div class="endpoint">
                    <h3><strong>Autenticación del usuario</strong></h3>
                    <p><strong>URL:</strong> <code>/api/login</code></p>
                    <p><strong>Método:</strong> <code>POST</code></p>
                    <p><strong>Descripción:</strong> Autentica a los usuarios utilizando JWT.</p>
                    <p><strong>Cuerpo de la solicitud:</strong></p>
                    <pre>
                        {
                            "email": "admin@admin.com",
                            "password": "Admin123"
                        }
                    </pre>
                </div>
                <div class="endpoint">
                    <h3><strong>Cerrar sesión del usuario</strong></h3>
                    <p><strong>URL:</strong> <code>/api/logout</code></p>
                    <p><strong>Método:</strong> <code>POST</code></p>
                    <p><strong>Descripción:</strong> Cierra la sesión del usuario logueado.</p>
                    <p><strong>Encabezados requeridos:</strong></p>
                    <pre>
                Authorization: Bearer &lt;token-de-acceso&gt;
                    </pre>
                    <p><strong>Cuerpo de la solicitud:</strong> <em>No requiere cuerpo</em></p>
                </div>

                 <div class="endpoint">
                    <h3><strong>Refrescar token de acceso</strong></h3>
                    <p><strong>URL:</strong> <code>/api/refresh</code></p>
                    <p><strong>Método:</strong> <code>POST</code></p>
                    <p><strong>Descripción:</strong> Permite refrescar el token.</p>
                    <p><strong>Encabezados requeridos:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <p><strong>Cuerpo de la solicitud:</strong> <em>No requiere cuerpo</em></p>
                </div>

                 <h3><strong>Users</strong></h3>

                <div class="endpoint">
                    <h3><strong>Registrar usuarios</strong></h3>
                    <p><strong>URL:</strong> <code>/api/register</code></p>
                    <p><strong>Método:</strong> <code>POST</code></p>
                    <p><strong>Descripción:</strong> Permite registrar un nuevo usuario. Requiere autenticación. Si el usuario autenticado tiene rol <code>admin</code>, puede asignar un rol al nuevo usuario; de lo contrario, se asignará un rol por defecto.</p>
                    <p><strong>Cuerpo de la solicitud:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <pre>
                        {
                            "name": "Kelly Cuellar Riaño",
                            "email": "kelly2@gov.com",
                            "password": "1234567.",
                            "role": "admin",
                            "password_confirmation":"1234567."
                        }
                    </pre>
                </div>
                <div class="endpoint">
                    <h3><strong>Listar usuarios</strong></h3>
                    <p><strong>URL:</strong> <code>api/user/all</code></p>
                    <p><strong>Método:</strong> <code>GET</code></p>
                    <p><strong>Descripción:</strong> Devuelve una lista paginada de usuarios. Requiere autenticación. Solo los usuarios con rol <code>admin</code> pueden acceder a esta funcionalidad.</p>
                    <p><strong>Encabezado de autorización:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <p><strong>Parámetros de consulta opcionales para paginación:</strong></p>
                    <pre>
                        ?pageNumber=1
                        &pageElements=10
                    </pre>
                    <p><strong>Respuesta esperada:</strong></p>
                    <pre>
                    {
                        "current_page": 1,
                        "data": [
                            {
                                "id": "9ee3f27f-3fdd-4500-a2cc-9570b275c841",
                                "name": "Kelly Cuellar Riaño",
                                "email": "kelly2@gov.com",
                                "role": "admin",
                                "created_at": "2025-05-11T20:36:39.000000Z"
                            },
                            ...
                        ],
                        "per_page": 10,
                        "total": 50
                    }
                    </pre>
                </div>


                <h3><strong>Categorías</strong></h3>

                <div class="endpoint">
                    <h3><strong>Listar categorías</strong></h3>
                    <p><strong>URL:</strong> <code>api//categories</code></p>
                    <p><strong>Método:</strong> <code>GET</code></p>
                    <p><strong>Descripción:</strong> Devuelve una lista paginada de categorías. Requiere autenticación. Solo los usuarios con rol <code>admin y user</code> pueden acceder a esta funcionalidad.</p>
                    <p><strong>Encabezado de autorización:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <p><strong>Parámetros de consulta opcionales para paginación:</strong></p>
                    <pre>
                        ?pageNumber=1
                        &pageElements=10
                    </pre>
                    <p><strong>Respuesta esperada:</strong></p>
                    <pre>
                    {
                        "current_page": 1,
                        "data": [
                           {
                                "id": "9ee3f27f-3fdd-4500-a2cc-9570b275c841",
                                "name": "Categoría 3",
                                "description": "Descripción de la categoría",
                                "created_at": "2025-05-12T02:57:11.000000Z",
                                "updated_at": "2025-05-12T02:57:11.000000Z"
                            },
                            ...
                        ],
                        "per_page": 10,
                        "total": 50
                    }
                    </pre>
                </div>

                <div class="endpoint">
                    <h3><strong>Registrar categorías</strong></h3>
                    <p><strong>URL:</strong> <code>/api/categories</code></p>
                    <p><strong>Método:</strong> <code>POST</code></p>
                    <p><strong>Descripción:</strong> Permite registrar una nueva categoría. Esta acción requiere autenticación. Solo los usuarios autenticados con el rol <code>admin</code> están autorizados para crear nuevas categorías.</p>
                    <p><strong>Cuerpo de la solicitud:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <pre>
                        {
                            "name": "Categoría 10",
                            "description": "Televisor de 42 pulgadas"
                        }
                     </pre>
                </div>

                <div class="endpoint">
                    <h3><strong>Actualizar una categoría</strong></h3>
                    <p><strong>URL:</strong> <code>/api/categories/{id}</code></p>
                    <p><strong>Método:</strong> <code>PUT</code></p>
                    <p><strong>Descripción:</strong> Permite actualizar una nueva categoría. Esta acción requiere autenticación. Solo los usuarios autenticados con el rol <code>admin</code> están autorizados para actualizar categorías.</p>
                    <p><strong>Cuerpo de la solicitud:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <pre>
                        {
                            "name": "Televisor Prueba",
                            "description": "Televisor de 42 pulgadas --"
                        }
                    </pre>
                </div>

                <div class="endpoint">
                    <h3><strong>Eliminar una categoría</strong></h3>
                    <p><strong>URL:</strong> <code>/api/categories/{id}</code></p>
                    <p><strong>Método:</strong> <code>DELETE</code></p>
                    <p><strong>Descripción:</strong> Permite eliminar una nueva categoría. Esta acción requiere autenticación. Solo los usuarios autenticados con el rol <code>admin</code> están autorizados para eliminar categorías.</p>
                    <p><strong>Cuerpo de la solicitud:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <p><strong>Cuerpo de la solicitud:</strong> <em>No requiere cuerpo</em></p>
                </div>

                <div class="endpoint">
                    <h3><strong>Obtener el detalle de una categoría</strong></h3>
                    <p><strong>URL:</strong> <code>/api/categories/{id}</code></p>
                    <p><strong>Método:</strong> <code>GET</code></p>
                    <p><strong>Descripción:</strong> Permite obtener el detalles de una categoría específica. Esta acción requiere autenticación y solo los usuarios con el rol <code>admin y user</code> están autorizados para ver el detalle.</p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <p><strong>Cuerpo de la solicitud:</strong> <em>No requiere cuerpo</em></p>
                </div>

                <h3><strong>Productos</strong></h3>

                <div class="endpoint">
                    <h3><strong>Listar productos</strong></h3>
                    <p><strong>URL:</strong> <code>api/products</code></p>
                    <p><strong>Método:</strong> <code>GET</code></p>
                    <p><strong>Descripción:</strong> Devuelve una lista paginada de productos. Requiere autenticación. Solo los usuarios con rol <code>admin y user</code> pueden acceder a esta funcionalidad.</p>
                    <p><strong>Encabezado de autorización:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <p><strong>Parámetros de consulta opcionales para paginación:</strong></p>
                    <pre>
                        ?pageNumber=1
                        &pageElements=10
                    </pre>
                    <p><strong>Respuesta esperada:</strong></p>
                    <pre>
                    {
                        "current_page": 1,
                        "data": [
                            {
                                "id": "9ee3f5d0-03aa-46dc-bd36-661d53f55044",
                                "category_id": "9ee3f27f-3fdd-4500-a2cc-9570b275c841",
                                "name": "Producto 3",
                                "description": null,
                                "price": "12.50",
                                "stock": 25,
                                "created_at": "2025-05-12T03:06:28.000000Z",
                                "updated_at": "2025-05-12T03:06:28.000000Z"
                            },
                            ...
                        ],
                        "per_page": 10,
                        "total": 50
                    }
                    </pre>
                </div>

                <div class="endpoint">
                    <h3><strong>Registrar productos</strong></h3>
                    <p><strong>URL:</strong> <code>/api/products</code></p>
                    <p><strong>Método:</strong> <code>POST</code></p>
                    <p><strong>Descripción:</strong> Permite registrar una nueva producto. Esta acción requiere autenticación. Solo los usuarios autenticados con el rol <code>admin</code> están autorizados para crear nuevos productos.</p>
                    <p><strong>Cuerpo de la solicitud:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <pre>
                        {
                            "name":"Radio FM 6",
                            "price": 12.500,
                            "stock": 25,
                            "categoryId": "9ee3b44d-4bcf-44eb-b8d4-34d51cb9f7e5"
                        }
                    </pre>
                </div>

                <div class="endpoint">
                    <h3><strong>Actualizar un producto</strong></h3>
                    <p><strong>URL:</strong> <code>/api/products/{id}</code></p>
                    <p><strong>Método:</strong> <code>PUT</code></p>
                    <p><strong>Descripción:</strong> Permite actualizar un producto. Esta acción requiere autenticación. Solo los usuarios autenticados con el rol <code>admin</code> están autorizados para actualizar productos.</p>
                    <p><strong>Cuerpo de la solicitud:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <pre>
                        {
                            "name":"Celular LG",
                            "description":"Celular de alta gama",
                            "price": 1200000,
                            "stock": 30
                        }
                    </pre>
                </div>

                <div class="endpoint">
                    <h3><strong>Eliminar una producto</strong></h3>
                    <p><strong>URL:</strong> <code>/api/products/{id}</code></p>
                    <p><strong>Método:</strong> <code>DELETE</code></p>
                    <p><strong>Descripción:</strong> Permite eliminar un producto. Esta acción requiere autenticación. Solo los usuarios autenticados con el rol <code>admin</code> están autorizados para eliminar productos.</p>
                    <p><strong>Cuerpo de la solicitud:</strong></p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <p><strong>Cuerpo de la solicitud:</strong> <em>No requiere cuerpo</em></p>
                </div>

                <div class="endpoint">
                    <h3><strong>Obtener el detalle de un producto</strong></h3>
                    <p><strong>URL:</strong> <code>/api/products/{id}</code></p>
                    <p><strong>Método:</strong> <code>GET</code></p>
                    <p><strong>Descripción:</strong> Permite obtener el detalles de un producto específica. Esta acción requiere autenticación y solo los usuarios con el rol <code>admin y user</code> están autorizados para ver el detalle.</p>
                    <pre>Authorization: Bearer &lt;token-de-acceso&gt;</pre>
                    <p><strong>Cuerpo de la solicitud:</strong> <em>No requiere cuerpo</em></p>
                </div>

                <h2><strong>Notas:</strong></h2>
                <ul>
                    <li>Las respuestas de la API están en formato JSON.</li>
                    <li>Manejo de errores y códigos de estado HTTP adecuados para cada operación (200, 201, 400,
                        404, 500, etc.).</li>
                </ul>
            </div>
        </div>

        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
            <div class="text-center text-sm sm:text-left">
                &nbsp;
            </div>

            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
    
    </div>
</body>

</html>