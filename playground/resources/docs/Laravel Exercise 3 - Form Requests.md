# Laravel Exercise 3: Form Requests & MVC Refactoring

## Overview

In this exercise, we refactored the `store` method in `UserController`. We moved the validation logic from the controller into a dedicated **Form Request** class (`UserStoreRequest`). This is a best practice in Laravel to keep controllers clean and adhere to the **Single Responsibility Principle**.

## 1. The Concept: `php artisan make:request`

To separate the validation logic, we used the Artisan command line tool.

```bash
php artisan make:request UserStoreRequest
```

This command creates a new class in `app/Http/Requests/`. A Form Request class typically contains two main methods:

1.  **`authorize()`**:
    - **Purpose**: Determine if the currently authenticated user is authorized to perform this request.
    - **In our code**: We returned `true` to allow any user to submit the form (for registration purposes).
2.  **`rules()`**:
    - **Purpose**: Define the validation rules that apply to the request data.
    - **In our code**: We moved the array validation rules (for `name`, `email`, `password`) here.

## 2. The Code Refactoring

### The Form Request (`UserStoreRequest.php`)

This file now encapsulates _how_ the data should be validated.

```php
public function rules(): array
{
    return [
        'name'     => ['required', 'string', 'max:255'],
        // ... other rules
        'password' => ['string', 'confirmed', Password::min(8)...],
    ];
}
```

### The Controller (`UserController.php`)

We updated the `store` method to use type-hinting.

**Before:**

```php
public function store(Request $request)
{
    $request->validate([ ... ]); // Validation logic cluttering the controller
    // ...
}
```

**After:**

```php
// We type-hint the specific request class we created
public function store(UserStoreRequest $request)
{
    // If code execution reaches this line, VALIDATION HAS ALREADY PASSED.

    // Retrieve the validated data safely
    $validatedForm = $request->validated();

    dd($validatedForm);
}
```

## 3. Relation to MVC (Model-View-Controller)

The Form Request acts as a "guard" or middleware layer between the **Route** and the **Controller**.

### The Flow:

The flow changes slightly to ensure data integrity before the Controller even attempts to process it.

> Routes $\rightarrow$ (Validate via FormRequest) $\rightarrow$ Controller $\rightarrow$ View

### Detailed Diagram

```mermaid
flowchart LR
    Browser[Browser/User] -->|POST Request| Route[Routes (web.php)]

    subgraph Validation Layer
    Route -->|Injects| Request[UserStoreRequest]
    Request -->|Validates| Rules{Passes Rules?}
    Rules -- No --> Redirect[Redirect Back w/ Errors]
    end

    Rules -- Yes --> Controller[UserController]

    subgraph Core Logic
    Controller -->|Manipulates| Model[User Model]
    Model <-->|Database| DB[(Database)]
    end

    Controller -->|Returns| View[View (Blade)]
    View -->|Response| Browser
```

### Explanation of the Diagram:

1.  **Routes -> (Validate)**: When the route matches, Laravel sees the `UserStoreRequest` type-hint in the controller. It effectively pauses the request to run the checks defined in `rules()`.
2.  **-> Controller**: The `UserController` is only invoked if validation **passes**. This means inside the controller, you verify trust that `$request->validated()` contains safe data.
3.  **Controller <-> Model**: The controller would typically use the `User` model (e.g., `User::create($validatedForm)`) to interact with the database.
4.  **Controller -> View**: Finally, the controller returns a view (or redirects) to show the user the result.
