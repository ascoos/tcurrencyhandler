# ASCOOS OS – TCurrencyHandler  
A complete, modular currency management handler for the ASCOOS Web Operating System.

![Ascoos](https://dl.ascoos.com/images/ascoos.png)

---

## Overview

`TCurrencyHandler` is the first publicly released class of **ASCOOS OS** with open source, designed to demonstrate:

- the architecture and coding style of the ASCOOS Kernel  
- the modular loading system (Extras Classes Manager)  
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
- ✔ Modular loading via Extras Manager  

---

## Installation

This class is part of the ASCOOS OS Extras system.

It resides physically under:

```
/extras/science/financials/
```

But logically under the namespace:

```
ASCOOS\OS\Kernel\Science\Financials
```

---

It is loaded dynamically by the **Extras Classes Manager**, depending on user configuration.

![ASCOOS OS](https://s.ascoos.com/images/ascoos/tchc/ecm-01.png)

---

## DoBu Documentation

This repository includes full DoBu docblocks for:

- the class  
- each method  
- parameters  
- return types  
- exceptions  
- multilingual descriptions  

DoBu is the official documentation DSL of ASCOOS OS.

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

See the full example: [example.php](./example.php) which produces the following result

![ASCOOS OS](https://s.ascoos.com/images/ascoos/tchc/example.png)

---

## Architecture Notes

ASCOOS OS uses a **Modular Kernel Architecture**:

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
