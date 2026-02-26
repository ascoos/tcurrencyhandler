<?php
/*
dobu {
    file:id(`tcurrencyhandler`) {
        ascoos {
            logo {`
                  __ _  ___  ___ ___   ___   ___     ___   ___
                 / _` |/  / / __/ _ \ / _ \ /  /    / _ \ /  /
                | (_| |\  \| (_| (_) | (_) |\  \   | (_) |\  \
                 \__,_|/__/ \___\___/ \___/ /__/    \___/ /__/
            `},
            name {`ASCOOS OS`},
            version {`1.0.0`},
            category {`Web OS`},
            subcategory {`Web5 / WebAI`},
            description {`A Web 5.0 and Web AI Kernel for decentralized web and IoT applications`},
            creator {`Drogidis Christos`},
            site {`https://www.ascoos.com`},
            issues {`https://issues.ascoos.com`},
            support {`support@ascoos.com`},
            license {`[Commercial] http://docs.ascoos.com/lics/ascoos/AGL.html`},
            copyright {`Copyright (c) 2007 - 2026, AlexSoft Software.`},
        },
        project {
            package:langs { all {`ASCOOS OS`} },
            category:langs { en {`Finances`}, el {`Οικονομικά`} },
            subcategory:langs { en {`Currency Management`}, el {`Διαχείριση Νομισμάτων`} },
            source {`extras/science/financials/coreCurrency.php`},
            description:langs {
                en {`A complete currency management system: symbols, names, formatting, validation, aliases.`},
                el {`Ένα πλήρες σύστημα διαχείρισης νομισμάτων: σύμβολα, ονομασίες, μορφοποίηση, επικύρωση, ψευδώνυμα.`}
            },
            version {`1.0.0`},
            build {`1`},
            created {`2026-02-12 22:00:00`},
            updated {`2026-02-12 22:00:00`},
            author {`Drogidis Christos`},
            support {`support@ascoos.com`},
            license {`AGL (ASCOOS General License)`},
            since {`1.0.0`},
            sincePHP {`8.4.0`}
        }
    }
}
*/
declare(strict_types=1);
namespace ASCOOS\OS\Kernel\Science\Financials;

defined("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");
defined("ASCOOS_OS_RUN") or die("Prohibition of Access.");

use ASCOOS\OS\Kernel\Core\TObject;
use InvalidArgumentException;
use ValueError;

/******************************************************************************
 * @startcode TCurrencyHandler
 *****************************************************************************/
/*
dobu {
    class:id(`tcurrencyhandler`),name(`TCurrencyHandler`),extends(`TObject`),
    namespace(`ASCOOS\OS\Kernel\Science\Financials`),
    hierarchy(`TObject, TCurrencyHandler`),
    version(`1.0.0`),sincePHP(`8.4.0`) {

        category:langs { en {`Finances`}, el {`Οικονομικά`} },

        intro:langs {
            en {`A complete currency management handler for ASCOOS OS. 
                It supports symbols, names, formatting rules, validation, normalization and aliases.`},
            el {`Ένας πλήρης διαχειριστής νομισμάτων για το ASCOOS OS.
                Υποστηρίζει σύμβολα, ονομασίες, κανόνες μορφοποίησης, επικύρωση, κανονικοποίηση και ψευδώνυμα.`}
        },

        summary:langs {
            en {`Provides full currency management: symbols, names, formatting, validation and aliases.`},
            el {`Παρέχει πλήρη διαχείριση νομισμάτων: σύμβολα, ονομασίες, μορφοποίηση, επικύρωση και ψευδώνυμα.`}
        },

        methods:active(`idx,toc`) {
            method:id(`construct`),name(`__construct`),
            syntax(`__construct(array $properties = [])`),return(`void`),langs {
                en {`Initializes the class with an array, and optional properties.`},
                el {`Αρχικοποιεί την κλάση με έναν πίνακα και προαιρετικές ιδιότητες.`}
            },

            method:id(`getinstance`),name(`getInstance`),
            syntax(`&getInstance(array $properties = []): TCurrencyHandler`),return(`TCurrencyHandler`),langs {
                en {`We see if the object is already loaded, otherwise we create a new load of the object`},
                el {`Βλέπουμε εάν υπάρχει ήδη φορτωμένο το αντικείμενο αλλιώς δημιουργούμε μια νέα φόρτωση του αντικειμένου`}
            },

            method:id(`format`),name(`format`),
            syntax(`format(float $amount, string $currency, string $locale='en_US'): string`), return(`string`),langs {
                en {`Formats a numeric amount according to the currency rules.`},
                el {`Μορφοποιεί ένα ποσό σύμφωνα με τους κανόνες του νομίσματος.`}
            },

            method:id(`getName`),name(`getName`),
            syntax(`getName(string $currency, string $lang='en'): string`),return(`string`),langs {
                en {`Returns the name of a currency in the requested language.`},
                el {`Επιστρέφει την ονομασία ενός νομίσματος στη ζητούμενη γλώσσα.`}
            },

            method:id(`getSymbol`),name(`getSymbol`),
            syntax(`getSymbol(string $currency): string`),return(`string`),langs {
                en {`Returns the symbol of a currency.`},
                el {`Επιστρέφει το σύμβολο ενός νομίσματος.`}
            },

            method:id(`isValid`),name(`isValid`),
            syntax(`isValid(string $currency): bool`),return(`bool`),langs {
                en {`Checks if a currency code is valid.`},
                el {`Ελέγχει αν ένας κωδικός νομίσματος είναι έγκυρος.`}
            },

            method:id(`normalize`),name(`normalize`),
            syntax(`normalize(string $currency): string`),return(`string`),langs {
                en {`Normalizes a currency code using aliases.`},
                el {`Κανονικοποιεί έναν κωδικό νομίσματος χρησιμοποιώντας ψευδώνυμα.`}
            }
        }
    }
}
*/
#[\AllowDynamicProperties]
class TCurrencyHandler extends TObject
{
    private array $symbols = [];
    private array $names = [];
    private array $formats = [];
    private array $aliases = [];


