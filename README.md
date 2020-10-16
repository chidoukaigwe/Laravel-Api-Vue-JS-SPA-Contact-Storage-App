# Chido Designs CMS

## Laravel SPA /  Vue.js 

An API driven application, built with Laravel resource collections, that enables me via a vue.js frontend to create, edit and store contact information.

Test Driven Development Laravel PHP Unit 

* SPA (Single Page Application) 
* Resource Controllers (RESTFUL Controllers)
* Using Laravel Resource Collections

## Built With
* Laravel 7
* Vue JS 
* Laravel Scout (App Search Capability)
* Tailwind CSS (Front End UI Framework)


## Run The App 
1. `php artisan serve`
2. `npm run --watch` (compile and watch files)


## Run App Tests

Set Up Steps [TDD]

`file source: /tests/Feature/ContactsTest.php`

Create Alias For Re-Running Your Tests:

In Terminal Run: 

`alias pu='clear && vendor/bin/phpunit'`

`alias pf='clear && vendor/bin/phpunit --filter'`

CMD: pu -> runs all tests
CMD: pf <testname> -> runs a specific test
