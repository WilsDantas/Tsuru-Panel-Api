## Tsuru - Panel - Api

Api being made in Laravel for an e-commerce that will be done in Vue Js

- Clients
- Categories
    - Sub Categories
- Brands
- Tenants
    - Products
        - Details
    - Orders
    - Users
        - Profiles
            - Permissions
    

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

    CNPJ                    - Tenant CNPJ | Required | 14 Digits | Unique: Tenant
    Tenant                  - Name Tenant | Required | Min: 3 | Max: 255
    name                    - User Name | Required | Min: 3 | Max: 255
    Email                   - User/Tenant Email | Required | Email | Min: 3 | Max: 255 | Unique: Users
    password                - User Password | Password | Min: 6 | Max: 20
    password_confirmation   - Confirm User Password

api/v1/auth - GET

    Email                   - User Email | Required
    password                - User Password | Required
    device_name             - current device name | Required

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

api/v1/permissions/paginate/{per_page}/{search} - GET

    per_page                - nullable | First Param
    search                  - nullable | Second Param

    Return Permissions With Paginate

api/v1/permissions - GET

    Return All Permissions Without Paginate

api/v1/permissions - POST

    name                    - Required | Min: 3 | Max: 255

    return message " permission successfully registered "

api/v1/permissions/{identify} - GET

    identify                - Permission Identify

    Return One Permission

api/v1/permissions/{identify} - PUT

    name                    - Required | Min: 3 | Max: 255

    return message " permission updated successfully "

api/v1/permissions/{identify} - DELETE

    return message " permission successfully deleted "

## LARAVEL API URLS PROFILES - ALL NEED AUTHENTICATION

api/v1/profiles/paginate - GET

    per_page                - nullable | First Param
    search                  - nullable | Second Param

    Return Profiles With Paginate

api/v1/profiles - GET

    Return All Profiles Without Paginate

api/v1/profiles - POST

    name                    - Required | Min: 3 | Max: 255

    return message " Profile successfully registered "

api/v1/profiles/{identify} - GET

    identify                - Permission Identify

    Return One Profile

api/v1/profiles/{identify} - PUT

    identify                - Permission Identify

    name                    - Required | Min: 3 | Max: 255

    return message " Profile updated successfully "

api/v1/profiles/{identify} - DELETE

    identify                - Permission Identify

    return message " Profile successfully deleted "

api/v1/profiles/AttachPermissions/{identify} - PUT

    permissions                - array with all permission IDs you need to add to the profile

    Return Profile with Permissions

## LARAVEL API URLS CATEGORIES - ALL NEED AUTHENTICATION

api/v1/categories/paginate - GET

    per_page                - nullable | First Param
    search                  - nullable | Second Param

    Return Categories With Paginate

api/v1/categories - GET

    Return All Categories Without Paginate

api/v1/categories - POST

    name                    - Required | Min: 3 | Max: 255

    return message " Category successfully registered "

api/v1/categories/{identify} - GET

    Return One Category

api/v1/categories/{identify} - PUT

    identify                - Category Identify

    name                    - Required | Min: 3 | Max: 255

    return message " Category updated successfully "

api/v1/categories/{identify} - DELETE

    identify                - Permission Identify

    return message " Category successfully deleted "

## LARAVEL API URLS BRANDS - ALL NEED AUTHENTICATION

api/v1/brands/paginate - GET

    per_page                - nullable | First Param
    search                  - nullable | Second Param

    Return Brands With Paginate

api/v1/brands - GET

    Return All Brands Without Paginate

api/v1/brands - POST

    name                    - Required | Min: 3 | Max: 255

    return message " Brand successfully registered "

api/v1/brands/{identify} - GET

    identify                - Brand Identify

    Return One Brand

api/v1/brands/{identify} - PUT

    identify                - Brand Identify

    name                    - Required | Min: 3 | Max: 255

    return message " Brand updated successfully "

api/v1/brands/{identify} - DELETE

    identify                - Brand Identify

    return message " Brand successfully deleted "

## LARAVEL API URLS PRODUCTS - ALL NEED AUTHENTICATION

api/v1/products/paginate - GET

    per_page                - nullable | First Param
    search                  - nullable | Second Param

    Return Products/Details/Images/SubCategory/Category/Brand With Paginate

api/v1/products - GET

    Return All Products/Details/Images/SubCategory/Category/Brand Without Paginate

api/v1/products - POST

    name                    - Required | Min: 3 | Max: 255
    quantity                - Required
    price                   - Required | regex:/^\d+(\.\d{1,2})?$/      Ex: 42.42

    images                  - Required | image                          Array with images

    brand                   - Required                                  Brand Identify
    sub_category            - Required                                  Sub Category Identify

    pet                     - Nullable | Min: 3 | Max: 255              Type of Pet (Dog, Cat, Birds)
    size                    - Nullable | Min: 3 | Max: 255
    age                     - Nullable
    material                - Nullable | Min: 3 | Max: 255
    dimension               - Nullable | Min: 3 | Max: 255
    description             - Nullable | Min: 3 | Max: 255
    weight                  - Nullable | Min: 3 | Max: 255

    return message " Product successfully registered "

api/v1/products/{identify} - GET

    identify                - Product Identify

    Return One Products/Details/Images/SubCategory/Category/Product

api/v1/products/{identify} - PUT

    name                    - Required | Min: 3 | Max: 255
    quantity                - Required
    price                   - Required | regex:/^\d+(\.\d{1,2})?$/      Ex: 42.42

    images                  - Required | image                          Array with images

    brand                   - Required                                  Brand Identify
    sub_category            - Required                                  Sub Category Identify

    pet                     - Nullable | Min: 3 | Max: 255              Type of Pet (Dog, Cat, Birds)
    size                    - Nullable | Min: 3 | Max: 255
    age                     - Nullable
    material                - Nullable | Min: 3 | Max: 255
    dimension               - Nullable | Min: 3 | Max: 255
    description             - Nullable | Min: 3 | Max: 255
    weight                  - Nullable | Min: 3 | Max: 255

    return message " Product updated successfully "


api/v1/products/{identify} - DELETE

    identify                - Product Identify

    return message " Product successfully deleted "