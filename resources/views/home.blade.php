<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SONOPRO – ultrazvuková diagnostika s dôrazom na precíznosť v príjemnom ambulantnom prostredí.">
    <meta name="theme-color" content="#287720">
    <title>SONOPRO – Diagnostika s dôrazom na precíznosť</title>
    <link rel="icon" href="{{ asset('assets/sonopro-logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/site.css') }}">
    <script src="{{ asset('assets/site.js') }}" defer></script>
</head>
<body>
<a class="skip-link" href="#obsah">Prejsť na obsah</a>
<main id="obsah">
<div class="hero-shell" id="domov">
    <header class="site-header">
        <a href="#domov" class="wordmark" aria-label="SONOPRO – domov">SONOPRO</a>
        <button class="menu-toggle" aria-expanded="false" aria-controls="navigation">Menu <span aria-hidden="true">☰</span></button>
        <nav id="navigation" aria-label="Hlavná navigácia">
            <a class="nav-link active" href="#domov" aria-current="page">Domov</a>
            <a class="nav-link" href="#o-nas">O nás</a>
            <a class="nav-link" href="#kontakt">Kontakt</a>
            <span class="language" aria-label="Jazyk stránky: slovenčina">Slovenčina <span class="chevron" aria-hidden="true"></span></span>
            <a class="button header-booking" href="{{ config('sonopro.booking_url') ?: '#kontakt' }}">Rezervujte si teraz</a>
        </nav>
    </header>
        <section class="hero" id="o-nas" aria-labelledby="hero-title">
            <div class="hero-copy">
                <h1 id="hero-title">Diagnostika s<br>dôrazom na<br>precíznosť</h1>
                <p>Prinášame špičkovú diagnostiku<br class="desktop-break"> do príjemného ambulantného<br class="desktop-break"> prostredia, čím skracujeme<br class="desktop-break"> čakacie doby.</p>
                <a class="button hero-booking" href="{{ config('sonopro.booking_url') ?: '#kontakt' }}">Naplánujte si to ešte<br>dnes</a>
            </div>
            <div class="hero-image"><img src="{{ asset('assets/sonopro-logo.png') }}" alt="SONOPRO – logo s ultrazvukovou sondou" width="1200" height="871" fetchpriority="high"></div>
        </section>
</div>
        <section class="preparation" aria-labelledby="preparation-title">
            <h2 id="preparation-title">Príprava na vyšetrenie</h2>
            <div class="accordions">
                <details open>
                    <summary>Ultrazvukové vyšetrenie brucha a čriev<span class="accordion-icon" aria-hidden="true"></span></summary>
                    <div class="details-body"><ul>
                        <li><strong>Nalačno:</strong> 6 hodín pred vyšetrením nejedzte, nežujte žuvačku ani nefajčite.</li>
                        <li><strong>Pitie:</strong> Pite iba čistú, neperlivú vodu (žiadnu kávu, sladené nápoje ani perlivé nápoje).</li>
                        <li><strong>Strava:</strong> 1–2 dni pred zákrokom obmedzte konzumáciu potravín, ktoré spôsobujú nadúvanie (strukoviny, čerstvé pečivo, kapusta).</li>
                    </ul></div>
                </details>
                <details>
                    <summary>Ultrazvukové vyšetrenie konkrétnych orgánov<span class="accordion-icon" aria-hidden="true"></span></summary>
                    <div class="details-body"><p>Pokyny k príprave na vyšetrenie konkrétneho orgánu vám potvrdíme pri objednaní.</p></div>
                </details>
                <details>
                    <summary>Dopplerovské ultrazvukové vyšetrenie ciev<span class="accordion-icon" aria-hidden="true"></span></summary>
                    <div class="details-body"><p>Pokyny k príprave na vyšetrenie ciev vám potvrdíme pri objednaní.</p></div>
                </details>
            </div>
        </section>
        <section class="contact" id="kontakt" aria-labelledby="contact-title">
            <h2 id="contact-title">Máte otázky?</h2>
            <p class="contact-intro">Napíšte nám pár riadkov.</p>
            <form action="{{ route('contact') }}#kontakt" method="post" class="contact-form">
                @csrf
                @if(session('contact_success'))<p class="form-status" role="status">{{ session('contact_success') }}</p>@endif
                @if(session('contact_error'))<p class="form-status error" role="alert">{{ session('contact_error') }}</p>@endif
                @if($errors->any())<div class="form-status error" role="alert"><p>Skontrolujte, prosím, vyplnené údaje.</p><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
                <fieldset><legend>Meno</legend><div class="name-fields">
                    <label>Meno <span>(povinné)</span><input name="first_name" autocomplete="given-name" required maxlength="80" value="{{ old('first_name') }}"></label>
                    <label>Priezvisko <span>(povinné)</span><input name="last_name" autocomplete="family-name" required maxlength="80" value="{{ old('last_name') }}"></label>
                </div></fieldset>
                <label>E-mail <span>(povinné)</span><input type="email" name="email" autocomplete="email" required maxlength="254" value="{{ old('email') }}"></label>
                <label>Správa <span>(povinné)</span><textarea name="message" required maxlength="5000" rows="5">{{ old('message') }}</textarea></label>
                <div class="honeypot" aria-hidden="true"><label>Webová stránka<input name="website" tabindex="-1" autocomplete="off"></label></div>
                <button type="submit" class="button submit-button">Odoslať správu</button>
            </form>
        </section>
    </main>
    <footer><a class="wordmark" href="#domov">SONOPRO</a><span>© {{ date('Y') }} SONOPRO</span></footer>
</body>
</html>
