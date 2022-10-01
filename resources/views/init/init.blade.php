
<div class="initWrapper" style="display: none">
    <div class="logo"><img src="{{asset('images/logo.png')}}" alt="logo"></div>

    <div class="activeProcess">
        <section id="userName" style="display: none">
            <input type="text" placeholder="Hogy hívnak?">
        </section>

        <section id="homeName" style="display: none">
            <input type="text" placeholder="Hogy hívjuk az otthonod?">
        </section>

        <section id="userRegisterProcess" style="display: none">
            @include('init.register')
        </section>
    </div>
</div>

<div id="backBtn" style="display: none">Vissza</div>
<div id="nextBtn">Tovább</div>