    /* 
    dobu {
        method:classid(`tcurrencyhandler`),id(`construct`), inherit(`tobject`)
    }
    */
    public function __construct(array $properties = [])
    {
        global $AOS_CONFIG_PATH;

        parent::__construct($properties);

        $this->symbols = include $AOS_CONFIG_PATH . "/currency/symbols.php";
        $this->names   = include $AOS_CONFIG_PATH . "/currency/names.php";
        $this->formats = include $AOS_CONFIG_PATH . "/currency/formats.php";
        $this->aliases = include $AOS_CONFIG_PATH . "/currency/aliases.php";
    }


    /* 
    dobu {
        method:classid(`tcurrencyhandler`),id(`getinstance`), inherit(`tobject`)
    }
    */
    public static function &getInstance(array $properties = []): TCurrencyHandler
    {
        static $instance;
        if (!is_object($instance)) {
            $instance = new TCurrencyHandler($properties);
        }
        return $instance;
    }


    // -------------------------------------------------------------
    // FORMAT
    // -------------------------------------------------------------
    /*
    dobu {
        method:classid(`tcurrencyhandler`),id(`format`),name(`format`),
        syntax(`format(float $amount, string $currency, string $locale='en_US'): string`),
        return(`string`),version(`1.0.0`) {

            summary:langs {
                en {`Formats a numeric amount according to the currency rules.`},
                el {`Μορφοποιεί ένα ποσό σύμφωνα με τους κανόνες του νομίσματος.`}
            },

            desc:langs {
                en {`This method formats a numeric value using the currency's decimal rules, 
                    thousand separators, decimal separators and symbol placement.`},
                el {`Η μέθοδος αυτή μορφοποιεί μια αριθμητική τιμή χρησιμοποιώντας τους κανόνες 
                    δεκαδικών, διαχωριστών χιλιάδων, δεκαδικών και θέσης συμβόλου του νομίσματος.`}
            },

            params:active(`table:{name,type,langs}`) {
                param:id(`amount`),name(`$amount`),type(`float`),langs {
                    en {`The numeric amount to format.`},
                    el {`Το αριθμητικό ποσό που θα μορφοποιηθεί.`}
                },
                param:id(`currency`),name(`$currency`),type(`string`),langs {
                    en {`The currency code used for formatting.`},
                    el {`Ο κωδικός νομίσματος που θα χρησιμοποιηθεί για τη μορφοποίηση.`}
                },
                param:id(`locale`),name(`$locale`),type(`string`),langs {
                    en {`The locale used for formatting (currently informational).`},
                    el {`Το locale που χρησιμοποιείται για τη μορφοποίηση (προς το παρόν πληροφοριακό).`}
                }
            },

            return:type(`string`),langs {
                en {`Returns the formatted amount with the currency symbol.`},
                el {`Επιστρέφει το μορφοποιημένο ποσό με το σύμβολο του νομίσματος.`}
            },

            throws:types(`ValueError`),langs {
                en {`Thrown when formatting rules for the currency do not exist.`},
                el {`Ρίχνεται όταν δεν υπάρχουν κανόνες μορφοποίησης για το νόμισμα.`}
            }
        }
    }
    */
    public function format(float $amount, string $currency, string $locale = 'en_US'): string
    {
        $currency = $this->normalize($currency);

        if (!isset($this->formats[$currency])) {
            throw new ValueError("Formatting rules not found for currency: $currency");
        }

        $f = $this->formats[$currency];

        $formatted = number_format(
            $amount,
            $f['decimals'],
            $f['decimal_sep'],
            $f['thousand_sep']
        );

        $symbol = $this->getSymbol($currency);

        return ($f['position'] === 'before')
            ? $symbol . $formatted
            : $formatted . ' ' . $symbol;
    }

