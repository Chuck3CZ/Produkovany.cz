# ProDukovany WordPress Theme

Volební šablona pro kandidátku **ProDukovany** – komunální volby 2026.

## Instalace

1. Rozbal ZIP do složky `/wp-content/themes/produkovany-theme/`
2. V administraci WP: **Vzhled → Témata** → aktivuj **ProDukovany**
3. Nastav menu: **Vzhled → Menus** → vytvoř menu a přiřaď ho k lokaci `Hlavní navigace`
4. Nastav kontaktní údaje: **Vzhled → Přizpůsobit → Kontaktní údaje**

## Custom Post Types

### Kandidáti (`kandidat`)
- Přidat přes: **Kandidáti → Přidat kandidáta**
- Nastav číslo na kandidátce a roli v meta boxu vpravo
- Nahraj profilovou fotku jako „Náhledový obrázek"

### Programové body (`pillar`)
- Přidat přes: **Program → Přidat bod programu**
- V obsahu napiš krátký popis (zobrazí se jako excerpt)
- Meta: `_pillar_icon` = emoji ikona, `_pillar_color` = CSS barva

## Přizpůsobení (Customizer)

**Vzhled → Přizpůsobit:**
- **Hero sekce** – nadpis, podnadpis, rok voleb
- **Kontaktní údaje** – e-mail, telefon, adresa

## Kontaktní formulář

Téma podporuje **Contact Form 7**. Po instalaci pluginu vytvoř formulář
s názvem `Kontakt ProDukovany` a přidej ho přes shortcode, nebo ponech
výchozí HTML formulář (odešle data na `admin-post.php`).

## Barvy (CSS proměnné v `assets/css/main.css`)

| Proměnná    | Hodnota   | Použití              |
|-------------|-----------|----------------------|
| `--red`     | `#C0392B` | Primární akcent      |
| `--red-dk`  | `#922B21` | Hover stav           |
| `--blue`    | `#1A5276` | Hero, program sekce  |
| `--green`   | `#1E8449` | Životní prostředí    |
| `--white`   | `#F9F7F4` | Pozadí stránky       |

## Soubory tématu

```
produkovany-theme/
├── style.css          # Metadata tématu (povinné)
├── functions.php      # Setup, CPT, Customizer, widgety
├── index.php          # Hlavní stránka
├── header.php         # Hlavička + navigace
├── footer.php         # Patička
├── single.php         # Jednotlivý příspěvek
├── page.php           # Statická stránka
├── archive.php        # Archiv příspěvků
├── assets/
│   ├── css/main.css   # Všechny styly
│   └── js/main.js     # Interaktivita
└── README.md
```

## Changelog

### 1.2.9
- Pole E-mail odstraněno z formuláře — zpráva dorazí i bez něj
- Jméno je nyní nepovinné, placeholder „Jméno, přezdívka nebo Anonym"
- Pokud jméno nevyplněno, v e-mailu se zobrazí „Anonym"
- Jediné povinné pole je Zpráva

### 1.2.8
- Opravena barva „Dukovany" v patičce na modrou (#1A5276)

### 1.2.7
- Logo v patičce: Pro červená · Dukovany modrá · .cz zelená

### 1.2.6
- Přidána diskrétní ikonka zámku vpravo dole v patičce
- 🔒 = nepřihlášen (odkaz na wp-login.php), 🔓 = přihlášen (odkaz do administrace)
- Ikonka je záměrně nevýrazná (opacity 35%) — po najetí myší se rozsvítí

### 1.2.5
- Topbar přesunut dovnitř `<header>` — při scrollování se posouvá spolu s navigací jako jeden celek

### 1.2.4
- Hamburger tlačítko (tři čárky) a navigační menu se skryjí když není přiřazeno žádné menu v **Vzhled → Menus**
- `fallback_cb` nastaven na `false` — žádné fallback menu se nevykreslí

### 1.2.3
- Opraveno zobrazení kontaktních položek — výchozí hodnoty se nyní zobrazí ihned po instalaci bez nutnosti cokoli ukládat v Customizeru
- Příčina: `get_theme_mod()` ignoruje `default` definované v Customizeru dokud uživatel hodnotu neuloží; fallbacky jsou nyní přímo v šabloně

