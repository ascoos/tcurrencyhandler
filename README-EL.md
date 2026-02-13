# ASCOOS OS – TCurrencyHandler  
Ένας πλήρης, modular διαχειριστής νομισμάτων για το ASCOOS Web Operating System.

Η κλάση είναι μέρος της συλλογής περίπου 1500 κλάσεων που αποτελούν το **ASCOOS OS**.

![Ascoos](https://dl.ascoos.com/images/ascoos.png)

---

## Πίνακας Περιεχομένων
- [Επισκόπηση](#επισκόπηση)
- [Χαρακτηριστικά](#χαρακτηριστικά)
- [Εγκατάσταση](#εγκατάσταση)
- [Τεκμηρίωση DoBu](#τεκμηρίωση-dobu)
- [Παράδειγμα Χρήσης](#παράδειγμα-χρήσης)
- [Σημειώσεις Αρχιτεκτονικής](#σημειώσεις-αρχιτεκτονικής)
- [Άδεια Χρήσης](#άδεια-χρήσης)
- [Συγγραφέας](#συγγραφέας)

---

## Επισκόπηση

Η `TCurrencyHandler` είναι η πρώτη δημόσια διαθέσιμη κλάση (με ανοικτό κώδικα) του **ASCOOS OS**, σχεδιασμένη για να παρουσιάσει:

- την αρχιτεκτονική και το στυλ κώδικα του ASCOOS Kernel
- το σύστημα δυναμικής φόρτωσης προαιρετικών κλάσεων (Extras Classes Manager)
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
- ✔ Ασφαλές UTF‑8
- ✔ Πλήρης τεκμηρίωση με DoBu
- ✔ Προεραιτική φόρτωση μέσω Extras Manager

---

## Εγκατάσταση

Αυτή η κλάση είναι μέρος του συστήματος ASCOOS OS **Extras Kernel Classes** και δεν απαιτεί εγκατάσταση καθώς υπάρχει ήδη στον πυρήνα.

### Namespace

```php
use ASCOOS\OS\Kernel\Science\Financials\TCurrencyHandler;
```

### Διαχείριση

Η φόρτωση γίνεται δυναμικά μέσω της εσωτερικής εφαρμογής **Extras Classes Manager**.

![ASCOOS OS](https://s.ascoos.com/images/ascoos/tchc/ecm-01.png)

---

## Τεκμηρίωση DoBu

Το repository περιλαμβάνει πλήρη DoBu docblocks για:

- το αρχείο με την κλάση και το αρχείο παραδείγματος
- την κλάση  
- κάθε μέθοδο  
- παραμέτρους  
- επιστρεφόμενους τύπους  
- εξαιρέσεις  
- περιγραφές σε EN/EL  

Το **[DoBu](https://github.com/ascoos/dobu)** είναι η επίσημη DSL τεκμηρίωσης του **[ASCOOS OS](https://github.com/ascoos/os)**.

### Τεκμηρίωση DoBu στο αρχείο παραδείγματος

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

Δείτε το πλήρες παράδειγμα: [example.php](https://github.com/ascoos/tcurrencyhandler/blob/main/example.php) που παράγει το ακόλουθο αποτέλεσμα

![ASCOOS OS](https://s.ascoos.com/images/ascoos/tchc/example.png)

---

## Σημειώσεις Αρχιτεκτονικής

Το ASCOOS OS χρησιμοποιεί **Full Modular Kernel Architecture**:

- Κάποιες κλάσεις είναι **Deep Core Kernel**  
- Άλλες είναι **Extras** (προαιρετικές)  
- Το namespace **δεν** αντικατοπτρίζει τη φυσική θέση  
- Ο Extras Manager χειρίζεται:
  - εξαρτήσεις 
  - επιλεκτική φόρτωση 
  - βελτιστοποίηση απόδοσης  

Η `TCurrencyHandler` είναι **Kernel Science module**, αλλά φορτώνεται ως **Extra**.

---

## Άδεια Χρήσης

AGL (ASCOOS General License)

---

## Συγγραφέας

**Δρογκίδης Χρήστος**  
Δημιουργός του ASCOOS OS  
https://www.ascoos.com
