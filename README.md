## Slovak price rounding
PHP knižnica slúžiaca na vygenerovanie zaokrúhlenej ceny pri platbách v hotovosti platené od 1.7.2022. 


## Ako použiť
1. Inštalácia
```php
composer require hanakivan/slovak-price-rounding
```
2. Použitie
```php
use hanakivan\SlovakPriceRounding;

$price = 13.99;

if(Rounding::numberNeedsRounding($price)) {
    //displays 14.00
    echo Rounding::roundNumberBySlovakRule($price);
}

```


## Požiadavky
- php >= 8.0


## Zdroje
- prepočty pripravené poďla článku: https://www.podnikajte.sk/zakonne-povinnosti-podnikatela/zaokruhlovanie-cien-od-1-7-2022-otazky-odpovede


## Zbavenie zodpovednosti
Knižnica je pripravená na prezentačné účely. Pre kontrolu vystaveného dokladu a prípadné použitie na právne účely sa poradťe s odborníkom. Autor nezodpovedná za škody vzniknuté používaním knižnice.

## Licencia
👉 [Zobraziť licenciu](LICENSE.md)