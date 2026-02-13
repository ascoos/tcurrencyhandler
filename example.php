<?php
/*
dobu {
    file:id(`expl15435`) {
        ascoos {
            name {`ASCOOS OS`},
            version {`1.0.0`},
        },
        example {
            class {`TCurrencyHandler`}
            source {`example.php`},
            category:langs {
                en {`Financials`},
                el {`Οικονομικά στοιχεία`}
            },
            description:langs {
                en {`A complete example of currency management: symbols, names, formatting, validation.`},
                el {`Ένα πλήρες παράδειγμα διαχείρισης νομισμάτων: σύμβολα, ονομασίες, μορφοποίηση, επικύρωση.`}
            },
            author {`Drogidis Christos`},
            sincePHP {`8.4.0`}
        }
    }
}
*/
declare(strict_types=1);

use ASCOOS\OS\Kernel\Science\Financials\TCurrencyHandler;

// Instance acquisition
$currency = TCurrencyHandler::getInstance();

// 1. Code normalization (normalize)
$code = $currency->normalize('xbt'); // Result: "BTC"
$code = $currency->normalize('rmb'); // Result: "CNY"

// 2. Validity check (isValid)
if ($currency->isValid('EUR')) { // True
    echo "Valid currency\n";
}
var_dump($currency->isValid('FOO'));  // false
echo "\n\n";

// 3. Get Symbol (getSymbol)
echo $currency->getSymbol('USD')."\n";      // $
echo $currency->getSymbol('JPY')."\n";      // ¥
echo $currency->getSymbol('BTC')."\n\n";    // ฿

// 4. Get name (getName)
echo $currency->getName('EUR')."\n";                // Euro
echo $currency->getName('EUR', 'el')."\n";    // Ευρώ
echo $currency->getName('XBT')."\n\n";              // Bitcoin (ISO‑like)


// 5. Amount formatting (format)
echo $currency->format(1234.56, 'USD')."\n";        // $1,234.56
echo $currency->format(1234.56, 'EUR')."\n";        // 1.234,56 €
echo $currency->format(1234.56, 'JPY')."\n";        // ¥1,235
echo $currency->format(0.12345678, 'BTC')."\n\n";   // ฿0.12345678


// 6. Combinational example

$code = 'xbt';

if ($currency->isValid($code)) {
    $normalized = $currency->normalize($code);
    $symbol     = $currency->getSymbol($normalized);
    $name       = $currency->getName($normalized, 'el');
    $formatted  = $currency->format(0.05, $normalized);

    echo "Currency: $name\n";
    echo "Code: $normalized\n";
    echo "Symbol: $symbol\n";
    echo "Amount: $formatted\n\n";
}
/*
Result:
Currency: Μπιτκόιν
Code: BTC
Symbol: ฿
Amount: ฿0.05000000
*/


// 7. Exception handling
try {
    echo $currency->getSymbol('FOO');
} catch (ValueError $e) {
    echo "Error: " . $e->getMessage();
}
?>