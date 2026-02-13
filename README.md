# ASCOOS OS – TCurrencyHandler  
A complete, modular currency management handler for the ASCOOS Web Operating System.

The class is part of the collection of about 1,500 classes that make up the **ASCOOS OS**.

![Ascoos](https://dl.ascoos.com/images/ascoos.png)

---

## Table of Contents
- [Overview](#overview)
- [Features](#features)
- [Installation](#installation)
- [DoBu Documentation](#dobu-documentation)
- [Usage Example](#usage-example)
- [Architecture Notes](#architecture-notes)
- [License](#license)
- [Author](#author)

---

## Overview

`TCurrencyHandler` is the first publicly released class (with open source) of **ASCOOS OS**, designed to demonstrate:

- the architecture and coding style of the ASCOOS Kernel  
- the optional classes dynamic loading system (Extras Classes Manager) 
- the DoBu documentation technology  
- and a fully functional, production‑ready currency management module  

This class provides:

- currency symbols  
- currency names (EN/EL)  
- formatting rules  
- validation  
- normalization (aliases)  
- crypto support  
- ISO‑4217 support (active + deprecated)

---

## Features

- ✔ ISO‑4217 currency support  
- ✔ Deprecated currency support  
- ✔ Crypto currency support  
- ✔ Multilingual names (EN/EL)  
- ✔ Symbol lookup  
- ✔ Amount formatting  
- ✔ Normalization via aliases  
- ✔ Validation  
- ✔ UTF‑8 safe  
- ✔ Fully documented with DoBu  
- ✔ Optional loading via Extras Manager 

---

## Installation


This class is part of the ASCOOS OS **Extras Kernel Classes** system and does not require installation as it already exists in the kernel.

### Namespace

```php
use ASCOOS\OS\Kernel\Science\Financials\TCurrencyHandler;
```

### Management

It is loaded dynamically by the internal app **Extras Classes Manager**, depending on user configuration.

![ASCOOS OS](https://s.ascoos.com/images/ascoos/tchc/ecm-01.png)

---

## DoBu Documentation

This repository includes full DoBu docblocks for:

- the file with the class and the example file
- the class  
- each method  
- parameters  
- return types  
- exceptions  
- multilingual descriptions  

**[DoBu](https://github.com/ascoos/dobu)** is the official documentation DSL of **[ASCOOS OS](https://github.com/ascoos/os)**.

### DoBu documentation in the example file

```php
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
```

---

## Usage Example

```php
use ASCOOS\OS\Kernel\Science\Financials\TCurrencyHandler;

$currency = TCurrencyHandler::getInstance();

// Normalize
echo $currency->normalize('xbt'); // BTC

// Validate
var_dump($currency->isValid('EUR')); // true

// Symbol
echo $currency->getSymbol('USD'); // $

// Name
echo $currency->getName('EUR', 'el'); // Ευρώ

// Format
echo $currency->format(1234.56, 'EUR'); // 1.234,56 €
```

---

See the full example: [example.php](https://github.com/ascoos/tcurrencyhandler/blob/main/example.php) which produces the following result

![ASCOOS OS](https://s.ascoos.com/images/ascoos/tchc/example.png)

---

## Architecture Notes

ASCOOS OS uses a **Full Modular Kernel Architecture**:

- Some classes are **Deep Core Kernel** (always loaded)
- Others are **Extras** (optional, dynamically loaded)
- Namespace does **not** reflect physical path
- Extras Manager handles:
  - dependency resolution  
  - selective loading  
  - performance optimization  

`TCurrencyHandler` is a **Kernel Science class**, but loaded as an **Extra**.

---

## License

AGL (ASCOOS General License)

---

## Author

**Drogidis Christos**  
ASCOOS OS Creator  
https://www.ascoos.com
