# ASCOOS OS – TCurrencyHandler  
Ένας πλήρης, modular διαχειριστής νομισμάτων για το ASCOOS Web Operating System.

![Ascoos](https://dl.ascoos.com/images/ascoos.png)

---

## Επισκόπηση

Η `TCurrencyHandler` είναι η πρώτη δημόσια διαθέσιμη κλάση του **ASCOOS OS** με ανοικτό κώδικα, σχεδιασμένη για να παρουσιάσει:

- την αρχιτεκτονική και το στυλ κώδικα του ASCOOS Kernel  
- το σύστημα δυναμικής φόρτωσης (Extras Classes Manager)  
- την τεχνολογία τεκμηρίωσης DoBu  
- και ένα πλήρες, έτοιμο για παραγωγή module διαχείρισης νομισμάτων  

Η κλάση παρέχει:

- σύμβολα νομισμάτων  
- ονομασίες (EN/EL)  
- κανόνες μορφοποίησης  
- επικύρωση  
- κανονικοποίηση (aliases)  
- υποστήριξη crypto  
- υποστήριξη ISO‑4217 (ενεργά + deprecated)

---

## Χαρακτηριστικά

- ✔ Υποστήριξη ISO‑4217  
- ✔ Υποστήριξη deprecated νομισμάτων  
- ✔ Υποστήριξη crypto  
- ✔ Πολυγλωσσικές ονομασίες (EN/EL)  
- ✔ Αναζήτηση συμβόλων  
- ✔ Μορφοποίηση ποσών  
- ✔ Κανονικοποίηση μέσω aliases  
- ✔ Επικύρωση  
- ✔ UTF‑8 ασφαλές  
- ✔ Πλήρης τεκμηρίωση με DoBu  
- ✔ Modular φόρτωση μέσω Extras Manager  

---

## Εγκατάσταση

Η κλάση ανήκει στο σύστημα Extras του ASCOOS OS.

Φυσική θέση:

```
/extras/science/financials/
```

Λογικό namespace:

```
ASCOOS\OS\Kernel\Science\Financials
```

---

Η φόρτωση γίνεται δυναμικά από τον **Extras Classes Manager**.

![ASCOOS OS](https://s.ascoos.com/images/ascoos/tchc/ecm-01.png)

---

## DoBu Documentation

Το repository περιλαμβάνει πλήρη DoBu docblocks για:

- την κλάση  
- κάθε μέθοδο  
- παραμέτρους  
- επιστρεφόμενους τύπους  
- εξαιρέσεις  
- περιγραφές σε EN/EL  

Το DoBu είναι η επίσημη DSL τεκμηρίωσης του ASCOOS OS.

---

## Παράδειγμα Χρήσης

```php
use ASCOOS\OS\Kernel\Science\Financials\TCurrencyHandler;

$currency = TCurrencyHandler::getInstance();

// Κανονικοποίηση
echo $currency->normalize('xbt'); // BTC

// Επικύρωση
var_dump($currency->isValid('EUR')); // true

// Σύμβολο
echo $currency->getSymbol('USD'); // $

// Ονομασία
echo $currency->getName('EUR', 'el'); // Ευρώ

// Μορφοποίηση
echo $currency->format(1234.56, 'EUR'); // 1.234,56 €
```

---

Δείτε το πλήρες παράδειγμα: [example.php](./example.php) που παράγει το ακόλουθο αποτέλεσμα

![ASCOOS OS](https://s.ascoos.com/images/ascoos/tchc/example.png)

---

## Σημειώσεις Αρχιτεκτονικής

Το ASCOOS OS χρησιμοποιεί **Modular Kernel Architecture**:

- Κάποιες κλάσεις είναι **Deep Core Kernel**  
- Άλλες είναι **Extras** (προαιρετικές)  
- Το namespace **δεν** αντικατοπτρίζει τη φυσική θέση  
- Ο Extras Manager χειρίζεται:
  - dependencies  
  - selective loading  
  - βελτιστοποίηση απόδοσης  

Η `TCurrencyHandler` είναι **Kernel Science module**, αλλά φορτώνεται ως **Extra**.

---

## Άδεια

AGL (ASCOOS General License)

---

## Συγγραφέας

**Δρογκίδης Χρήστος**  
Δημιουργός του ASCOOS OS  
https://www.ascoos.com
