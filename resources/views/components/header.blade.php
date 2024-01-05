<header>
    <div class="gauche">
        <a href="{{route('index')}}">images acceuil</a>
    </div>
    <div class="centre">
        <h1>Toys Market</h1>
    </div>
    @guest
    <div class="droite">
        <a href="{{route('login')}}">Connexion</a>
        <a href="{{route('register')}}">S'enregistrer</a>
    </div>
    @endguest
    @auth
        <div>
            {{Auth::user()->name}}
            <button><a href="#" id="logout">Logout</a>
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <script>
            document.getElementById('logout').addEventListener("click", (event) => {
                document.getElementById('logout-form').submit();
            });
        </script>
    @endauth
</header>