### 1.2.2
- Zapracovány ruční úpravy pilířů (delší texty) a sekce programu („doručujeme ve fyzické podobě")
- Kontaktní sekce plně dynamická — až 4 položky, každá s vlastním nadpisem, hodnotou, emoji ikonou a volitelným odkazem
- Nastavení přes **Vzhled → Přizpůsobit → Kontaktní položky**
- Výchozí hodnoty: E-mail, Facebook, Obec + jedna volná položka pro telefon nebo cokoliv dalšího
- Prázdné položky se automaticky skryjí

### 1.2.1
- Kandidáti: přidáno pole **Povolání** v meta boxu administrace (nahrazuje dřívější „Role / Oblast")
- Grid kandidátů: 5 sloupců na PC, 4 na tabletu, 3 na středním mobilu, 2 na malém mobilu
- Povolání se zobrazuje pod jménem malými verzálkami
- Fotky zvětšeny na 200px výšku, `object-position: top` pro správné ořezání portrétů
- Limit kandidátů zvýšen z 8 na 15
- Hint v meta boxu: „Jméno = název příspěvku, Foto = náhledový obrázek"

### 1.2.0
- Přidán `screenshot.png` (1200×900px) — náhled tématu se zobrazuje v administraci WordPressu pod **Vzhled → Témata**

### 1.1.9
- Hero sekce zmenšena z `92vh` na `60vh`
- Odstraněn duplicitní CSS blok `.hero` který se vloudil v předchozí verzi

### 1.1.8
- Přidán odkaz na autora webu v patičce: „Web vytvořil Martin Gabrhel"

### 1.1.7
- Upraven placeholder v kontaktním formuláři: „Váš vzkaz nebo nápad co by se mohlo zlepšit..."

### 1.1.6
- Kontaktní formulář nyní skutečně odesílá e-mail přes `wp_mail()`
- Přidán handler `produkovany_handle_contact` v `functions.php` (dříve chyběl — proto error)
- Cílová adresa se bere z **Vzhled → Přizpůsobit → Kontaktní údaje → E-mail**, záloha je admin e-mail WordPressu
- Po odeslání se zobrazí stavová zpráva: ✅ úspěch / ⚠️ špatný e-mail / ❌ chyba odeslání
- Formulář se po úspěšném odeslání skryje

### 1.1.5
- Program sekce zobrazena jako 2×2 grid na všech velikostech obrazovky (PC i tablet)
- Emoji ikona přesunuta nad nadpis kategorie, zarovnána na střed
- Emoji zvětšeno na 36px pro lepší čitelnost
- Na mobilu (≤600px) zůstává jeden sloupec

### 1.1.4
- Opraveno zobrazení sekce Program — všechny 4 kategorie jsou nyní vždy na jednom řádku (pevné `repeat(4, 1fr)` místo `auto-fit`)
- Na tabletu (≤900px) se program zobrazuje 2×2, na mobilu (≤600px) jako jeden sloupec

### 1.1.3
- Logo nahradilo dekorativní CSS kříž v hero sekci — zobrazuje se napravo od textu „Bezpečná obec. Živá komunita."
- Na mobilních zařízeních (≤768px) se logo v hero skryje, aby nezakrývalo text
- Na tabletech (≤1000px) se logo zmenší na 240px

### 1.1.2
- Logo (`assets/images/logo.png`) přidáno do navigace vedle wordmarku „ProDukovany"
- Pokud je v administraci nastaveno vlastní logo přes **Vzhled → Přizpůsobit → Logo webu**, má přednost
- CSS navigačního loga upraven pro flex layout ikona + text

### 1.1.1
- Pilíře se na PC zobrazují vždy ve 4 sloupcích vedle sebe
- Na mobilních zařízeních (≤900px) se pilíře zobrazují 2×2
- Opraveno zobrazení ikony emoji u pilířů (přidáno `flex-shrink: 0` a `line-height: 1`)

### 1.1.0
- Přidán SVG favicon (`assets/images/favicon.svg`) — automaticky se zobrazí v záložce prohlížeče
- Favicon se načítá z `header.php`; pokud administrátor nastaví vlastní ikonu přes **Vzhled → Přizpůsobit → Identita webu → Ikona webu**, má přednost
- Přidána podpora `custom-logo` pro WordPress Customizer
- Verze CSS/JS se nyní řídí konstantou `PRODUKOVANY_VERSION` — cache se automaticky invaliduje při aktualizaci
- Topbar aktualizován na přesné datum voleb: 9. a 10. října 2026
- Reálný volební program ve 4 kategoriích (Bezpečnost, Rozvoj, Transparentnost, Doprava)
- Pilíře přepsány podle skutečných priorit kandidátky

### 1.0.0
- Základní verze šablony



- WordPress 6.0+
- PHP 8.0+
- Doporučeno: Contact Form 7 (formulář), Yoast SEO