    // -------------------------------------------------------------
    // NAME
    // -------------------------------------------------------------
    /*
    dobu {
        method:classid(`tcurrencyhandler`),id(`getname`),name(`getName`),
        syntax(`getName(string $currency, string $lang='en'): string`),return(`string`),version(`1.0.0`) {

            summary:langs {
                en {`Returns the name of a currency in the requested language.`},
                el {`Επιστρέφει την ονομασία ενός νομίσματος στη ζητούμενη γλώσσα.`}
            },

            desc:langs {
                en {`This method retrieves the human‑readable name of a currency. 
                    If the requested language is not available, English is used as fallback.`},
                el {`Η μέθοδος αυτή επιστρέφει την αναγνώσιμη ονομασία ενός νομίσματος.
                    Αν η ζητούμενη γλώσσα δεν υπάρχει, χρησιμοποιείται η αγγλική ως εναλλακτική.`}
            },

            params:active(`table:{name,type,langs}`) {
                param:id(`currency`),name(`$currency`),type(`string`),langs {
                    en {`The currency code whose name will be returned.`},
                    el {`Ο κωδικός νομίσματος του οποίου θα επιστραφεί η ονομασία.`}
                },
                param:id(`lang`),name(`$lang`),type(`string`),langs {
                    en {`The language code (en/el).`},
                    el {`Ο κωδικός γλώσσας (en/el).`}
                }
            },

            return:type(`string`),langs {
                en {`Returns the name of the currency.`},
                el {`Επιστρέφει την ονομασία του νομίσματος.`}
            },

            throws:types(`ValueError`),langs {
                en {`Thrown when the currency name does not exist.`},
                el {`Ρίχνεται όταν η ονομασία του νομίσματος δεν υπάρχει.`}
            }
        }
    }
    */
    public function getName(string $currency, string $lang = 'en'): string
    {
        $currency = $this->normalize($currency);

        if (!isset($this->names[$currency])) {
            throw new ValueError("Name not found for currency: $currency");
        }

        return $this->names[$currency][$lang] ?? $this->names[$currency]['en'];
    }

    // -------------------------------------------------------------
    // SYMBOL
    // -------------------------------------------------------------
    /*
    dobu {
        method:classid(`tcurrencyhandler`),id(`getsymbol`),name(`getSymbol`),
        syntax(`getSymbol(string $currency): string`),return(`string`),version(`1.0.0`) {

            summary:langs {
                en {`Returns the symbol of a currency.`},
                el {`Επιστρέφει το σύμβολο ενός νομίσματος.`}
            },

            desc:langs {
                en {`This method retrieves the symbol of the requested currency after normalization. 
                     If the symbol does not exist, an exception is thrown.`},
                el {`Η μέθοδος αυτή επιστρέφει το σύμβολο του ζητούμενου νομίσματος μετά την κανονικοποίηση.
                     Αν το σύμβολο δεν υπάρχει, ρίχνεται εξαίρεση.`}
            },

            params:active(`table:{name,type,langs}`) {
                param:id(`currency`),name(`$currency`),type(`string`),langs {
                    en {`The currency code whose symbol will be returned.`},
                    el {`Ο κωδικός νομίσματος του οποίου θα επιστραφεί το σύμβολο.`}
                }
            },

            return:type(`string`),langs {
                en {`Returns the symbol of the currency.`},
                el {`Επιστρέφει το σύμβολο του νομίσματος.`}
            },

            throws:types(`ValueError`),langs {
                en {`Thrown when the currency symbol does not exist.`},
                el {`Ρίχνεται όταν το σύμβολο του νομίσματος δεν υπάρχει.`}
            }
        }
    }
    */
    public function getSymbol(string $currency): string
    {
        $currency = $this->normalize($currency);

        if (!isset($this->symbols[$currency])) {
            throw new ValueError("Symbol not found for currency: $currency");
        }

        return $this->symbols[$currency];
    }

