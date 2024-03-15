# Multiplikační tabulka prvočísel

Tento projekt je aplikace napsaná v PHP s využitím frameworku Nette, která generuje multiplikační tabulku prvočísel pomocí Eratosthenova síta.

## Instalace

1. Naklonujte si tento repozitář do svého pracovního adresáře pomocí SSH:

```
git clone git@github.com:ElisHoli/multiplication-table.git
```

nebo pomocí HTTPS:

```
git clone https://github.com/ElisHoli/multiplication-table.git
```

2. Přejděte do adresáře projektu:
```
cd multiplikacni-tabulka
```

3. Nainstalujte závislosti pomocí Composeru:
```
composer install
```


## Spuštění

Pro spuštění aplikace spusťte PHP v kořenovém adresáři projektu:
```
docker-compose up -d
```
Aplikace běží na adrese http://localhost:8000.

Aplikace vás požádá o zadání počátečního čísla N a následně vypíše multiplikační tabulku prvních N prvočísel.


## Spuštění testů

Pro spuštění jednotkových testů použijte následující příkaz:
```
composer test
```

Tento příkaz spustí testy napsané pomocí PHPUnit.


## Autor

Tato aplikace byla vytvořena Eliškou Holzknechtovou.
