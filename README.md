## Tsuru - Panel - Api

Api for the Tsuru panel that will be done in Vue Js

## Laravel - ACL - Access Control List

is a list of permissions associated with a user.
An ACL specifies which users are granted access to system processes,
as well as which operations are allowed on certain objects.


## LARAVEL - MULTI TENANT SINGLE DATABASE

System with multiple companies, all in the same application, in the same database.
Separating data by companies where your employees will only be able to see your company data.

## LARAVEL SANCTUM 

Laravel Sanctum provides a featherweight authentication system for SPAs (single page applications), mobile applications, and simple, token based APIs. Sanctum allows each user of your application to generate multiple API tokens for their account. These tokens may be granted abilities / scopes which specify which actions the tokens are allowed to perform.

# CLONING REPOSITORY

git clone https://github.com/WilsDantas/Tsuru-Panel-Api.git

# Install the dependencies and the framework

composer install

# create a .env with the data from .env.example

# create a new key for your application

php artisan key:generate

# run migrations

php artisan migrate --seed

## LARAVEL API URLS AUTH

api/v1/register - POST

    CNPJ                    - 14 Digits
    Tenant                  - Name Tenant
    name                    - User Name
    Email                   - User/Tenant Email
    password                - User Password
    password_confirmation   - Confirm User Password

api/v1/auth - GET

    Email                   - User Email
    password                - User Password
    device_name             - current device name

    Return Sanctum Token +  User Resource with Tenant Resource

api/v1/me - GET - NEED AUTHENTICATION

    Sanctum Token
    Authenticated

    Return User Resource with Tenant Resource

api/v1/logout - GET - NEED AUTHENTICATION

    Sanctum Token
    Authenticated

    Revoke all User Tokens

## LARAVEL API URLS PERMISSIONS - ALL NEED AUTHENTICATION

api/v1/permissions/paginate - GET

    per_page                - number
    search                  - string

    Return Permissions With Paginate

api/v1/permissions - GET

    Return All Permissions Without Paginate

api/v1/permissions - POST

    name                    - Permission Name

    return message " permission successfully registered "

api/v1/permissions/{identify} - GET

    Return One Permission

api/v1/permissions/{identify} - PUT

    name                    - Permission Name

    return message " permission updated successfully "

api/v1/permissions/{identify} - DELETE

    return message " permission successfully deleted "

## LARAVEL API URLS PROFILES - ALL NEED AUTHENTICATION

api/v1/profiles/paginate - GET

    per_page                - number
    search                  - string

    Return Profiles With Paginate

api/v1/profiles - GET

    Return All Profiles Without Paginate

api/v1/profiles - POST

    name                    - Profile Name

    return message " Profile successfully registered "

api/v1/profiles/{identify} - GET

    Return One Profile

api/v1/profiles/{identify} - PUT

    name                    - Profile Name

    return message " Profile updated successfully "

api/v1/profiles/{identify} - DELETE

    return message " Profile successfully deleted "

## LARAVEL API URLS PermissionProfile - ALL NEED AUTHENTICATION

api/v1/profiles/AttachPermissions/{identify} - PUT

    permissions                - array with all permission IDs you need to add to the profile

    Return Profile with Permissions