    // -------------------------------------------------------------
    // VALIDATION
    // -------------------------------------------------------------
    /*
    dobu {
        method:classid(`tcurrencyhandler`),id(`isvalid`),name(`isValid`),
        syntax(`isValid(string $currency): bool`),return(`bool`),version(`1.0.0`) {

            summary:langs {
                en {`Checks if a currency code is valid.`},
                el {`Ελέγχει αν ένας κωδικός νομίσματος είναι έγκυρος.`}
            },

            desc:langs {
                en {`This method verifies whether a currency code exists in the symbols, names, 
                     or formatting tables, after normalization.`},
                el {`Η μέθοδος αυτή ελέγχει αν ένας κωδικός νομίσματος υπάρχει στους πίνακες συμβόλων, 
                     ονομασιών ή μορφοποίησης, μετά την κανονικοποίηση.`}
            },

            params:active(`table:{name,type,langs}`) {
                param:id(`currency`),name(`$currency`),type(`string`),langs {
                    en {`The currency code to validate.`},
                    el {`Ο κωδικός νομίσματος που θα επικυρωθεί.`}
                }
            },

            return:type(`bool`),langs {
                en {`Returns true if the currency is valid, otherwise false.`},
                el {`Επιστρέφει true αν το νόμισμα είναι έγκυρο, αλλιώς false.`}
            }
        }
    }
    */
    public function isValid(string $currency): bool
    {
        $currency = $this->normalize($currency);

        return isset($this->symbols[$currency]) ||
               isset($this->names[$currency])   ||
               isset($this->formats[$currency]);
    }

    // -------------------------------------------------------------
    // NORMALIZATION
    // -------------------------------------------------------------
    /*
    dobu {
        method:classid(`tcurrencyhandler`),id(`normalize`),name(`normalize`),
        syntax(`normalize(string $currency): string`),return(`string`),version(`1.0.0`) {

            summary:langs {
                en {`Normalizes a currency code using aliases.`},
                el {`Κανονικοποιεί έναν κωδικό νομίσματος χρησιμοποιώντας ψευδώνυμα.`}
            },

            desc:langs {
                en {`This method ensures that a currency code is converted into its canonical form. 
                     If the code exists in the alias table, the alias is resolved and the normalized 
                     currency code is returned.`},
                el {`Η μέθοδος αυτή εξασφαλίζει ότι ένας κωδικός νομίσματος μετατρέπεται στην κανονική του μορφή.
                     Αν ο κωδικός υπάρχει στον πίνακα ψευδωνύμων, τότε επιστρέφεται ο κανονικοποιημένος κωδικός.`}
            },

            params:active(`table:{name,type,langs}`) {
                param:id(`currency`),name(`$currency`),type(`string`),langs {
                    en {`The currency code to normalize.`},
                    el {`Ο κωδικός νομίσματος που θα κανονικοποιηθεί.`}
                }
            },

            return:type(`string`),langs {
                en {`Returns the normalized currency code.`},
                el {`Επιστρέφει τον κανονικοποιημένο κωδικό νομίσματος.`}
            },

            throws:types(`InvalidArgumentException`),langs {
                en {`Thrown when the currency code is empty.`},
                el {`Ρίχνεται όταν ο κωδικός νομίσματος είναι κενός.`}
            }
        }
    }
    */
    public function normalize(string $currency): string
    {
        global $utf8;

        $currency = $utf8->strtoupper($utf8->trim($currency));

        if ($currency === '') {
            throw new InvalidArgumentException("Currency code cannot be empty.");
        }

        return $this->aliases[$currency] ?? $currency;
    }

}

/******************************************************************************
 * @endcode TCurrencyHandler
 *****************************************************************************/
?>
