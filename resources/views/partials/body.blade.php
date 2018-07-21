<body>
    @include("partials.navbar")
    <div class="container my-3">
        @include("partials.messages")
        @yield("content")
    </div>