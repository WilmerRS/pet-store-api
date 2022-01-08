[//]: # (<div align="center">)

[//]: # (    <h1><img src="https://github.com/WilmerRS/citix-shf-frontend/blob/main/src/assets/logo-x.png?raw=true" width="60"/></h1>)

[//]: # (</div>)

<h1 style="margin-top:10px;" align="center"> 🐰
  <strong>  Pet Store API </strong> 🐾
</h1>

## 🐙 Project

Petstore is a sample API that simulates a pet shop management server. The API allows you to access
Petstore data using a set of individual calls

## 🐋 To get started

1. Run `git clone https://github.com/WilmerRS/pet-store-api.git`.
2. Run `composer install`
3. Run `cp .env.example .env` or copy `.env.example` `.env`
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan db:seed`
7. Run `php artisan serve`
8. Run `php artisan storage:link`
9. Enjoy! 🎊

## 🐣 Features

- [x] Authentication and Authorization 
- [x] Roles by user
- [x] Create and get operations for users
- [x] Create, Search, Update and Get all operations for pets
- [x] CRUD operations for categories
- [x] CRUD operations for status
- [x] Pictures for pets and image treatment

## 🐻‍❄️ HTTP Schema

### 🐈‍⬛ Pet
`GET` `/pets`
- `/pets?paginated=10&page=1`
- `/pets?category_id=1&status_id=1`
```javascript
GET /pets
{
  "code": 200,
  "message": "Pets retrieved successfully.",
  "data": {
    "pet": [
      {
        ...
        "category": {
          ...
        },
        "status": {
          ...
        }
      }
    ]
  }
}
```

`GET` `/pets/{pet-slug}`
```javascript
GET /pets/my-dog
{
    "code": 200,
    "message": "Pet retrieved successfully.",
    "data": {
        "pet": {
            ...
            "category": {
                ...
            },
            "status": {
                ...
            }
        }
    }
}
```

`POST` `/pets`
```javascript
POST /pets
{
  "name": "name3",
  "slug": "slug4",
  "description":" description",
  "category_id": 1,
  "status_id": 1
}
```

`PATCH` `/pets`
```javascript
PATCH /pets
{
  "name": "name3",
  "description":" description",
  ...
}
```

## 🗄️ Models

### 🐈‍⬛ Pet

```javascript
Pet = {
  id: string,
  name: string,
  category: Category,
  status: Status,
  is_active: string,
  created_at: date,
  updated_at: date,
}
```
