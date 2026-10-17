<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('SONOPRO – ultrazvuková diagnostika s dôrazom na precíznosť v príjemnom ambulantnom prostredí.') }}">
    <meta name="theme-color" content="#287720">
    <title>{{ __('SONOPRO – Diagnostika s dôrazom na precíznosť') }}</title>
    <link rel="icon" href="{{ asset('assets/sonopro-logo.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<a class="skip-link" href="#obsah">{{ __('Prejsť na obsah') }}</a>
<main id="obsah">
<div class="hero-shell" id="domov">
    <header class="site-header">
        <a href="#domov" class="wordmark" aria-label="{{ __('SONOPRO – domov') }}">SONOPRO</a>
        <button class="menu-toggle" aria-expanded="false" aria-controls="navigation">Menu <span aria-hidden="true">☰</span></button>
        <nav id="navigation" aria-label="{{ __('Hlavná navigácia') }}">
            <a class="nav-link active" href="#domov" aria-current="page">{{ __('Domov') }}</a>
            <a class="nav-link" href="#ambulancia">{{ __('O nás') }}</a>
            <a class="nav-link" href="#kontakt">{{ __('Kontakt') }}</a>
            <div class="language" role="group" aria-label="{{ __('Jazyk stránky') }}">
                <a href="{{ route('home', ['lang' => 'sk']) }}" lang="sk" hreflang="sk" @if(app()->getLocale() === 'sk') aria-current="true" @endif>SK<span class="sr-only"> — Slovenčina</span></a>
                <span aria-hidden="true">/</span>
                <a href="{{ route('home', ['lang' => 'en']) }}" lang="en" hreflang="en" @if(app()->getLocale() === 'en') aria-current="true" @endif>EN<span class="sr-only"> — English</span></a>
            </div>
            <a class="button header-booking" href="{{ config('sonopro.booking_url') ?: '#kontakt' }}">{{ __('Rezervujte si teraz') }}</a>
        </nav>
    </header>
        <section class="hero" id="o-nas" aria-labelledby="hero-title">
            <div class="hero-copy">
                <h1 id="hero-title">{{ __('Diagnostika s') }}<br>{{ __('dôrazom na') }}<br>{{ __('precíznosť') }}</h1>
                <p>{{ __('Prinášame špičkovú diagnostiku') }}<br class="desktop-break"> {{ __('do príjemného ambulantného') }}<br class="desktop-break"> {{ __('prostredia, čím skracujeme') }}<br class="desktop-break"> {{ __('čakacie doby.') }}</p>
                <a class="button hero-booking" href="{{ config('sonopro.booking_url') ?: '#kontakt' }}">{{ __('Naplánujte si to ešte') }}<br>{{ __('dnes') }}</a>
            </div>
            <div class="hero-image"><img src="{{ asset('assets/sonopro-logo.png') }}" alt="{{ __('SONOPRO – logo s ultrazvukovou sondou') }}" width="1200" height="871" fetchpriority="high"></div>
        </section>
