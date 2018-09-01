# Number to Words

|         Coverage        |        Downloads        |         Release         |
|:-----------------------:|:-----------------------:|:-----------------------:|
| [![Coverage Status](https://coveralls.io/repos/github/narokishi/number-to-words/badge.svg?branch=master)](https://coveralls.io/github/narokishi/number-to-words?branch=master) | [![Total Downloads](https://poser.pugx.org/narokishi/number-to-words/downloads?format=flat-square)](https://packagist.org/packages/narokishi/number-to-words) | [![Latest Stable Version](https://poser.pugx.org/narokishi/number-to-words/v/stable?format=flat-square)](https://packagist.org/packages/narokishi/number-to-words) |

## Description

"NumberToWords" is a **PHP** package, which transform numbers (as float) to human-friendly written value with currency.

## Installation
### Composer
Installing via [Composer](https://getcomposer.org/download/) will keep this package up to date for you.
```bash
composer require narokishi/number-to-words
```
### Usage
```php
use Narokishi\NumberToWords\NumberTransformer;

...

Transformer::make()
    ->setLanguage('PL') // Language
    ->toWords(172.05, 'PLN') // Value, currency
```

## Contributing
Thank you for considering contributing to the package.

### Running tests
```bash
composer tests
composer tests-windows
```
### Submitting a Patch
- Fork the Repository
- After the action has completed, clone your fork locally
```bash
git clone git@github.com:{username}/number-to-words.git
cd number-to-words
git remote add upstream git://github.com/narokishi/number-to-words.git
```
- Check that tests pass
- Create and work on your own topic branch
```bash
git checkout -b {branch} master
```
- Prepare your patch (while rebasing you might have to resolve conflicts)
```bash
git checkout master
git fetch upstream
git merge upstream/master
git checkout BRANCH_NAME
git rebase master
```
- In case of conflicts
```bash
 git add {files}
 git rebase --continue
```
- Check that all tests pass and push your branch
```bash
 git push origin {branch} --force
```
- Make a Pull Request on narokishi/number-to-words repository

## License
The project is open-sourced software licensed under the MIT license.
