## Tsuru - Panel - Api

Api for the Tsuru panel that will be done in Vue Js

## Laravel - ACL + MULTI TENANT SINGLE DATABASE

## LARAVEL SANCTUM 

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

api/v1/me - GET

    Sanctum Token
    Authenticated

    Return User Resource with Tenant Resource

api/v1/logout - GET

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

api/v1/permissions/{$uuid} - GET

    Return One Permission

api/v1/permissions/{$uuid} - PUT

    name                    - Permission Name

    return message " permission updated successfully "

api/v1/permissions/{$uuid} - DELETE

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

api/v1/profiles/{$uuid} - GET

    Return One Profile

api/v1/profiles/{$uuid} - PUT

    name                    - Profile Name

    return message " Profile updated successfully "

api/v1/profiles/{$uuid} - DELETE

    return message " Profile successfully deleted "