</div>
        <section class="preparation" aria-labelledby="preparation-title">
            <h2 id="preparation-title">{{ __('Príprava na vyšetrenie') }}</h2>
            <div class="accordions">
                <details open>
                    <summary>{{ __('Ultrazvukové vyšetrenie brucha a čriev') }}<span class="accordion-icon" aria-hidden="true"></span></summary>
                    <div class="details-body"><ul>
                        <li><strong>{{ __('Nalačno:') }}</strong> {{ __('6 hodín pred vyšetrením nejedzte, nežujte žuvačku ani nefajčite.') }}</li>
                        <li><strong>{{ __('Pitie:') }}</strong> {{ __('Pite iba čistú, neperlivú vodu (žiadnu kávu, sladené nápoje ani perlivé nápoje).') }}</li>
                        <li><strong>{{ __('Strava:') }}</strong> {{ __('1–2 dni pred zákrokom obmedzte konzumáciu potravín, ktoré spôsobujú nadúvanie (strukoviny, čerstvé pečivo, kapusta).') }}</li>
                    </ul></div>
                </details>
                <details>
                    <summary>{{ __('Ultrazvukové vyšetrenie konkrétnych orgánov') }}<span class="accordion-icon" aria-hidden="true"></span></summary>
                    <div class="details-body"><p>{{ __('Pokyny k príprave na vyšetrenie konkrétneho orgánu vám potvrdíme pri objednaní.') }}</p></div>
                </details>
                <details>
                    <summary>{{ __('Dopplerovské ultrazvukové vyšetrenie ciev') }}<span class="accordion-icon" aria-hidden="true"></span></summary>
                    <div class="details-body"><p>{{ __('Pokyny k príprave na vyšetrenie ciev vám potvrdíme pri objednaní.') }}</p></div>
                </details>
            </div>
        </section>
        <section class="clinic-section" id="ambulancia" aria-labelledby="clinic-title">
            <figure class="clinic-visual">
                <img src="{{ asset('assets/clinic-placeholder.svg') }}" width="900" height="760" loading="lazy" alt="{{ __('Ilustračný pohľad na svetlý, pokojný interiér ambulancie') }}">
                <figcaption>{{ __('Ilustračný obrázok · fotografia ambulancie bude doplnená') }}</figcaption>
            </figure>
            <div class="clinic-copy">
                <p class="eyebrow">{{ __('Priestor pre vašu pohodu') }}</p>
                <h2 id="clinic-title">{{ __('Starostlivosť začína dôverou.') }}</h2>
                <p>{{ __('Tu vám čoskoro predstavíme našu ambulanciu, tím a prístup k pacientom. Tento priestor zatiaľ slúži ako ukážka textu, ktorý neskôr doplníme.') }}</p>
                <p>{{ __('Doplníme informácie o priebehu návštevy, našom vybavení a o tom, čo môžete od vyšetrenia očakávať.') }}</p>
                <a class="text-link" href="#kontakt">{{ __('Spoznajte nás') }} <span aria-hidden="true">↗</span></a>
            </div>
        </section>
        <section class="contact" id="kontakt" aria-labelledby="contact-title">
            <h2 id="contact-title">{{ __('Máte otázky?') }}</h2>
            <p class="contact-intro">{{ __('Napíšte nám pár riadkov.') }}</p>
            <form action="{{ route('contact', ['lang' => app()->getLocale()]) }}#kontakt" method="post" class="contact-form">
                @csrf
                @if(session('contact_success'))<p class="form-status" role="status">{{ session('contact_success') }}</p>@endif
                @if(session('contact_error'))<p class="form-status error" role="alert">{{ session('contact_error') }}</p>@endif
                @if($errors->any())<div class="form-status error" role="alert"><p>{{ __('Skontrolujte, prosím, vyplnené údaje.') }}</p><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
                <fieldset><legend>{{ __('Meno') }}</legend><div class="name-fields">
                    <label>{{ __('Meno') }} <span>{{ __('(povinné)') }}</span><input name="first_name" autocomplete="given-name" required maxlength="80" value="{{ old('first_name') }}"></label>
                    <label>{{ __('Priezvisko') }} <span>{{ __('(povinné)') }}</span><input name="last_name" autocomplete="family-name" required maxlength="80" value="{{ old('last_name') }}"></label>
                </div></fieldset>
                <label>{{ __('E-mail') }} <span>{{ __('(povinné)') }}</span><input type="email" name="email" autocomplete="email" required maxlength="254" value="{{ old('email') }}"></label>
                <label>{{ __('Správa') }} <span>{{ __('(povinné)') }}</span><textarea name="message" required maxlength="5000" rows="5">{{ old('message') }}</textarea></label>
                <div class="honeypot" aria-hidden="true"><label>{{ __('Webová stránka') }}<input name="website" tabindex="-1" autocomplete="off"></label></div>
                <button type="submit" class="button submit-button">{{ __('Odoslať správu') }}</button>
            </form>
        </section>
    </main>
    <footer class="site-footer">
        <div class="footer-grid">
            <div class="footer-brand"><a class="wordmark" href="#domov">SONOPRO</a><p>{{ __('Ultrazvuková diagnostika s dôrazom na precíznosť a príjemné prostredie.') }}</p></div>
            <div><h2>{{ __('Kde nás nájdete') }}</h2><p>{{ __('Ulica a číslo – doplníme') }}<br>{{ __('PSČ a mesto – doplníme') }}</p><p>{{ __('Telefón – doplníme') }}<br>{{ __('E-mail – doplníme') }}</p></div>
            <div><h2>{{ __('Ordinačné hodiny') }}</h2><p>{{ __('Pondelok – piatok') }}<br>{{ __('Časy doplníme') }}</p><p>{{ __('Vyšetrenia po objednaní.') }}</p></div>
            <nav aria-label="{{ __('Užitočné odkazy') }}"><h2>{{ __('Užitočné odkazy') }}</h2><a href="#ambulancia">{{ __('O nás') }}</a><a href="#preparation-title">{{ __('Príprava na vyšetrenie') }}</a><a href="#kontakt">{{ __('Kontakt') }}</a></nav>
        </div>
        <p class="footer-placeholder-note">{{ __('Kontaktné údaje a ordinačné hodiny sú zatiaľ orientačné zástupné texty.') }}</p>
        <div class="footer-bottom"><p>© {{ date('Y') }} SONOPRO. {{ __('Všetky práva vyhradené.') }}</p><a href="#domov">{{ __('Späť hore') }} <span aria-hidden="true">↑</span></a></div>
    </footer>
</body>
</html>
