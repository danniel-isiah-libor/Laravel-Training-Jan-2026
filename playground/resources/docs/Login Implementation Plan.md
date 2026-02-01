# Login Authentication Implementation Plan

This plan outlines the steps to implement a secure Login authentication system in Laravel, reusing the existing `guest-layout` and `form.input-field` components as requested.

## User Review Required

> [!NOTE]
> We will be using a dedicated `SessionController` to handle authentication logic. This separates the concern of "Session Management" (Login/Logout) from "User Management" (Registration/Profile), adhering to modern best practices.

## Proposed Changes

### Controllers

#### [NEW] [SessionController.php](file:///home/notlath/Documents/Internship/Laravel-Training-Jan-2026/playground/app/Http/Controllers/SessionController.php)

- `create()`: Returns the login view.
- [store()](file:///home/notlath/Documents/Internship/Laravel-Training-Jan-2026/playground/app/Http/Controllers/UserController.php#49-54): Validates credentials and attempts to log the user in. regenerate session on success.
- `destroy()`: Logs the user out and invalidates the session.

### Views

#### [NEW] [login.blade.php](file:///home/notlath/Documents/Internship/Laravel-Training-Jan-2026/playground/resources/views/login.blade.php)

- Reuses `<x-guest-layout>` for consistent styling.
- Reuses `<x-form.input-field>` for email and password inputs.
- Includes a "Log In" button styled similarly to the Register button.

### Routes

#### [MODIFY] [web.php](file:///home/notlath/Documents/Internship/Laravel-Training-Jan-2026/playground/routes/web.php)

- Add GET `/login` route pointing to `SessionController@create`.
- Add POST `/login` route pointing to `SessionController@store` (named `login`).
- Add POST `/logout` route pointing to `SessionController@destroy` (named `logout`).

## Verification Plan

### Manual Verification

1.  **Access Login Page**: Navigate to `/login` and verify that the form renders correctly with the reused layout and components.
2.  **Invalid Login**: Attempt to login with incorrect credentials and verify that validation errors are displayed (using the existing error display in `input-field`).
3.  **Successful Login**: Enter valid credentials (created via the Register page) and verify redirection to the dashboard or home page.
4.  **Logout**: Verify that a logout mechanism (to be added temporarily or checked via code) works effectively.
